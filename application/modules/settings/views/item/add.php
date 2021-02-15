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
                  <a class="btn btn-primary btn-sm float-right" href="<?=base_url('settings/item')?>">List</a>
               </div>
               <div><?php //echo validation_errors(); ?></div>
               <?php if($this->session->flashdata('success')):?>
                  <div class="alert alert-success">
                     <a class="close" data-dismiss="alert">&times;</a>
                     <?php echo $this->session->flashdata('success');;?>
                  </div>
               <?php endif; ?>
               <?php echo form_open_multipart("settings/item_add");?>
               <div class="card-body">
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                           <label>Brand Name</label>
                           <?php echo form_error('brand_name');
                           $more_attr = 'class="form-control" id="brand_name"';
                           echo form_dropdown('brand_name', $brands, set_value('brand_name'), $more_attr);
                           ?> 
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label>Product Category Name</label>
                           <div><?php echo form_error('category_name'); ?></div>
                           <select name="category_name" id="category_name" class="form-control">
                             <option>--Select One--</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label>Product Sub Category Name</label>
                           <div><?php echo form_error('sub_category_name'); ?></div>
                           <select name="sub_category_name" id="sub_category_name" class="form-control">
                             <option>--Select One--</option>
                           </select>
                        </div>
                     </div>

                     <div class="col-md-6">
                        <div class="form-group">
                           <label>Model No.</label>
                           <div><?php echo form_error('model_no'); ?></div>
                           <input type="text" name="model_no" value="<?=set_value('model_no')?>" class="form-control">
                        </div>
                     </div>

                     <div class="col-md-6">
                        <div class="form-group">
                           <label>Technical Specification</label>
                           <div><?php echo form_error('technical_specification'); ?></div>
                           <textarea  name="technical_specification" value="<?=set_value('technical_specification')?>" class="form-control" rows="3" placeholder="Enter Technical Specification..."></textarea>
                        </div>
                     </div>

                     <div class="col-md-6">
                        <div class="form-group">
                           <label>Other Details</label>
                           <div><?php echo form_error('other_details'); ?></div>
                           <textarea  name="other_details" value="<?=set_value('other_details')?>" class="form-control" rows="3" placeholder="Enter Other Details..."></textarea>
                        </div>
                     </div>

                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="pdf_file">PDF File</label>
                           <div><?php echo form_error('pdf_file'); ?></div>
                           <div class="input-group">
                              <div class="custom-file">
                                 <input type="file" class="custom-file-input" name="pdf_file" id="pdf_file">
                                 <label class="form-control custom-file-label" for="pdf_file">Choose PDF file</label>
                              </div>
                           </div>
                        </div>
                     </div>

                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="slider_img1">Slider Image-1</label>
                           <div><?php echo form_error('slider_img1'); ?></div>
                           <div class="input-group">
                              <div class="custom-file">
                                 <input type="file" class="custom-file-input" name="slider_img1" id="slider_img1">
                                 <label class="form-control custom-file-label" for="slider_img1">Choose Slider Image</label>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="slider_img2">Slider Image-2</label>
                           <div><?php echo form_error('slider_img2'); ?></div>
                           <div class="input-group">
                              <div class="custom-file">
                                 <input type="file" class="custom-file-input" name="slider_img2" id="slider_img2">
                                 <label class="form-control custom-file-label" for="slider_img2">Choose Slider Image-2</label>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="slider_img3">Slider Image-3</label>
                           <div><?php echo form_error('slider_img3'); ?></div>
                           <div class="input-group">
                              <div class="custom-file">
                                 <input type="file" class="custom-file-input" name="slider_img3" id="slider_img3">
                                 <label class="form-control custom-file-label" for="slider_img3">Choose Slider Image-3</label>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="slider_img4">Slider Image-4</label>
                           <div><?php echo form_error('slider_img4'); ?></div>
                           <div class="input-group">
                              <div class="custom-file">
                                 <input type="file" class="custom-file-input" name="slider_img4" id="slider_img4">
                                 <label class="form-control custom-file-label" for="slider_img4">Choose Slider Image-4</label>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="slider_img5">Slider Image-5</label>
                           <div><?php echo form_error('slider_img5'); ?></div>
                           <div class="input-group">
                              <div class="custom-file">
                                 <input type="file" class="custom-file-input" name="slider_img5" id="slider_img5">
                                 <label class="form-control custom-file-label" for="slider_img5">Choose Slider Image-5</label>
                              </div>
                           </div>
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
<script>
   // Add the following code if you want the name of the file appear on select
   $(".custom-file-input").on("change", function() {
      var fileName = $(this).val().split("\\").pop();
      $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
   });
</script>