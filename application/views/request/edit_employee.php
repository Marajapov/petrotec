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
$employee = $this->db->get_where('employee', array('id' => $this->uri->segment(3)))->row();
?>
<?= form_open_multipart(base_url('hr/update_employee')); ?>
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
							<option value="mr." <?= ($employee->title == 'mr.') ? 'selected' : ''; ?>>Mr.</option>
							<option value="mrs." <?= ($employee->title == 'mrs.') ? 'selected' : ''; ?>>Mrs.</option>
							<option value="ms." <?= ($employee->title == 'ms.') ? 'selected' : ''; ?>>Ms.</option>
						</select>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label>First Name</label>
						<input type="text" name="fname" value="<?= $employee->firstname; ?>" class="form-control" />
					</div>
				</div>
				<div class="col-md-5">
					<div class="form-group">
						<label>Last Name</label>
						<input type="text" name="lname" value="<?= $employee->lastname; ?>" class="form-control" />
					</div>
				</div>
			</div>
			<div class="form-group">
				<label>Company Name</label>
				<select class="form-control" name="companyid">
					<?php if(!empty($company)):
						foreach($company as $c): ?>
							<option value="<?= $c->id; ?>" <?= ($employee->companyid == $c->id) ? 'selected' : ''; ?>><?= $c->company_name; ?></option>
					<?php endforeach; endif; ?>
				</select>
			</div>
		</div>
		<div class="col-md-6">
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>Email</label>
						<input type="text" name="email" value="<?= $employee->email; ?>" class="form-control" />
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Phone</label>
						<input type="text" name="phone" value="<?= $employee->phone; ?>"  class="form-control" />
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>Visa Status</label>
						<select class="form-control" name="visa_status">
							<option value="visit" <?= ($employee->title == 'visit') ? 'selected' : ''; ?>>Visit</option>
							<option value="employeed" <?= ($employee->title == 'employeed') ? 'selected' : ''; ?>>Employee</option>
						</select>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Date Of Birth</label>
						<input type="text" name="dob" value="<?= $employee->dob; ?>" class="form-control datepicker" />
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
					<input type="text" name="salary" value="<?= $employee->dob; ?>" class="form-control" />
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
				<input type="text" name="department" value="<?= $employee->department; ?>" class="form-control" />
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label>Employee Code</label>
				<input type="text" name="employeecode" value="<?= $employee->employeecode; ?>" class="form-control" />
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label>Emirated ID</label>
				<input type="text" name="emid" value="<?= $employee->emirates_id; ?>" class="form-control" />
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label>Emirates ID Expiry</label>
				<input type="text" name="emirates_expiry" value="<?= $employee->emirates_expiry; ?>" class="form-control datepicker" />
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label>Driving Lisence</label>
				<input type="text" name="drivinglisence" value="<?= $employee->drivinglisence; ?>" class="form-control" />
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label>Driving Lisence Expiry</label>
				<input type="text" name="drivinglisence_expiry" value="<?= $employee->drivinglisence_expiry; ?>" class="form-control datepicker" />
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label>Passport</label>
				<input type="text" name="passport_no" value="<?= $employee->passport_no; ?>" class="form-control" />
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label>Passport Expiry</label>
				<input type="text" name="passport_expiration" value="<?= $employee->passport_expiration; ?>" class="form-control datepicker" />
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label>Address</label>
				<textarea name="address" rows="5" class="form-control"><?= $employee->address; ?></textarea>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label>Visa Expiry</label>
				<input type="text" name="visa_expiry" value="<?= $employee->visa_expiry; ?>" class="form-control datepicker" />
			</div>
			<div class="form-group">
				<label>Gender</label>
				<select name="gender" class="form-control">
					<option value="male" <?= ($employee->gender == 'male') ? 'selected' : ''; ?>>Male</option>
					<option value="female" <?= ($employee->gender == 'female') ? 'selected' : ''; ?>>Female</option>
				</select>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label>Sick Leaves</label>
				<input type="text" name="sick_leaves" value="<?= $employee->sick_leaves; ?>" class="form-control" />
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label>Paid Leaves</label>
				<input type="text" name="paid_leaves" value="<?= $employee->paid_leaves; ?>" class="form-control" />
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label>Annual Leaves</label>
				<input type="text" name="annual_leaves" value="<?= $employee->annual_leaves; ?>" class="form-control" />
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label>Maternity Leaves</label>
				<input type="text" name="maternity_leaves" value="<?= $employee->maternity_leaves; ?>" class="form-control" />
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label>Contract</label><br />
				<?php 
				$attachment = $this->db->get_where('attachment', array('refid' => $employee->id, 'type' => 'contract'))->row();
				if(empty($attachment)): ?>
					<input type="file" name="contract" class="form-control" />
				<?php else: ?>
					<a href="<?= base_url('uploads/'.$attachment->url); ?>" target="_blank">Download Contract</a>
					- <a href="<?= base_url('hr/removedoc/'.$attachment->id.'/'.$employee->id); ?>">Remove Contract</a>
				<?php endif; ?>
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
				<input type="text" name="joining_date" value="<?= $employee->joining_date; ?>" class="form-control datepicker" />
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label>CV</label><br />
			<?php 
				$attachment = $this->db->get_where('attachment', array('refid' => $employee->id, 'type' => 'cv'))->row();
				if(empty($attachment)): ?>
					<input type="file" name="cv" class="form-control" />
				<?php else: ?>
					<a href="<?= base_url('uploads/'.$attachment->url); ?>" target="_blank">Download CV</a>
					- <a href="<?= base_url('hr/removedoc/'.$attachment->id.'/'.$employee->id); ?>">Remove CV</a>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<a href="<?= base_url('hr/applicants'); ?>" class="btn btn-primary btn-block">Cancel</a>
		</div>
		<div class="col-md-6">
			<input type="hidden" value="<?= $employee->status; ?>" name="status" />
			<input type="hidden" value="<?= $employee->id; ?>" name="id" />
			<input type="submit" value="Save" class="btn btn-primary btn-block" />
		</div>
	</div>
</div>
<?= form_close(); ?>