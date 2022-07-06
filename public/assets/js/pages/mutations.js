
function deleted(id) {
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this  file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
         window.location.href = '/mutation/drop/'.concat(id)
        }
      });
}