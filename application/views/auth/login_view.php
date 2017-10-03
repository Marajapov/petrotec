<link rel="stylesheet" href="<?= base_url(); ?>admin_assets/assets/css/bootstrap.min.css">
<div class="container">
    <div class="row" style="padding-top:150px;">
        <div class="col-md-4" >
            
        </div>
        <div class="col-md-4">
<?= form_open_multipart(base_url('Login/login_post'), array('class' => 'form-horizontal')); ?> 
            <fieldset>
                <legend>Login</legend>
                <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">Email</label>
                <div class="col-md-6 col-lg-8 pull-right">
                    <input name="email" type="text" class="form-control" id="inputEmail" placeholder="Email">
                </div>
                </div>
                <div class="form-group">
                <label for="inputPassword" class="col-lg-2 control-label">Password </label>
                <div class="col-md-6 col-lg-8 pull-right">
                    <input name="password" type="password" class="form-control" id="inputPassword" placeholder="Password">
                    
                </div>
                </div>
            
                <div class="form-group">
                <div class="col-md-6 col-lg-8 pull-right">
                    <button type="submit" class="btn btn-primary">Enter</button>
                </div>
                </div>
            </fieldset>
            <?= form_close(); ?>
        </div><!-- end of col-md-4 -->
        <div class="col-md-4"></div>
    </div>
</div>