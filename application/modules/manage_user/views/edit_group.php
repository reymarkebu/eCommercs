
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Group Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=base_url()?>">Home</a></li>
              <li class="breadcrumb-item active">Group</li>
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
            <h3 class="card-title">Group Information</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
          <form action="<?=base_url('manage_user/edit_group/'.$group->id)?>" method="post">
            <div class="row">
              <div class="col-md-5">
                <div class="input-group mb-3">
                  <input type="text" name="group_name" <?= $group_status ?> id='group_name' value="<?=$group->name?>" class="form-control" placeholder="Group Name">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-signature"></span>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-5">
                <div class="input-group mb-3">
                  <input type="text" name="group_description" id='group_description' value="<?=$group->description?>" class="form-control" placeholder="Description">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-align-center"></span>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-2">
                <div class="input-group mb-3">
                  <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </div>
              </div>
              <!-- /.col -->
            </div>
            </form>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
        </div>
      </div><!-- /.container-fluid -->
    </section>