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
<div style="padding:10px 180px; width:100%" id="myForm">

	<input type="hidden" id="count_product_fromdb" value="<?=count($product);?>">
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
                        <select class="form-control" name="customer" required>
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
                        <select class="form-control" name="product[]" id="productId_1" required disabled>
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
                        <input type="text" id="quantityId1" name="quantity[]" class="form-control" disabled required/>
                        
					</div>
				</div>
			</div>
		</div>

		<div class="col-md-6">
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>Company</label>
                        <select class="form-control" name="company" id="companyId" required>
                            <option value="">--Select--</option>
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
						<select class="form-control selectpicker" name="employee" id="employee_select" disabled>
						</select>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>Price</label>
				        <input type="text" name="price[]" class="form-control" id="price1" disabled required/>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group" id="quantity_show">
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- add newProduct -->
	<div class="row newProduct">
		
	</div>
	<!-- Add Item row-->
	<div class="row">
		<div class="col-md-12">
			<div class="row" >
				<div class="col-md-2 off-set-10 pull-right hide" id="hideAddButton">
					<label>Add Item</label>
	<input type="button" value="addItem" id="addItem" data-info="1" class="form-control btn btn-info" />
				</div>
			</div>
		</div>
	</div>

	<hr />
	
	<div class="row">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-2 off-set-10 pull-right">
					<label for="">Total</label>
					<div class="span" id="total">0</div>
				</div>
			</div>
		</div>
	</div>
	<br>

	<div class="row">
		<div class="col-md-12">
		<h2>Installment</h2>
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<div class="form-group">
                            <label>Date:</label>
                            <input name="installment_date" required type="text" class="form-control form-control-lg datepicker_from" id="lgFormGroupInput" >
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

			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<div class="form-group">
                            <label>Next Installment:</label>
                            <input name="next_installment" type="text" class="form-control form-control-lg datepicker_from" id="lgFormGroupInput" >
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
