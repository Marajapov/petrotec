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
<?php $supplier = $this->db->get('supplier')->result(); ?>
<div style="padding:50px 30px; width:100%">
	<h4>All Supplier</h4>
	<br />
	<div class="text-right">
		<a href="<?= base_url('supplier/addsupplier'); ?>" class="btn btn-success">Add Supplier</a>
	</div>
	<br />
	<div class="row">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Supplier Name</th>
					<th>Email</th>
					<th>Phone</th>
					<th>History</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php if(!empty($supplier)): foreach($supplier as $s): ?>
					<tr>
						<td><?= $s->fname.' '.$s->lname; ?></td>
						<td><?= $s->email; ?></td>
						<td><?= $s->phone; ?></td>
						<td><a href="#" class="btn btn-success">History</a></td>
						<td>
							<a href="<?= base_url(); ?>supplier/editSupplier/<?= $s->id; ?>" class="btn btn-primary">Edit</a>
							<a href="#" class="btn btn-danger">Delete</a>
						</td>
					</tr>
				<?php endforeach; endif; ?>
			</tbody>
		</table>
	</div>
</div>