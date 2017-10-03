<?php
class Sales extends CI_Controller{
	function __construct(){
		parent::__construct();
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