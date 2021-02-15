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
                  <a class="btn btn-primary btn-sm float-right" href="<?=base_url('settings/product_sub_category')?>">List</a>
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
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                           <label>Brand Name</label>
                           <?php echo form_error('brand_name');
                           $more_attr = 'class="form-control form-control-sm" id="brand_name"';
                           echo form_dropdown('brand_name', $brands, set_value('brand_name',$info->brand_id), $more_attr);
                           ?>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label>Product Category Name</label>
                           <?php echo form_error('category_name');
                           $more_attr = 'class="form-control form-control-sm" id="category_name"';
                           echo form_dropdown('category_name', $categorys, set_value('category_name',$info->category_id), $more_attr);
                           ?>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label>Product Sub Category Name</label>
                           <div><?php echo form_error('sub_category_name'); ?></div>
                           <input type="text" name="sub_category_name" value="<?=$info->sub_category_name?>" class="form-control form-control-sm">
                        </div>
                     </div>

                     <div class="col-md-4">
                        <div class="form-group">
                           <label>Product Sub Category Image</label><span style="font-size: 11px;">(if Change)</span>
                           <div><?php echo form_error('sub_category_img_file'); ?></div>
                           <input type="file" name="sub_category_img_file" value="<?=set_value('sub_category_img_file')?>" class="form-control form-control-sm">
                        </div>
                     </div>

                     <div class="col-md-4">
                        <div class="form-group">
                           <label>Product Sub Category Old Image</label>
                           <div><?php echo form_error('sub_category_img_file'); ?></div>
                           <input type="hidden" name="old_img_file" value="<?=$info->sub_category_img?>">
                              <?php if ($info->sub_category_img) {?>
                              <a href="<?=base_url('uploads/sub_category_image/'.$info->sub_category_img)?>" target="_blank"><img style="max-height: 50px; max-width: 50px; margin-left: 25px;" src="<?=base_url('uploads/sub_category_image/'.$info->sub_category_img)?>"></a>
                          <?php } ?>
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