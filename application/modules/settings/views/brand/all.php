
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?=$meta_title?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=base_url()?>">Home</a></li>
              <li class="breadcrumb-item active"><?=$module_title?></li>
              <li class="breadcrumb-item active"><?=$meta_title?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
      <div id="infoMessage"><?php //echo $message;?></div>            
         <?php if($this->session->flashdata('success')):?>
            <div class="alert alert-success">
               <a class="close" data-dismiss="alert">&times;</a>
               <?php echo $this->session->flashdata('success');?>
            </div>
      <?php endif; ?>
    <!-- Main content -->
    <section class="content">

    <?php //print_r($userDetails); exit; ?>

      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-success">
          <div class="card-header">
            <h3 class="card-title"><?=$meta_title?> Information</h3>
            <div class="card-tools">
              <a class="btn btn-primary btn-sm" href="<?=base_url('settings/brand_add')?>">Add New <i class="fas fa-plus"></i></a>
              <!-- <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button> -->
              <!-- <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button> -->
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <table id="example2" class="text-center table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>SL No.</th>
                    <th>Brand Name</th>
                    <th>Brand Image</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                   <?php 
                        $sl=0;
                        if($results){
                           foreach ($results as $row) { 
                              $sl++;
                              ?>
                  <tr>
                    <td><?=$sl;?></td>
                    <td><?=$row->brand_name;?></td>
                    <td>
                    <?php if ($row->brand_img) {?>
                      <a href="<?=base_url('uploads/brand_image/'.$row->brand_img)?>" target="_blank"><img style="max-height: 50px; max-width: 50px; margin-left: 25px;" src="<?=base_url('uploads/brand_image/'.$row->brand_img)?>"></a>
                    <?php } ?>
                    </td>
                    <td>
                      <a class="btn btn-info btn-sm" href="<?=base_url('settings/brand_edit/'.$row->id)?>">Edit</a>
                      <a class="btn btn-danger btn-sm" href="<?=base_url('settings/brand_delete/'.$row->id)?>" onclick="return confirm('Are you sure you want to delete this data?');">Delete</a>
                    </td>
                  </tr>
                <?php } } ?>
                </tbody>
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




    <!-- <script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false,
        });
      });
      function addDiv() {
        var div_name_en = $('#div_name_en').val();
        if (div_name_en == '') { alert('Please Enter the Division Name (En)'); return false;}

        var div_name_bn = $('#div_name_bn').val();
        if (div_name_bn == '') {alert('Please Enter the Division Name (Bn)');return false;}

        var formdata = $('#division').serialize();
        $.ajax({
          type: "POST",
          url: "<?php echo base_url(); ?>index.php/settings/division_add",
          data: formdata,
          success: function (data) {
            if (data == 'SUCCESSFUL') {
              alert('Successfully Added!');
              window.location.replace("<?=base_url('settings/division')?>");
            }
            else alert(data);
          }
        });
      }
    </script> -->