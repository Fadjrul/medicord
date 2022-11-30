    <!-- Page content Header -->
    <div class="page-heading">
        <div class="row">
            <!-- Page Title -->
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3><?php echo $title;?></h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <!-- Breadcrumb -->
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard/index'); ?>"> Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo site_url('news'); ?>"> Informasi</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo $title;?></li>
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
        <!-- Create News start -->
        <section class="section">
            <div class="card">
                <div class="card-content">
                    <div class="row me-4 mt-4">
                        <div class="col-md-12 col-12 text-end">
                            <a href="<?php echo site_url('news/create_page')?>" class="btn btn-primary btn-sm" title="Tambah data"><i class="fas fa-plus"></i> Tambah</a>
                            <a href="<?php echo site_url('news')?>" class="btn btn-warning btn-sm" title="kembali ke halaman sebelumnya">kembali</a>
                        </div>
                    </div>

                    <!-- Create News -->
                    <div class="row p-4">
                        <div class="col-12">
                            <?php echo form_open_multipart("news/create")?>
                                <form action="form">
                                <?php echo csrf();?>
                                    <div class="form-group">
                                        <label for=""><b>Bidang Publikasi <span style="color:red">*</span></b></label>
                                        <select class="choices form-select" name="field_id" required style="width:100%">
                                            <option value="">-Pilih Bidang Publikasi-</option>
                                            <?php
                                                foreach($field as $f){
                                                    echo '<option value="'.$f->field_id.'">'.$f->field_name.'</option>';
                                                }
                                            ?>

                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for=""><b>Kategori Informasi <span style="color:red">*</span></b></label>
                                        <select class="choices form-select" name="news_category_id" required style="width:100%">
                                            <option value="">-Pilih Kategori Informasi-</option>
                                            <?php
                                                foreach($news_category as $nw){
                                                    echo '<option value="'.$nw->news_category_id.'">'.$nw->news_category_name.'</option>';
                                                }
                                            ?>

                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for=""><b>Judul Informasi <span style="color:red">*</span></b></label>
                                        <input type="text" class="form-control" placeholder="Judul Informasi" name="news_title" required="required">
                                    </div>

                                    <div class="form-group">
                                        <label for=""><b>Cover/Thumbnail Informasi</b></label>
                                        <input type="file" class="form-control" placeholder="Cover/Thumbnail Informasi" name="news_cover" accept=".png, .jpeg, .jpg">
                                    </div>

                                    <div class="form-group">
                                        <label><b>Isi Informasi <span style="color:red">*</span></b></label>
                                        <textarea cols="80" id="dark" name="news_text" rows="10" style="resize:none;max-width:700px;"></textarea>
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
        <!-- Create News end -->
    </div>