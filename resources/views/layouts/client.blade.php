<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
    <link rel="stylesheet" href="{{ asset('clients/index/app.css') }}" />
    <link rel="stylesheet" href="{{ asset('clients/index/fonts.css') }}" />
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.icon') }}" />
    @yield('css')
</head>

<body id="@yield('page-id')">
    {{-- Header --}}
    @include('client.partials.header')
    {{-- Content --}}
    @yield('content')
    {{-- Footer --}}
    @include('client.partials.footer')
    {{-- JQuery --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    {{-- Handle js --}}
    <script src="{{ asset('clients/index/flickity.pkgd.min.js') }}"></script>

    <script src="{{ asset('clients/index/_main.js') }}"></script>
    <script>
        $(document).ready(function() {

            $('.search_info').keyup(function() {
                let _text = $(this).val();
                let _html = '';
                if (_text) {
                    $.ajax({
                        url: "{{ route('ajax-search-product') }}?key=" + _text,
                        type: 'GET',
                        success: function(res) {
                            if (res.length > 0) {
                                $.each(res, function(index, item) {
                                    let urlSearch = `{{ route('client.detail', '') }}` +
                                        '/' + item.id;
                                    _html +=
                                        `
                                            <li>
                                                <a href="${urlSearch}" class="result">
                                                    <img src="${item.feature_image_path}" alt="${item.feature_image_name}" class="result-img">
                                                    <div class="result-info">
                                                        <p class="name">${item.name}</p>
                                                        <p class="desc">${item.content}</p>
                                                    </div>
                                                </a>
                                            </li>
                                        `;
                                })

                                $('.search-ajax-result').html(_html);
                                $('.search-ajax-result').show();
                            } 
                        }
                    })
                } else {
                    $('.search-ajax-result').hide();
                }
            })

            $(document).on("click", function(e) {
                e.stopPropagation();
                __item = $('.search-ajax-result')
                __item.hide();
            });
        })
    </script>
    @yield('js')
</body>

</html>
