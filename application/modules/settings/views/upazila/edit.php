<section class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6"> <h1>Division Form</h1> </div>
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="<?=base_url()?>">Home</a></li>
               <li class="breadcrumb-item active">General Settings</li>
               <li class="breadcrumb-item active">Division Form</li>
            </ol>
         </div>
      </div>
   </div><!-- /.container-fluid -->
</section>

<section class="content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-md-7">
            <div class="card card-success">
               <div class="card-header">
                  <h3 class="card-title"><?=$meta_title?></h3>
                  <a class="btn btn-primary btn-sm float-right" href="<?=base_url('settings/division')?>">Division List</a>
               </div>
               <div><?php //echo validation_errors(); ?></div>
               <?php if($this->session->flashdata('success')):?>
                  <div class="alert alert-success">
                     <a class="close" data-dismiss="alert">&times;</a>
                     <?php echo $this->session->flashdata('success');;?>
                  </div>
               <?php endif; ?>
               <?php 
                  $attributes = array('id' => '');
                  echo form_open_multipart(uri_string(), $attributes);
               ?>  
               <div class="card-body">
                  <div class="form-group">
                     <label>Division Name(English)</label>
                     <div><?php echo form_error('name_en'); ?></div>
                     <input type="text" name="name_en" value="<?=set_value('name_en', $info->name_en)?>" class="form-control form-control-sm">
                  </div>
                  <div class="form-group">
                     <label>Division Name(Bangla)</label>
                     <div><?php echo form_error('name_bn'); ?></div>

                     <input type="text" name="name_bn" value="<?=set_value('name_bn', $info->name_bn)?>" class="form-control form-control-sm">
                  </div>
               </div>
               
               <div class="card-footer">
                     <?php echo form_submit('submit', 'Save Update', 'class="btn btn-primary float-right"'); ?>
               </div>
               <?php echo form_close();?>
            </div>
         </div>
      </div>
</div><!-- /.container-fluid -->
</section>