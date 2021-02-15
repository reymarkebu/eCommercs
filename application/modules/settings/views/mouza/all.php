
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Mouza List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=base_url()?>">Home</a></li>
              <li class="breadcrumb-item active">General Settings</li>
              <li class="breadcrumb-item active">Mouza Office</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
      
    <!-- Main content -->
    <section class="content">

    <?php //print_r($userDetails); exit; ?>

      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Mouza Information</h3>
            <div class="card-tools">
              <!-- <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-default">Add New <i class="fas fa-plus"></i></button> -->
              <a class="btn btn-primary btn-sm" href="<?=base_url('settings/mouza_add')?>">Add New <i class="fas fa-plus"></i></a>
              <!-- <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button> -->
              <!-- <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button> -->
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
               
               <div id="infoMessage"><?php //echo $message;?></div>            
                  <?php if($this->session->flashdata('success')):?>
                     <div class="alert alert-success">
                        <a class="close" data-dismiss="alert">&times;</a>
                        <?php echo $this->session->flashdata('success');?>
                     </div>
                  <?php endif; ?>
                <table id="example2" class="text-center table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>SL No.</th>
                    <th>Division Name</th>
                    <th>District Name</th>
                    <th>Police Station Name</th>
                    <th>Mouza Name's</th>
                    <th>Mouza No.</th>
                    <!-- <th>Name (Bn)</th> -->
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
                    <td><?=$row->dis_name_en;?></td>
                    <td><?=$row->upa_name_en;?></td>
                    <td><?=$row->name_en;?></td>
                    <td><?=$row->no_en;?></td>
                    <!-- <td><?=$row->name_bn;?></td> -->
                    <td>
                      <a class="btn btn-info btn-sm" href="<?=base_url('settings/mouza_edit/'.$row->id)?>">Edit</a>
                      <a class="btn btn-danger btn-sm" href="<?=base_url('settings/mouza_delete/'.$row->id)?>:" onclick="return confirm('Are you sure you want to delete this data?');">Delete</a>
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