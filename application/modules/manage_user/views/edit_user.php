
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>User Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=base_url()?>">Home</a></li>
              <li class="breadcrumb-item active">User Form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">User Information</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
          <!-- <form action="<?=base_url('manage_user/edit_user/'.$user->id)?>" method="post"> -->
          <?php echo form_open(uri_string());?>
            <div class="row">
              <div class="col-md-6">
                <div class="card card-info">
                  <div class="card-header">
                    <h3 class="card-title">Information </h3>
                  </div>
                  <div class="card-body">
                  <!-- /.form-group -->
                    <div class="input-group mb-3">
                      <input type="text" name="first_name" value="<?=$user->first_name?>" class="form-control" placeholder="Name">
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-user"></span>
                        </div>
                      </div>
                    </div>
                    <!-- <div class="input-group mb-3">
                      <input type="email" name="email" value="<?=$user->email?>" class="form-control" placeholder="Email">
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-envelope"></span>
                        </div>
                      </div>
                    </div> -->
                    <div class="input-group mb-3">
                      <input type="text" maxlength="11" name='phone' value="<?=$user->phone?>" class="form-control" placeholder="Phone">
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
                  </div>
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <!-- iCheck -->
                <div class="card card-success">
                  <div class="card-header">
                    <h3 class="card-title">Roles </h3>
                  </div>
                  <div class="card-body">
                    <!-- Minimal style -->
                    <div class="row">
                      <?php foreach($groups as $val){?>
                      <div class="col-sm-6">
                        <!-- checkbox -->
                        <div class="form-group clearfix">
                          <div class="icheck-success d-inline">
                          <?php
                            $gID=$val['id'];
                            $checked = null;
                            $item = null;
                            foreach($currentGroups as $grp) {
                              if ($gID == $grp->id) {
                                $checked= ' checked="checked"';
                              break;
                              }
                            }
                          ?>
                            <input type="checkbox" <?=$checked?> name="role[]" value="<?=$val['id']?>" id="checkboxPrimary<?=$val['id']?>">
                            <label for="checkboxPrimary<?=$val['id']?>"> <?=$val['description']?></label>
                          </div>
                        </div>
                      </div>
                      <?php }?>
                    </div>
                  </div>
                </div>
                <!-- /.card -->
              </div>
              <!-- /.col -->
              <div class="col-sm-12">
                <div class="col-4">
                  <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </div>
              </div>
            </div>
            <!-- </form> -->
            <?php echo form_hidden('id', $user->id);?>
            <?php echo form_hidden($csrf); ?>

            <?php echo form_close();?>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
        </div>
      </div><!-- /.container-fluid -->
    </section>