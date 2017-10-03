<?php
$table = $this->db->get_where('user')->result();
?>
<div style="padding:50px 30px; width:100%">
	<h4>All Users</h4>
	<br />
	<div class="text-right">
		<a href="<?= base_url('User/create'); ?>" class="btn btn-success">Add</a>
	</div>
	<br />
	<div class="row">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Name</th>
					<th>Email</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			<?php if(!empty($table)): foreach($table as $ap): ?>
				<tr>
					<td><?= $ap->firstname; ?></td>
					<td><?= $ap->email; ?></td>					
					<td><a href="<?= base_url('User/edit/'.$ap->id); ?>" class="btn btn-primary">Edit</a>
					<a onclick="return confirm('Are you sure?')" href="<?= base_url('User/delete/'.$ap->id); ?>" class="btn btn-danger">Delete</a></td>
				</tr>
			<?php endforeach; endif; ?>
			</tbody>
		</table>
	</div>
</div>


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