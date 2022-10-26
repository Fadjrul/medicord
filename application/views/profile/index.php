    <!-- Page content Header -->
    <div class="page-heading">
        <div class="row">
            <!-- Page Title -->
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>My Profile</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <!-- Breadcrumb -->
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard/index'); ?>"> Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">My Profile</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <!-- Page content -->
    <div class="page-content">
        <!-- Data Pasien start -->
        <section class="section">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>Tentang Saya</h4>
                        </div>
                        <div class="card-content">
                            <div class="row justify-content-center text-center">
                                <div class="col-12">
                                    <?php 
                                        if($this->session->userdata('user_photo')==""){
                                            echo '<img class="user-img avatar avatar-sm" style="width: 150px;" src="'.base_url().'assets/images/upload/user/noimage.png" alt="User profile picture">';
                                        }else{
                                            echo '<img class="user-img avatar avatar-sm" style="width: 150px;" src="'.base_url().'assets/images/upload/user/'.$profile[0]->user_photo.'" alt="User profile picture">';
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="row text-center">
                                <div class="col-12">
                                    <h5 class="my-2">
                                        <?php echo $profile[0]->user_fullname;?>
                                    </h5>
                                    <hr style="border: 0.5px dashed #d2d6de">
                                </div>
                            </div>  
                            <div class="row text-center">
                                <div class="col-12">
                                    <strong><i class="bi bi-person-fill"></i> Username</strong>
                                    <p class="text-muted">
                                        <?php echo $profile[0]->user_name;?>
                                    </p>
                                </div>
                            </div>
                                
                            <div class="row text-center">
                                <div class="col-12">
                                    <strong><i class="bi bi-envelope-fill"></i> Email</strong>
                                    <p class="text-muted">
                                        <?php echo $profile[0]->user_email;?>
                                    </p>
                                </div>
                            </div>
                                
                            <div class="row text-center">
                                <div class="col-12">
                                    <strong><i class="bi bi-people-fill"></i> Group</strong>
                                    <p class="text-muted">
                                        <?php echo $profile[0]->group_name;?>
                                    </p>
                                    <hr style="border: 0.5px dashed #d2d6de">
                                </div>
                            </div>
                            <div class="row my-2 text-center">
                                <div class="col-12">
                                    <small>Page rendered in <strong>{elapsed_time}</strong> seconds.</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h4>
                                Form Profile
                            </h4>
                        </div>
                        <div class="card-content">
                            <div class="row">
                                <div class="col-12">
                                    <?php
                                        if($this->session->flashdata('alert')){
                                            echo $this->session->flashdata('alert');
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="row p-4">
                                <?php echo form_open_multipart("profile/update")?>
                                <form class="form">
                                    <div class="row">
                                        <div class="col-md-4 col-12">
                                            <label for="user_fullname">Nama User</label>
                                        </div>
                                        <div class="col-md-8 col-12 form-group">
                                            <?php echo csrf();?>
                                            <input type="hidden" id="id_user" class="form-control"
                                                    name="id_user" placeholder="User Name" value="<?php echo $profile[0]->id_user;?>" required>
                                            <input type="text" id="user_fullname" class="form-control"
                                                    name="user_fullname" placeholder="User Name" value="<?php echo $profile[0]->user_fullname;?>" required="required">
                                            <input type="hidden" class="form-control" name="old_photo" value="<?php echo $profile[0]->user_photo;?>" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 col-12">
                                            <label for="user_email">Email</label>
                                        </div>
                                        <div class="col-md-8 col-12">
                                            <input type="email" class="form-control" placeholder="Email" name="user_email" id="user_email" value="<?php echo $profile[0]->user_email;?>" required>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-4 col-12">
                                            <label for="user_photo">Foto</label>
                                        </div>
                                        <div class="col-md-8 col-12">
                                            <input type="file" class="form-control" name="userfile" id="user_photo">
                                        </div>
                                    </div>
                                    <hr style="border: 0.5px dashed #d2d6de">
                                    <div class="row">
                                        <div class="col-md-4 col-12">
                                            <label for="user_name">Username</label>
                                        </div>
                                        <div class="col-md-8 col-12">
                                            <input type="text" class="form-control" id="user_name" placeholder="Username" name="user_name" value="<?php echo $profile[0]->user_name;?>" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 col-12">
                                            <label for="user_password">Password</label>
                                        </div>
                                        <div class="col-md-8 col-12">
                                            <small style="color:red"><i>*Kosongkan jika tidak ingin mengubah password</i></small><br>
                                            <input style="margin-bottom:5px;" type="hidden" class="form-control" name="old_password" value="<?php echo $profile[0]->user_password;?>">
                                            <input style="margin-bottom:5px;" type="text" class="form-control" id="user_password" placeholder="Password Lama" name="password">
                                            <input style="margin-bottom:5px;" type="text" class="form-control" placeholder="Password Baru" name="new_password">
                                            <input style="margin-bottom:5px;" type="text" class="form-control" placeholder="Konfirmasi Password Baru" name="confirm_password">
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end my-2">
                                        <button type="submit" class="btn btn-primary me-1 mb-1" title="Update Data">Update</button>
                                        <button type="reset" class="btn btn-white me-1 mb-1" title="reset">Reset</button>    
                                    </div>
                                </form>
                                <?php echo form_close(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </section>
    </div>