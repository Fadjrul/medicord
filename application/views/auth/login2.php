<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $setting[0]->setting_short_appname; ?></title>
    <!-- Favicons -->
    <link href="<?php echo base_url(); ?>assets/core-images/<?php echo $setting[0]->setting_logo; ?>" rel="icon">
    <!-- css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/loginStyle/style.css">

</head>

<body>
    <div class="box">
        <div class="form">
            <h3> <img src="<?php echo base_url() ?>assets/core-images/<?php echo $setting[0]->setting_logo; ?>" alt="Logo aplikasi"> <?php echo $setting[0]->setting_short_appname; ?></h3>
            <p>Sign in untuk memulai aplikasi</p>
            <div class="row">
                <div class="col-12 text-sm text-white">
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
            <div class="inputBox">
                <?php echo csrf(); ?>
                <input type="text" required="required" name="username">
                <span>Username</span>
                <i></i>
            </div>
            <div class="inputBox">
                <input type="password" required="required" name="password">
                <span>Password</span>
                <i></i>
            </div>
            <button type="submit">Sign in</button>
            <?php echo form_close(); ?>

            <!-- footer form login -->
            <div>
                <hr style="border: 0.5px dashed #45f3ff; margin-top:15px;">
                <p class="text-footer">
                    <?php echo $setting[0]->setting_owner_name; ?><br>
                    <b>Copyright @<?php echo date('Y'); ?></b>
                </p>
            </div>
        </div>
    </div>

</body>

</html>