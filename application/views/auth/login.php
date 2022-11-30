<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $setting[0]->setting_short_appname; ?></title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/main/app.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/pages/auth.css">
</head>

<body>
    <div id="auth">
        
<div class="row h-100">
    <div class="col-lg-5 col-12">
        <div id="auth-left">
            <div class="auth-logo">
                <img src="<?php echo base_url() ?>assets/core-images/<?php echo $setting[0]->setting_logo; ?>" alt="Logo aplikasi"> <h4 class="auth-title"><?php echo $setting[0]->setting_short_appname; ?></h4>
            </div>
            
            <p class="auth-subtitle mb-3">Sign in untuk memulai aplikasi.</p>
            <div class="row">
                <div class="col-12 text-sm text-dark">
                    <!-- ALERT -->
                    <?php 
                        if ($this->session->flashdata('alert')) {
                            echo $this->session->flashdata('alert');
                            unset($_SESSION['alert']);
                        } 
                    ?>
                </div>
            </div>
            
            <!-- Input Form -->
            <?php echo form_open("auth/validate", "class='login-form'"); ?>
            <form>
                <div class="form-group position-relative has-icon-left mb-4">
                <?php echo csrf(); ?>
                    <input type="text" class="form-control form-control-xl" placeholder="Username" required="required" name="username">
                    <div class="form-control-icon">
                        <i class="bi bi-person"></i>
                    </div>
                </div>
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="password" class="form-control form-control-xl" placeholder="Password" required="required" name="password">
                    <div class="form-control-icon">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                </div>

                <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Sign in</button>
            </form>
            <?php echo form_close(); ?>

        </div>
        <!-- footer form login -->
        <div>
                <p class="text-center">
                Created by <a href="https://instagram.com/fadjrul00"><?php echo $setting[0]->setting_owner_name;?></a> <br><b>Copyright &copy; <?php echo date('Y'); ?> <?php echo $setting[0]->setting_short_appname; ?>, version 1.0</b>
                </p>
            </div>
    </div>
    <div class="col-lg-7 d-none d-lg-block">
        <div id="auth-right">
            <img src="<?php echo base_url();?>assets/core-images/<?php echo $setting[0]->setting_background;?>" alt="background" style="height : 100vh;">
        </div>
    </div>
</div>

    </div>

    <script src="<?php echo base_url();?>assets/js/bootstrap.js"></script>
    <script src="<?php echo base_url();?>assets/js/app.js"></script>
</body>

</html>
