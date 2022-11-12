<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $setting[0]->setting_short_appname;?></title>
    <!-- Favicons -->
	<link href="<?php echo base_url();?>assets/images/<?php echo $setting[0]->setting_logo;?>" rel="icon">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/main/app.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/main/app-dark.css">
    <!-- Font awesome icon -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/extensions/@fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/extensions/toastify-js/src/toastify.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/extensions/simple-datatables/style.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/extensions/sweetalert2/sweetalert2.min.css">
    <style type="text/css">
        .sidebar-wrapper .menu .sidebar-item.active a {
            background-color: #0dcaf0 !important; 
        }
        .input-border-bottom {
            box-sizing: border-box !important;
            border: none !important;
            border-radius: 0 !important;
            border-bottom: 1px solid !important;
        }
        
    </style>
</head>