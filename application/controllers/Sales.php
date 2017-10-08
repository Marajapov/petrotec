<?php
class Sales extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('Sales_model');
	}
	public function index() 
	{
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('sales/index');
		$this->load->view('footer');
	}
	public function create()
	{
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('sales/create');
		$this->load->view('footer');
	}
	public function store()
	{
		$this->load->helper('flatten');
		$date = $this->input->post('date');
		$customerid = $this->input->post('customer');
		$company = $this->input->post('company');
		$employee_id = $this->input->post('employee');
		$ins = array(
			'date' => $date,
			'customerid' => $customerid,
			'date_created' => date('Y-m-d'),
			'companyid' => $company,
			'employee_id' => $employee_id);
		$this->db->insert('sales', $ins);
		$id=$this->db->insert_id();
		$productid[] = $this->input->post('product');
		$quantity[] = $this->input->post('quantity');
		$price[] = $this->input->post('price');
		$productid_extract_value = array_values_recursive($productid);
		$quantity_extract_value = array_values_recursive($quantity);
		$price_extract_value = array_values_recursive($price);
		$subtitudeInventory = mergeArrays($id,$productid_extract_value,$quantity_extract_value,$price_extract_value);
		foreach($subtitudeInventory as $row)
		{
			$inventory_row = $this->db->get_where('inventory',array('companyid'=>$company,'productid'=>$row['productid']))->row();
			$total = $inventory_row->qty - $row['qty'];
			$update = array(
				'qty'=>$total);
			$this->db->update('inventory', $update, array('id' => $inventory_row->id));
			$this->db->insert('sales_item',$row);
		}
		$installment_date = $this->input->post('installment_date');
		$amount = $this->input->post('amount');
		$next_installment = $this->input->post('next_installment');
		$next_amount = $this->input->post('next_amount');
		($this->Sales_model->sales_total($id) <= $amount) ? $status='finish': $status='pending';
		$insert_installment = array(
			'salesid'=>$id,
			'paid'=>$amount,
			'date'=>$installment_date,
			'next_installment'=> $next_installment,
			'status' => $status,
		);
		$this->db->insert('installment',$insert_installment);
		redirect('Sales/index');
	}
	public function show()
	{
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('sales/show');
		$this->load->view('footer');
	}
	public function pdf() 
	{
		$id = $this->uri->segment(3);
		$row = $this->db->get_where('sales', array('id' => $id))->row();
		$this->load->library('pdfgenerator');
		$data['row']=$row;
		$html = $this->load->view('sales/sales_pdf', $data, true);
		$filename = 'sales_report_'.$row->date.time();
		$this->pdfgenerator->generate($html, $filename, true, 'A4', 'portrait');
	}
	public function installment()
	{
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('sales/installment');
		$this->load->view('footer');
	}
	public function updateInstallment()
	{
		$salesid = $this->input->post('salesid');
		$amount = ($this->input->post('amount') >1)?$this->input->post('amount'):redirect('Sales/index');
		$date = $this->input->post('installment_date');
		$row = $this->db->get_where('installment',array('salesid' =>$salesid))->row();
		$paid = $row->paid;
		$paid += $amount;
		if($paid >= $this->Sales_model->sales_total($salesid)){
			$update = array(
				'next_installment' => $date,
				'paid' => $paid,
				'status' => 'finish');
			$this->db->update('installment', $update, array('id' => $row->id));
		}
		$update = array(
			'next_installment' => $date,
			'paid' => $paid);
		$this->db->update('installment', $update, array('id' => $row->id));
		redirect('Sales/index');
	}
	public function fetch_data()
	{
		$data = $_POST['companyId'];
		$table = $this->db->get_where('employee', array('companyId' => $data))->result();
		$result = "";
		foreach($table as $row){
			$result .= '<option value="'.$row->id.'">'.$row->firstname.'</option>';
		}
		echo $result;
        
	}
	public function change_quantity()
	{
		$quantity = $_POST['quantity1'];
		$productId = $_POST['productId'];
		$companyId = $_POST['companyId'];
		$row = $this->db->get_where('inventory', array('companyid' => $companyId,'productid'=>$productId))->row();
		if(!empty($row))
		{
			if($quantity <= $row->qty){
				echo '
						<label style="font-size: 9px;">Quantity in Inventory</label>
						<div class="alert alert-success" style="font-size: 12px; padding: 0 15px; margin-top: 5px;">
							<strong>'.$row->qty.'!</strong>
						</div>';
			}else{
				echo '
						<label style="font-size: 9px;">Quantity in Inventory</label>
						<div class="alert alert-danger" style="font-size: 12px; padding: 0 15px; margin-top: 5px;">
							<strong>'.$row->qty.'!</strong>
						</div>';
			}
		}else{
			echo '
						<label style="font-size: 9px;">Quantity in Inventory</label>
						<div class="alert alert-danger" style="font-size: 12px; padding: 0 15px; margin-top: 5px;">
							<strong>0!</strong>
						</div>';
		}
	}

	public function addItem()
	{
		$post_product_id = $this->input->post('productId');
		$post_array = $this->input->post('send_array');
		$data = $_POST['i'];
		$priceText = 'price';
		$quantityText = "quantityId";
		$constant = '$(this).attr("id")';
		if(!empty($post_array))
		{
			$integerIDs = array_map('intval', explode(',', $post_array));
			
		}else{
			$integerIDs = $post_product_id;
		}
		$this->db->where_not_in('id',$integerIDs);
		$product = $this->db->get('product')->result();
		$options ='';
		if(!empty($product)){
			foreach($product as $row){
				$options .= '<option value="'.$row->id.'">'.$row->name.'</option>';
			}
		}		
		echo '<div id="deleteItem_'.$data.'">
		<div class="col-md-6" >
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<div class="form-group">
                            <label>Product</label>
                        <select class="form-control selectpicker" name="product[]" id="productId_'.$data.'">
                            '.$options.'
                            
                        </select>
                        </div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Quantity</label>
                        <input type="text" id="quantityId'.$data.'" name="quantity[]" class="form-control" />
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>Price</label>
				        <input type="text" name="price[]" id="price'.$data.'" class="form-control" />
					</div>
				</div>
				<div class="col-md-1">
					<div class="form-group">
					<button type="button" id="deleteButton_'.$data.'" class="close" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
						
					</div>
				</div>
			</div>
			
		</div>

		</div>
		<script>
		$(document).ready(function(){ 
		$("#deleteButton_'.$data.'").click(function () {
			$("#deleteItem_'.$data.'").remove();

		var i=1;
		var qty;
		var pp;
		var result;
		var price;
		var quantity;
		var a,b;
		var sum = 0;
		var count = $( "input[id*='.$priceText.']" ).length;
		
		if(count ==1){
			quantity = $("#quantityId1").val();
			price = $("#price1").val();
			result = quantity * price;
			$("#total").html(result);
		}else if($("#price"+count).val() != "")
		{
			for(i=1; i<=count; i++)
			{
				qty = parseInt($("#quantityId"+count).val());
				a = parseInt(qty);
				pp = parseInt($("#price"+count).val());
				b = parseInt(pp);
				sum += (a*b);
			}			
			$("#total").html(sum);
		}else{
			
			for(i=1; i<=count; i++)
			{
				qty = parseInt($("#quantityId"+count).val());
				
				a = parseInt(qty);
				pp = parseInt($("#price"+count).val());
				b = parseInt(pp);
				sum += (a*b);
			}			
			$("#total").html(sum);
		}
			
	    var mysum=0; 
		var massiv = new Array();
		$("#myForm").find("input[id*='.$quantityText.']").each(function(i,val){
			var string = $(this).attr("id");
			massiv.push(string.substr(10,1));
			var totalsum=0; 
			$.each(massiv, function (index, value)  
			{  				
				qty = parseInt($("#quantityId"+value).val());
				
				a = parseInt(qty);
				pp = parseInt($("#price"+value).val());
				b = parseInt(pp);
				mysum+=(a*b);
				totalsum+=mysum; 
				mysum=0; 
				console.log(totalsum);
			});  
			
			$("#total").html(totalsum);

		});
	});
});
	
    // After deleting item, adding new item
	$(document).change(function(){
		var mysum=0; 
		var massiv = new Array();
		$("#myForm").find("input[id*='.$quantityText.']").each(function(){
			var string = $(this).attr("id");
			massiv.push(string.substr(10,1));
			var totalsum=0; 
			$.each(massiv, function (index, value)  
			{  				
				qty = parseInt($("#quantityId"+value).val());
				
				a = parseInt(qty);
				pp = parseInt($("#price"+value).val());
				b = parseInt(pp);
				mysum+=(a*b);
				totalsum+=mysum; 
				mysum=0; 
				console.log(totalsum);
			});  
			
			$("#total").html(totalsum);
		});
		
	});
	
	</script>
';     
	}
	function generateinvoice(){
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('sales/generateinvoice');
		$this->load->view('footer');
	}
}
?>