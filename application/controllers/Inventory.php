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
	function editproduct($id){
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('inventory/editproduct');
		$this->load->view('footer');
	}
	function insProduct(){
		$name = $this->input->post('name');
		$companyid = $this->input->post('companyid');
		$check = $this->db->get_where('product', array('name' => $name))->row();
		if(!empty($check)){
			$this->session->set_flashdata('alert_msg', array('failure', 'product', 'product already intered.'));
		}
		else{
			$catid = $this->db->get_where('category', array('id' => $this->input->post('ccatid')))->row();
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = '*';
			$this->load->library('upload', $config);
			$ins = array(
				'name' => $name,
				'description' => $this->input->post('description'),
				'code' => $this->input->post('code'),
				'note' => $this->input->post('notes'),
				'supplier_id' => $this->input->post('supplier_id'),
				'pcatid' => $catid->parent,
				'ccatid' => $this->input->post('ccatid'),
				'created_date' => date('Y-m-d'),
			);
			$this->db->insert('product', $ins);
			$id = $this->db->insert_id();
			if ( $this->upload->do_upload('doc'))
			{
				$data = array('upload_data' => $this->upload->data());
				$this->db->insert('attachment', array(
					'refid' => $id,
					'type' => 'product',
					'url' => $data['upload_data']['file_name']
				));
			}
			$this->session->set_flashdata('alert_msg', array('success', 'product', 'product inserted.'));
		}
		redirect('inventory/addproduct');
	}
	function deleteproductimg($id, $pageid){
		$this->db->delete('attachment', array('id' => $id));
		$this->session->set_flashdata('alert_msg', array('success', 'product', 'product image deleted.'));
		redirect('inventory/editproduct/'.$pageid);
	}
	function deleteproduct($id){
		$this->db->delete('attachment', array('id' => $id));
		$this->db->delete('product', array('id' => $id));
		$this->session->set_flashdata('alert_msg', array('success', 'product', 'product deleted.'));
		redirect('inventory/allproduct/');
	}
	function viewInventory(){
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('inventory/viewInventory');
		$this->load->view('footer');
	}
	function addInventory($id){
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('inventory/addInventory');
		$this->load->view('footer');
	}
	function insinventory(){
		$pid = $this->input->post('pid');
		foreach($this->input->post('qty') as $key => $value){
			$qty = (empty($value) || $value <= 0) ? 0 : $value;
			$query_updateqty = array('companyid' => $key, 'productid' => $pid);
			$count = $this->db->get_where('inventory', $query_updateqty)->row();
			if(!empty($count)){
				$update = $count->qty + $qty;
				$this->db->update('inventory', array('qty' => $update), $query_updateqty);
			}else{
				$this->db->insert('inventory', array('companyid' => $key, 'productid' => 
				$pid, 'qty' => $value));
			}
		}
		$this->session->set_flashdata('alert_msg', array('success', 'product', 'Inventory updated'));
		redirect('inventory/addInventory/'.$pid);
	}
}