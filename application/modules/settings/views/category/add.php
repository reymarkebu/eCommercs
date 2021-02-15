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
                  <a class="btn btn-primary btn-sm float-right" href="<?=base_url('settings/product_category')?>">List</a>
               </div>
               <div><?php //echo validation_errors(); ?></div>
               <?php if($this->session->flashdata('success')):?>
                  <div class="alert alert-success">
                     <a class="close" data-dismiss="alert">&times;</a>
                     <?php echo $this->session->flashdata('success');;?>
                  </div>
               <?php endif; ?>
               <?php echo form_open_multipart("settings/product_category_add");?>
               <div class="card-body">
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                           <label>Brand Name</label>
                           <?php echo form_error('brand_name');
                           $more_attr = 'class="form-control form-control-sm" id="brand_name"';
                           echo form_dropdown('brand_name', $brands, set_value('brand_name'), $more_attr);
                           ?> 
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label>Product Category Name</label>
                           <div><?php echo form_error('category_name'); ?></div>
                           <input type="text" name="category_name" value="<?=set_value('category_name')?>" class="form-control form-control-sm">
                        </div>
                     </div>

                     <div class="col-md-6">
                        <div class="form-group">
                           <label>Product Category Image</label>
                           <div><?php echo form_error('category_img_file'); ?></div>
                           <input type="file" name="category_img_file" value="<?=set_value('category_img_file')?>" class="form-control form-control-sm">
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