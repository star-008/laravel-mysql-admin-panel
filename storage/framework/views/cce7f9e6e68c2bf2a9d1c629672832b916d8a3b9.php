<header class="app-header navbar">
	<button class="navbar-toggler mobile-sidebar-toggler d-lg-none mr-auto" type="button">
		<span class="navbar-toggler-icon"></span>
	</button>
	<a class="logo" href="#">
		<img src="<?php echo e(asset('img/favicon.png')); ?>" class="logo-icon">
		<span class="logo-span">
			APPLY RADSAM
		</span>
	</a>
	<button class="navbar-toggler sidebar-toggler d-md-down-none" type="button">
		<span class="navbar-toggler-icon"></span>
	</button>






	<ul class="nav navbar-nav d-md-down-none">
		
		<li class="nav-item px-3">
			<!-- <a class="nav-link" href="/sample/dashboard">Samples</a> -->
		</li>
	</ul>
	<ul class="nav navbar-nav ml-auto" style="    padding-right: 20px;">
    
		<li class="nav-item dropdown">
			<a class="nav-link nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
				<img src="<?php echo e(asset('img/avatars/6.jpg')); ?>" class="img-avatar" alt="admin@bootstrapmaster.com">
			</a>
			<div class="dropdown-menu dropdown-menu-right">
				<div class="dropdown-header text-center">
					<strong>User's Account</strong>
				</div>
        
				<a class="dropdown-item" href="<?php echo e(route('logout')); ?>" 
					onclick="event.preventDefault(); 
					document.getElementById('logout-form').submit();">
					<i class="fa fa-lock"></i> Logout </a>
			</div>
		</li>
		<li class="nav-item d-md-down-none">
			<a class="nav-link" href="#"><i class="icon-settings"></i></a>
		</li>
		<li class="nav-item d-md-down-none">
			<a id="show-recent-messages" class="nav-link" href="/"><i class="icon-bell"></i><span id="alarm" class="badge badge-pill badge-danger"></span></a>
		</li>
	</ul>

	<form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
		<?php echo e(csrf_field()); ?>

	</form>
</header>
