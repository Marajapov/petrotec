<?php 
    $table = $this->db->get_where('sales')->result();
?>
<div class="container">
    <div class="row" style="padding-top:20px;">
        <div class="col-md-12">
            <h3>Sales</h3><br/>
            <div class="text-right">
                <a href="<?= base_url('Sales/create'); ?>" class="btn btn-success">Add</a>
            </div>  
	        <br />
            
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Agent Name</th>
                        <th>Invoice No</th>
                        <th>Customer</th>
                        <th>Date of Sale</th>
                        <th>Balance</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php if(!empty($table)){
                foreach($table as $ap){
                    $customer = $this->db->get_where('customer',array('id' => $ap->customerid))->row();
                    $employee = $this->db->get_where('employee',array('id' => $ap->employee_id))->row();
                    $balance = $this->db->get_where('installment',array('salesid' => $ap->id))->row();
                    
                   
                ?>
                    <tr>
                        <td><?= date('d/m/Y',strtotime($ap->date)); ?></td>
                        <td><?= $employee->firstname; ?></td>
                        <td>000<?= $ap->id; ?></td>		
                        <td><?= $customer->fname; ?></td>			
                        <td><?= date('d/m/Y',strtotime($ap->date_created)); ?></td>			
                        <td> <?=(!empty($balance))? $balance->paid:'00';?></td>			
                        <td> 
                        <?php
                            if(!empty($balance)){
                                echo $balance->status;
                            }else{
                                echo 'pending';
                            }
                        ?></td>			
                        <td><a href="<?= base_url('Sales/show/'.$ap->id); ?>" class="btn btn-primary">View</a>

                    </tr>
                <?php } } ?>
                </tbody>
		    </table>
        </div><!-- end of col-md-12-->
    </div><!-- end of row-->
</div>
