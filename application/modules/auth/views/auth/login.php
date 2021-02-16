<!-- ================================================================== -->
<!-- <body class="hold-transition login-page" style="background: url('<?=base_url('awedget/img/bg3.jpg')?>') center;"> -->
<body class="hold-transition login-page" style="background: #f8f8f8; border-top:15px solid #0455A6; border-bottom:10px solid #F0166A">
<div class="login-box" style="width: 1100px;">
  <div class="login-logo" style="float:left; width:550px;">
  <a href="<?=base_url()?>">
  <img src="<?=base_url('awedget/img/logo.png')?>" style="width:80%">
  </a>
  <!-- <br><b style="font-weight: 700">Land Management System</b></a> -->
  </div>
  <!-- /.login-logo -->
  <div class="card" style="float:right;width:550px;margin-top:75px;">
    <div class="card-body login-card-body">
      <p class="login-box-msg" style="font-size:26px;font-weight:700;color: #3e3c3c;">LOGIN TO YOUR ACCOUNT</p>

      <div id="infoMessage"><?php echo $message; ?></div>

      <?php echo form_open("auth/login"); ?>
         <!-- <form action="login" method="post"> -->
        <div class="input-group mb-3">
          <input type="email" name='identity' id='identity' class="form-control" placeholder="Email" >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name = 'password' id='password' class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember" name="remember" value='1'>
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Log In</button>
          </div>
          <!-- /.col -->
        </div>
      <!-- </form> -->
      <?php echo form_close(); ?>

      <!-- <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div> -->
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="<?=base_url('forgot_password')?>">Forgot Your Password ?</a>
      </p>
      <p class="mb-0">
        <a href="<?=base_url('auth/create_user')?>" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->