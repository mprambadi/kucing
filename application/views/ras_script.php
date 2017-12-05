<script>
  $('#modal-default').on('show.bs.modal', function(e) {
        if(e.relatedTarget.dataset.id){
          $('#nama_ras').val(e.relatedTarget.dataset.nama);
          $('#id_ras').val(e.relatedTarget.dataset.id);
        }
    });
  $("#modal-default").on("hidden.bs.modal", function () {
    $('#nama_ras').val('');
    $('#id_ras').val('');
  });
  $('#modal-danger').on('show.bs.modal', function(e) {
          $('#kata').html('Apakah Anda yakin akan menghapus data '+e.relatedTarget.dataset.nama+'?');
          $('#id_ras_del').val(e.relatedTarget.dataset.id);
         
    });
  $("#modal-danger").on("hidden.bs.modal", function () {
    $('#kata').html('');
  });
</script>
</body>
</html>