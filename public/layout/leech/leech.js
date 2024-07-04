$('.leech_detail').click(function() {
    let slug = $(this).data('movie_slug');
    $.ajax({
        url: "/watch-leech-detail/" + slug,
        method: "GET",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            slug: slug
        },
        success: function (data) {
            $('#content-title').html(data.content_title);
            $('#content-detail').html(data.content_detail);
        }
    });
});