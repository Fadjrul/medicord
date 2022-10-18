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
    </div>

    <!-- Page content -->
    <div class="page-content">
        <!-- Data Pasien start -->
        <section class="section">
            <div class="row" id="table-hover-row">
                <div class="col-12">
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
                            <div class="row m-2">
                                <div class="col-4 text-start">
                                    <label for="rowpage">entries per page</label>
                                    <select class="form-control mt-2" id="rowpage">
                                        <?php
                                        $rowpage = array(5, 10, 25, 50, 100);
                                        for ($r = 0; $r < count($rowpage); $r++) {
                                            if ($rowpage[$r] == $this->session->userdata('sess_rowpage')) {
                                                echo '<option value="' . $rowpage[$r] . '" selected>' . $rowpage[$r] . '</option>';
                                            } else {
                                                echo '<option value="' . $rowpage[$r] . '">' . $rowpage[$r] . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-4">

                                </div>
                                <div class="col-4 text-end">
                                    <a href="<?= site_url('pasien/create_page'); ?>" class="btn btn-sm btn-primary">
                                        <i class="fas fa-plus"></i> Add
                                    </a>
                                    <!-- cetak -->
                                    <a href="<?= site_url('pasien/index'); ?>" target="_blank" class="btn btn-sm btn-secondary">
                                        <i class="fas fa-print"></i> Cetak
                                    </a>
                                    <div class="mt-2">
                                        <?php echo form_open("pasien/search") ?>
                                        <input type="text" class="form-control" name="key" placeholder="Search....">
                                        <?php echo form_close(); ?>
                                    </div>
                                </div>
                            </div>

                            <!-- data tabel -->
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>No. Rekam Medis</th>
                                            <th>Nama Pasien</th>
                                            <th>NIK / No. KTP</th>
                                            <th>Nama Kepala Keluarga</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Alamat</th>
                                            <th>No. Telp</th>
                                            <th>No. BPJS</th>
                                            <th>dw</th>
                                            <th>lw</th>
                                            <th>Status Pasien</th>
                                            <th>Jenis Kepesertaan</th>
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
                                                    <td><?php echo $key->nik_pasien; ?></td>
                                                    <td><?php echo $key->nama_kepala_keluarga; ?></td>
                                                    <td><?php echo $key->jenis_kelamin; ?></td>
                                                    <td><?php echo $key->tgl_lahir_pasien; ?></td>
                                                    <td><?php echo $key->alamat_pasien; ?></td>
                                                    <td><?php echo $key->no_telp_pasien; ?></td>
                                                    <td><?php echo $key->no_bpjs_pasien; ?></td>
                                                    <td><?php echo $key->dw; ?></td>
                                                    <td><?php echo $key->lw; ?></td>
                                                    <td><?php echo $key->status_pasien; ?></td>
                                                    <td><?php echo $key->jns_kepesertaan; ?></td>
                                                    <td><?php echo $key->createtime; ?></td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-info dropdown-toggle" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                                                                Aksi
                                                            </button>
                                                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-lg-start">
                                                                <li><a class="dropdown-item" href="#">Detail</a></li>
                                                                <li><a class="dropdown-item" href="#">Update</a></li>
                                                                <li>
                                                                    <?php echo form_open("pasien/delete") ?>
                                                                    <?php echo csrf(); ?>
                                                                    <button type="submit" class="dropdown-item">Delete</button>
                                                                    <input type="hidden" class="form-control" name="id_pasien" required="required" value="<?php echo $key->id_pasien; ?>">
                                                                    <?php echo form_close(); ?>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>

                                        <?php
                                                $no++;
                                            }
                                        } else {
                                            echo '
                                        <tr>
                                            <td colspan="3">Tidak ada ditemukan</td>
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
            </div>
        </section>
        <!-- Data Pasien end -->
    </div>