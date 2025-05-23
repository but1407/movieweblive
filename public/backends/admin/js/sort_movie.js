$(function () {
    $('#sortable_navbar').sortable({
        placeholder: "ui-state-highlight",
        update: function (event, ui) {
            let array_id = [];
            $('.category_position li').each(function () {
                array_id.push($(this).attr('id'));
            })
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/navbar/resorting",
                method: "POST",
                data: { array_id: array_id },
                success: function (data) {
                    alert('Sắp xếp thứ tự navbar thành công');
                }
            });
        }
    });
});

$(function () {
    $('.sortable_movie').sortable({
        placeholder: "ui-state-highlight",
        update: function (event, ui) {
            let movie_arr = [];
            $('.category_position .box_phim').each(function () {
                movie_arr.push($(this).attr('id'));
            })
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/movie/resorting",
                method: "POST",
                data: { movie_arr: movie_arr },
                success: function (data) {
                    alert('Sắp xếp thứ tự navbar thành công');
                }
            });
        }
    });
});