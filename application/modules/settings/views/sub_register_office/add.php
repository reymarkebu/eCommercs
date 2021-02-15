<section class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6"> <h1>Sub Register Office Form</h1> </div>
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="<?=base_url()?>">Home</a></li>
               <li class="breadcrumb-item active">General Settings</li>
               <li class="breadcrumb-item active">Sub Register Office Form</li>
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
                  <a class="btn btn-primary btn-sm float-right" href="<?=base_url('settings/sub_register_office')?>">Sub Register Office List</a>
               </div>
               <div><?php //echo validation_errors(); ?></div>
               <?php if($this->session->flashdata('success')):?>
                  <div class="alert alert-success">
                     <a class="close" data-dismiss="alert">&times;</a>
                     <?php echo $this->session->flashdata('success');;?>
                  </div>
               <?php endif; ?>
               <?php echo form_open_multipart("settings/sub_register_office_add");?>
               <div class="card-body">
                  <div class="row">
                     <div class="col-md-4">
                        <div class="form-group">
                           <label>Division</label>
                           <?php echo form_error('per_division_id');
                           $more_attr = 'class="form-control form-control-sm" id="division"';
                           echo form_dropdown('per_division_id', $divisions, set_value('per_division_id'), $more_attr);
                           ?> 
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label>District</label>
                           <div><?php echo form_error('per_district_id'); ?></div>
                           <select name="per_district_id" id="district" class="distirict_val form-control form-control-sm">
                             <option>--Select One--</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label>Upazila/Thana</label>
                           <div><?php echo form_error('per_upa_tha_id'); ?></div>
                           <select name="per_upa_tha_id" id="upazila" class="upazila_thana_val form-control form-control-sm">
                             <option>--Select One--</option>
                           </select>
                        </div>
                     </div>

                     <div class="col-md-6">
                        <div class="form-group">
                           <label>Sub Register Office Name(English)</label>
                           <div><?php echo form_error('name_en'); ?></div>
                           <input type="text" name="name_en" value="<?=set_value('name_en')?>" class="form-control form-control-sm">
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label>Sub Register Office Name(Bangla)</label>
                           <div><?php echo form_error('name_bn'); ?></div>
                           <input type="text" name="name_bn" value="<?=set_value('name_bn')?>" class="form-control form-control-sm">
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