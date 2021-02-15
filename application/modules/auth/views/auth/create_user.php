<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="<?=base_url()?>"><b>BG</b>PMS</a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a new membership</p>
      <div id="infoMessage"><?php echo $message; ?></div>
      <?php echo form_open("auth/create_user"); ?>
      <!-- <form action="create_user" method="post"> -->
        <div class="input-group mb-3">
          <input type="text" name="first_name" class="form-control" placeholder="Name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" name='phone' class="form-control" placeholder="Phone">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name='password' class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name='password_confirm' class="form-control" placeholder="Retype password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <div class="col-8">
            <div class="icheck-primary">

            <a href="<?=base_url()?>" class="text-center">I already have a membership</a>
            </div>
          </div>
          <!-- /.col -->

          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          </div>
          <!-- /.col -->
        </div>
      <!-- </form> -->
      <?php echo form_close(); ?>
<!--
      <div class="social-auth-links text-center">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i>
          Sign up using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i>
          Sign up using Google+
        </a>
      </div> -->


    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->
