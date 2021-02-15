 <!--  <section class="content-header bg-dark">
     <div class="container-fluid">
        <div class="row mb-2">
           <div class="col-sm-6">
              <h1><?=$meta_title='Item Details'?></h1>
           </div>
           <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                 <li class="breadcrumb-item"><a href="<?=base_url()?>"><?=$item_info->brand_name?></a></li>
                 <li class="breadcrumb-item active"><?=$item_info->category_name?></li>
                 <li class="breadcrumb-item active"><?=$item_info->sub_category_name?></li>
              </ol>
           </div>
        </div>
     </div>
  </section> -->
<hr>
<!-- service single -->
<section class="section">
    <div class="container">
        <div class="row">
            <!-- sidebar -->
            <aside class="col-lg-3 order-lg-1 order-sm-1 order-1">
                <!-- service menu -->
                <?=$this->load->view('frontend/_sidebar_menu')?>
                <br>
                <br>
                <div class="mb-50">
                    <h5 class="mb-20">Request Free Consultation</h5>
                    <form action="#" class="row">
                        <div class="col-lg-12">
                            <input type="text" class="form-control" name="name" id="name" placeholder="Name" required>
                        </div>
                        <div class="col-lg-12">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email Address"
                                required>
                        </div>
                        <div class="col-lg-12">
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject"
                                required>
                        </div>
                        <div class="col-lg-12">
                            <textarea name="question" id="question" class="form-control p-2" placeholder="Your Question Here..."
                                style="height: 150px;"></textarea>
                        </div>
                        <div class="col-lg-12">
                            <button class="btn btn-primary" type="submit" value="send">Submit Request</button>
                        </div>
                    </form>
                </div>
            </aside>
            <!-- service single content -->
            <div class="col-lg-9 order-lg-2 order-sm-2 order-2">
              <div class="row row-fluid">
                <div class="col-12">
                  <section class="content-header bg-deafult">
                     <div class="container-fluid">
                        <div class="row mb-2">
                           <div class="col-sm-12">
                              <ol class="breadcrumb float-sm-right">
                                 <li class="breadcrumb-item active"><?=$item_info->brand_name?></li>
                                 <li class="breadcrumb-item active"><?=$item_info->category_name?></li>
                                 <li class="breadcrumb-item active"><?=$item_info->sub_category_name?></li>
                              </ol>
                           </div>
                        </div>
                     </div> <!-- /.container-fluid -->
                  </section>
                </div>
              </div>
              <div class="row row-fluid">
                <div class="col-lg-9">
                  <div id="carousel-thumb" class="carousel slide carousel-fade carousel-thumbnails" data-ride="carousel">
                    <!--Slides-->
                    <div class="carousel-inner" role="listbox">
                    <?php if(!empty($item_info->slider_img1)){?>
                      <div class="carousel-item active">
                        <img class="d-block w-100" src="<?=base_url()?>uploads/item_image/<?=$item_info->slider_img1?>" alt="Slide">
                      </div>
                    <?php } if(!empty($item_info->slider_img2)){?>
                      <div class="carousel-item">
                        <img class="d-block w-100" src="<?=base_url()?>uploads/item_image/<?=$item_info->slider_img2?>" alt="Slide">
                      </div>
                    <?php } if(!empty($item_info->slider_img3)){?>
                      <div class="carousel-item">
                        <img class="d-block w-100" src="<?=base_url()?>uploads/item_image/<?=$item_info->slider_img3?>" alt="Slide">
                      </div>
                    <?php } if(!empty($item_info->slider_img4)){?>
                      <div class="carousel-item">
                        <img class="d-block w-100" src="<?=base_url()?>uploads/item_image/<?=$item_info->slider_img4?>" alt="Slide">
                      </div>
                    <?php } if(!empty($item_info->slider_img5)){?>
                      <div class="carousel-item">
                        <img class="d-block w-100" src="<?=base_url()?>uploads/item_image/<?=$item_info->slider_img5?>" alt="Slide">
                      </div>
                    <?php } ?>
                      <!-- <div class="carousel-item active">
                        <img class="d-block w-100" src="<?=base_url()?>uploads/item_image/a1.jpg?>" alt="First slide">
                      </div> -->
                      <!-- <div class="carousel-item">
                        <img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(121).jpg" alt="Second slide">
                      </div> -->
                      <!-- <div class="carousel-item ">
                        <img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(31).jpg" alt="Third slide">
                      </div> -->
                    </div>
                    <!--/.Slides-->
                    <!--Controls-->
                    <a class="carousel-control-prev" href="#carousel-thumb" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carousel-thumb" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                    <!--/.Controls-->
                    <br>
                    <br>
                    <ol class="carousel-indicators">
                      <?php if(!empty($item_info->slider_img1)){?>
                        <li data-target="#carousel-thumb" data-slide-to="0" class="active"> 
                          <img class="d-block w-100" src="<?=base_url()?>uploads/item_image/<?=$item_info->slider_img1?>"></li>
                      <?php } if(!empty($item_info->slider_img2)){?>
                        <li data-target="#carousel-thumb" data-slide-to="1" class=""> 
                          <img class="d-block w-100" src="<?=base_url()?>uploads/item_image/<?=$item_info->slider_img2?>"></li>
                      <?php } if(!empty($item_info->slider_img3)){?>
                        <li data-target="#carousel-thumb" data-slide-to="2" class=""> 
                          <img class="d-block w-100" src="<?=base_url()?>uploads/item_image/<?=$item_info->slider_img3?>"></li>
                      <?php } if(!empty($item_info->slider_img4)){?>
                        <li data-target="#carousel-thumb" data-slide-to="3" class=""> 
                          <img class="d-block w-100" src="<?=base_url()?>uploads/item_image/<?=$item_info->slider_img4?>"></li>
                      <?php } if(!empty($item_info->slider_img5)){?>
                        <li data-target="#carousel-thumb" data-slide-to="4" class=""> 
                          <img class="d-block w-100" src="<?=base_url()?>uploads/item_image/<?=$item_info->slider_img5?>"></li>
                      <?php } ?>
                      <!-- <li data-target="#carousel-thumb" data-slide-to="0" class="">
                        <img class="d-block w-100" src="<?=base_url()?>uploads/item_image/a1.jpg">
                      </li>
                      <li data-target="#carousel-thumb" data-slide-to="1" class=""><img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Others/Carousel-thumbs/img%20(121).jpg"></li> -->
                      <!-- <li data-target="#carousel-thumb" data-slide-to="2" class=""><img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Others/Carousel-thumbs/img%20(31).jpg"></li> -->
                    </ol>
                  </div>
                    <!--  -->
                    <!-- <img class="img-fluid mb-60 rounded-top" src="<?=base_url()?>uploads/item_image/<?=$item_info->slider_img?>" alt="service"> -->
                    <?php //print_r($item_info);exit(); ?>
                    <!-- <h3 class="mb-10"><?=$item_info->model_no?></h3> -->
                    <p class="mb-40"><u><b>Technical Specification: </b></u><?=$item_info->technical_specification?></p>
                    <div class="bg-gray p-5 rounded mb-60">
                        <p class="text-dark font-primary mb-30"><u><b>Other Details: </b></u><?=$item_info->other_details?></p>
                        <div>
                            <ul class="d-inline-block pl-0 float-sm-left mr-sm-5">
                                <li class="font-secondary mb-10">
                                    <i class="text-primary mr-2 ti-arrow-circle-right"></i>Business Services</li>
                                <li class="font-secondary mb-10">
                                    <i class="text-primary mr-2 ti-arrow-circle-right"></i>Audit &amp; Assurance</li>
                                <li class="font-secondary mb-10">
                                    <i class="text-primary mr-2 ti-arrow-circle-right"></i>IT Control Solutions</li>
                            </ul>
                            <ul class="d-inline-block pl-0">
                                <li class="font-secondary mb-10">
                                    <i class="text-primary mr-2 ti-arrow-circle-right"></i>Business Services</li>
                                <li class="font-secondary mb-10">
                                    <i class="text-primary mr-2 ti-arrow-circle-right"></i>Audit &amp; Assurance</li>
                                <li class="font-secondary mb-10">
                                    <i class="text-primary mr-2 ti-arrow-circle-right"></i>IT Control Solutions</li>
                            </ul>
                        </div>
                    </div>

                    <div class="rounded border py-3 px-4 mb-50">
                        
                        <!-- <h4 class="mb-1 d-inline-block"> Service Brochure</h4> -->
                        <?php if(!empty($item_info->pdf_file)){ ?>
                        <a class="font-secondary text-color d-block ml-4" download href="<?=base_url()?>uploads/item_image/<?=$item_info->pdf_file?>"><i class="d-inline-block mr-1 text-dark ti-files" style="font-size: 20px;"></i>Download pdf</a>
                      <?php } ?>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="row">
                        <table class="table table-bordered text-center form-group" style="width: 100%;">
                            <tr>
                                <th colspan="3">Item Details</th>
                            </tr>
                            <tr>
                                <td>Name</td>
                                <td>:</td>
                                <td><?=$item_info->sub_category_name?></td>
                            </tr>
                            <tr>
                                <td>Brand</td>
                                <td>:</td>
                                <td><?=$item_info->brand_name?></td>
                            </tr>
                            <tr>
                                <td>Category</td>
                                <td>:</td>
                                <td><?=$item_info->category_name?></td>
                            </tr>
                            <tr>
                                <td>Model</td>
                                <td>:</td>
                                <td><?=$item_info->model_no?></td>
                            </tr>
                        </table>
                    </div>
                </div>
              </div>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
    $('.carousel').carousel()
</script>