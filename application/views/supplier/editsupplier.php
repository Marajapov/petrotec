<style>
	.form-control {
    display: block;
    width: 100%;
    height: 25px;
    padding: 0px 6px;
}
hr {
    border-top: 1px solid #1f2740;
}
.an-tab-control .nav-tabs > li a {
    color: #ccc;
}
.an-tab-control .nav-tabs > li.active a{
	border-color:#70c1b3;
}
.modal-dialog {
    top: 32% !important;
    left: 5%;
}
</style>
<?php
	$id = $this->uri->segment(3);
	if(empty($id)){
		redirect('supplier');
		die;
	}else{
		$data = $this->db->get_where('supplier', array('id' => $id))->row();
	}
?>
<?= form_open_multipart(base_url('supplier/updateSupplier')); ?>
<div style="padding:10px 180px; width:100%">
	<h4>Edit Supplier</h4>
	<br />
	<?= $this->main_model->message($this->session->flashdata('alert_msg')); ?>
	<div class="row">
		<div class="col-md-6">
			<div class="row">
				<div class="col-md-3">
					<div class="form-group">
						<label>Title</label>
						<select class="form-control" name="title">
							<option value="Mr." <?= ($data->title == 'Mr.') ? 'selected' : ''; ?>>Mr.</option>
							<option value="Mrs." <?= ($data->title == 'Mrs.') ? 'selected' : ''; ?>>Mrs.</option>
							<option value="Ms." <?= ($data->title == 'Ms.') ? 'selected' : ''; ?>>Ms.</option>
						</select>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label>First Name</label>
						<input type="text" name="fname" value="<?= $data->fname; ?>" class="form-control" />
					</div>
				</div>
				<div class="col-md-5">
					<div class="form-group">
						<label>Last Name</label>
						<input type="text" name="lname" value="<?= $data->lname; ?>" class="form-control" />
					</div>
				</div>
			</div>
			<div class="form-group">
				<label>Company Name</label>
				<input type="text" class="form-control" value="<?= $data->company; ?>" name="company" />
			</div>
		</div>
		<div class="col-md-6">
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>Email</label>
						<input type="text" name="email" value="<?= $data->email; ?>" class="form-control" />
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Phone</label>
						<input type="text" name="phone" value="<?= $data->phone; ?>" class="form-control" />
					</div>
				</div>
			</div>
		</div>
	</div>
	<hr />
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label>Address</label>
				<textarea name="company_address" rows="5" class="form-control"><?= $data->company_address; ?></textarea>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label>Shipping Address</label>
				<textarea name="shipping_adddress" rows="5" class="form-control"><?= $data->shipping_adddress; ?></textarea>
			</div>
		</div>
	</div>
	<hr />
	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<label>Notes</label>
				<textarea name="notes" rows="5" class="form-control"><?= $data->notes; ?></textarea>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<a href="<?= base_url('supplier'); ?>" class="btn btn-primary btn-block">Cancel</a>
		</div>
		<div class="col-md-6">
			<input type="hidden" value="<?= $data->id; ?>" name="id" />
			<input type="submit" value="Save" class="btn btn-primary btn-block" />
		</div>
	</div>
</div>
<?= form_close(); ?>