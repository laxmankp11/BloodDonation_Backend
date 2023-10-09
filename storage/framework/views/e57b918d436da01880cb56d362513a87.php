<?php $provider1 = app('App\Http\Controllers\CommonController'); ?>

<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from demo.dashboardpack.com/finance-html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Sep 2023 10:31:06 GMT -->
<head>

<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<title>Finance</title>
<link rel="icon" href="<?php echo e(asset('img/logo.png')); ?>') }}" type="image/png">

<link rel="stylesheet" href="<?php echo e(asset('css/bootstrap1.min.css')); ?>" />

<link rel="stylesheet" href="<?php echo e(asset('vendors/themefy_icon/themify-icons.css')); ?>" />

<link rel="stylesheet" href="<?php echo e(asset('vendors/swiper_slider/css/swiper.min.css')); ?>" />

<link rel="stylesheet" href="<?php echo e(asset('vendors/select2/css/select2.min.css')); ?>" />

<link rel="stylesheet" href="<?php echo e(asset('vendors/niceselect/css/nice-select.css')); ?>" />

<link rel="stylesheet" href="<?php echo e(asset('vendors/owl_carousel/css/owl.carousel.css')); ?>" />

<link rel="stylesheet" href="<?php echo e(asset('vendors/gijgo/gijgo.min.css')); ?>" />

<link rel="stylesheet" href="<?php echo e(asset('vendors/font_awesome/css/all.min.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('vendors/tagsinput/tagsinput.css')); ?>" />

<link rel="stylesheet" href="<?php echo e(asset('vendors/datatable/css/jquery.dataTables.min.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('vendors/datatable/css/responsive.dataTables.min.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('vendors/datatable/css/buttons.dataTables.min.css')); ?>" />

<link rel="stylesheet" href="<?php echo e(asset('vendors/text_editor/summernote-bs4.css')); ?>" />

<link rel="stylesheet" href="<?php echo e(asset('vendors/morris/morris.css')); ?>">

<link rel="stylesheet" href="<?php echo e(asset('vendors/material_icon/material-icons.css')); ?>" />

<link rel="stylesheet" href="<?php echo e(asset('css/metisMenu.css')); ?>">

<link rel="stylesheet" href="<?php echo e(asset('css/style1.css')); ?>" />

<link rel="stylesheet" href="<?php echo e(asset('css/colors/default.css')); ?>" id="colorSkinCSS">
</head>
<body class="crm_body_bg">



<nav class="sidebar">
<div class="logo d-flex justify-content-between">
<a href="index.html"><img src="<?php echo e(asset('img/logo.png')); ?>') }}" alt></a>
<div class="sidebar_close_icon d-lg-none">
<i class="ti-close"></i>
</div>
</div>
<ul id="sidebar_menu">
<li class="mm-active">
<a href="#" aria-expanded="false">

<img src="<?php echo e(asset('img/menu-icon/1.svg')); ?>" alt>
<span>Dashboard</span>
</a>
<!-- <ul>
<li><a class="active" href="index.html">Classic</a></li>
<li><a href="index_2.html">Minimal</a></li>
</ul> -->
</li>


<!-- <li><a class="nav-link" href="<?php echo e(route('register')); ?>">Add Sub Admin</a></li> -->
<li><a class href="<?php echo e(route('list_sub_admin')); ?>"><img src="<?php echo e(asset('img/menu-icon/2.svg')); ?>" alt>Manage Sub Admin</a></li>
<li><a class href="<?php echo e(route('list_pages')); ?>"><img src="<?php echo e(asset('img/menu-icon/2.svg')); ?>" alt>Manage Pages</a></li>
<?php $__currentLoopData = $provider1::pages_list(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<li><a class href="<?php echo e(route('list_sub_admin')); ?>"><img src="<?php echo e(asset('img/menu-icon/2.svg')); ?>" alt><?php echo e($dt->title); ?></a></li>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<!-- <li class>
<a class="has-arrow" href="#" aria-expanded="false">
<img src="<?php echo e(asset('img/menu-icon/3.svg')); ?>" alt>
<span>Applications</span>
</a>
<ul>
<li><a href="mail_box.html">Mail Box</a></li>
<li><a href="chat.html">Chat</a></li>
<li><a href="faq.html">FAQ</a></li>
</ul>
</li>
<li class>
<a class="has-arrow" href="#" aria-expanded="false">
<img src="<?php echo e(asset('img/menu-icon/4.svg')); ?>" alt>
<span>UI Component</span>
</a>
<ul>
<li><a href="#">Elements</a>
<ul>
<li><a href="buttons.html">Buttons</a></li>
<li><a href="dropdown.html">Dropdowns</a></li>
<li><a href="Badges.html">Badges</a></li>
<li><a href="Loading_Indicators.html">Loading Indicators</a></li>
</ul>
</li>
<li><a href="#">Components</a>
<ul>
<li><a href="notification.html">Notifications</a></li>
<li><a href="progress.html">Progress Bar</a></li>
<li><a href="carousel.html">Carousel</a></li>
<li><a href="cards.html">cards</a></li>
<li><a href="Pagination.html">Pagination</a></li>
</ul>
</li>
</ul>
</li>
<li class>
<a class="has-arrow" href="#" aria-expanded="false">
<img src="<?php echo e(asset('img/menu-icon/5.svg')); ?>" alt>
<span>Widgets</span>
</a>
<ul>
<li><a href="chart_box_1.html">Chart Boxes 1</a></li>
<li><a href="profilebox.html">Profile Box</a></li>
</ul>
</li>
<li class>
<a class="has-arrow" href="#" aria-expanded="false">
<img src="<?php echo e(asset('img/menu-icon/6.svg')); ?>" alt>
<span>Forms</span>
</a>
<ul>
<li><a href="#">Elements</a>
<ul>
<li><a href="data_table.html">Data Tables</a></li>
<li><a href="bootstrap_table.html">Grid Tables</a></li>
<li><a href="datepicker.html">Date Picker</a></li>
</ul>
</li>
<li><a href="#">Widgets</a>
<ul>
<li><a href="Input_Selects.html">Input Selects</a></li>
<li><a href="Input_Mask.html">Input Mask</a></li>
</ul>
</li>
</ul>
</li>
<li class>
<a class="has-arrow" href="#" aria-expanded="false">
<img src="<?php echo e(asset('img/menu-icon/7.svg')); ?>" alt>
<span>Charts</span>
</a>
<ul>
<li><a href="chartjs.html">ChartJS</a></li>
<li><a href="apex_chart.html">Apex Charts</a></li>
<li><a href="chart_sparkline.html">chart sparkline</a></li>
</ul>
</li> -->
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
<button type="submit"> <img src="<?php echo e(asset('img/icon/icon_search.svg')); ?>" alt> </button>
</form>
</div>
</div>
<div class="header_right d-flex justify-content-between align-items-center">
<div class="header_notification_warp d-flex align-items-center">
<li>
<a href="#"> <img src="<?php echo e(asset('img/icon/bell.svg')); ?>" alt> </a>
</li>
<li>
<a href="#"> <img src="<?php echo e(asset('img/icon/msg.svg')); ?>" alt> </a>
</li>
</div>
<div class="profile_info">
<img src="<?php echo e(asset('img/client_img.png')); ?>" alt="#">
<div class="profile_info_iner">
<p>Welcome <?php echo e(ucfirst(Auth::user()->name)); ?>!</p>
<!-- <h5>Travor James</h5> -->
<div class="profile_info_details">
<a href="#">My Profile <i class="ti-user"></i></a>
<a href="#">Settings <i class="ti-settings"></i></a>
<a href="<?php echo e(URL('/logout')); ?>">Log Out <i class="ti-shift-left"></i></a>
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
</style><?php /**PATH /var/www/html/BloodDonation_Backend/resources/views/admin/include/admin_header.blade.php ENDPATH**/ ?>