<style>
	.form-control {
    display: block;
    width: 100%;
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
$category = $this->db->get_where('category', array('parent' => 0))->result();
?>
<div style="padding:50px 30px; width:100%">
	<h4>All Category</h4>
	<br />
	<div class="text-right">
		<a href="javascript:void(0)" data-toggle="modal" data-target="#addCategory" class="btn btn-success">Add Category</a>
	</div>
	<br />
	<div class="row">
		<?php $this->main_model->message($this->session->flashdata('alert_msg')); ?>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Category Name</th>
					<th>Sub Category</th>
					<th>Total Products Qty</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php if(!empty($category)): foreach($category as $c): ?>
					<tr>
						<td><?= $c->categoryname; ?></td>
						<td><?php
							$subcat = $this->db->get_where('category', array('parent' => $c->id))->result();
							if(!empty($subcat)): foreach($subcat as $ccc):
								echo $ccc->categoryname.', '; 
							endforeach; else: echo ' - '; endif; ?>
						</td>
						<td>0</td>
						<td>
							<a href="javascript:void(0)" data-toggle="modal" data-target="#editCategory" onClick="categoryEditform(<?= $c->id; ?>)" class="btn btn-primary">Edit</a>
						</td>
					</tr>
				<?php endforeach; endif; ?>
			</tbody>
		</table>
	</div>
</div>

<div class="modal fade" id="editCategory" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<?= form_open('inventory/editCategory'); ?>
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Edit Category</h4>
			</div>
			<div class="modal-body" id="editForm">
				
			</div>
			<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			<button type="Submit" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
<?= form_close(); ?>
</div>

<script>
	function categoryEditform(id){
		$.ajax({
			url : '<?= base_url(); ?>inventory/ajax_geteditcategory',
			type: 'POST',
			data : {id : id},
			success: function(data){
				$("#editForm").html(data);
			}
		});
	}
</script>

<!-- Modal -->
<div class="modal fade" id="addCategory" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<?= form_open('inventory/insCategory'); ?>
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Add Category</h4>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label>Category Name</label>
					<input type="text" class="form-control" name="catname" />
				</div>
				<div class="form-group">
					<select name="catid" class="form-control">
						<?php $this->main_model->getcategory(); ?>
					</select>
				</div>
			</div>
			<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			<button type="Submit" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
<?= form_close(); ?>
</div>