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
<script src="<?=base_url()?>assets/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script>
  $(document).ready(function () {
     console.log(5);
    $('.sidebar-menu').tree();
    $('#data_table').DataTable();
    
  });
  // $('#modal-default').on('show.bs.modal', function(e) {
  //       if(e.relatedTarget.dataset.id){
  //         $('#nama_penyakit').val(e.relatedTarget.dataset.nama);
  //         $('#id_pernyakit').val(e.relatedTarget.dataset.id);
  //       }
  //   });
  // $("#modal-default").on("hidden.bs.modal", function () {
  //   $('#nama_penyakit').val('');
  //   $('#id_pernyakit').val('');
  // });
  // $('#modal-danger').on('show.bs.modal', function(e) {
  //         $('#kata').html('Apakah Anda yakin akan menghapus data '+e.relatedTarget.dataset.nama+'?');
  //         $('#id_pernyakit').val('');
         
  //   });
  // $("#modal-danger").on("hidden.bs.modal", function () {
  //   $('#kata').html('');
  // });
</script>

