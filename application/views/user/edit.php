<?php 
	$row = $this->db->get_where('user', array('id' => $this->uri->segment(3)))->row();
?>
<?= form_open_multipart(base_url('User/update'),'id="userForm"'); ?>
<br />
<div class="container">
	<div class="panel panel-default">
        <div class="panel-heading clearfix">
            <h3 class="panel-title">Edit : <?=$row->firstname;?></h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">

                <input name="id" type="hidden" value="<?=$row->id;?>">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="inputName" class="control-label">First Name</label>
                            <input name="firstname" value="<?=$row->firstname;?>" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="inputName" class="control-label">Last Name</label>
                            <input name="lastname" value="<?=$row->lastname;?>" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="inputName" class="control-label">Email</label>
                            <input name="email" value="<?=$row->email;?>" type="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="inputName" class="control-label">Phone</label>
                            <input name="phone" value="<?=$row->phone;?>" type="text" class="form-control">
                        </div>
                    </div>
                </div> 
                <div class="col-md-12">
                    <div class="col-md-1">
                        <div class="form-group">
                            <a href="javascript:history.go(-1)" class="btn btn-primary">Back</a>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                    
                </div>
            </div><!-- end row -->

        </div><!-- end panel-body -->
    </div><!-- end panel-default-->
</div><!-- end container -->

<?= form_close(); ?>
