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
    </div>

    <!-- Page content -->
    <div class="page-content">
        <!-- Setting start -->
        <section id="multiple-column-form">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Informasi Aplikasi</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                            <?php echo form_open_multipart("setting/update")?>
                                <form class="form">
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                            <?php echo csrf();?>
                                                <label for="setting_appname">Nama Aplikasi</label>
                                                <input type="text" id="setting_appname" class="form-control"
                                                    placeholder="Nama Aplikasi" name="setting_appname" value="<?php echo $setting[0]->setting_appname;?>" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="setting_short_appname">Nama Aplikasi (singkatan)</label>
                                                <input type="text" id="setting_short_appname" class="form-control"
                                                    placeholder="Nama Aplikasi (Singkatan)" name="setting_short_appname" value="<?php echo $setting[0]->setting_short_appname;?>" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="setting_phone">Telepon </label>
                                                <input type="text" id="setting_phone" class="form-control" placeholder="+62 ..."
                                                name="setting_phone" value="<?php echo $setting[0]->setting_phone;?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="setting_email">Email</label>
                                                <input type="email" id="setting_email" class="form-control"
                                                name="setting_email" value="<?php echo $setting[0]->setting_email;?>" placeholder="@....">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="setting_address">Alamat</label>
                                                <textarea id="setting_address" class="form-control" name="setting_address" placeholder="Alamat" rows="4"><?php echo $setting[0]->setting_address;?> </textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="about">Tentang Aplikasi</label>
                                                <textarea id="about" class="form-control" name="setting_about" placeholder="Alamat" rows="4"><?php echo $setting[0]->setting_about;?> </textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="setting_instagram">Instagram</label>
                                                <input type="text" id="setting_instagram" class="form-control"
                                                    placeholder="www.instagram.com/" name="setting_instagram" value="<?php echo $setting[0]->setting_instagram;?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="setting_youtube">Youtube</label>
                                                <input type="text" id="setting_youtube" class="form-control"
                                                    placeholder="www.youtube.com/" name="setting_youtube" value="<?php echo $setting[0]->setting_youtube;?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="setting_owner_name">Pembuat Aplikasi</label>
                                                <input type="text" id="setting_owner_name" class="form-control"
                                                    placeholder="nama pembuat" name="setting_owner_name" value="<?php echo $setting[0]->setting_owner_name;?>" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="setting_facebook">Facebook</label>
                                                <input type="text" id="setting_facebook" class="form-control"
                                                    placeholder="www.facebook.com/" name="setting_facebook" value="<?php echo $setting[0]->setting_facebook;?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="setting_logo">Logo Aplikasi</label>
                                                <input type="file" id="setting_logo" class="form-control"
                                                    name="setting_logo">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <img src="<?php echo base_url();?>assets/images/upload/logo/<?php echo $setting[0]->setting_logo;?>" height="55" alt="Preview Logo">
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-end mt-2">
                                            <button type="submit" class="btn btn-primary me-1 mb-1" title="Update data setting">Update</button>
                                            <a href="<?php echo site_url('setting')?>" class="btn btn-light-secondary me-1 mb-1" title="Refresh Halaman">Reset</a>
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
            </div>
        </section>
        <!-- Setting end -->
    </div>