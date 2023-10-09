@inject('provider1', 'App\Http\Controllers\CommonController')
<!DOCTYPE html>
<html lang="zxx">
<!-- Mirrored from demo.dashboardpack.com/finance-html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Sep 2023 10:31:06 GMT -->
<head>

<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<title>Finance</title>
<link rel="icon" href="{{ asset('img/logo.png') }}') }}" type="image/png">

<link rel="stylesheet" href="{{ asset('css/bootstrap1.min.css') }}" />

<link rel="stylesheet" href="{{ asset('vendors/themefy_icon/themify-icons.css') }}" />

<link rel="stylesheet" href="{{ asset('vendors/swiper_slider/css/swiper.min.css') }}" />

<link rel="stylesheet" href="{{ asset('vendors/select2/css/select2.min.css') }}" />

<link rel="stylesheet" href="{{ asset('vendors/niceselect/css/nice-select.css') }}" />

<link rel="stylesheet" href="{{ asset('vendors/owl_carousel/css/owl.carousel.css') }}" />

<link rel="stylesheet" href="{{ asset('vendors/gijgo/gijgo.min.css') }}" />

<link rel="stylesheet" href="{{ asset('vendors/font_awesome/css/all.min.css') }}" />
<link rel="stylesheet" href="{{ asset('vendors/tagsinput/tagsinput.css') }}" />

<link rel="stylesheet" href="{{ asset('vendors/datatable/css/jquery.dataTables.min.css') }}" />
<link rel="stylesheet" href="{{ asset('vendors/datatable/css/responsive.dataTables.min.css') }}" />
<link rel="stylesheet" href="{{ asset('vendors/datatable/css/buttons.dataTables.min.css') }}" />

<link rel="stylesheet" href="{{ asset('vendors/text_editor/summernote-bs4.css') }}" />

<link rel="stylesheet" href="{{ asset('vendors/morris/morris.css') }}">

<link rel="stylesheet" href="{{ asset('vendors/material_icon/material-icons.css') }}" />

<link rel="stylesheet" href="{{ asset('css/metisMenu.css') }}">

<link rel="stylesheet" href="{{ asset('css/style1.css') }}" />

<link rel="stylesheet" href="{{ asset('css/colors/default.css') }}" id="colorSkinCSS">
</head>
<body class="crm_body_bg">



<nav class="sidebar">
<div class="logo d-flex justify-content-between">
<a href="index.html"><img src="{{ asset('img/logo.png') }}') }}" alt></a>
<div class="sidebar_close_icon d-lg-none">
<i class="ti-close"></i>
</div>
</div>
<ul id="sidebar_menu">
<li class="mm-active">
<a class="has-arrow" href="{{URL('dashboard')}}" aria-expanded="false">

<img src="{{ asset('img/menu-icon/1.svg') }}" alt>
<span>Dashboard</span>
</a>
</li>



@foreach($provider1::pages_list() as $dt)
@if((Auth::user()->type=='admin') || ($provider1::check_link($dt->id,Auth::user()->rights)==true))
	<li><a class href="{{ $provider1::check_routes($dt->url_route) }}"><img src="{{ asset('img/menu-icon/2.svg') }}" alt>{{$dt->title}}</a></li>
@endif
@endforeach

</ul>
</nav>

<section class="main_content dashboard_part">

<div class="container-fluid g-0">
<div class="row">
<div class="col-lg-12 p-0">
<div class="header_iner d-flex justify-content-between align-items-center">
<div class="sidebar_icon d-lg-none">
<i class="ti-menu"></i>
</div>
<div class="serach_field-area">
<div class="search_inner">
<form action="#">
<div class="search_field">
<input type="text" placeholder="Search here...">
</div>
<button type="submit"> <img src="{{ asset('img/icon/icon_search.svg') }}" alt> </button>
</form>
</div>
</div>
<div class="header_right d-flex justify-content-between align-items-center">
<div class="header_notification_warp d-flex align-items-center">
<li>
<a href="#"> <img src="{{ asset('img/icon/bell.svg') }}" alt> </a>
</li>
<li>
<a href="#"> <img src="{{ asset('img/icon/msg.svg') }}" alt> </a>
</li>
</div>
<div class="profile_info">
<img src="{{ asset('img/client_img.png') }}" alt="#">
<div class="profile_info_iner">
<p>Welcome {{ ucfirst(Auth::user()->name) }}!</p>
<h5>Travor James</h5>
<div class="profile_info_details">
<a href="#">My Profile <i class="ti-user"></i></a>
<a href="#">Settings <i class="ti-settings"></i></a>
<a href="{{ URL('/logout') }}">Log Out <i class="ti-shift-left"></i></a>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<style type="text/css">
	.sidebar #sidebar_menu li ul li a.active{
		color:blue;
	}
</style>