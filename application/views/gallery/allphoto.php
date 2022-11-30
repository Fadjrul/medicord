    <!-- Page content Header -->
    <div class="page-heading">
        <div class="row">
            <!-- Page Title -->
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3><?php echo $title." ".substr($gallery_name[0]->gallery_name, 0, 20)."...";?></h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <!-- Breadcrumb -->
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard/index'); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo site_url('gallery/data/photo'); ?>">Galeri Foto</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo $title." ".substr($gallery_name[0]->gallery_name, 0, 20)."...";?></a></li>
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
        <!-- Galeri Foto start -->
        <section class="section">
            <div class="card">
                <div class="card-content">
                    <div class="row me-4 mt-4">
                        <div class="col-md-12 col-12 text-end">
                            <a href="<?php echo site_url('gallery/dropzone_photo/'.$this->uri->segment(3))?>" class="btn btn-primary btn-sm" title="Tambah Foto"><i class="fas fa-plus"></i>Tambah</a>
                            <a href="<?php echo site_url('gallery/data/photo')?>" class="btn btn-warning btn-sm" title="Kembali ke halaman sebelumya">kembali</a>
                        </div>
                    </div>

                    <!-- data tabel -->
                    <div class="row p-4" id="table-hover-row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table table-hover" id="DataTable">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Foto</th>
                                            <th>Token</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if ($allphoto) {
                                            $nox = 1;
                                            $no = 1;
                                            foreach ($allphoto as $key) {

                                        ?>
                                                <tr>
                                                    <td><?php echo $no + $numbers; ?></td>
                                                    <td><a href="<?php echo base_url()."upload/gallery/photo/".$key->gallery_photo_name;?>" target="_blank" ><?php echo $key->gallery_photo_name;?></a></td>
                                                    <td><?php echo $key->gallery_photo_token;?></td>
                                                    <td>
                                                        <?php echo form_open("gallery/delete_gallery") ?>
                                                        <?php echo csrf(); ?>
                                                        <input type="hidden" class="form-control" placeholder="Judul Galeri" name="gallery_photo_name" required="required" value="<?php echo $key->gallery_photo_name;?>">
                                                        <input type="hidden" class="form-control" name="gallery_photo_id" required="required" value="<?php echo $key->gallery_photo_id;?>">
                                                        <input type="hidden" class="form-control" name="gallery_id" required="required" value="<?php echo $key->gallery_id;?>">
                                                        <input type="hidden" class="form-control" name="gallery_photo_token" required="required" value="<?php echo $key->gallery_photo_token;?>">
                                                        <button type="submit" class="btn btn-danger btn-sm">
                                                            Hapus
                                                        </button>
                                                        <?php echo form_close(); ?>
                                                     </td>
                                                </tr>

                                        <?php
                                                $no++;
                                            }
                                        } else {
                                            echo '
                                                <tr>
                                                    <td colspan="4">Tidak ada data ditemukan</td>
                                                </tr>
                                                ';
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="p-3">
                    <p><small>Page rendered in <strong>{elapsed_time}</strong> seconds.</small></p>
                </div>
            </div>
    
        </section>
        <!-- Galeri foto end -->
    </div>