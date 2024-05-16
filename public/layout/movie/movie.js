$('.select-topview').change(function () {
    
    var topview = $(this).find(':selected').val();
    var id_phim = $(this).attr('id');
    let _token = $('input[name="_token"]').val();

    if (topview == 0) {
        var text = 'Ngày';
    } else if (topview == 1) {
        var text = 'Tuần';
    } else {
        var text = 'Tháng';
    }
    $.ajax({
        url: "/admin/update-topview-phim",
        method: "POST",
        data: { topview: topview, id_phim: id_phim, _token: _token},
        success: function () {
            alert('thay doi phim theo topview '+text+' thanh cong')
        }
    })
});
$('.select-season').change(function()  {
    let season = $(this).find(':selected').val();
    let id_phim = $(this).attr('id');
    let _token = $('input[name="_token"]').val();
    console.log(season,id_phim,_token)
    $.ajax({
        url:"/admin/update-season-phim",
        method:"post",
        data: { season: season, id_phim: id_phim,_token: _token},
        success: function () {
            alert('thay doi phim theo Season '+season+' thanh cong')
        }
    })
});

$(".watch_trailer").click(function (e) {
    e.preventDefault();
    let aid = $(this).attr("href");
    $('html,body').animate({ scrollTop: $(aid).offset().top}, 'slow');
});

$('.select-year').change(function()  {
    let year = $(this).find(':selected').val();
    let id_phim = $(this).attr('id');
    let _token = $('input[name="_token"]').val();
    $.ajax({
        url:"/admin/update-year-movie",
        method:'post',
        data:{year:year,id_phim:id_phim, _token: _token},
        success:()=>{
            alert('Changed Year '+ year + ' Successfully')
        }
    });
})

$('.category_get').change(function()  {
    let category_id = $(this).val();
    let movie_id = $(this).attr('id');
    console.log(movie_id,category_id)
    let _token = $('input[name="_token"]').val();
    $.ajax({
        url:"/admin/update-category-get",
        method:"GET",
        data: { category_id: category_id, movie_id: movie_id, _token: _token},
        success: function () {
            alert('thay doi category theo của movie thanh cong')
        }
    })
});

$('.country_get').change(function()  {
    let country_id = $(this).val();
    let movie_id = $(this).attr('id');
    console.log(movie_id,country_id)
    let _token = $('input[name="_token"]').val();
    $.ajax({
        url:"/admin/update-country-get",
        method:"GET",
        data: { country_id: country_id, movie_id: movie_id, _token: _token},
        success: function () {
            alert('thay doi country theo của movie thanh cong')
        }
    })
});

$('.status_get').change(function()  {
    let status_val = $(this).val();
    let movie_id = $(this).attr('id');
    console.log(movie_id,status_val)
    let _token = $('input[name="_token"]').val();
    $.ajax({
        url:"/admin/update-status-get",
        method:"GET",
        data: { status_val: status_val, movie_id: movie_id, _token: _token},
        success: function () {
            alert('thay doi status theo của movie thanh cong')
        }
    })
});

$('.thuocphim_get').change(function()  {
    let thuocphim_val = $(this).val();
    let movie_id = $(this).attr('id');
    console.log(movie_id,thuocphim_val)
    let _token = $('input[name="_token"]').val();
    $.ajax({
        url:"/admin/update-thuocphim-get",
        method:"GET",
        data: { thuocphim_val: thuocphim_val, movie_id: movie_id, _token: _token},
        success: function () {
            alert('thay doi thuocphim theo của movie thanh cong')
        }
    })
});

$('.hotmovie_get').change(function()  {
    let hotmovie_val = $(this).val();
    let movie_id = $(this).attr('id');
    console.log(movie_id,hotmovie_val)
    let _token = $('input[name="_token"]').val();
    $.ajax({
        url:"/admin/update-hotmovie-get",
        method:"GET",
        data: { hotmovie_val: hotmovie_val, movie_id: movie_id, _token: _token},
        success: function () {
            alert('thay doi hotmovie theo của movie thanh cong')
        }
    })
});

$('.vietsub_get').change(function()  {
    let vietsub_val = $(this).val();
    let movie_id = $(this).attr('id');
    console.log(movie_id,vietsub_val)
    let _token = $('input[name="_token"]').val();
    $.ajax({
        url:"/admin/update-vietsub-get",
        method:"GET",
        data: { vietsub_val: vietsub_val, movie_id: movie_id, _token: _token},
        success: function () {
            alert(`thay doi phim thành ${vietsub_val == 1 ? 'Thuyết minh' : 'Vietsub'} theo của movie thanh cong`)
        }
    })
});

$(document).on('change','.file-image', function () {
    let movie_id = $(this).data('movie_id');
    let image = document.getElementById("file-" + movie_id).files[0];
    let form_data = new FormData();
    form_data.append("file", document.getElementById("file-" + movie_id).files[0]);
    form_data.append("movie_id", movie_id);
    console.log(movie_id,image,form_data);

    $.ajax({
        url:"/admin/update-image-movie-ajax",
        method: "POST",
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: form_data,
        contentType:false,
        cache:false,
        processData:false,
        success: function (data) {
            location.reload();
            $("#success_image").html('<span class="text-success">Cật nhật hình ảnh thành công</span>')
        }
    });

});