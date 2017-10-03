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
.btn{
	padding:5px 10px;
}
</style>
<?php
$applicants = $this->db->get_where('employee', array('status' => 'shortlist'))->result();
?>
<div style="padding:50px 30px; width:100%">
	<h4>All Shortlist</h4>
	<br />
	<div class="text-right">
		<a href="<?= base_url('hr/addapplicants'); ?>" class="btn btn-success">Add Applicants</a>
	</div>
	<br />
	<div class="row">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Employee Code</th>
					<th>Name</th>
					<th>Email</th>
					<th>Phone</th>
					<th>CV</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			<?php if(!empty($applicants)): foreach($applicants as $ap): ?>
				<tr>
					<td><?= $ap->employeecode; ?></td>
					<td><?= $ap->firstname; ?></td>
					<td><a href="<?= base_url('hr/employeedetail'.$ap->id); ?>"><?= $ap->email; ?></a></td>
					<td><?= $ap->phone; ?></td>
					<td><?php $cv = $this->db->get_where('attachment', array('type' => 'contract'))->row(); 
						if(!empty($cv)):
					?>
						<a href="<?= base_url('uploads/'.$cv->url); ?>" target="blank">Download CV</a>
					<?php endif; ?>
					</td>
					<td><a href="<?= base_url('hr/deletefromshortlist/'.$ap->id); ?>" class="btn btn-danger">Delete From Shortlist</a>
					<a href="<?= base_url('hr/editemployee/'.$ap->id); ?>" class="btn btn-primary">Edit</a>
				</tr>
			<?php endforeach; endif; ?>
			</tbody>
		</table>
	</div>
</div>