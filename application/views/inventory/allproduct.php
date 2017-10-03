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
	$product = $this->db->get('product')->result();
?>
<div style="padding:50px 30px; width:100%">
	<h4>All Product</h4>
	<br />
	<div class="text-right">
		<a href="<?= base_url('inventory/addproduct'); ?>" class="btn btn-success">Add Product</a>
	</div>
	<br />
	<div class="row">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Date</th>
					<th>Product Name</th>
					<th>Category</th>
					<th>Code</th>
					<th>Supplier</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php if(!empty($product)): foreach($product as $p): ?>
					<tr>
						<td><?= $p->created_date; ?></td>
						<td><?= $p->name; ?></td>
						<td><?php 
							$cat = $this->db->get_where('category', array('id' => $p->ccatid))->row(); 
							echo $cat->categoryname;
							?>
						</td>
						<td><?= $p->code; ?></td>
						<td>
							<?php $sup = $this->db->get_where('supplier', array('id' => $p->supplier_id))->row(); 
							echo $sup->email;
							?>
						</td>
						<td>
							<a href="#" class="btn btn-danger">Delete</a>
							<a href="<?= base_url('inventory/editproduct/'.$p->id); ?>" class="btn btn-primary">Edit</a>
						</td>
					</tr>
				<?php endforeach; endif; ?>
			</tbody>
		</table>
	</div>
</div>