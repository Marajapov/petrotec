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
$customer = $this->db->get('customer')->result();
$company = $this->db->get('company')->result();
$supplier = $this->db->get('supplier')->result();
$product = $this->db->get('product')->result();
?>


<?= form_open_multipart(base_url('Sales/updateInstallment')); ?>
<div style="padding:10px 180px; width:100%">
    <input type="hidden" name="salesid" value="<?=$this->uri->segment(3);?>">
    <br/>

	<div class="row">
		<div class="col-md-12">
		<h2>Installment</h2>
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<div class="form-group">
                            <label>Date:</label>
                            <input name="installment_date" required type="text" class="form-control form-control-lg datepicker_installment" id="lgFormGroupInput" >
                        </div>
					</div>
				</div>

				<div class="col-md-4">
					<div class="form-group">
						<div class="form-group">
                            <label>Amount:</label>
                            <input name="amount" type="text" required class="form-control form-control-lg" id="lgFormGroupInput" >
                        </div>
					</div>
				</div>

			</div>

		</div>
	</div>
	<br>
	
	<div class="row">
		<div class="col-md-6">
			<a href="<?= base_url('Sales/index'); ?>" class="btn btn-primary btn-block">Cancel</a>
		</div>
		<div class="col-md-6">
			<input type="submit" value="Save" class="btn btn-primary btn-block" />
		</div>
	</div>
</div>
<?= form_close(); ?>
