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
        <!-- Link start -->
        <section class="section">
            <div class="card">
                <div class="card-content">
                    <div class="row me-4 mt-4">
                        <div class="col-md-12 col-12 text-end">
                            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#FormTambah"><i class="fas fa-plus"></i>Tambah </button>
                        </div>
                            <!-- Modal Tambah Link -->
                            <div class="modal fade text-start" id="FormTambah" tabindex="-1" role="dialog"
                                aria-labelledby="myModalLabel33" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                    role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-info">
                                            <h4 class="modal-title" id="myModalLabel33">Form Tambah Link</h4>
                                            <button type="button" class="close" data-bs-dismiss="modal"
                                                aria-label="Close">
                                                <i data-feather="x"></i>
                                            </button>
                                        </div>
                                        <?php echo form_open_multipart("link/create")?>
                                        <form>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="form-group">
                                                        <?php echo csrf(); ?>
                                                        <label for=""><b>Link Terkait <span style="color:red">*</span></b></label>
                                                        <input type="text" class="form-control" placeholder="Link Terkait" name="link_name" required="required">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for=""><b>Url Link Terkait <span style="color:red">*</span></b></label>
                                                        <input type="text" class="form-control" placeholder="Url Link Terkait" name="link_url" required="required">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for=""><b>Gambar Link Terkait <span style="color:red">*</span></b></label>
                                                        <input type="file" class="form-control" placeholder="Gambar" name="link_image" required="required" accept=".jpg, ,jpeg, .png">
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
                                            <th>Link Terkait</th>
                                            <th>Url Link</th>
                                            <th>Gambar</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if ($link) {
                                            $nox = 1;
                                            $no = 1;
                                            foreach ($link as $key) {

                                        ?>
                                                <tr>
                                                    <td><?php echo $no + $numbers; ?></td>
                                                    <td><?php echo $key->link_name;?></td>
                                                    <td><?php echo $key->link_url;?></td>
                                                    <td><a href="<?php echo base_url()."upload/link/".$key->link_image;?>" target="_blank" ><?php echo $key->link_image;?></a></td>
                                                    <td>
                                                        <div class="btn-group dropstart mb-1">
                                                            <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                                                                Aksi
                                                            </button>
                                                            <ul class="dropdown-menu">
                                                                <li>
                                                                    <button type="submit" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#FormDetail<?php echo $key->link_id;?>">Detail</button>
                                                                </li>
                                                                <li>
                                                                    <button type="submit" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#FormUbah<?php echo $key->link_id;?>">Ubah</button>
                                                                </li>
                                                                <li>
                                                                    <?php echo form_open_multipart("link/delete") ?>
                                                                    <?php echo csrf(); ?>
                                                                    <button type="submit" class="dropdown-item">Hapus</button>
                                                                    <input type="hidden" class="form-control" name="link_id" required="required" value="<?php echo $key->link_id; ?>">
                                                                    <?php echo form_close(); ?>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <!-- Modal Detail Link -->
                                                <div class="modal fade text-start" id="FormDetail<?php echo $key->link_id?>" tabindex="-1" role="dialog"
                                                    aria-labelledby="myModalLabel33" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                                        role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-info">
                                                                <h4 class="modal-title" id="myModalLabel33">Form Detail Link</h4>
                                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><i data-feather="x"></i></button>
                                                            </div>
                                                            <form>
                                                                 <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="form-group">
                                                                            <b>Link Terkait :</b><br><?php echo $key->link_name;?><br><br>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                        
                                                                        <div class="modal-footer">
                                                                            <button type="reset" class="btn btn-light-secondary"><i class="bx bx-x d-block d-sm-none"></i><span class="d-none d-sm-block" data-bs-dismiss="modal">Tutup</span>
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Modal Ubah Link -->
                                                <div class="modal fade text-start" id="FormUbah<?php echo $key->link_id?>" tabindex="-1" role="dialog"
                                                    aria-labelledby="myModalLabel33" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                                        role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-info">
                                                                <h4 class="modal-title" id="myModalLabel33">Form Ubah Link</h4>
                                                                <button type="button" class="close" data-bs-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <i data-feather="x"></i>
                                                                </button>
                                                            </div>
                                                            <?php echo form_open_multipart("link/update")?>
                                                            <form>
                                                                 <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="form-group">
                                                                            <?php echo csrf(); ?>
                                                                            <label for=""><b>Link Terkait <span style="color:red">*</span></b></label>
                                                                            <input type="text" class="form-control" placeholder="Link Terkait" name="link_name" required="required" value="<?php echo $key->link_name;?>">
                                                                            <input type="hidden" class="form-control" name="link_id" required="required" value="<?php echo $key->link_id;?>">
                                                                            <input type="hidden" class="form-control" name="link_image_old" required="required" value="<?php echo $key->link_image;?>">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for=""><b>Url Link Terkait <span style="color:red">*</span></b></label>
                                                                            <input type="text" class="form-control" placeholder="Url Link Terkait" name="link_url" required="required" value="<?php echo $key->link_url;?>">
                                                                        </div>
                                                                        
                                                                        <div class="form-group">
                                                                            <label for=""><b>File Produk Hukum</b></label><br>
                                                                            <span class="text-red">file sebelumnya: </span><a href="<?php echo base_url()."upload/link/".$key->link_image;?>" target="_blank" ><?php echo $key->link_image;?></a>
                                                                            <input type="file" class="form-control" placeholder="Link Terkait" name="link_image" accept=".jpg, .jpeg, .png">
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
                                                <tr class="text-center">
                                                    <td colspan="5">Tidak ada data ditemukan</td>
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
        <!-- Link end -->
    </div>