<body class="hold-transition register-page" style="background: #f8f8f8; border-top:15px solid #0455A6; border-bottom:10px solid #F0166A">
   <div class="register-box" style="width: 400px;">
      <div class="register-logo">
         <a href="<?=base_url()?>"><b>BEXIMCO</b><div style="font-size: 25px;font-weight: bold;">Property Management Software</div></a>
      </div>

      <div class="card">
         <div class="card-body register-card-body">
            <p class="login-box-msg"><?php echo lang('reset_password_heading'); ?></p>
            <div id="infoMessage"><?php echo $message; ?></div>
            <?php echo form_open('auth/reset_password/' . $code); ?>

            <div class="input-group mb-3">
               <input type="password" name='new' class="form-control" placeholder="Password">
               <div class="input-group-append">
                  <div class="input-group-text">
                     <span class="fas fa-lock"></span>
                  </div>
               </div>
            </div>

            <div class="input-group mb-3">
               <input type="password" name='new_confirm' class="form-control" placeholder="Retype password">
               <div class="input-group-append">
                  <div class="input-group-text">
                     <span class="fas fa-lock"></span>
                  </div>
               </div>
            </div>
            <div class="input-group mb-3">
               <div class="col-8">
                  <!-- <div class="icheck-primary">
                     <a href="<?=base_url()?>" class="text-center">I already have a membership</a>
                  </div> -->
               </div>
               <div class="col-4">
                  <?php echo form_submit('submit', lang('reset_password_submit_btn'), 'class="btn btn-primary btn-block"'); ?>
               </div>
            </div>
         </div>

         <?php echo form_input($user_id); ?>
         <?php echo form_hidden($csrf); ?>
         <?php echo form_close(); ?>

      </div> <!-- /.form-box -->
   </div><!-- /.card -->
</div> <!-- /.register-box -->