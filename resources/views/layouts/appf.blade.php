<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta Property="og:url" content="{{ asset('') }}">

    @if (Request::segment(1) == '')
    <meta property="og:type" content="article"/>
    @if ($global_option != '0')
    @if ($global_option->logo)
    <meta property="og:image" content="{{ $global_option->imageThumbUrl }}" />
    @endif
    @if ($global_option->webname)
    <meta property="og:title" content="{{ $global_option->webname }}"/>
    @else
    <meta name="og:title"
    content="Sekolah Nusantara">
    @endif
    @if ($global_option->meta_description)
    <meta name="description" content="{{ $global_option->meta_description }}">
    @else
    <meta name="description"
    content="Digital Nusantara, Digital Nusantara Borneo, Borneo, Digital, Nusantara, Kaltim">
    @endif

    @if ($global_option->meta_keywords)
    <meta name="keywords" content="{{ $global_option->meta_keywords }}">
    @else
    <meta name="keywords"
    content="Digital Nusantara, Digital Nusantara Borneo, Borneo, Digital, Nusantara, Kaltim">
    @endif
    @if ($global_option->favicon)
    <link rel="icon" href="{{ asset('') }}uploads/images/logo/{{ $global_option->favicon }}" rel="icon">
    @else
    <link rel="icon" href="{{ asset('') }}uploads/images/logo/favicon.png" rel="icon">
    @endif
    @elseif ($global_option == '0')
    <meta name="description"
    content="Digital Nusantara, Digital Nusantara Borneo, Borneo, Digital, Nusantara, Kaltim">
    <meta name="keywords" content="Kodir Zaelani, digital nusantara, digtal ">
    <link rel="icon" href="{{ asset('') }}uploads/images/logo/favicon.png">
    @endif
    @elseif (Request::segment(1) == 'posts')
    {{-- {{ Request::segment(1) }} --}}

    <meta property="og:title" content="{{ $global_option->webname }}"/>
    <meta name="description" content="{{$post->created_at}}" />
    <meta property="og:title" content="{{ $post->title }}" />
    <meta name="description" content="{{ $global_option->meta_description }}" />
    <meta property="og:url" content="{{ asset('') }}posts/detail/{{ $post->slug }}" />
    @if ($post->image)
    <meta property="og:image" content="{{ $post->imageUrl }}" />
    @else
    <meta property="og:image" content="{{ asset('assets/icons/ic-logo.png')}}" />
    @endif
    <meta property="og:type" content="article" />

    <title>Islamic Center Kaltim | {{ $post->title }}</title>
    @endif
    @if ($global_option != '0')

    @if ($global_option->meta_description)
    <meta name="description" content="{{ $global_option->meta_description }}">
    @else
    <meta name="description"
    content="Digital Nusantara, Digital Nusantara Borneo, Borneo, Digital, Nusantara, Kaltim">
    @endif

    @if ($global_option->meta_keywords)
    <meta name="keywords" content="{{ $global_option->meta_keywords }}">
    @else
    <meta name="keywords"
    content="Digital Nusantara, Digital Nusantara Borneo, Borneo, Digital, Nusantara, Kaltim">
    @endif
    @if ($global_option->favicon)
    <link rel="icon" href="{{ asset('') }}uploads/images/logo/{{ $global_option->favicon }}" rel="icon">
    @else
    <link rel="icon" href="{{ asset('') }}uploads/images/logo/favicon.png" rel="icon">
    @endif
    @elseif ($global_option == '0')
    <meta name="description"
    content="Digital Nusantara, Digital Nusantara Borneo, Borneo, Digital, Nusantara, Kaltim">
    <meta name="keywords" content="Kodir Zaelani, digital nusantara, digtal ">
    <link rel="icon" href="{{ asset('') }}uploads/images/logo/favicon.png">
    @endif
    <title>{{ $title ?? config('app.name', 'Teras Petani') }}</title>

    {{-- <link href="{{asset('')}}assets/frontend/img/favicon.png" rel="icon"> --}}
    {{-- <link href="{{asset('')}}assets/frontend/img/apple-touch-icon.png" rel="apple-touch-icon"> --}}

    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <link href="{{asset('')}}assets/frontend/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('')}}assets/frontend/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="{{asset('')}}assets/frontend/vendor/aos/aos.css" rel="stylesheet">
    <link href="{{asset('')}}assets/frontend/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="{{asset('')}}assets/frontend/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <link href="{{asset('')}}assets/frontend/css/main.css" rel="stylesheet">

</head>

<body class="index-page">
    @include('frontend.partials.header')
    <main class="main">
        @yield('content')
    </main>
    @include('frontend.partials.footer')

    <script src="{{asset('')}}assets/frontend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('')}}assets/frontend/vendor/php-email-form/validate.js"></script>
    <script src="{{asset('')}}assets/frontend/vendor/aos/aos.js"></script>
    <script src="{{asset('')}}assets/frontend/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="{{asset('')}}assets/frontend/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="{{asset('')}}assets/frontend/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="{{asset('')}}assets/frontend/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="{{asset('')}}assets/frontend/vendor/isotope-layout/isotope.pkgd.min.js"></script>

    <!-- Main JS File -->
    <script src="{{asset('')}}assets/frontend/js/main.js"></script>

</body>

</html>
