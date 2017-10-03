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
			<div class="form-group">
				<br />
				<h1>Petrotech Invoice</h1>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label>Invoice Number</label>
				<input type="text" class="form-control" />
			</div>
			<div class="form-group">
				<label>Date</label>
				<input type="text" class="form-control" value="<?= date('Y-m-d'); ?>" />
			</div>
		</div>
	</div>
	<hr />
</div>