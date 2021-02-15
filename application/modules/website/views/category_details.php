<!-- <section class="page-title overlay" style="background-image: url(<?=base_url()?>awedget/frontend/images/background/page-title.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="text-white font-weight-bold">Service Single</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="index.html">Home</a>
                    </li>
                    <li>Service Single</li>
                </ol>
            </div>
        </div>
    </div>
</section> -->

<!-- service single -->
<section class="section">
    <div class="container">
        <div class="row">
            <!-- sidebar -->
            <aside class="col-lg-4 order-lg-1 order-2">
                <!-- service menu -->
                <?=$this->load->view('frontend/_sidebar_menu')?>
            </aside>
            <!-- service single content -->
            <div class="col-lg-8 order-lg-2 order-1">
                <?=$this->load->view('sub_categorys')?>
            </div>
        </div>
    </div>
</section>
<!-- /service single -->