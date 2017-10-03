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
	$inventory = $this->db->get('product')->result();
?>
<div style="padding:50px 30px; width:100%">
	<h4>All Inventory</h4>
	<br />
	<div class="text-right">
	</div>
	<br />
	<div class="row">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Product</th>
					<th>Total</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php if(!empty($inventory)): foreach($inventory as $i): ?>
					<tr>
						<td><?php 
							echo $i->name;
							?></td>
						<td><?php 
							$count = $this->db->get_where('inventory', array('productid' => $i->id))->result();
							if(!empty($count)){
								$total = 0;
								foreach($count as $c){
									$total = $total + $c->qty;
								}
								echo $total;
							}else{
								echo 0;
							}
						?></td>
						<td>
							<a href="<?= base_url('inventory/addInventory/'.$i->id); ?>" class="btn btn-primary">View</a>
						</td>
					</tr>
				<?php endforeach; endif; ?>
			</tbody>
		</table>
	</div>
</div>