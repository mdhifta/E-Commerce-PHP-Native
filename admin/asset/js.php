<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="../vendor/assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../vendor/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="../vendor/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../vendor/assets/dist/js/adminlte.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="../vendor/assets/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="../vendor/assets/plugins/raphael/raphael.min.js"></script>
<script src="../vendor/assets/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="../vendor/assets/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="../vendor/assets/plugins/chart.js/Chart.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="../vendor/assets/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../vendor/assets/dist/js/pages/dashboard2.js"></script>


<!-- tabel -->
<!-- DataTables  & Plugins -->
<script src="../vendor/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../vendor/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../vendor/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../vendor/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../vendor/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../vendor/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../vendor/assets/plugins/jszip/jszip.min.js"></script>
<script src="../vendor/assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="../vendor/assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="../vendor/assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../vendor/assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../vendor/assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
