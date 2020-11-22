<?php if(!class_exists('Rain\Tpl')){exit;}?><footer class="main-footer">
    <strong>Copyright &copy; 2014-2020 <a href="#">WPL Estudos</a>.</strong>
    Desenvolvido por Lucas WPL.
    <div class="float-right d-none d-sm-inline-block"> 
      <b>Versão</b> <?php echo htmlspecialchars( $versao, ENT_COMPAT, 'UTF-8', FALSE ); ?>
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="/sistema/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/sistema/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="/sistema/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/sistema/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/sistema/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/sistema/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="/sistema/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/sistema/dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
  });
</script>
</body>
</html>