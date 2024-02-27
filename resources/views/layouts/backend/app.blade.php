<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/backend/image/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('assets/backend/img/favicon.png') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <title>
        Sky Dancing Hosting
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('assets/backend/css/nucleo-icons.css') }}"  />
    <link href="{{ asset('assets/backend/css/nucleo-svg.css') }} " rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="{{ asset('assets/backend/css/nucleo-svg.css') }} " rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('assets/backend/css/argon-dashboard.css?v=2.0.5') }}"  rel="stylesheet" />

    <style>
        #toast-container .toast-error{
            background-color: #333; /* Dark background color */
        }

        #toast-container .toast-success{
            background-color: #333; /* Dark background color */
        }
        #toast-container .toast-title {
            color: blue; /* Orange color for title */
            font-weight: bold; /* Bold font weight for title */
        }

        #toast-container .toast-message {
            color: white; /* Green color for message */
            font-style: italic; /* Italic font style for message */
        }
    </style>
    @stack('css')

</head>

<body class="g-sidenav-show   bg-gray-100">

@include('layouts.backend.partails.navbar')

<!-- #Top Bar -->
<main class="main-content position-relative border-radius-lg ">

    @include('layouts.backend.partails.leftsidebar')
    @yield('content')
    @include('layouts.backend.partails.footer')
</main>
@include('layouts.backend.partails.settings')

<script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>
<script src="{{ asset('assets/backend/js/core/popper.min.js') }}"></script>
<script src="{{ asset('assets/backend/js/core/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/backend/js/plugins/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('assets/backend/js/plugins/smooth-scrollbar.min.js') }}"></script>
<script src="{{ asset('assets/backend/js/plugins/fullcalendar.min.js') }} "></script>
<!-- Kanban scripts -->
<script src="{{ asset('assets/backend/js/plugins/dragula/dragula.min.js') }}"></script>
<script src="{{ asset('assets/backend/js/plugins/jkanban/jkanban.js') }} "></script>
<script src="{{ asset('assets/backend/js/plugins/chartjs.min.js') }} "></script>
<script async defer src="https://buttons.github.io/buttons.js"></script>
<script src="{{ asset('assets/backend/js/argon-dashboard.min.js?v=2.0.5') }}"></script>
<script src="{{ asset('assets/backend/js/plugins/choices.min.js') }}" ></script>
<script src="{{ asset('assets/backend/js/plugins/quill.min.js') }}" ></script>
<script src="{{ asset('assets/backend/js/plugins/flatpickr.min.js') }}" ></script>
<script src="{{ asset('assets/backend/js/plugins/dropzone.min.js') }}" ></script>
<script src="{{ asset('assets/backend/js/plugins/datatables.js') }} "></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
<script src="{{ asset('assets/backend/js/plugins/multistep-form.js') }}" ></script>


{!! Toastr::message() !!}

<script>
    @if($errors->any())
    @foreach($errors->all() as $error)
    toastr.error('{{ $error }}','Error',{
        closeButton:true,
        progressBar:true,
    });
    @endforeach
    @endif
</script>

@stack('js')
</body>
</html>
