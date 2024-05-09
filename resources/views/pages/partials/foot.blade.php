<script type='text/javascript' src='{{ asset('layout/js/bootstrap.min.js?ver=5.7.2') }}' id='bootstrap-js'></script>
<script type='text/javascript' src='{{ asset('layout/js/owl.carousel.min.js?ver=5.7.2') }}' id='carousel-js'></script>

<script type='text/javascript' src='{{ asset('layout/js/halimtheme-core.min.js?ver=1626273138') }}' id='halim-init-js'>
</script>

<script src="{{ asset('layout/home/home.css') }}"></script>

<script type='text/javascript'>
    $(document).ready(() => {
        $('#search').keyup(() => {
            $('#result').html('');
            var search = $('#search').val();
            if (search != '') {
                $('#result').css('display', 'inherit');

                var expression = new RegExp(search, 'i');
                $.getJSON('/json/movies.json', (data) => {
                    $.each(data, (key, value) => {
                        // alert(2)
                        if (value.title.search(expression) != -1) {
                            $('#result').append(
                                '<li class="list-group-item" style="cursor:pointer"><image height="40" width="40" src="/uploads/movie/' +
                                value.image + '" />' + value.title +
                                '<br/> | <span>' + value.description +
                                '</span></li>')
                        }
                    })
                })
            } else {
                $('#result').css('display', 'none');
            }
        })
        $('#result').on('click', 'li', () => {
            var click_test = $(this).text().split('|');
            $('#search').val($.trim(click_test[0]));
            $('#result').html('')
            $('#result').css('display', 'none');

        })
    })
</script>

@yield('js')
