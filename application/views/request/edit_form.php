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
	$row = $this->db->get_where('request', array('id' => $this->uri->segment(3)))->row();
?>
<?= form_open_multipart(base_url('request/update'),'id="eventForm"'); ?>
<div style="padding:10px 120px; width:100%">

	<input type="hidden" name="id" value="<?=$row->id;?>">

	<h4>Add Applicant</h4>
    <br />
    <div class="row">
        <div class="col-md-4 col-lg-4">
            <img src="<?= base_url(); ?>admin_assets/assets/img/logo.png"  class="img-responsive"/>
        </div>
        <div class="col-md-4 col-lg-4">
            <h4>Request for leave form</h4>
            <small>(To be completed by Employee & filled in Employee's File)</small>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="row">
                <div class="col-md-12">
                    <label for="date">Date: </label>
                    <span><?=$row->today;?></span><br/>
                    <label for="date">Department: </label>
                    <span><?=$row->department;?></span><br/>
                    <label for="date">Doc No: </label>
                    <span>HR-DOC-00<?= $row->id;?></span><br/>
                    <label for="date">End User: </label>
                    <span><?= $row->end_user;?></span><br/>
                    
                </div>
            </div>
        </div>
    </div> <br/>
	<div class="row">
		<div class="col-md-11 pull-right">
			<h4>Request for leave form</h4>
            <small>(To be completed by Employee & filled in Employee's File)</small>
		</div>
	</div><br/>

	<div class="row">

		<div class="col-md-6">
			<div class="form-group row">
			<label for="lgFormGroupInput" class="col-sm-3 col-form-label col-form-label-lg">Name</label>
				<div class="col-sm-9">
					<input name="request_name" value="<?=$row->request_name;?>" type="text" class="form-control form-control-lg" id="lgFormGroupInput">
				</div>
			</div>

			<div class="form-group row">
			<label for="lgFormGroupInput" class="col-sm-3 col-form-label col-form-label-lg">Department</label>
				<div class="col-sm-9">
					<input name="request_department" value="<?=$row->request_department;?>" type="text" class="form-control form-control-lg" id="lgFormGroupInput">
				</div>
			</div>

			<div class="form-group row">
			<label for="lgFormGroupInput" class="col-sm-3 col-form-label col-form-label-lg">Section</label>
				<div class="col-sm-9">
					<input name="request_section" value="<?=$row->request_section;?>" type="text" class="form-control form-control-lg" id="lgFormGroupInput">
				</div>
			</div>
		</div>
		
		<div class="col-md-6">
			<div class="form-group row">
			<label for="lgFormGroupInput" class="col-sm-5 col-form-label col-form-label-lg">Employee Initials</label>
				<div class="col-sm-7">
					<input name="request_employee_initials" value="<?=$row->request_employee_initials;?>" type="text" class="form-control form-control-lg" id="lgFormGroupInput">
				</div>
			</div>
			<div class="form-group row">
			<label for="lgFormGroupInput" class="col-sm-3 col-form-label col-form-label-lg">Job Title</label>
				<div class="col-sm-9">
					<input name="request_job_title" value="<?=$row->request_job_title;?>" type="text" class="form-control form-control-lg" id="lgFormGroupInput">
				</div>
			</div>
		</div>
	</div>
	
<div class="row">
	<div class="panel panel-default">

    <div class="panel-heading clearfix">
        <h3 class="panel-title pull-left">May I request that I be granted:</h3>
    </div>

    <div class="panel-body">

		<div class="form-group">
			<p style="text-decoration:underline">Please attach necessary certificate as dictated by Company Policies & Procedures</p>
		</div>
        
		<div class="row">
			<div class="col-md-3">
				<!-- emergency leave -->
				<div class="form-group row">
					<div class="col-md-3">
						<input name="request_emergency_leave"<?php if($row->request_emergency_leave == 1) echo "checked";?> type="checkbox" class="form-control form-control-lg" id="lgFormGroupInput">
					</div>
					<label for="lgFormGroupInput" class="col-md-9 col-form-label col-form-label-lg">Emergency Leave</label>
				</div>

				<!-- Meternity leave -->
				<div class="form-group row">
					<div class="col-md-3">
						<input name="request_maternity_leave" <?php if($row->request_maternity_leave == 1) echo "checked";?> type="checkbox" class="form-control form-control-lg" id="lgFormGroupInput">
					</div>
					<label for="lgFormGroupInput" class="col-md-9 col-form-label col-form-label-lg">Maternity Leave</label>
				</div>
			</div>
			
			<div class="col-md-3">
				<!-- Funeral leave -->
				<div class="form-group row">
					<div class="col-md-3">
						<input name="request_funeral_leave" <?php if($row->request_funeral_leave == 1) echo "checked";?> type="checkbox" class="form-control form-control-lg" id="lgFormGroupInput">
					</div>
					<label for="lgFormGroupInput" class="col-md-9 col-form-label col-form-label-lg">Funeral Leave</label>
				</div>

				<!-- Annual leave -->
				<div class="form-group row">
					<div class="col-md-3">
						<input name="request_annual_leave" <?php if($row->request_annual_leave == 1) echo "checked";?> type="checkbox" class="form-control form-control-lg" id="lgFormGroupInput">
					</div>
					<label for="lgFormGroupInput" class="col-md-9 col-form-label col-form-label-lg">Annual Leave</label>
				</div>

			</div>
			
			<div class="col-md-6">
				<!-- Personal leave -->
				<div class="form-group row">
					<div class="col-md-3">
						<input name="request_personal_leave" <?php if($row->request_personal_leave == 1) echo "checked";?> type="checkbox" class="form-control form-control-lg" id="lgFormGroupInput">
					</div>
					<label for="lgFormGroupInput" class="col-md-9 col-form-label col-form-label-lg">Personal Leave Without Pay</label>
				</div>

				<!-- Other leave -->
				<div class="form-group row">
					<div class="col-md-3">
						<input name="request_other" <?php if($row->request_other == 1) echo "checked";?> type="checkbox" class="form-control form-control-lg request_other">
					</div>
					<label for="lgFormGroupInput" class="col-md-9 col-form-label col-form-label-lg">Other - please specify</label>
					<div class="col-md-6">
						<input name="request_other_text" value="<?=$row->request_other_text;?>" type="text" class="form-control form-control-lg request_other_text">
					</div>
				</div>
			</div>			
		</div><!-- end row -->

		<div class="row">
			<div class="col-md-4">
				<div class="form-group row">
				<label for="lgFormGroupInput" class="col-sm-3 col-form-label col-form-label-lg">From:</label>
					<div class="col-sm-9">
						<input name="request_from" value="<?=$row->request_from;?>" type="text" class="form-control form-control-lg datepicker_from" required id="lgFormGroupInput">
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group row">
				<label for="lgFormGroupInput" class="col-sm-3 col-form-label col-form-label-lg">To:</label>
					<div class="col-sm-9">
						<input name="request_to" value="<?=$row->request_to;?>" type="text" class="form-control form-control-lg datepicker_to" required id="lgFormGroupInput">
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group row">
				<label for="lgFormGroupInput" class="col-sm-4 col-form-label col-form-label-lg">No of Days</label>
					<div class="col-sm-8">
						<input name="request_number_days" value="<?=$row->request_number_days;?>" type="text" class="form-control form-control-lg" id="lgFormGroupInput">
					</div>
				</div>
			</div>
		</div><!-- end row -->

		<div class="row">
			<div class="col-md-12">
				<div class="form-group row">
				<label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Reason:</label>
					<div class="col-sm-10">
						<input name="request_reason" value="<?=$row->request_reason;?>" type="text" class="form-control form-control-lg" id="lgFormGroupInput">
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<p><strong>For Sick Leave:</strong> Sick Leave Pay availment should be supported by adequate evidence in accordance with approved Company Policies & Procedures.
				Any fraudulent claims for leave may result in the loss of pay for the period of absense and further disciplinary action.</p>
			</div>

			<div class="col-md-12"><br/>
				<div class="form-group row">
					<label for="lgFormGroupInput" class="col-md-6 col-form-label col-form-label-lg">Where you / Will you be under a doctor's care?</label>
					<div class="col-md-1">Yes
						<input name="request_doctor_yes" <?php if($row->request_doctor_yes == 1) echo "checked";?> type="checkbox" class="form-control form-control-lg request_doctor_yes">
					</div>
					<div class="col-md-1">No
						<input name="request_doctor_no" <?php if($row->request_doctor_no == 1) echo "checked";?> type="checkbox" class="form-control form-control-lg request_doctor_no">
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<div class="form-group row">
				<label for="lgFormGroupInput" class="col-sm-4 col-form-label col-form-label-lg">Name of Clinic/Hospital:</label>
					<div class="col-sm-8">
						<input name="request_clinic_name" value="<?=$row->request_clinic_name;?>" type="text" class="form-control form-control-lg" id="lgFormGroupInput">
					</div>
				</div>
			</div>
		</div>

		</div>
	</div>
		
	<div class="panel panel-default">

		<div class="panel-heading clearfix">
			<h3 class="panel-title pull-left">Department Head Approval</h3>
		</div>

		<div class="panel-body">
		<div class="row">
			<div class="col-md-12">
				<div class="form-group row">
					<div class="col-md-1">
						<input name="request_department_head_clearance_only" <?php if($row->request_department_head_clearance_only == 1) echo "checked";?> type="checkbox" class="form-control form-control-lg" id="lgFormGroupInput">
					</div>
					<label for="lgFormGroupInput" class="col-md-11 col-form-label col-form-label-lg">Department Head Clearance Only - for leave of one week or less</label>
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group row">
					<div class="col-md-1">
						<input name="request_full_clearance_required" <?php if($row->request_full_clearance_required == 1) echo "checked";?> type="checkbox" class="form-control form-control-lg" id="lgFormGroupInput">
					</div>
					<label for="lgFormGroupInput" class="col-md-11 col-form-label col-form-label-lg">Full Clearance required - for leave of more than one week</label>
				</div>
			</div>
		</div>
		</div>
	</div>

</div>

	<div class="row">
		<div class="col-md-6">
			<a href="<?= base_url('request/index'); ?>" class="btn btn-primary btn-block">Cancel</a>
		</div>
		<div class="col-md-6">
			<input type="submit" value="Save" class="btn btn-primary btn-block" />
		</div>
	</div><br/><br/>
</div>
<?= form_close(); ?>
