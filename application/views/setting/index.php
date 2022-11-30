    <!-- Page content Header -->
    <div class="page-heading">
        <div class="row">
            <!-- Page Title -->
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Setting</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <!-- Breadcrumb -->
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Setting</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <?php 
                    if ($this->session->flashdata('alert')) {
                        echo $this->session->flashdata('alert');
                        unset($_SESSION['alert']);
                    } 
                ?>
            </div>
        </div>
    </div>

    <!-- Page content -->
    <div class="page-content">
        <!-- Setting start -->
        <section id="multiple-column-form">
            <div class="row match-height">
                <div class="col-md-6 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Update Data</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <?php echo form_open_multipart("setting/update") ?>
                                <form class="form">
                                    <div class="row">
                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <?php echo csrf(); ?>
                                                <label for="setting_appname">Nama Aplikasi</label>
                                                <input type="hidden" class="form-control" name="setting_id" value="<?php echo $setting[0]->setting_id; ?>" required>
                                                <input type="hidden" class="form-control" name="setting_logo" value="<?php echo $setting[0]->setting_logo; ?>" required>
                                                <input type="text" id="setting_appname" class="form-control" name="setting_appname" required>
                                                <input type="hidden" class="form-control" name="setting_background" value="<?php echo $setting[0]->setting_background;?>" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="setting_short_appname">Nama Aplikasi (singkatan)</label>
                                                <input type="text" id="setting_short_appname" class="form-control" name="setting_short_appname" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="setting_phone">Telepon </label>
                                                <input type="text" id="setting_phone" class="form-control" name="setting_phone">
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="setting_email">Email</label>
                                                <input type="email" id="setting_email" class="form-control" name="setting_email">
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="setting_address">Alamat</label>
                                                <textarea id="setting_address" class="form-control" name="setting_address" rows="4"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="about">Tentang Aplikasi</label>
                                                <textarea id="about" class="form-control" name="setting_about" rows="4"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="setting_instagram">Instagram</label>
                                                <input type="text" id="setting_instagram" class="form-control" name="setting_instagram">
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="setting_youtube">Youtube</label>
                                                <input type="text" id="setting_youtube" class="form-control" name="setting_youtube">
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="setting_owner_name">Pembuat Aplikasi</label>
                                                <input type="text" id="setting_owner_name" class="form-control" name="setting_owner_name" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="setting_facebook">Facebook</label>
                                                <input type="text" id="setting_facebook" class="form-control" name="setting_facebook" >
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="logo">Logo Aplikasi</label>
                                                <input type="file" id="logo" class="form-control" name="logo">
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="background">Background Login</label>
                                                <input type="file" id="background" class="form-control" name="background">
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="setting_key_aes">Key AES-128</label>
                                                <input type="text" id="setting_key_aes" class="form-control" name="setting_key_aes" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="setting_key_speck">Key SPECK-128</label>
                                                <input type="text" id="setting_key_speck" class="form-control" name="setting_key_speck">
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-end mt-2">
                                            <button type="submit" class="btn btn-primary me-1 mb-1" title="Update data setting">Update</button>
                                            <a href="<?php echo site_url('setting') ?>" class="btn btn-light-secondary me-1 mb-1" title="Refresh Halaman">Reset</a>
                                        </div>
                                    </div>
                                </form>
                                <?php echo form_close(); ?>
                            </div>
                        </div>
                        <div class="card-footer">
                            <small>Page rendered in <strong>{elapsed_time}</strong> seconds.</small>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Informasi Aplikasi</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form">
                                    <div class="row">
                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <?php echo csrf(); ?>
                                                <label><strong>Nama Aplikasi :</strong></label> <br>
                                                <label for="setting_appname"><?php echo $setting[0]->setting_appname; ?></label>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label><strong>Nama Aplikasi (singkatan) :</strong></label> <br>
                                                <label for="setting_short_appname"><?php echo $setting[0]->setting_short_appname; ?></label>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label><strong>Telepon :</strong></label> <br>
                                                <label for="setting_phone"><?php echo $setting[0]->setting_phone; ?></label>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label><strong>Email :</strong></label> <br>
                                                <label for="setting_email"><?php echo $setting[0]->setting_email; ?></label>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label><strong>Alamat :</strong></label> <br>
                                                <label for="setting_address"><?php echo $setting[0]->setting_address; ?></label>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label><strong>Tentang Aplikasi :</strong></label> <br>
                                                <label for="about"><?php echo $setting[0]->setting_about; ?></label>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label><strong>Instagram :</strong></label> <br>
                                                <label for="setting_instagram"><?php echo $setting[0]->setting_instagram; ?></label>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label><strong>Youtube :</strong></label> <br>
                                                <label for="setting_youtube"><?php echo $setting[0]->setting_youtube; ?></label>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label><strong>Pembuat Aplikasi :</strong></label> <br>
                                                <label for="setting_owner_name"><?php echo $setting[0]->setting_owner_name; ?></label>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label><strong>Facebook :</strong></label> <br>
                                                <label for="setting_facebook"><?php echo $setting[0]->setting_facebook; ?></label>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label><strong>Preview Logo :</strong></label> <br>
                                                <img src="<?php echo base_url(); ?>assets/core-images/<?php echo $setting[0]->setting_logo; ?>" height="50" alt="Preview Logo">
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label><strong>Preview Background Login :</strong></label> <br>
                                                <img src="<?php echo base_url(); ?>assets/core-images/<?php echo $setting[0]->setting_background; ?>" height="150" alt="Preview Background">
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label><strong>Key AES-128 :</strong></label> <br>
                                                <label for="setting_key_aes"><?php echo $setting[0]->setting_key_aes; ?></label>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label><strong>Key SPECK-128 :</strong></label> <br>
                                                <label for="setting_key_speck"><?php echo $setting[0]->setting_key_speck; ?></label>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Setting end -->
    </div>