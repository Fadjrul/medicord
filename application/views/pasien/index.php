    <!-- Page content Header -->
    <div class="page-heading">
        <div class="row">
            <!-- Page Title -->
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Pasien</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <!-- Breadcrumb -->
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard/index'); ?>"> Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Pasien</a></li>
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
        <!-- Data Pasien start -->
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
                            <a href="<?= site_url('pasien/create_page'); ?>" class="btn btn-sm btn-primary">
                                <i class="fas fa-plus"></i> Tambah
                            </a>
                            <!-- cetak -->
                            <a href="<?= site_url('pasien/index'); ?>" target="_blank" class="btn btn-sm btn-secondary">
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
                                            <th>No. Rekam Medis</th>
                                            <th>Nama Pasien</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Waktu Pendaftaran</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if ($pasien) {
                                            $nox = 1;
                                            $no = 1;
                                            foreach ($pasien as $key) {
                                        ?>
                                                <tr>
                                                    <td><?php echo $no + $numbers; ?></td>
                                                    <td><?php echo $key->no_rekam_medis; ?></td>
                                                    <td><?php echo $key->nama_pasien; ?></td>
                                                    <td><?php echo $key->jenis_kelamin; ?></td>
                                                    <td><?php echo $key->tgl_lahir_pasien; ?></td>
                                                    <td><?php echo $key->createtime; ?></td>
                                                    <td>
                                                        <div class="btn-group dropstart mb-1">
                                                            <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                                                                Aksi
                                                            </button>
                                                            <ul class="dropdown-menu">
                                                                <li>
                                                                    <button type="submit" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#FormDetail<?php echo $key->id_pasien; ?>">Detail</button>
                                                                </li>
                                                                <li>
                                                                    <button type="submit" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#FormUbah<?php echo $key->id_pasien; ?>">Ubah</button>
                                                                </li>
                                                                <li>
                                                                    <button type="submit" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#FormHapus<?php echo $key->id_pasien; ?>">Hapus</button>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <!-- Modal key Detail Pasien -->
                                                <div class="modal fade text-start" id="FormDetail<?php echo $key->id_pasien; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                                        <div class="modal-content">
                                                            <?php echo form_open("pasien/detail_page/" . $key->id_pasien); ?>
                                                            <div class="modal-header text-center">
                                                                <h4 class="modal-title" id="myModalLabel33">Masukkan Kunci <?php if ($key->jns_key_id == 1) {
                                                                                                                                echo "(Key AES-128)";
                                                                                                                            } else echo "(Key SPECK-128)"; ?></h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <?php echo csrf(); ?>
                                                                        <input type="password" class="form-control" id="key" placeholder="kunci..." name="key" required="required">
                                                                        <input type="hidden" class="form-control" id="jns_key_id" placeholder="kunci..." name="jns_key_id" value="<?php echo $key->jns_key_id; ?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-primary ml-1">
                                                                    <i class="bx bx-check d-block d-sm-none"></i>
                                                                    <span class="d-none d-sm-block">Masuk</span>
                                                                </button>
                                                                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                                    <span class="d-none d-sm-block">Batal</span>
                                                                </button>
                                                            </div>
                                                            <?php echo form_close(); ?>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Modal key Ubah Pasien -->
                                                <div class="modal fade text-start" id="FormUbah<?php echo $key->id_pasien; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                                        <div class="modal-content">
                                                            <?php echo form_open("pasien/update_page/" . $key->id_pasien); ?>
                                                            <div class="modal-header text-center">
                                                                <h4 class="modal-title" id="myModalLabel33">Masukkan Kunci</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <?php echo csrf(); ?>
                                                                        <input type="password" class="form-control" id="key" placeholder="kunci..." name="key" required="required">
                                                                        <input type="hidden" class="form-control" id="jns_key_id" placeholder="kunci..." name="jns_key_id" value="<?php echo $key->jns_key_id; ?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-primary ml-1">
                                                                    <i class="bx bx-check d-block d-sm-none"></i>
                                                                    <span class="d-none d-sm-block">Ok</span>
                                                                </button>
                                                                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                                    <span class="d-none d-sm-block">Batal</span>
                                                                </button>
                                                            </div>
                                                            <?php echo form_close(); ?>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Modal key Hapus Pasien -->
                                                <div class="modal fade text-start" id="FormHapus<?php echo $key->id_pasien; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                                        <div class="modal-content">
                                                            <?php echo form_open("pasien/delete" . $key->id_pasien); ?>
                                                            <div class="modal-header text-center">
                                                                <h4 class="modal-title" id="myModalLabel33">Masukkan Kunci</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <?php echo csrf(); ?>
                                                                        <input type="password" class="form-control" id="nama_poliklinik" placeholder="kunci..." name="key" required="required">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-primary ml-1">
                                                                    <i class="bx bx-check d-block d-sm-none"></i>
                                                                    <span class="d-none d-sm-block">Ok</span>
                                                                </button>
                                                                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                                    <span class="d-none d-sm-block">Batal</span>
                                                                </button>
                                                            </div>
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
                <div class="card-footer p-3">

                    <!-- PAGINATION -->
                    <div class="float-end"><?php echo $links; ?></div>

                    <div class="p-3">
                        <p><small>Page rendered in <strong>{elapsed_time}</strong> seconds.</small></p>
                    </div>
                </div>

        </section>
        <!-- Data Pasien end -->
    </div>