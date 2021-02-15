
<!-- service -->
<section class="section">
    <div class="container">
        <div class="row">
            <?php foreach ($items as $key => $value) { ?>
                <!-- service item -->
                <div class="col-lg-4 col-sm-6 mb-5">
                    <div class="card text-center">
                        <div class="card-img-wrapper overlay-rounded-top">
                            <img style="height: 200px; max-width: 370px;" class="card-img-top rounded-0" src="<?=base_url()?>uploads/item_image/<?=$value['slider_img1']?>" alt="service-image">
                        </div>
                        <div class="card-body p-0">
                            <h4 class="card-title pt-3"><?=$value['model_no']?></h4>
                            <p class="card-text mx-2 mb-0">Lorem ipsum dolor amet consecte tur adipisicing elit sed done eius mod tempor enim ad minim veniam
                                quis nostrud.</p>
                            <a href="<?=base_url()?>item/<?=$brand_name?>/<?=$category_name?>/<?=$sub_category_name?>/<?=$value['model_no']?>" class="btn btn-secondary translateY-25">Read More</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<!-- /service -->