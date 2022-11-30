    <!-- Page content Header -->
    <div class="page-heading">
        <div class="row">
            <!-- Page Title -->
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3><?php echo $this->uri->segment(3);?></h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <!-- Breadcrumb -->
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard/index'); ?>"> Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo $this->uri->segment(3);?></li>
                    </ol>
                </nav>
            </div>
        </div>
        <?php
        if ($this->session->flashdata('alert')) {
            echo $this->session->flashdata('alert');
            unset($_SESSION['alert']);
        } ?>
    </div>

    <!-- Page content -->
    <div class="page-content">
        <!-- Update Content start -->
        <section class="section">
            <div class="card">
                <div class="card-content">
                <?php echo form_open_multipart("content/update")?>
                    <div class="row me-4 mt-4">
                        <div class="col-md-12 col-12 text-end">
                            <button type="submit" class="btn btn-info btn-sm" title="Update data">Ubah</button>
                        </div>
                    </div>

                    <!-- Update Content -->
                    <div class="row p-4">
                        <div class="col-12">
                                <form action="form">
                                <?php echo csrf();?>
                                <div class="form-group">
                                        <label for=""><b>Menu <span style="color:red">*</span></b></label>
                                        <input type="text" class="form-control" placeholder="Judul Berita" required="required" value="<?php echo $content[0]->content_title;?>" readonly>
                                        <input type="hidden" class="form-control" name="content_id" required="required" value="<?php echo $content[0]->content_id;?>">
                                        <input type="hidden" class="form-control" name="content_menu" required="required" value="<?php echo $content[0]->content_menu;?>">
                                        
                                    </div>
                                    <?php if($this->uri->segment(3)=="sambutan"){?>
                                    <div class="form-group">
                                        <label for=""><b>Foto Kepala Puskesmas </b></label><br>
                                        <span class="text-red">file sebelumnya: </span><a href="<?php echo base_url();?>upload/content/<?php echo $content[0]->content_image;?>"><?php echo $content[0]->content_image;?></a>
                                        <input type="file" class="form-control" placeholder="Foto Kepala Puskesmas" name="content_image" accept=".png, .jpeg, .jpg">
                                        <input type="hidden" class="form-control" name="content_image_old" value="<?php echo $content[0]->content_image;?>">
                                    </div>
                                    <?php }elseif($this->uri->segment(3)=="struktur"){?>
                                    <div class="form-group">
                                        <label for=""><b>Foto Struktur Organisasi </b></label><br>
                                        <span class="text-red">file sebelumnya: </span><a href="<?php echo base_url();?>upload/content/<?php echo $content[0]->content_image;?>"><?php echo $content[0]->content_image;?></a>
                                        <input type="file" class="form-control" placeholder="Foto Struktur Organisasi" name="content_image" accept=".png, .jpeg, .jpg">
                                        <input type="hidden" class="form-control" name="content_image_old" value="<?php echo $content[0]->content_image;?>">
                                    </div>
                                    <?php } ?>

                                    <div class="form-group">
                                        <label for=""><b>Isi Konten <span style="color:red">*</span></b></label>
                                        <textarea cols="80" id="dark" name="content_text" rows="10" style="resize:none;max-width:700px;"><?php echo $content[0]->content_text;?></textarea>
                                    </div>
                                </form>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>

                <div class="p-3">
                    <p><small>Page rendered in <strong>{elapsed_time}</strong> seconds.</small></p>
                </div>
            </div>
    
        </section>
        <!-- Update Content end -->
    </div>