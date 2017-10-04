<?php
    $row = $this->db->get_where('sales', array('id' => $this->uri->segment(3)))->row();
    $sales_item = $this->db->get_where('sales_item', array('sales_id' => $row->id))->result();
    $customer = $this->db->get_where('customer', array('id' => $row->customerid))->row();
    $company = $this->db->get_where('company', array('id' => $row->companyid))->row();
    $employee = $this->db->get_where('employee', array('id' => $row->employee_id))->row();
    $product = $this->db->get_where('product')->result();
    
?>                        
<div class="container" style="padding: 60px;">
	<div class="row" style="background:white;">
		<div class="col-md-12">
			<h3>Details - <?= $row->id;?></h3>
			<div class="row">
				
				<div class="col-md-3">
					<div class="card">
						<label for="">Date</label>
						<div class="card-body">
							<?= $row->date;?>
						</div>
					</div>
				</div>
				
				<div class="col-md-3">
					<div class="card">
						<label for="">Customer</label>
						<div class="card-body">
							<?= $customer->fname;?>
						</div>
					</div>
				</div>
				
				<div class="col-md-3">
					<div class="card">
						<label for="">Company</label>
						<div class="card-body">
							<?= $company->company_name;?>
						</div>
					</div>
				</div>
				
				<div class="col-md-3">
					<div class="card">
						<label for="">Sales Person</label>
						<div class="card-body">
							<?= $employee->firstname;?>
						</div>
					</div>
				</div>

			</div>
<hr>
			<div class="row">
				
				<div class="col-md-12">
					<div class="card">
						<label for="">Product</label>
						<label class="badge badge-secondary pull-right">Quantity</label>
						<label class="badge badge-secondary pull-right" style="margin-right: 15px;">Price</label>
						<div class="card-body">
							<ul class="list-group">
							<?php foreach($product as $row)
							{
								foreach($sales_item as $item)
								{
									if($row->id == $item->productid)
									{ ?>
		<li class="list-group-item">
		<?= $row->name;?> 
			<span class="badge badge-secondary"><?= $item->qty;?></span>
			<span class="pull-right" style="margin-right: 43px;"><?= $item->price;?></span>
		</li>
							<?php }
								}
							} ?>
							</ul>
						</div>
					</div>
				</div>

			</div>

			<div class="row">
				<div class="col-md-2">
					<a href="<?= base_url('Sales/index'); ?>" class="btn btn-info btn-block">Back</a>
				</div>
			</div><br/>
			
		</div>
	</div>
</div>