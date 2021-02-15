<section class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6"> <h1><?=$meta_title?> Form</h1> </div>
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

<section class="content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-md-12">
            <div class="card card-success">
               <div class="card-header">
                  <h3 class="card-title"><?=$meta_title?></h3>
                  <a class="btn btn-primary btn-sm float-right" href="<?=base_url('settings/brand')?>">List</a>
               </div>
               <?php if($this->session->flashdata('success')):?>
                  <div class="alert alert-success">
                     <a class="close" data-dismiss="alert">&times;</a>
                     <?php echo $this->session->flashdata('success');;?>
                  </div>
               <?php endif; ?>
               <?php echo form_open_multipart("settings/brand_add");?>
               <div class="card-body">
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                           <label>Brand Name</label>
                           <div><?php echo form_error('name'); ?></div>
                           <input type="text" name="name" value="<?=set_value('name')?>" class="form-control form-control-sm">
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label>Brand Image</label>
                           <div><?php echo form_error('img_file'); ?></div>

                           <input type="file" name="img_file" value="<?=set_value('img_file')?>" class="form-control form-control-sm">
                        </div>
                     </div>
                  </div>
               </div>
               
               <div class="card-footer">
                     <?php echo form_submit('submit', 'Save', 'class="btn btn-primary float-right"'); ?>
               </div>
               <?php echo form_close();?>
            </div>
         </div>
      </div>
</div><!-- /.container-fluid -->
</section>