</div>
        <!-- /.box-body -->
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?=base_url()?>assets/js/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>assets/js/datatables.min.js"></script>
<script src="<?=base_url()?>assets/datatables/print/dataTables.buttons.min.js
"></script>
<script src="<?=base_url()?>assets/datatables/print/buttons.print.min.js
"></script>
<script src="<?=base_url()?>assets/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script>
  $(document).ready(function () {
     console.log(5);
    $('.sidebar-menu').tree();
    $('#data_table').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'print'
        ]
    });
    
  });
</script>

