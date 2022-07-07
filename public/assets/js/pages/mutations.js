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
$('.updatemutation').click(function () {
    $('.modal-title').html('Change Mutation')
    $('.modal-footer button[type=submit]').html('Change')
    var id = $(this).attr('data-id');
    $('.mutationsupdatecreat').attr('action', '/mutation/update/'.concat(id))
    $.ajax({
        url: "/mutation/getdatabyid/".concat(id),
        dataType: "json",
        success: function (data) {
            var data1 = data[0];
            $('.user_id').val(data1.user_id);
            $('.categori_id').val(data1.categori_id);
            $('.amount').val(data1.amount);
            $('.date').val(data1.date);
            $('.status').val(data1.status);
            $('.description').val(data1.description);
        }
    });
});
$('.addmutations').click(function () {
    $('.modal-title').html('Add Mutation')
    $('.modal-footer button[type=submit]').html('Save')
    $('.mutationsupdatecreat').attr('action', '/mutation/store')
    $('.categori_id').val(null);
    $('.amount').val(null);
    $('.date').val(null);
    $('.status').val(null);
    $('.description').val(null);

});
