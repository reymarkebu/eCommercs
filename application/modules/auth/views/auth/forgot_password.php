<body class="hold-transition login-page" style="background: #f8f8f8; border-top:15px solid #0455A6; border-bottom:10px solid #F0166A">
<div class="login-box" style="width: 400px;">
  <div class="login-logo">
    <a href="<?=base_url()?>"><b>BEXIMCO</b><div style="font-size: 25px;font-weight: bold;">Property Management Software</div></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>
      <div id="infoMessage"><?php echo $message; ?></div>
      <!-- <form action="auth/forgot_password" method="post"> -->
         <?php echo form_open("forgot_password"); ?>

        <div class="input-group mb-3">
          <input type="email" class="form-control" name='identity' id='identity' placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Send Mail</button>
          </div>
          <!-- /.col -->
        </div>
      <!-- </form> -->
      <?php echo form_close(); ?>

      <p class="mt-3 mb-1">
        <a href="<?=base_url('login')?>">Login to my account</a>
      </p>
      <p class="mb-0">
        <a href="<?=base_url('auth/create_user')?>" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
