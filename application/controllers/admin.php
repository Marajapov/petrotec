<?php
	Class Admin extends CI_Controller{
		function __construct(){
			parent::__construct();
		}
		function index(){
			$this->load->view('admin/header');
			$this->load->view('admin/page_login');
		}
		function auth(){
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			
			$result = $this->db->get_where('auth', array(
				'email' => $email,
				'password' => $password,
			));
			
			if($result->num_rows() > 0){
				redirect('admin/dashboard');
				$this->session->set_userdata($result->result());
			}
			else{
				redirect('admin/index?result=error');
			}
		}
		function dashboard(){
			$this->load->view('admin/header');
			$this->load->view('admin/sidebar');
			$this->load->view('admin/slider');
			$this->load->view('admin/footer');
		}
		function sliderupload(){
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= '2000';
			$config['max_width']  = '4550';
			$config['max_height']  = '2041';

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('file'))
			{
				$error = array('error' => $this->upload->display_errors());
				print_r($error);
				//$this->load->view('upload_form', $error);
			}
			else
			{
				$data = array('upload_data' => $this->upload->data());
				$this->db->insert('attachments', array(
					'attachmentid' => 0,
					'type' => 'slider',
					'link' => $data['upload_data']['file_name'],
				));
				redirect('admin/dashboard');
				//$this->load->view('upload_success', $data);
			}
		}
		function deleteslider($id){
			$this->db->delete('attachments', array('id' => $id));
			redirect('admin/dashboard');
		}
		function category(){
			$this->load->view('admin/header');
			$this->load->view('admin/sidebar');
			$this->load->view('admin/category');
			$this->load->view('admin/footer');
		}
	}
?>