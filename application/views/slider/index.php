    <!-- Page content Header -->
    <div class="page-heading">
        <div class="row">
            <!-- Page Title -->
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Slider Landing Page</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <!-- Breadcrumb -->
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard/index'); ?>"> Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Slider Landing Page</li>
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
        <!-- Slider Landing Page start -->
        <section class="section">
            <div class="card">
                <div class="card-content">
                    <div class="row me-4 mt-4">
                        <div class="col-md-12 col-12 text-end">
                            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#FormTambah"><i class="fas fa-plus"></i>
                                    Tambah
                            </button>
                        </div>
                            <!-- Modal Tambah Slider -->
                            <div class="modal fade text-start" id="FormTambah" tabindex="-1" role="dialog"
                                aria-labelledby="myModalLabel33" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                    role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-info">
                                            <h4 class="modal-title" id="myModalLabel33">Form Tambah Slider</h4>
                                            <button type="button" class="close" data-bs-dismiss="modal"
                                                aria-label="Close">
                                                <i data-feather="x"></i>
                                            </button>
                                        </div>
                                        <?php echo form_open_multipart("slider/create")?>
                                        <form>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-3">
                                                        <label for="slider_title">Judul Slider </label>
                                                    </div>
                                                    <div class="col-9">
                                                        <div class="form-group">
                                                            <?php echo csrf();?>
                                                            <input type="text" class="form-control" id="slider_title" name="slider_title">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-3">
                                                        <label for="slider_text">Teks Slider </label>
                                                    </div>
                                                    <div class="col-9">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" id="slider_text" name="slider_text">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-3">
                                                        <label>Gambar Slider </label>
                                                    </div>
                                                    <div class="col-9">
                                                        <div class="form-group">
                                                            <input type="file" class="form-control" name="slider_image" required="required" accept=".png, .jpeg, .jpg">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary ml-1">
                                                    <i class="bx bx-check d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Simpan</span>
                                                </button>
                                                <button type="reset" class="btn btn-light-secondary">
                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Reset</span>
                                                </button>
                                            </div>
                                        </form>
                                        <?php echo form_close(); ?>
                                    </div>
                                </div>
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
                                            <th>Judul Slider</th>
                                            <th>Teks Slider</th>
                                            <th>Gambar Slider</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if ($slider) {
                                            $nox = 1;
                                            $no = 1;
                                            foreach ($slider as $key) {

                                        ?>
                                                <tr>
                                                    <td><?php echo $no + $numbers; ?></td>
                                                    <td><?php echo $key->slider_title; ?></td>
                                                    <td><?php echo $key->slider_text; ?></td>
                                                    <td><a href="<?php echo base_url()."upload/slider/".$key->slider_image;?>" target="_blank" ><?php echo $key->slider_image;?></a></td>
                                                    <td>
                                                        <div class="btn-group dropstart mb-1">
                                                            <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                                                                Aksi
                                                            </button>
                                                            <ul class="dropdown-menu">
                                                                <li>
                                                                    <button type="submit" class="dropdown-item" data-bs-toggle="modal"
                                                                            data-bs-target="#FormDetail<?php echo $key->slider_id;?>">
                                                                            Detail
                                                                    </button>
                                                                </li>
                                                                <li>
                                                                    <button type="submit" class="dropdown-item" data-bs-toggle="modal"
                                                                            data-bs-target="#FormUbah<?php echo $key->slider_id;?>">
                                                                            Ubah
                                                                    </button>
                                                                </li>
                                                                <li>
                                                                    <?php echo form_open("slider/delete") ?>
                                                                    <?php echo csrf(); ?>
                                                                    <button type="submit" class="dropdown-item">Hapus</button>
                                                                    <input type="hidden" class="form-control" name="slider_id" required="required" value="<?php echo $key->slider_id; ?>">
                                                                    <?php echo form_close(); ?>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <!-- Modal Detail Slider Group -->
                                                <div class="modal fade text-start" id="FormDetail<?php echo $key->slider_id?>" tabindex="-1" role="dialog"
                                                    aria-labelledby="myModalLabel33" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                                        role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-info">
                                                                <h4 class="modal-title" id="myModalLabel33">Detail Slider</h4>
                                                                <button type="button" class="close" data-bs-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <i data-feather="x"></i>
                                                                </button>
                                                            </div>
                                                                <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-3">
                                                                        <label>Judul Slider </label>
                                                                    </div>
                                                                    <div class="col-9">
                                                                        <div class="form-group">
                                                                        <?php echo csrf();?>
                                                                            <label><?php echo $key->slider_title;?></label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-3">
                                                                        <label>Teks Slider </label>
                                                                    </div>
                                                                    <div class="col-9">
                                                                        <div class="form-group">
                                                                            <label><?php echo $key->slider_text;?></label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="close btn btn-light-secondary" data-bs-dismiss="modal" aria-label="Close">
                                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                                        <span class="d-none d-sm-block">Tutup</span>
                                                                    </button>
                                                                </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Modal Ubah Slider -->
                                                <div class="modal fade text-start" id="FormUbah<?php echo $key->slider_id?>" tabindex="-1" role="dialog"
                                                    aria-labelledby="myModalLabel33" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                                        role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-info">
                                                                <h4 class="modal-title" id="myModalLabel33">Form Ubah Slider</h4>
                                                                <button type="button" class="close" data-bs-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <i data-feather="x"></i>
                                                                </button>
                                                            </div>
                                                            <?php echo form_open_multipart("slider/update")?>
                                                            <form>
                                                                 <div class="modal-body">
                                                                        <div class="row">
                                                                            <div class="col-3">
                                                                                <label for="slider_title">Judul Slider </label>
                                                                            </div>
                                                                            <div class="col-9">
                                                                                <div class="form-group">
                                                                                <?php echo csrf();?>
                                                                                    <input type="text" class="form-control" id="slider_title" name="slider_title" value="<?php echo $key->slider_title;?>">
                                                                                    <input type="hidden" class="form-control" name="slider_id" required="required" value="<?php echo $key->slider_id;?>">
                                                                                    <input type="hidden" class="form-control" name="slider_image_old" required="required" value="<?php echo $key->slider_image;?>">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-3">
                                                                                <label for="slider_text">Teks Slider </label>
                                                                            </div>
                                                                            <div class="col-9">
                                                                                <div class="form-group">
                                                                                    <input type="text" class="form-control" id="slider_text" name="slider_text" value="<?php echo $key->slider_text;?>">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-3">
                                                                                <label>Gambar Slider </label>
                                                                            </div>
                                                                            <div class="col-9">
                                                                                <div class="form-group">
                                                                                    <span class="text-red">file sebelumnya: </span><a href="<?php echo base_url()."upload/slider/".$key->slider_image;?>" target="_blank" ><?php echo $key->slider_image;?></a>
                                                                                    <input type="file" class="form-control" name="slider_image" required="required" accept=".png, .jpeg, .jpg">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="submit" class="btn btn-primary ml-1">
                                                                                <i class="bx bx-check d-block d-sm-none"></i>
                                                                                <span class="d-none d-sm-block">Simpan</span>
                                                                            </button>
                                                                            <button type="reset" class="btn btn-light-secondary">
                                                                                <i class="bx bx-x d-block d-sm-none"></i>
                                                                                <span class="d-none d-sm-block">Reset</span>
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                            <?php echo form_close(); ?>
                                                        </div>
                                                    </div>
                                                </div>

                                        <?php
                                                $no++;
                                            }
                                        } else {
                                            echo '
                                                <tr>
                                                    <td colspan="3">Tidak ada data ditemukan</td>
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
        <!-- Slider Landing Page end -->
    </div>