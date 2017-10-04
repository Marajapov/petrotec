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
        </div><!-- end of col-md-12-->
    </div><!-- end of row-->
</div>
