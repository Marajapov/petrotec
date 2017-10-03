<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct(){
		parent::__construct();
		//  if(empty($this->session->userdata("user"))){			 
 		// 	  redirect('home/login');
		//  }
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('footer');
	}
	public function createcustomer()
	{
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('temp');
		$this->load->view('footer');
	}
	public function allcustomer()
	{
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('allcus');
		$this->load->view('footer');
	}
	// Request
	public function createrequest()
	{
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('requestform');
		$this->load->view('footer');
	}
	public function allrequest()
	{
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('allcus');
		$this->load->view('footer');
	}
	// end Request
	public function vendorlist(){
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('vendorlist');
		$this->load->view('footer');
	}
	public function addvendor(){
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('addvendor');
		$this->load->view('footer');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */