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