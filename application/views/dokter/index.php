    <!-- Page content Header -->
    <div class="page-heading">
        <div class="row">
            <!-- Page Title -->
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Dokter</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <!-- Breadcrumb -->
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Data Dokter</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <!-- Page content -->
    <div class="page-content">
        <!-- Data Dokter start -->
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-2 text-center">
                            <img src="<?php echo base_url(); ?>assets/images/kota_kendari.png" alt="Logo Kota Kendari" height="120">
                        </div>
                        <div class="col-8 text-center">
                            <h4>DINAS KESEHATAN KOTA KENDARI</h4>
                            <h2>UPTD PUSKESMAS MEKAR</h2>
                            <p><small><?php echo $setting[0]->setting_address; ?> Telp <?php echo $setting[0]->setting_phone; ?> <br> Email : <?php echo $setting[0]->setting_email; ?></small></p>
                        </div>
                        <div class="col-2 text-center">
                            <img src="<?php echo base_url(); ?>assets/images/puskesmas.png" alt="Logo Puskesmas" height="120">
                        </div>
                        <hr>
                    </div>
                </div>

                <div class="card-content">
                    <div class="row me-4">
                        <div class="col-md-12 col-12 text-end">
                            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#FormTambah"><i class="fas fa-plus"></i>
                                    Tambah
                            </button>

                            <!-- Modal Tambah Dokter -->
                            <div class="modal fade text-start" id="FormTambah" tabindex="-1" role="dialog"
                                aria-labelledby="myModalLabel33" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                    role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-info">
                                            <h4 class="modal-title" id="myModalLabel33">Form Tambah Dokter</h4>
                                            <button type="button" class="close" data-bs-dismiss="modal"
                                                aria-label="Close">
                                                <i data-feather="x"></i>
                                            </button>
                                        </div>
                                        <?php echo form_open("dokter/create")?>
                                        <form>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-3">
                                                        <label for="nama_dokter">Nama Dokter </label>
                                                    </div>
                                                    <div class="col-9">
                                                        <div class="form-group">
                                                        <?php echo csrf();?>
                                                            <input type="text" placeholder="Cnth. dr. John"
                                                                class="form-control" id="nama_dokter" name="nama_dokter" required="required">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-3">
                                                        <label for="spesialis">Spesialis </label>
                                                    </div>
                                                    <div class="col-9">
                                                        <div class="form-group">
                                                            <input type="text" placeholder="Cnth. Umum"
                                                                class="form-control" id="spesialis" name="spesialis" required="required">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-3">
                                                        <label for="jenis_kelamin">Jenis Kelamin </label>
                                                    </div>
                                                    <div class="col-9">
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col">
                                                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="Laki-laki" value="Laki-laki" checked>
                                                                    <label for="Laki-laki">Laki-laki</label>
                                                                </div>
                                                                <div class="col">
                                                                    <input class="form-check-input" type="radio" name="jenis_kelamin" value="Perempuan" id="Perempuan">
                                                                    <label for="Perempuan">Perempuan</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-3">
                                                        <label for="no_telp">No. telpon </label>
                                                    </div>
                                                    <div class="col-9">
                                                        <div class="form-group">
                                                            <input type="text" placeholder="08..."
                                                                class="form-control" id="no_telp" name="no_telp" required="required">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-3">
                                                        <label for="alamat">Alamat </label>
                                                    </div>
                                                    <div class="col-9">
                                                        <div class="form-group">
                                                            <textarea id="alamat" class="form-control" name="alamat" rows="4"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-3">
                                                        <label for="ttd">tanda tangan</label>
                                                    </div>
                                                    <div class="col-9">
                                                        <div class="form-group">
                                                            <input type="hidden" class="form-control" name="ttd_dokter">
                                                            <input type="file" id="ttd" class="form-control" name="ttd">
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

                            <!-- cetak -->
                            <a href="<?= site_url('dokter/index'); ?>" target="_blank" class="btn btn-sm btn-secondary">
                                <i class="fas fa-print"></i> Cetak
                            </a>
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
                                            <th>Nama Dokter</th>
                                            <th>Spesialis</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Alamat</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if ($dokter) {
                                            $nox = 1;
                                            $no = 1;
                                            foreach ($dokter as $key) {

                                        ?>
                                                <tr>
                                                    <td><?php echo $no + $numbers; ?></td>
                                                    <td><?php echo $key->nama_dokter; ?></td>
                                                    <td><?php echo $key->spesialis; ?></td>
                                                    <td><?php echo $key->jenis_kelamin; ?></td>
                                                    <td><?php echo $key->alamat; ?></td>
                                                    <td>
                                                        <div class="btn-group dropstart mb-1">
                                                            <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                                                                Aksi
                                                            </button>
                                                            <ul class="dropdown-menu">
                                                                <li>
                                                                    <button type="submit" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#FormDetail<?php echo $key->id_dokter;?>">Detail</button>
                                                                </li>
                                                                <li>
                                                                    <button type="submit" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#FormUbah<?php echo $key->id_dokter;?>">Ubah</button>
                                                                </li>
                                                                <li>
                                                                    <?php echo form_open("dokter/delete") ?>
                                                                    <?php echo csrf(); ?>
                                                                    <button type="submit" class="dropdown-item">Hapus</button>
                                                                    <input type="hidden" class="form-control" name="id_dokter" required="required" value="<?php echo $key->id_dokter; ?>">
                                                                    <?php echo form_close(); ?>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <!-- Modal Detail Dokter -->
                                                <div class="modal fade text-start" id="FormDetail<?php echo $key->id_dokter;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                                        role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-info">
                                                                <h4 class="modal-title" id="myModalLabel33">Form Detail Dokter</h4>
                                                                <button type="button" class="close" data-bs-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <i data-feather="x"></i>
                                                                </button>
                                                            </div>
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="col-3">
                                                                            <label>Nama Dokter </label>
                                                                        </div>
                                                                        <div class="col-9">
                                                                            <?php echo csrf();?>
                                                                                <label>: <?php echo $key->nama_dokter;?></label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-3">
                                                                            <label>Spesialis </label>
                                                                        </div>
                                                                        <div class="col-9">
                                                                            <label>: <?php echo $key->spesialis;?></label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-3">
                                                                            <label>Jenis Kelamin </label>
                                                                        </div>
                                                                        <div class="col-9">
                                                                            <label>: <?php echo $key->jenis_kelamin;?></label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-3">
                                                                            <label>No. telpon </label>
                                                                        </div>
                                                                        <div class="col-9">
                                                                            <label>: <?php echo $key->no_telp;?></label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-3">
                                                                            <label>Alamat </label>
                                                                        </div>
                                                                        <div class="col-9">
                                                                            <label>: <?php echo $key->alamat;?></label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-3">
                                                                            <label>tanda tangan</label>
                                                                        </div>
                                                                        <div class="col-9">
                                                                            : <img src="<?php echo base_url();?>assets/core-images/<?php echo $key->ttd_dokter;?>" height="40" alt="Preview ttd dokter" name="ttd_dokter">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                                        <span class="d-none d-sm-block">Tutup</span>
                                                                    </button>
                                                                </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Modal Ubah Dokter -->
                                                <div class="modal fade text-start" id="FormUbah<?php echo $key->id_dokter;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                                        role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-info">
                                                                <h4 class="modal-title" id="myModalLabel33">Form Ubah Dokter</h4>
                                                                <button type="button" class="close" data-bs-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <i data-feather="x"></i>
                                                                </button>
                                                            </div>
                                                            <?php echo form_open("dokter/update")?>
                                                            <form>
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="col-3">
                                                                            <label for="nama_dokter">Nama Dokter </label>
                                                                        </div>
                                                                        <div class="col-9">
                                                                            <div class="form-group">
                                                                            <?php echo csrf();?>
                                                                                <input type="hidden" class="form-control" name="id_dokter" value="<?php echo $key->id_dokter;?>" required>
                                                                                <input type="text" placeholder="Cnth. dr. John"
                                                                                    class="form-control" id="nama_dokter" name="nama_dokter" value="<?php echo $key->nama_dokter;?>" required="required">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-3">
                                                                            <label for="spesialis">Spesialis </label>
                                                                        </div>
                                                                        <div class="col-9">
                                                                            <div class="form-group">
                                                                                <input type="text" placeholder="Cnth. Umum"
                                                                                    class="form-control" id="spesialis" name="spesialis" value="<?php echo $key->spesialis;?>" required="required">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-3">
                                                                            <label for="jenis_kelamin">Jenis Kelamin </label>
                                                                        </div>
                                                                        <div class="col-9">
                                                                            <div class="form-group">
                                                                                <div class="row">
                                                                                    <div class="col">
                                                                                        <?php
                                                                                            $l='Laki-laki';
                                                                                                if($l == $key->jenis_kelamin){
                                                                                                    echo '<input class="form-check-input" type="radio" name="jenis_kelamin" id="Laki-laki" value="Laki-laki" checked>
                                                                                                    <label for="Laki-laki">Laki-laki</label>';
                                                                                                }else{
                                                                                                    echo '<input class="form-check-input" type="radio" name="jenis_kelamin" id="Laki-laki" value="Laki-laki">
                                                                                                    <label for="Laki-laki">Laki-laki</label>';
                                                                                                }
                                                                                            
                                                                                        ?>
                                                                                    </div>
                                                                                    <div class="col">
                                                                                        <?php
                                                                                            $p='Perempuan';
                                                                                                if($p == $key->jenis_kelamin){
                                                                                                    echo '<input class="form-check-input" type="radio" name="jenis_kelamin" value="Perempuan" id="Perempuan" checked>
                                                                                                    <label for="Perempuan">Perempuan</label>';
                                                                                                }else{
                                                                                                    echo '<input class="form-check-input" type="radio" name="jenis_kelamin" value="Perempuan" id="Perempuan">
                                                                                                    <label for="Perempuan">Perempuan</label>';
                                                                                                }
                                                                                            
                                                                                        ?>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-3">
                                                                            <label for="no_telp">No. telpon </label>
                                                                        </div>
                                                                        <div class="col-9">
                                                                            <div class="form-group">
                                                                                <input type="text" placeholder="08..."
                                                                                    class="form-control" id="no_telp" name="no_telp" value="<?php echo $key->no_telp;?>" required="required">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-3">
                                                                            <label for="alamat">Alamat </label>
                                                                        </div>
                                                                        <div class="col-9">
                                                                            <div class="form-group">
                                                                                <textarea id="alamat" class="form-control" name="alamat" rows="4"><?php echo $key->alamat;?></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-3">
                                                                            <label for="ttd">tanda tangan</label>
                                                                        </div>
                                                                        <div class="col-9">
                                                                            <div class="form-group">
                                                                                <input type="hidden" class="form-control" name="ttd_dokter" value="<?php echo $key->ttd_dokter;?>">
                                                                                <input type="file" class="form-control" name="ttd">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-3">
                                                                            <label for="ttd">Preview</label>
                                                                        </div>
                                                                        <div class="col-9">
                                                                            <div class="form-group">
                                                                                <img src="<?php echo base_url();?>assets/core-images/<?php echo $key->ttd_dokter;?>" height="40" alt="Preview ttd dokter" name="ttd_dokter">
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
                                        <?php
                                                $no++;
                                            }
                                        } else {
                                            echo '
                                                <tr class="text-center">
                                                    <td colspan="6">Tidak ada data ditemukan</td>
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
        <!-- Data Dokter end -->
    </div>