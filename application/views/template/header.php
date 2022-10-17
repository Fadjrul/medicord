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
    
    <style type="text/css">
        .sidebar-wrapper .menu .sidebar-item.active > .sidebar-link:active, .sidebar-wrapper .menu .sidebar-item.active > .sidebar-link:focus {
            background: #0dcaf0 !important; 
        }
    </style>
</head>