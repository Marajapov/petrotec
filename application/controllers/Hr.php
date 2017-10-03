<?php
class Hr extends CI_Controller{
	function __construct(){
		parent::__construct();
	}
	function applicants(){
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('hr/view_applicants');
		$this->load->view('footer');
	}
	function addapplicants(){
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('hr/add_applicants');
		$this->load->view('footer');
	}
	function update_employee(){
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = '*';
		$this->load->library('upload', $config);
		$ins = array(
			'companyid' => $this->input->post('companyid'),
			'firstname' => $this->input->post('fname'),
			'lastname' => $this->input->post('lname'),
			'title' => $this->input->post('title'),
			'phone' => $this->input->post('phone'),
			'email' => $this->input->post('email'),
			'visa_status' => $this->input->post('visa_status'),
			'dob' => $this->input->post('dob'),
			'employeecode' => $this->input->post('employeecode'),
			'department' => $this->input->post('department'),
			'designation' => $this->input->post('designation'),
			'emirates_id' => $this->input->post('emid'),
			'emirates_expiry' => $this->input->post('emirates_expiry'),
			'address' => $this->input->post('address'),
			'visa_expiry' => $this->input->post('visa_expiry'),
			'allowance' => $this->input->post('allowance'),
			'passport_expiration' => $this->input->post('passport_expiration'),
			'passport_no' => $this->input->post('passport_no'),
			'sick_leaves' => $this->input->post('sick_leaves'),
			'paid_leaves' => $this->input->post('paid_leaves'),
			'annual_leaves' => $this->input->post('annual_leaves'),
			'gender' => $this->input->post('gender'),
			'maternity_leaves' => $this->input->post('maternity_leaves'),
			'notice_period' => $this->input->post('notice_period'),
			'joining_date' => $this->input->post('joining_date'),
			'drivinglisence_expiry' => $this->input->post('dlisence_expiry'),
			'drivinglisence' => $this->input->post('drivinglisence'),
			'status' => $this->input->post('status'),
			'salary' => $this->input->post('salary'),
		);
		$id = $this->input->post('id');
		$this->db->update('employee', $ins, array('id' => $id));
		if ( $this->upload->do_upload('contract'))
		{
			$data = array('upload_data' => $this->upload->data());
			$this->db->insert('attachment', array(
				'refid' => $id,
				'type' => 'contract',
				'url' => $data['upload_data']['file_name']
			));
		}
		if ( $this->upload->do_upload('cv'))
		{
			$data = array('upload_data' => $this->upload->data());
			$this->db->insert('attachment', array(
				'refid' => $id,
				'type' => 'cv',
				'url' => $data['upload_data']['file_name']
			));
		}
		redirect('hr/editemployee/'.$id);
	}
	function insemployee(){
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = '*';
		$this->load->library('upload', $config);
		$ins = array(
			'companyid' => $this->input->post('companyid'),
			'firstname' => $this->input->post('fname'),
			'lastname' => $this->input->post('lname'),
			'title' => $this->input->post('title'),
			'phone' => $this->input->post('phone'),
			'email' => $this->input->post('email'),
			'visa_status' => $this->input->post('visa_status'),
			'dob' => $this->input->post('dob'),
			'employeecode' => $this->input->post('employeecode'),
			'department' => $this->input->post('department'),
			'designation' => $this->input->post('designation'),
			'emirates_id' => $this->input->post('emid'),
			'emirates_expiry' => $this->input->post('emirates_expiry'),
			'address' => $this->input->post('address'),
			'visa_expiry' => $this->input->post('visa_expiry'),
			'allowance' => $this->input->post('allowance'),
			'passport_expiration' => $this->input->post('passport_expiration'),
			'passport_no' => $this->input->post('passport_no'),
			'sick_leaves' => $this->input->post('sick_leaves'),
			'paid_leaves' => $this->input->post('paid_leaves'),
			'annual_leaves' => $this->input->post('annual_leaves'),
			'gender' => $this->input->post('gender'),
			'maternity_leaves' => $this->input->post('maternity_leaves'),
			'notice_period' => $this->input->post('notice_period'),
			'joining_date' => $this->input->post('joining_date'),
			'drivinglisence_expiry' => $this->input->post('dlisence_expiry'),
			'drivinglisence' => $this->input->post('drivinglisence'),
			'status' => 'hiring',
			'salary' => $this->input->post('salary'),
		);
		$this->db->insert('employee', $ins);
		$id = $this->db->insert_id();
		if ( $this->upload->do_upload('contract'))
		{
			$data = array('upload_data' => $this->upload->data());
			$this->db->insert('attachment', array(
				'refid' => $id,
				'type' => 'contract',
				'url' => $data['upload_data']['file_name']
			));
		}
		if ( $this->upload->do_upload('cv'))
		{
			$data = array('upload_data' => $this->upload->data());
			$this->db->insert('attachment', array(
				'refid' => $id,
				'type' => 'cv',
				'url' => $data['upload_data']['file_name']
			));
		}
		redirect('hr/applicants');
	}
	public function editemployee($id){
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('hr/edit_employee');
		$this->load->view('footer');
	}
	public function shortlist($id){
		$this->db->update('employee', array('status' => 'shortlist'), array('id' => $id));
		redirect('hr/applicants');
	}
	public function deletefromshortlist($id){
		$this->db->update('employee', array('status' => 'hiring'), array('id' => $id));
		redirect('hr/shortlistview');
	}
	public function delete($id){
		$this->db->delete('employee', array('id' => $id));
		$this->db->delete('attachment', array('refid' => $id));
		redirect('hr/applicants');
	}
	function removedoc($id, $empid){
		$this->db->delete('attachment', array('id' => $id));
		redirect('hr/editemployee/'.$empid);
	}
	public function shortlistview(){
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('hr/view_shortlist');
		$this->load->view('footer');
	}
}
?>