$('select-topview').change(() => {
    var topview = $(this).find(':selected').val();
    var id_phim = $(this).attr('id');
    if (topview == 0) {
        var text = 'Ngày';
    } else if (topview == 1) {
        var text = 'Tháng';
    } else {
        var text = 'Năm';
    }
    $.ajax({
        url: "{{url('update-topview-phim')}}",
        method: "GET",
        data: { topview: topview, id_phim: id_phim },
        success: function () {
            alert('thay doi phim theo topview '+text+'thanh cong')
        }
    })
});