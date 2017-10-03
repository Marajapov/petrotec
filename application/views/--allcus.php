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
<div style="padding:50px 180px; width:100%">
	<h4>All Customers</h4>
	<br />
	<div class="text-right">
		<a href="<?= base_url('home/createcustomer'); ?>" class="btn btn-success">Add Customer</a>
	</div>
	<br />
	<div class="row">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Date</th>
					<th>Status</th>
					<th>Invoice</th>
					<th>Customer</th>
					<th>Amount</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>13.06.2017</td>
					<td>Approved</td>
					<td>ADPT5675</td>
					<td>Betty Arnold Constructions LLC</td>
					<td>AED 120,000</td>
					<td><a href="#" class="btn btn-primary">View</a></td>
				</tr>
				<tr>
					<td>13.06.2017</td>
					<td>Pending</td>
					<td>ADPT5675</td>
					<td>Joe Morgan Institute</td>
					<td>AED 160,000</td>
					<td><a href="#" class="btn btn-primary">View</a></td>
				</tr>
				<tr>
					<td>13.06.2017</td>
					<td>Pending</td>
					<td>ADPT5675</td>
					<td>McDavid Cafe</td>
					<td>AED 130,000</td>
					<td><a href="#" class="btn btn-primary">View</a></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>