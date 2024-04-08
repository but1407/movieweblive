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
$('select-season').change(() => {
    var season = $(this).find(':selected').val();
    var id_phim = $(this).attr('id');
    var _token =$('input[name="_token"]').val();
    
    $.ajax({
        url: "{{url('update-season-phim')}}",
        method: "POST",
        data: { season: season, id_phim: id_phim,_token: _token},
        success: function () {
            alert('thay doi phim theo Season '+season+'thanh cong')
        }
    })
});

$(".watch_trailer").click(function (e) {
    e.preventDefault();
    var aid = $(this).attr("href");
    $('html,body').animate({ scrollTop: $(aid).offset().top}, 'slow');
});