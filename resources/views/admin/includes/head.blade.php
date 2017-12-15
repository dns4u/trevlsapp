<!-- Mirrored from 198.74.61.72/themes/preview/'ace/index.html by HTTrack Website Copier/3.x [XR&CO'2013], Fri, 28 Feb 2014 17:45:31 GMT -->
<head>
    <meta charset="utf-8" />
    <title>@yield('title')</title>

    <meta name="description" content="overview &amp; stats" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- basic styles -->

    <link href="{{asset('ace/assets/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('ace/assets/css/font-awesome.min.css')}}" />

    <!--[if IE 7]>
    <link rel="stylesheet" href="{{asset('ace/assets/css/font-awesome-ie7.min.css')}}"/>
    <![endif]-->

    <!-- page specific plugin styles -->

    <!-- fonts -->

    <link rel="stylesheet" href="{{asset('ace/assets/css/ace-fonts.css')}}" />

    <!-- ace styles -->

    <link rel="stylesheet" href="{{asset('ace/assets/css/ace.min.css')}}" />
    <link rel="stylesheet" href="{{asset('ace/assets/css/ace-rtl.min.css')}}" />
    <link rel="stylesheet" href="{{asset('ace/assets/css/ace-skins.min.css')}}" />

    <!--[if lte IE 8]>
    <link rel="stylesheet" href="{{asset('ace/assets/css/ace-ie.min.css')}}" />

    <![endif]-->
@yield('css')
    <!-- inline styles related to this page -->

    <!-- ace settings handler -->

    <script src="{{asset('ace/assets/js/ace-extra.min.js')}}"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!--[if lt IE 9]>
    <script src="{{asset('ace/assets/js/html5shiv.js')}}"></script>
    <script src="{{asset('assets/js/respond.min.js')}}"></script>
    <![endif]-->
</head>