<?php
	class Supplier extends CI_Controller{
		function __construct(){
			parent::__construct();
		}
		function index(){
			$this->load->view('header');
			$this->load->view('sidebar');
			$this->load->view('supplier/allsupplier');
			$this->load->view('footer');
		}
		function addsupplier(){
			$this->load->view('header');
			$this->load->view('sidebar');
			$this->load->view('supplier/addsupplier');
			$this->load->view('footer');
		}
		function insSupplier(){
			$validate = $this->db->get_where('supplier', array('company' => $this->input->post('company')))->row();
			if(empty($validate)){
				$ins = array(
					'title' => $this->input->post('title'),
					'fname' => $this->input->post('fname'),
					'lname' => $this->input->post('lname'),
					'email' => $this->input->post('email'),
					'phone' => $this->input->post('phone'),
					'company' => $this->input->post('company'),
					'shipping_adddress' => $this->input->post('shipping_adddress'),
					'company_address' => $this->input->post('company_address'),
					'notes' => $this->input->post('notes'),
				);
				$this->db->insert('supplier', $ins);
				$this->session->set_flashdata('alert_msg', array('success', 'suppelier', 'Successfully added supplier.'));
			}else{
				$this->session->set_flashdata('alert_msg', array('failure', 'suppelier', 'company name already registered.'));
			}
			redirect('supplier/addsupplier');
		}
		function updateSupplier(){
			$ins = array(
				'title' => $this->input->post('title'),
				'fname' => $this->input->post('fname'),
				'lname' => $this->input->post('lname'),
				'email' => $this->input->post('email'),
				'phone' => $this->input->post('phone'),
				'company' => $this->input->post('company'),
				'shipping_adddress' => $this->input->post('shipping_adddress'),
				'company_address' => $this->input->post('company_address'),
				'notes' => $this->input->post('notes'),
			);
			$this->db->update('supplier', $ins, array('id' => $this->input->post('id')));
			$this->session->set_flashdata('alert_msg', array('success', 'suppelier', 'Update Successfully'));
			redirect('supplier/editSupplier/'.$this->input->post('id'));
		}
		function editSupplier($id){
			$this->load->view('header');
			$this->load->view('sidebar');
			$this->load->view('supplier/editsupplier');
			$this->load->view('footer');
		}
	}
?>