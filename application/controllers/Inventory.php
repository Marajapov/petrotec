<?php class Inventory extends CI_Controller{
	function __construct(){
		parent::__construct();
	}
	function allproduct(){
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('inventory/allproduct');
		$this->load->view('footer');
	}
	function category(){
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('inventory/category');
		$this->load->view('footer');
	}
	function insCategory(){
		$checkcat = $this->db->get_where('category', array('categoryname' => $this->input->post('catname')))->row();
		if(empty($checkcat)){
			$ins = array(
				'categoryname' => $this->input->post('catname'),
				'parent' => $this->input->post('catid'),
			);
			$this->db->insert('category', $ins);
			$this->session->set_flashdata('alert_msg', array('success', 'category', 'Successfully added category.'));
		}else{
			$this->session->set_flashdata('alert_msg', array('failure', 'category', 'category already inserted.'));
		}
		redirect('inventory/category');
	}
	function ajax_geteditcategory(){
		$id = $this->input->post('id'); 
		$data = $this->db->get_where('category', array('id' => $id))->row();
	?>
			<div class="form-group">
				<label>Category Name</label>
				<input type="text" required value="<?= $data->categoryname; ?>" class="form-control" name="catname" />
			</div>
			<div class="form-group">
				<select name="catid" class="form-control">
					<?= $this->main_model->getcategory($id); ?>
				</select>
			</div>
			<input type="hidden" name="id" value="<?= $id; ?>" />
	<?php 
	}
	function editCategory(){
		$id = $this->input->post('id');
		$this->db->update('category', array('parent' => $id), array('id' => $this->input->post('catid')));
		$this->db->update('category', array('categoryname' => $this->input->post('catname')), array('id' => $id));
		$this->session->set_flashdata('alert_msg', array('success', 'category', 'Successfully updated category.'));
		redirect('inventory/category');
	}
	function addproduct(){
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('inventory/addproduct');
		$this->load->view('footer');
	}
	function insProduct(){
		$name = $this->input->post('name');
		$check = $this->db->get_where('product', array('name' => $name))->row();
		if(!empty($check)){
			
		}
	}
}