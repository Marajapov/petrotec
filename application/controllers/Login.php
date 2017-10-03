<?php

class Login extends CI_Controller{
	function __construct(){
		parent::__construct();
        
	}

    function form(){
        $this->load->view('header');
        $this->load->view('auth/login_view');
        $this->load->view('footer');
    }

    function login_post(){
		$email = $this->input->post('email');
	    $password = $this->input->post('password');
		$user = $this->db->get_where('user', array('email' => $email) )->row();
        $hash = $user->password;
        if(password_verify($password,$hash)){
            $user_company = $this->db->get_where('company', array('id' => $user->companyid))->row();        
            if($user){
                $this->load->library('session');
                $user_array = array(
                    'userid' => $user->id,
                    'username' => $user->firstname,
                    'email' => $user->email,
                    'company_name' => $user_company->company_name,
                    'department' => $user->department
                );
                $this->session->set_userdata('userdata', $user_array);
                redirect('/home');
            }else{
                redirect('Login/form');
            }
        }else{
            redirect('Login/form');
        }
		
		
    }

    function logout()
    {
        $this->session->unset_userdata('userdata');
        redirect('Request/form');
    }

    // Authorization
    function register()
    {
        $this->load->view('header');
        $this->load->view('auth/register');
        $this->load->view('footer');
    }

    function register_post()
    {
        $pass1 = $this->input->post('password');
        $pass2 = $this->input->post('password_confirm');
        $password = ($pass1 == $pass2)? $password=$pass1:redirect('Login/register');
        
        $ins = array(
			'firstname' => $this->input->post('firstname'),
			'email' => $this->input->post('email'),
			'password' => password_hash($password,PASSWORD_BCRYPT),
		);
		$this->db->insert('user', $ins);
        redirect('/home');
    }

}
?>