<link rel="stylesheet" href="<?=base_url()?>awedget/plugins/fontawesome-free/css/all.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="<?=base_url()?>awedget/css/adminlte.min.css">
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

<!-- jQuery -->
<script src="<?=base_url()?>awedget/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript">var hostname='<?php echo base_url();?>';</script>

<!-- Custom Style -->
<link rel="stylesheet" href="<?=base_url()?>awedget/css/custom.css">

<!-- Sidebar Menu -->
<?php
// For Localhost
  $brand=''; $cat=''; $subcat='';
  $uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
  $uri_segments = explode('/', $uri_path);
  if($uri_segments[2]=='brand'){
    $brand = urldecode($uri_segments[3]);
  }elseif ($uri_segments[2]=='category') {      
    $brand = urldecode($uri_segments[3]);
    $cat = urldecode($uri_segments[4]);
  }elseif ($uri_segments[2]=='sub_category') {
    $brand = urldecode($uri_segments[3]);
    $cat = urldecode($uri_segments[4]);
    $subcat =urldecode($uri_segments[5]);
  }elseif ($uri_segments[2]=='item') {
    $brand = urldecode($uri_segments[3]);
    $cat = urldecode($uri_segments[4]);
    $subcat =urldecode($uri_segments[5]);
  }
  // print_r($subcat);exit();
?>
<?php
// For Server
  /*$brand=''; $cat=''; $subcat='';
  $uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
  $uri_segments = explode('/', $uri_path);
  if($uri_segments[1]=='brand'){
    $brand = urldecode($uri_segments[2]);
  }elseif ($uri_segments[1]=='category') {
    $brand = urldecode($uri_segments[2]);
    $cat = urldecode($uri_segments[3]);
  }elseif ($uri_segments[1]=='sub_category') {
    $brand = urldecode($uri_segments[2]);
    $cat = urldecode($uri_segments[3]);
    $subcat =urldecode($uri_segments[4]);
  }elseif ($uri_segments[1]=='item') {
    $brand = urldecode($uri_segments[2]);
    $cat = urldecode($uri_segments[3]);
    $subcat =urldecode($uri_segments[4]);
    $itm =urldecode($uri_segments[5]);
  }*/
?>
<nav class="mt-2">
<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

  <li class="nav-header text-center text-lg">Products</li>
  <?php foreach ($products as $key => $value) { 
      $brandMenu = $value['brand_name']==$brand?'menu-open':'';
    ?>
  <li class="nav-item has-treeview <?=$brandMenu?>">
    <a href="<?=base_url()?>brand/<?=$value['brand_name']?>" class="nav-link active">
      <p><?=$value['brand_name']?>
        <i class="right fas fa-angle-left"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
      <?php foreach ($value['cats'] as $key2 => $value2) {
        $catMenu = $value2['category_name']==$cat?'menu-open':'';
        ?>
      <li class="nav-item <?=$catMenu?>">
        <a href="<?=base_url()?>category/<?=$value['brand_name']?>/<?=$value2['category_name']?>" class="nav-link">
          <!-- <i class="far fa-circle nav-icon"></i> -->
          <p><?=$value2['category_name']?></p>
        </a>
        <ul class="nav nav-treeview">
          <?php foreach ($value2['sub_cats'] as $key3 => $value3) {
            $subCatMenu = $value3['sub_category_name']==$subcat?'menu-open':'';
            ?>
          <li class="nav-item <?=$subCatMenu?>">
            <a href="<?=base_url()?>sub_category/<?=$value['brand_name']?>/<?=$value2['category_name']?>/<?=$value3['sub_category_name']?>" class="nav-link">
              <!-- <i class="far fa-dot-circle nav-icon"></i> -->
              <p><?=$value3['sub_category_name']?></p>
            </a>
            <ul class="nav nav-treeview">
              <?php if($value3['items']) {?>
                <?php foreach ($value3['items'] as $key4 => $value4) {?>
                <li class="nav-item">
                    <a href="<?=base_url()?>item/<?=$value['brand_name']?>/<?=$value2['category_name']?>/<?=$value3['sub_category_name']?>/<?=$value4['model_no']?>" class="nav-link">
                    <!-- <i class="far fa-dot-circle nav-icon"></i> -->
                    <p><?=$value4['model_no']?></p>
                    </a>
                </li>
                <?php } ?>
                <?php } else { ?>
                    <label style="color:red;">No Item Found!</label>
                    <?php } ?>
            </ul>
          </li>
          <?php } ?>
        </ul>
      </li>
      <?php } ?>
    </ul>
  </li>
  <?php } ?>
  <!-- <li class="nav-item has-treeview">
    <a href="javascript:;" class="nav-link active">
      <i class="nav-icon fas fa-circle"></i>
      <p>
        Level 1
        <i class="right fas fa-angle-left"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p>
            Level 2
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="far fa-dot-circle nav-icon"></i>
              <p>Level 3</p>
            </a>
          </li>
        </ul>
      </li>
    </ul>
  </li> -->
</ul>
</nav>
<!-- /.sidebar-menu -->


<!-- jQuery UI 1.11.4 -->
<script src="<?=base_url()?>awedget/plugins/jquery-ui/jquery-ui.min.js"></script>
   <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- AdminLTE App -->
<!-- <script src="<?=base_url()?>awedget/js/adminlte.js"></script> -->

<!-- AdminLTE for demo purposes -->
<script src="<?=base_url();?>awedget/js/custom.js"></script>