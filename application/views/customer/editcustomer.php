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
<?= form_open('customer/inscustomer'); ?>
<div style="padding:10px 180px; width:100%">
	<h4>Create Customer</h4>
	<br />
	<?php $this->main_model->message($this->session->flashdata('alert_msg')); ?>
	<div class="row">
		<div class="col-md-6">
			<div class="row">
				<div class="col-md-3">
					<div class="form-group">
						<label>Title</label>
						<select class="form-control" name="title">
							<option value="Mr.">Mr.</option>
							<option value="Mrs.">Mrs.</option>
							<option value="Ms.">Ms.</option>
						</select>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label>First Name</label>
						<input type="text" name="fname" class="form-control" />
					</div>
				</div>
				<div class="col-md-5">
					<div class="form-group">
						<label>Last Name</label>
						<input type="text" name="lname" class="form-control" />
					</div>
				</div>
			</div>
			<div class="form-group">
				<label>Company Name</label>
				<input type="text" name="company" class="form-control" />
			</div>
		</div>
		<div class="col-md-6">
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>Email</label>
						<input type="text" name="email" class="form-control" />
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Phone</label>
						<input type="text" name="phone" class="form-control" />
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>Mobile</label>
						<input type="text" name="mobile" class="form-control" />
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Fax</label>
						<input type="text" name="fax" class="form-control" />
					</div>
				</div>
			</div>
		</div>
	</div>
	<hr />
	<div class="row">
		<div class="col-md-12">
			<div>
				<div class="an-component-body">
					<div class="an-bootstrap-custom-tab">
						<div class="an-tab-control">
							<!-- Nav tabs -->
							<ul class="nav nav-tabs text-left" role="tablist">
								<li role="presentation" class="active"><a href="#diska"
									aria-controls="diska" role="tab" data-toggle="tab">Address</a>
								</li>
								<li role="presentation"><a href="#diskb"
									aria-controls="diskb" role="tab" data-toggle="tab">Notes</a>
								</li>
							</ul>
						</div>
						<!-- Tab panes -->
						<div class="tab-content">
							<div role="tabpanel" class="tab-pane fade in active" id="diska">
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label>Billing Address</label>
											<textarea class="form-control" name="billing_address" rows="4"></textarea>
										</div>
										<br />
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label>City</label>
													<input type="text" name="city" class="form-control" />
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>Country</label>
													<input type="text" class="form-control" name="country" />
												</div>
											</div>
										</div>
									</div>
								</div>
							</div> <!-- end .TAB-PANE -->
							<div role="tabpanel" class="tab-pane fade" id="diskb">
								<div class="form-group">
									<label>Notes</label>
									<textarea class="form-control" name="notes" rows="4"></textarea>
								</div>
							</div> <!-- end .TAB-PANE -->
						</div> <!-- end .TAB-CONTENT -->
					</div> <!-- end .AN-BOOTSTRAP-CUSTOM-TAB -->
				</div> <!-- end .AN-COMPONENT-BODY -->
			</div> <!-- end .AN-SINGLE-COMPONENT -->
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<a href="#" class="btn btn-primary btn-block">Cancel</a>
		</div>
		<div class="col-md-6">
			<input type="submit" class="btn btn-primary btn-block" value="Add Customer" />
		</div>
	</div>
</div>
<?= form_close(); ?>