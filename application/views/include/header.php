<!DOCTYPE html>
<html lang="en">
<head>
   <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="description" content="">
   <meta name="keywords" content="">
   <meta name="author" content="">

   <title>QR Video</title>
	<link href='http://fonts.googleapis.com/css?family=Fredoka+One|Maven+Pro:400,900' rel='stylesheet' type='text/css'>
   <link href="<?= base_url('assets/css/bootstrap.default.min.css') ?>" rel="stylesheet">
   <link href="<?= base_url('assets/css/bootstrap-responsive.min.css') ?>" rel="stylesheet">
	<link href="<?= base_url('assets/css/font-awesome.css') ?>" rel="stylesheet">
   <link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">
   <link href="<?= base_url('assets/css/custom.css') ?>" rel="stylesheet">
   <link href="<?= base_url('assets/css/chosen.css') ?>" rel="stylesheet">
   <link href="<?= base_url('assets/css/visualize.css') ?>" rel="stylesheet">

   <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
    <script src="<?= base_url('assets/js/bootstrap-transition.js') ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap-alert.js') ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap-modal.js') ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap-dropdown.js') ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap-scrollspy.js') ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap-tab.js') ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap-tooltip.js') ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap-popover.js') ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap-button.js') ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap-collapse.js') ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap-carousel.js') ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap-typeahead.js') ?>"></script>
    <script src="<?= base_url('assets/js/chosen.jquery.js') ?>"></script>
	<script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
	<script src="<?= base_url('assets/js/custom.js') ?>"></script>
	<script src="<?= base_url('assets/js/jquery.table-filter.min.js')?>"></script>
	<script src="<?= base_url('assets/js/jquery.tablednd.0.6.min.js')?>"></script>
</head>
<body>
    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="<?= base_url('') ?>">QR Video</a>
			<?php if(!empty($the_user)):?>
 	        <div class="btn-group pull-right">
            <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
              <i class="icon-user"></i> <?php echo $the_user->username;?>
              <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
              <li><a href="<?= base_url('user/password') ?>">Change Password</a></li>
              <li><a href="<?= base_url('logout') ?>">Sign Out</a></li>

            </ul>
          </div>
          <?php else:?>
          <a class="btn btn-primary pull-right" href="auth/login">Login</a>

          <?php endif;?>
        </div>
      </div>
    </div>
    
    <div class="subnav subnav-fixed">
    <ul class="nav nav-pills">
        <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Choices <b class="caret"></b></a>
			<ul class="dropdown-menu">
				<li><a href="<?= base_url('admin/video/create')?>">Create Group</a></li>
				<li><a href="<?= base_url('admin/video')?>">List</a></li>
				<li><a href="<?= base_url('admin/video/codes')?>">Print Sheet</a></li>

			</ul>
      	</li>      
    </ul>
  </div>
<div id="top" class="container-fluid">
