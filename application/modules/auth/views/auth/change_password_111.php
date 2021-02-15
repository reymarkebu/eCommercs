<div style='height:20px;'></div>
<div class='row '>
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
    <h1><?php echo lang('change_password_heading');?></h1>
      <!-- <p class="login-box-msg">You are only one step a way from your new password, recover your password now.</p> -->

      <form action="auth/change_password" method="post">
        <div class="input-group mb-3">
          <input type="password" name="old" value="" id="old" class="form-control" placeholder="Old Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="new" value="" id="new" pattern="^.{8}.*$" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="new_confirm" value="" id="new_confirm" pattern="^.{8}.*$" class="form-control" placeholder="Confirm Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Change password</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
</div>
<!-- /.login-box -->