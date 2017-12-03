<script>
  $('#modal-default').on('show.bs.modal', function(e) {
        if(e.relatedTarget.dataset.id){
          $('#nama_penyakit').val(e.relatedTarget.dataset.nama);
          $('#id_pernyakit').val(e.relatedTarget.dataset.id);
        }
    });
  $("#modal-default").on("hidden.bs.modal", function () {
    $('#nama_penyakit').val('');
    $('#id_pernyakit').val('');
  });
  $('#modal-danger').on('show.bs.modal', function(e) {
          $('#kata').html('Apakah Anda yakin akan menghapus data '+e.relatedTarget.dataset.nama+'?');
          $('#id_pernyakit_del').val(e.relatedTarget.dataset.id);
         
    });
  $("#modal-danger").on("hidden.bs.modal", function () {
    $('#kata').html('');
  });
</script>
</body>
</html>