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


<?= form_open_multipart(base_url('Sales/store')); ?>
<div style="padding:10px 180px; width:100%">
	<h4>Add</h4>
	<br />



    <div class="row">
		<div class="col-md-6">
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<div class="form-group">
                            <label>Date:</label>
                            <input name="date" type="text" class="form-control form-control-lg datepicker_sales" id="lgFormGroupInput" required>
                        </div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Customer</label>
                        <select class="form-control" name="customer">
                            <?php if(!empty($customer)):
                                foreach($customer as $c): ?>
                                    <option value="<?= $c->id; ?>"><?= $c->fname; ?></option>
                            <?php endforeach; endif; ?>
                        </select>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>Product</label>
                        <select class="form-control" name="product" id="productId">
                            <?php if(!empty($product)):
                                foreach($product as $c): ?>
                                    <option value="<?= $c->id; ?>"><?= $c->name; ?></option>
                            <?php endforeach; endif; ?>
                        </select>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Quantity</label>
                        <input type="text" id="quantityId" name="quantity" class="form-control" />
					</div>
				</div>
			</div>
		</div>

		<div class="col-md-6">
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>Company</label>
                        <select class="form-control" name="type" id="companyId">
                            <option value="0">--Select--</option>
                            <?php if(!empty($company)):
                                foreach($company as $c): ?>
                                    <option value="<?= $c->id; ?>"><?= $c->company_name; ?></option>
                            <?php endforeach; endif; ?>
                        </select>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Sales Person</label>
						<select class="form-control" name="supplier" id="employee_select">
						</select>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>Price</label>
				        <input type="text" name="price" class="form-control" />
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Total</label>
						<input type="text" name="dob" class="form-control datepicker" />
					</div>
				</div>
			</div>
		</div>
	</div>
	<hr />
	
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
