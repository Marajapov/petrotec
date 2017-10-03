<?php
class Request extends CI_Controller{
	function __construct(){
		parent::__construct();
        (empty($this->session->userdata('userdata')))?redirect('Login/form'):$this->data =$this->session->userdata('userdata');
	}
	function index(){            
        $this->load->view('header');
        $this->load->view('sidebar',$this->data);
        $this->load->view('request/index',$this->data);
        $this->load->view('footer');
	}
    function create(){
        $this->load->view('header');
        $this->load->view('sidebar',$this->data);
        $this->load->view('request/create',$this->data);
        $this->load->view('footer');
    }
    function store(){
        $request_emergency_leave = ($this->input->post('request_emergency_leave') =='on') ? 1:0;
        $request_maternity_leave = ($this->input->post('request_maternity_leave') =='on') ? 1:0;
        $request_funeral_leave = ($this->input->post('request_funeral_leave') =='on') ? 1:0;
        $request_annual_leave = ($this->input->post('request_annual_leave') =='on') ? 1:0;
        $request_personal_leave = ($this->input->post('request_personal_leave') =='on') ? 1:0;
        $request_other = ($this->input->post('request_other') =='on') ? 1:0;
        $request_doctor_yes = ($this->input->post('request_doctor_yes') =='on') ? 1:0;
        $request_doctor_no = ($this->input->post('request_doctor_no') =='on') ? 1:0;
        $request_department_head_clearance_only = ($this->input->post('request_department_head_clearance_only') =='on') ? 1:0;
        $request_full_clearance_required = ($this->input->post('request_full_clearance_required') =='on') ? 1:0;
		$ins = array(
			'today' => $this->input->post('today'),
			'department' => $this->data['userid'],
			'doc_number' => 'HR-DOC-00'.$this->data['userid'],
			'end_user' => 'end_user',
			'request_name' => $this->input->post('request_name'),
			'request_department' => $this->input->post('request_department'),
			'request_section' => $this->input->post('request_section'),
			'request_employee_initials' => $this->input->post('request_employee_initials'),
			'request_job_title' => $this->input->post('request_job_title'),
			'request_emergency_leave' => $request_emergency_leave,
			'request_maternity_leave' => $request_maternity_leave,
			'request_funeral_leave' => $request_funeral_leave,
			'request_annual_leave' => $request_annual_leave,
			'request_personal_leave' => $request_personal_leave,
			'request_other' => $request_other,
			'request_other_text' => $this->input->post('request_other_text'),
			'request_from' => $this->input->post('request_from'),
			'request_to' => $this->input->post('request_to'),
			'request_number_days' => $this->input->post('request_number_days'),
			'request_reason' => $this->input->post('request_reason'),
			'request_doctor_yes' => $request_doctor_yes,
			'request_doctor_no' => $request_doctor_no,
			'request_clinic_name' => $this->input->post('request_clinic_name'),
			'request_department_head_clearance_only' => $request_department_head_clearance_only,
			'request_full_clearance_required' => $request_full_clearance_required,
		);
		$this->db->insert('request', $ins);
		redirect('request/index');
    }
	public function build($id)
	{
		$row = $this->db->get_where('request', array('id' => $id))->row();
		$this->load->library('pdfgenerator');
		$data['row']=$row;
		$html = $this->load->view('ci_table_report', $data, true);
		$filename = 'report_'.time();
		$this->pdfgenerator->generate($html, $filename, true, 'A4', 'portrait');
	}
    public function edit($id)
    {
        $this->load->view('header');
		$this->load->view('sidebar',$this->data);
		$this->load->view('request/edit_form');
		$this->load->view('footer');
    }
    public function update()
    {
        $request_emergency_leave = ($this->input->post('request_emergency_leave') =='on') ? 1:0;
        $request_maternity_leave = ($this->input->post('request_maternity_leave') =='on') ? 1:0;
        $request_funeral_leave = ($this->input->post('request_funeral_leave') =='on') ? 1:0;
        $request_annual_leave = ($this->input->post('request_annual_leave') =='on') ? 1:0;
        $request_personal_leave = ($this->input->post('request_personal_leave') =='on') ? 1:0;
        $request_other = ($this->input->post('request_other') =='on') ? 1:0;
        $request_doctor_yes = ($this->input->post('request_doctor_yes') =='on') ? 1:0;
        $request_doctor_no = ($this->input->post('request_doctor_no') =='on') ? 1:0;
        $request_department_head_clearance_only = ($this->input->post('request_department_head_clearance_only') =='on') ? 1:0;
        $request_full_clearance_required = ($this->input->post('request_full_clearance_required') =='on') ? 1:0;
        $update = array(
			'department' => $this->data['session_user_department'],
			'end_user' => 'end_user',
			'request_name' => $this->input->post('request_name'),
			'request_department' => $this->input->post('request_department'),
			'request_section' => $this->input->post('request_section'),
			'request_employee_initials' => $this->input->post('request_employee_initials'),
			'request_job_title' => $this->input->post('request_job_title'),
			'request_emergency_leave' => $request_emergency_leave,
			'request_maternity_leave' => $request_maternity_leave,
			'request_funeral_leave' => $request_funeral_leave,
			'request_annual_leave' => $request_annual_leave,
			'request_personal_leave' => $request_personal_leave,
			'request_other' => $request_other,
			'request_other_text' => $this->input->post('request_other_text'),
			'request_from' => $this->input->post('request_from'),
			'request_to' => $this->input->post('request_to'),
			'request_number_days' => $this->input->post('request_number_days'),
			'request_reason' => $this->input->post('request_reason'),
			'request_doctor_yes' => $request_doctor_yes,
			'request_doctor_no' => $request_doctor_no,
			'request_clinic_name' => $this->input->post('request_clinic_name'),
			'request_department_head_clearance_only' => $request_department_head_clearance_only,
			'request_full_clearance_required' => $request_full_clearance_required,
		);
		$id = $this->input->post('id');
		$this->db->update('request', $update, array('id' => $id));
		redirect('request/edit/'.$id);
    }
    public function delete($id)
    {
        $this->db->delete('request', array('id' => $id));
        redirect('request/index');
    }
}
?>