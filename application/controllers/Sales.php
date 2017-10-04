<?php
class Sales extends CI_Controller{
	function __construct(){
		parent::__construct();
	}

	// index
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
			'employee_id' => $employee_id,
			
		);
		$this->db->insert('sales', $ins);

		$id=$this->db->insert_id();
		$productid[] = $this->input->post('product');
		$quantity[] = $this->input->post('quantity');
		$price[] = $this->input->post('price');
		$i = 0;
		$j = 0;
		$k = 0;
		$one = array_values_recursive($productid);
		$two = array_values_recursive($quantity);
		$three = array_values_recursive($price);
		
		$result = mergeArrays($id,$one,$two,$three);
		
		foreach($result as $row)
		{
			$this->db->insert('sales_item',$row);
		}
		redirect('Sales/index');
	}

	public function show()
	{
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('sales/show');
		$this->load->view('footer');
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
		$quantity = $_POST['quantity'];
		$productId = $_POST['productId'];
		$companyId = $_POST['companyId'];
		$row = $this->db->get_where('inventory', array('companyid' => $companyId,'productid'=>$productId))->row();
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
	}

	public function addItem()
	{
		$data = $_POST['i'];
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
                        <select class="form-control" name="product[]" id="productId">
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
			
		});
	});

			
		</script>
	';
        
	}









	function viewSales(){
		
	}
	function generateinvoice(){
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('sales/generateinvoice');
		$this->load->view('footer');
	}
}
?>