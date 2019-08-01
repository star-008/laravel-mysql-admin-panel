<!--
 * CoreUI - Open Source Bootstrap Admin Template
 * @version  v1.0.6
 * @link  http://coreui.io
 * Copyright (c) 2017 creativeLabs Łukasz Holeczek
 * @license  MIT
 -->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
	<meta name="author" content="Łukasz Holeczek">
	<meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,AngularJS,Angular,Angular2,Angular 2,Angular4,Angular 4,jQuery,CSS,HTML,RWD,Dashboard,React,React.js,Vue,Vue.js">
	<link rel="shortcut icon" href="<?php echo e(asset('img/favicon.png')); ?>">
	<title>APPLY RADSAM</title>

	<!-- Icons -->
	<link href="<?php echo e(asset('css/font-awesome.min.css')); ?>" rel="stylesheet">
	<link href="<?php echo e(asset('css/simple-line-icons.css')); ?>" rel="stylesheet">

	<!-- Main styles for this application -->
	<link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet">
	<!-- Styles required by this views -->
	<link rel="stylesheet" href="<?php echo e(asset('css/custom.css')); ?>">
	<script src="<?php echo e(asset('js/vendor/jquery.min.js')); ?>"></script>
</head>
<!-- BODY options, add following classes to body to change options
'.header-fixed' - Fixed Header
'.brand-minimized' - Minimized brand (Only symbol)
'.sidebar-fixed' - Fixed Sidebar
'.sidebar-hidden' - Hidden Sidebar
'.sidebar-off-canvas' - Off Canvas Sidebar
'.sidebar-minimized'- Minimized Sidebar (Only icons)
'.sidebar-compact'    - Compact Sidebar
'.aside-menu-fixed' - Fixed Aside Menu
'.aside-menu-hidden'- Hidden Aside Menu
'.aside-menu-off-canvas' - Off Canvas Aside Menu
'.breadcrumb-fixed'- Fixed Breadcrumb
'.footer-fixed'- Fixed footer
-->

<body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden">
	<?php echo $__env->make('user.navbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

	<div class="app-body">
		<?php echo $__env->make('user.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

		<!-- Main content -->
		<main class="main">

		<!-- Breadcrumb -->
		<?php echo $__env->make('user.breadcrumb', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

		<?php echo $__env->yieldContent('content'); ?>
		<!-- /.container-fluid -->
		</main>

		<?php echo $__env->make('user.asidemenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

	</div>

	<?php echo $__env->make('panel.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

	<?php echo $__env->make('panel.scripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php echo $__env->yieldContent('myscript'); ?>

</body>
</html>