
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>District List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=base_url()?>">Home</a></li>
               <li class="breadcrumb-item active">General Settings</li>
              <li class="breadcrumb-item active">District</li>
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
            <h3 class="card-title">District Information</h3>
            <div class="card-tools">
              <!-- <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-default">Add New <i class="fas fa-plus"></i></button> -->
              <a class="btn btn-primary btn-sm" href="<?=base_url('settings/district_add')?>">Add New <i class="fas fa-plus"></i></a>
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
                     <th>SL</th>
                     <th>Division Name</th>
                     <th>District Name (in Bengali)</th>
                     <th>District Name (in English)</th>                                        
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
                    <td><?=$row->div_name_en;?></td>
                    <td><?=$row->name_bn;?></td>
                    <td><?=$row->name_en;?></td>
                    <td>
                      <a class="btn btn-info btn-sm" href="#">Edit</a>
                      <a class="btn btn-danger btn-sm" href="#">Delete</a>
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