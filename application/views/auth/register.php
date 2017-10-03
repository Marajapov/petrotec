<div class="container">
    <div class="row" style="padding-top:10px;">
        <div class="col-md-4" >
        </div>
        <div class="col-md-4">
<?= form_open_multipart(base_url('Login/register_post'), array('class' => 'form-horizontal', 'role' => 'form','id'=>'register')); ?> 
    <h2 class="align-middle">Register</h2>
  <div class="form-group">
    <label for="inputName" class="control-label">Name</label>
    <input name="firstname" type="text" class="form-control" id="inputName" placeholder="Cina Saffary" required>
  </div>

  <div class="form-group">
    <label for="inputEmail" class="control-label">Email</label>
    <input name="email" type="email" class="form-control" id="inputEmail" placeholder="Email" data-error="Bruh, that email address is invalid" required>
    <div class="help-block with-errors"></div>
  </div>

    <div class="col-md-12">
        <div class="form-group">
        <label for="inputPassword" class="control-label">Password</label>
            <div class="form-inline row">
                <div class="form-group col-sm-6 col-md-6 col-lg-6">
                    <input name="password" type="password" data-minlength="6" class="form-control" id="inputPassword" placeholder="Password" required>
                    <div class="help-block">Minimum of 6 characters</div>
                </div>
                <div class="form-group col-sm-6 col-md-6 col-lg-6">
                    <input name="password_confirm" type="password" class="form-control" id="inputPasswordConfirm" data-match="#inputPassword" data-match-error="Whoops, these don't match" placeholder="Confirm" required>
                    <div class="help-block with-errors"></div>
                </div>
            </div>
        </div>
    </div>
  
    
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    <?= form_close(); ?>
        </div><!-- end of col-md-4 -->
        <div class="col-md-4"></div>
    </div>
</div>
