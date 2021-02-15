  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer text-center">
    <strong>Copyright &copy; <?=date('Y')?> <a target="_blank" href="<?=base_url()?>">eCommercs Ltd.</a>.</strong>
    All rights reserved.
    <!-- <div class="float-right d-none d-sm-inline-block">
      Version <b>1.0.0</b>
    </div> -->
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery UI 1.11.4 -->
   <script src="<?=base_url()?>awedget/plugins/jquery-ui/jquery-ui.min.js"></script>
   <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?=base_url()?>awedget/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="<?=base_url()?>awedget/plugins/select2/js/select2.full.min.js"></script>
<!-- ChartJS -->
<script src="<?=base_url()?>awedget/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?=base_url()?>awedget/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?=base_url()?>awedget/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?=base_url()?>awedget/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?=base_url()?>awedget/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?=base_url()?>awedget/plugins/moment/moment.min.js"></script>
<script src="<?=base_url()?>awedget/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?=base_url()?>awedget/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?=base_url()?>awedget/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?=base_url()?>awedget/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

<!-- DataTables -->
<script src="<?=base_url()?>awedget/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?=base_url()?>awedget/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

<!-- AdminLTE App -->
<script src="<?=base_url()?>awedget/js/adminlte.js"></script>

<?php if ($this->router->fetch_class('dashboard') == 'dashboard') {?>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?=base_url()?>awedget/js/pages/dashboard.js"></script>
<?php }?>

<!-- AdminLTE for demo purposes -->
<script src="<?=base_url()?>awedget/js/demo.js"></script>
<script src="<?=base_url();?>awedget/js/custom.js"></script>


</body>
</html>
