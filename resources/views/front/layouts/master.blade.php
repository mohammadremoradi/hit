<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link href="https://fonts.googleapis.com/css?family=Quicksand:400,600,700&display=swap" rel="stylesheet"> --}}

    @include('front.layouts.headTag')
    @yield('headTag')

    @foreach ($all_script_langs as $seo)
        @if ($seo->location == 'header')
            {!! $seo->script !!}
        @endif
    @endforeach
    @foreach ($all_scripts as $seo)
        @if ($seo->location == 'header')
            {!! $seo->script !!}
        @endif
    @endforeach

</head>

<body>

    @include('front.layouts.topNav')
    @include('front.layouts.mainNav')


    @yield('content')


    @include('front.layouts.footer')
    @include('front.layouts.script')

    @yield('script')

    @foreach ($all_script_langs as $seo)
        @if ($seo->location == 'script')
            {!! $seo->script !!}
        @endif
    @endforeach
    @foreach ($all_scripts as $seo)
        @if ($seo->location == 'script')
            {!! $seo->script !!}
        @endif
    @endforeach

</body>

</html>
