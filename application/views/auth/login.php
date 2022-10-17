<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $setting[0]->setting_appname;?></title>
  <link rel="icon" href="<?php echo base_url();?>assets/images/<?php echo $setting[0]->setting_logo;?>" >
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- css -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        <link href="https://fonts.googleapis.com/css?family=Anton|Permanent+Marker|Quicksand" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;400&display=swap" rel="stylesheet"> 
        <style type="text/css">
            .fontQuicksand{
                font-family: 'Quicksand', sans-serif;
            }

            .fontPoppins{
                font-family: 'Poppins', sans-serif;
            }
        </style>
</head>
<body class="hold-transition login-page fontPoppins" style="background-position: center; background-repeat: no-repeat; background-size: cover; background-image: url(<?php echo base_url();?>assets/img/<?php echo $setting[0]->setting_background;?>)">
        <div class="login-box">
            <div class="login-logo">
                <a href=""><?php echo $setting[0]->setting_short_appname;?></a>
            </div>
            
            <div class="login-box-body">
                
                <p class="login-box-msg">Silahkan Sign in untuk memulai aplikasi</p>
                <?php
                    if($this->session->flashdata('alert')){
                        echo $this->session->flashdata('alert');
                    }
                ?>
                <!-- Start Form Login -->
                <?php echo form_open("auth/validate", "class='login-form'");?>
                    <div class="form-group has-feedback">
                        <?php echo csrf();?>
                        <input type="text" class="form-control" placeholder="Username" name="username">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" placeholder="Password" name="password">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <hr style="border: 0.5px dashed #d2d6de">
                    <div class="row">
                        <div class="col-xs-12">
                            <button type="submit" class="btn btn-facebook btn-block btn-flat">Sign In</button>
                        </div>
                    </div>
                <?php echo form_close(); ?>
                <!-- End Form Login -->

               

                <hr style="border: 0.5px dashed #d2d6de">
                <p class="text-center">
                    <?php echo $setting[0]->setting_owner_name;?><br>
                    <b>Since @<?php echo date('Y');?></b>
                </p>
            </div>
        </div>

<script src="<?php echo base_url();?>assets/plugins/jquery/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url();?>assets/dist/js/adminlte.min.js"></script>
</body>
</html>
