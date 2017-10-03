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
$company = $this->db->get('company')->result();
echo form_open_multipart('inventory/insinventory'); ?>
<div style="padding:10px 180px; width:1024px">
	<h4>Add Inventory</h4>
	<br />
	<?php $this->main_model->message($this->session->flashdata('alert_msg')); ?>
	<div class="row">
		<h6>All Companies</h6>
		<?php
			if(!empty($company)){ foreach($company as $c){
				$count = $this->db->get_where('inventory', array('productid' => $this->uri->segment(3), 'companyid' => $c->id))->row();
				$qty = (!empty($count)) ? $count->qty : 0;
				echo '<p>'.$c->company_name.': '.$qty.'</p>';
			} }
		?>
	</div>
	<hr />
	<div class="row">
		<?php if(!empty($company)){ foreach($company as $c){ ?>
			<div class="row form-group">
				<div class="col-md-6">
					<p><?= $c->company_name; ?></p>
				</div>
				<div class="col-md-6">
					<input type='number' name="qty[<?= $c->id; ?>]" class="form-control" placeholder="" />
				</div>
			</div>
		<?php } } ?>
	</div>
	<div class="row">
		<div class="col-md-6">
			<a href="" class="btn btn-primary btn-block">Cancel</a>
		</div>
		<div class="col-md-6">
			<input type="hidden" name="pid" value="<?= $this->uri->segment(3); ?>" />
			<input type="submit" value="Save" class="btn btn-primary btn-block" />
		</div>
	</div>
</div>
<?= form_close(); ?>