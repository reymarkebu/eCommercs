
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Users</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=base_url()?>">Home</a></li>
              <li class="breadcrumb-item active">User</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-success">
          <div class="card-header">
            <h3 class="card-title">User Information</h3>
            <div class="card-tools">
              <!-- <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button> -->
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <table class="table table-bordered">
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Roles</th>
                    <th>Action</th>
                  </tr>
                <?php $i=0; foreach($users as $val){?>
                  <tr>
                    <td><?=++$i?></td>
                    <td><?=$val['first_name']?></td>
                    <td><?=$val['email']?></td>
                    <td><?=$val['phone']?></td>
                    <td>
                      <?php foreach($val['roles'] as $rl){ ?>
                      <a class="btn btn-success btn-sm" href="javascript:"><?=$rl['description']?></a>
                      <?php }?>
                    </td>
                    <td>
                      <a class="btn btn-info" href="<?=base_url()?>manage_user/edit_user/<?=$val['id']?>">Edit</a>
                      <?php if ($this->ion_auth->in_group(array('admin'))){ ?>
                         <a class="btn btn-danger" href="<?=base_url()?>manage_user/delete/<?=$val['id']?>" onclick="return confirm('Are you sure you want to delete this User?');"><i class="fas fa-trash"></i> Delete</a>
                      <?php } ?>
                      <!-- <a class="btn btn-danger" href="javascript:">Delete</a> -->
                    </td>
                  </tr>
                <?php }?>
                </table>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
        </div>
      </div><!-- /.container-fluid -->
    </section>