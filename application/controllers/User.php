<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User extends CI_Controller {
    function __construct(){
		parent::__construct();
        (empty($this->session->userdata('userdata')))?redirect('Login/form'):$this->data =$this->session->userdata('userdata');
	}
	public function index()
	{
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('user/index');
		$this->load->view('footer');
	}
    public function create()
    {
        $this->load->view('header');
        $this->load->view('sidebar');
        $this->load->view('user/create');
        $this->load->view('footer');
    }
    public function store()
    {
        $pass1 = $this->input->post('password');
        $pass2 = $this->input->post('password_confirm');
        $password = ($pass1 == $pass2)? $password=$pass1:redirect('User/create');
        $ins = array(
			'firstname' => $this->input->post('firstname'),
			'lastname' => $this->input->post('lastname'),
			'email' => $this->input->post('email'),
			'phone' => $this->input->post('phone'),
			'password' => password_hash($password,PASSWORD_BCRYPT),
		);
		$this->db->insert('user', $ins);
        redirect('User/index');
    }
    public function edit()
    {
        $this->load->view('header');
        $this->load->view('sidebar');
        $this->load->view('user/edit');
        $this->load->view('footer');
    }
    public function update()
    {
        $id = $this->input->post('id');
        $update = array(
			'firstname' => $this->input->post('firstname'),
			'lastname' => $this->input->post('lastname'),
			'email' => $this->input->post('email'),
			'phone' => $this->input->post('phone'),
			'password' => password_hash($password,PASSWORD_BCRYPT),
		);
		$this->db->insert('user', $ins);
        redirect('User/index');
    }
}
