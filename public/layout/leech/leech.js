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

$('.leech_detail_episode').click(function() {
    let slug = $(this).data('movie_slug');
    $.ajax({
        url: "/watch-leech-detail-episode/" + slug,
        method: "GET",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            slug: slug
        },
        success: function (data) {
            $('#content-title-episode').html(data.content_title_episode);
            $('#content-detail-episode').html(data.content_detail_episode);
        }
    });
});