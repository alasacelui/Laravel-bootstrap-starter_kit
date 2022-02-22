    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
	
	<!-- Fonts -->
	<link type="text/css" href="{{ asset('assets/css/utils/mainfont.css') }}" rel="stylesheet" />
    
    {{--Style Sheet--}}
	<link href="{{ asset('css/shared/app.css') }}" rel="stylesheet">
	<link href="{{ asset('css/shared/styles.css') }}" rel="stylesheet">

	{{--Favicon--}}
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('img/favicon/site.webmanifest') }}">

	{{--FA--}}
	<link rel="stylesheet" href="{{ asset('assets/css/utils/fa/css/all.min.css') }}"/>

	{{--FP--}}
	<link href="{{ asset('assets/css/utils/filepond.css') }}" rel="stylesheet" />

	{{--DataTables--}}
	<link href="{{ asset('assets/css/utils/datatables.bootstrap5.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('assets/css/utils/datatables.rowReorder.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('assets/css/utils/datatables.responsive.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('assets/css/utils/buttons.bootstrap5.min.css') }}" rel="stylesheet" />

	{{--Select--}}
	<link href="{{ asset('assets/css/utils/select2.min.css') }}" rel="stylesheet" />

	{{--notif--}}
	<link href="{{ asset('assets/css/utils/toastr.min.css') }}" rel="stylesheet" />
