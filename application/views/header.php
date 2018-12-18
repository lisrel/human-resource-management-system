
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <title>hrms</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url('resources/admin/css//bootstrap.min.css');?>" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url('resources/admin/css/metisMenu.min.css');?>" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="<?php echo base_url('resources/admin/css/timeline.css');?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url('resources/admin/css/startmin.css');?>" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo base_url('resources/admin/css/morris.css');?>" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url('resources/admin/css/font-awesome.min.css');?>" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url('resources/css/bootstrap.min.css'); ?>"/>
    <link rel="stylesheet" href="<?php echo base_url('resources/css/jquery-ui.min.css'); ?>"/>
    <link rel="stylesheet" href="<?php echo base_url('resources/css/jquery-ui.css'); ?>"/>
    <link rel="stylesheet" href="<?php echo base_url('resources/css/style.css'); ?>"/>
    <script src="<?php echo base_url('resources/js/jquery.js'); ?>"></script>
    <script src="<?php echo base_url('resources/js/bootstrap.js'); ?>"></script>
    <script src="<?php echo base_url('resources/js/jquery-ui.js'); ?>"></script>


    <script>
    $( function() {
        $( "#datepicker" ).datepicker();
    } );
    </script>

</head>
<body>
<div class="container-fluid">
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="col-lg-6">
            <div class="navbar-header">

                <a class="navbar-brand" href="<?php echo base_url('dashboard');?>">Human Resource Management System | Munmac Media Solutions </a>
            </div>
            </div>
                <div class="col-lg-6">
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
                        <ul class="nav navbar-nav navbar-right">
                            <?php if ($this->session->userdata('user_id')): ?>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Logout <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><?php echo anchor('dashboard/changePassword', 'Change Password')?></li>
                                    <li><?php echo anchor('welcome/logout', 'Logout')?></li>
                                </ul>
                            </li>
                            <?php else: ?>
                            <?php endif; ?>
                        </ul>
                    </div>
        </div>

    </nav>

</div>



