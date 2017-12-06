<script>
  $('#modal-default').on('show.bs.modal', function(e) {
        if(e.relatedTarget.dataset.id){
          $('#username').val(e.relatedTarget.dataset.nama);
          $('#password').val(e.relatedTarget.dataset.password);
          $('#id_user').val(e.relatedTarget.dataset.id);
        }
    });
  $("#modal-default").on("hidden.bs.modal", function () {
    $('#username').val('');
    $('#password').val('');
    $('#id_user').val('');
  });
  $('#modal-danger').on('show.bs.modal', function(e) {
          $('#kata').html('Apakah Anda yakin akan menghapus data '+e.relatedTarget.dataset.nama+'?');
          $('#id_user_del').val(e.relatedTarget.dataset.id);
         
    });
  $("#modal-danger").on("hidden.bs.modal", function () {
    $('#kata').html('');
  });
</script>
</body>
</html>