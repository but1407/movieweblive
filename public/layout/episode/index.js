$('.select_movie').change(function(){
    let id = $(this).val();
    $.ajax({
        url: '/select-movie',
        method: "GET",
        data: { id:id },
        success: function (data) {
            $('#show_movie').html(data)
        }
    })
}) 