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
?>
<?= form_open_multipart(base_url('request/insemployee')); ?>
<div style="padding:10px 180px; width:100%">
	<h4>Add Applicant</h4>
	<br />
	<div class="row">
		<div class="col-md-6">
			<div class="row">
				<div class="col-md-3">
					<div class="form-group">
						<label>Title</label>
						<select class="form-control" name="title">
							<option value="">Mr.</option>
							<option value="">Mrs.</option>
							<option value="">Ms.</option>
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
				<select class="form-control" name="companyid">
					<?php if(!empty($company)):
						foreach($company as $c): ?>
							<option value="<?= $c->id; ?>"><?= $c->company_name; ?></option>
					<?php endforeach; endif; ?>
				</select>
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
						<label>Visa Status</label>
						<select class="form-control" name="visa_status">
							<option value="visit">Visit</option>
							<option value="employeed">Employee</option>
						</select>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Date Of Birth</label>
						<input type="text" name="dob" class="form-control datepicker" />
					</div>
				</div>
			</div>
		</div>
	</div>
	<hr />
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<div class="form-group">
					<label>Salary</label>
					<input type="text" name="salary" class="form-control" />
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label>Designation</label>
				<input type="text" name="designation" class="form-control" />
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label>Department</label>
				<input type="text" name="department" class="form-control" />
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label>Employee Code</label>
				<input type="text" name="employeecode" class="form-control" />
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label>Emirated ID</label>
				<input type="text" name="emid" class="form-control" />
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label>Emirates ID Expiry</label>
				<input type="text" name="emirates_expiry" class="form-control datepicker" />
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label>Driving Lisence</label>
				<input type="text" name="drivinglisence" class="form-control" />
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label>Driving Lisence Expiry</label>
				<input type="text" name="drivinglisence_expiry" class="form-control datepicker" />
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label>Passport</label>
				<input type="text" name="passport_no" class="form-control" />
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label>Passport Expiry</label>
				<input type="text" name="passport_expiration" class="form-control datepicker" />
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label>Address</label>
				<textarea name="address" rows="5" class="form-control"></textarea>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label>Visa Expiry</label>
				<input type="text" name="visa_expiry" class="form-control datepicker" />
			</div>
			<div class="form-group">
				<label>Gender</label>
				<select name="gender" class="form-control">
					<option value="male">Male</option>
					<option value="female">Female</option>
				</select>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label>Sick Leaves</label>
				<input type="text" name="sick_leaves" class="form-control" />
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label>Paid Leaves</label>
				<input type="text" name="paid_leaves" class="form-control" />
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label>Annual Leaves</label>
				<input type="text" name="annual_leaves" class="form-control" />
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label>Maternity Leaves</label>
				<input type="text" name="maternity_leaves" class="form-control" />
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label>Contract</label>
				<input type="file" name="contract" class="form-control" />
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label>Notice Period</label>
				<input type="text" name="maternity_leaves" class="form-control" />
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label>Joining Date</label>
				<input type="text" name="joining_date" class="form-control datepicker" />
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label>CV</label>
				<input type="file" name="cv" class="form-control" />
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<a href="<?= base_url('hr/applicants'); ?>" class="btn btn-primary btn-block">Cancel</a>
		</div>
		<div class="col-md-6">
			<input type="submit" value="Save" class="btn btn-primary btn-block" />
		</div>
	</div>
</div>
<?= form_close(); ?>