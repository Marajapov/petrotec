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
<div style="padding:10px 180px; width:100%">
	<h4>Create Vendor</h4>
	<br />
	<div class="row">
		<div class="col-md-6">
			<div class="row">
				<div class="col-md-3">
					<div class="form-group">
						<label>Title</label>
						<select class="form-control">
							<option value="">Mr.</option>
							<option value="">Mrs.</option>
							<option value="">Ms.</option>
						</select>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label>First Name</label>
						<input type="text" class="form-control" />
					</div>
				</div>
				<div class="col-md-5">
					<div class="form-group">
						<label>Last Name</label>
						<input type="text" class="form-control" />
					</div>
				</div>
			</div>
			<div class="form-group">
				<label>Company Name</label>
				<input type="text" class="form-control" />
			</div>
		</div>
		<div class="col-md-6">
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>Email</label>
						<input type="text" class="form-control" />
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Phone</label>
						<input type="text" class="form-control" />
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>Mobile</label>
						<input type="text" class="form-control" />
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Fax</label>
						<input type="text" class="form-control" />
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
								<li role="presentation"><a href="#diskd"
									aria-controls="diskc" role="tab" data-toggle="tab">Tax Info</a>
								</li>
								<li role="presentation">
									<a href="#diskc" aria-controls="diskc" role="tab" data-toggle="tab">Payment Terms</a>
								</li>
								<li role="presentation">
									<a href="#" title="Payment selected in this as default for this Vendor"><i class="glyphicon glyphicon-question-sign"></i></a>
								</li>
							</ul>
						</div>
						<!-- Tab panes -->
						<div class="tab-content">
							<div role="tabpanel" class="tab-pane fade in active" id="diska">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Billing Address</label>
											<textarea class="form-control" rows="4"></textarea>
										</div>
										<br />
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label>City</label>
													<input type="text" class="form-control" />
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>Country</label>
													<input type="text" class="form-control" />
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Shipping Address</label>
											<textarea class="form-control" rows="4"></textarea>
											<small class="pull-right"><input type="checkbox" /> Save as billing address</small>
										</div>
										<br />
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label>City</label>
													<input type="text" class="form-control" />
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>Country</label>
													<input type="text" class="form-control" />
												</div>
											</div>
										</div>
									</div>
								</div>
							</div> <!-- end .TAB-PANE -->
							<div role="tabpanel" class="tab-pane fade" id="diskb">
								<div class="form-group">
									<label>Notes</label>
									<textarea class="form-control" rows="4"></textarea>
								</div>
							</div> <!-- end .TAB-PANE -->
							<div role="tabpanel" class="tab-pane fade" id="diskc">
								<div class="form-group">
									<div class="row">
										<div class="col-md-3">
											<label>25 / 75
												<input type="checkbox" />
											</label><br />
										</div>
										<div class="col-md-3">
											<label>50 / 50
												<input type="checkbox" />
											</label><br />
										</div>
										<div class="col-md-3">
											<label>75 / 25
												<input type="checkbox" />
											</label><br />
										</div>
										<div class="col-md-3">
											<label>100
												<input type="checkbox" />
											</label><br />
										</div>
									</div>
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
			<a href="#" class="btn btn-primary btn-block"data-toggle="modal" data-target="#myModalone">Add Vendor</a>
			<div class="modal fade success" id="myModalone" tabindex="-1" role="dialog"
			aria-labelledby="myModaloneLabel">
			<div class="modal-dialog" role="document">
			<div class="modal-content">
			<div class="modal-body">
			<p class="text-center">Your request has been sent to the concerned department</p>
			</div>
			<div class="modal-footer">
			<button type="button" class="an-btn an-btn-danger" data-dismiss="modal">Close</button>
			</div>
			</div>
			</div>
			</div>
		</div>
	</div>
</div>