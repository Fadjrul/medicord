    <!-- Page content Header -->
    <div class="page-heading">
        <div class="row">
            <!-- Page Title -->
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Penyakit (ICD X)</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <!-- Breadcrumb -->
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Data Penyakit (ICD X)</li>
                    </ol>
                </nav>
            </div>
        </div>
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
                            <a href="<?= site_url('penyakit/create_page'); ?>" class="btn btn-sm btn-primary">
                                <i class="fas fa-plus"></i> Tambah
                            </a>
                            <!-- cetak -->
                            <a href="<?= site_url('penyakit/index'); ?>" target="_blank" class="btn btn-sm btn-secondary">
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
                                            <th>Nama Penyakit</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if ($penyakit) {
                                            $nox = 1;
                                            $no = 1;
                                            foreach ($penyakit as $key) {

                                        ?>
                                                <tr>
                                                    <td><?php echo $no + $numbers; ?></td>
                                                    <td><?php echo $key->nama_penyakit ?></td>
                                                    <td>
                                                        <div class="btn-group dropstart mb-1">
                                                            <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                                                                Aksi
                                                            </button>
                                                            <ul class="dropdown-menu">
                                                                <li>
                                                                    <?php echo form_open("penyakit/detail_page/" . $key->id_penyakit); ?>
                                                                    <?php echo csrf(); ?>
                                                                    <button type="submit" class="dropdown-item">Detail</button>
                                                                    <input type="hidden" class="form-control" name="id_penyakit" required="required">
                                                                    <?php echo form_close(); ?>
                                                                </li>
                                                                <li>
                                                                    <?php echo form_open("penyakit/update_page/" . $key->id_penyakit); ?>
                                                                    <?php echo csrf(); ?>
                                                                    <button type="submit" class="dropdown-item">Ubah</button>
                                                                    <input type="hidden" class="form-control" name="id_penyakit" required="required">
                                                                    <?php echo form_close(); ?>
                                                                </li>
                                                                <li>
                                                                    <?php echo form_open("penyakit/delete") ?>
                                                                    <?php echo csrf(); ?>
                                                                    <button type="submit" class="dropdown-item">Hapus</button>
                                                                    <input type="hidden" class="form-control" name="id_penyakit" required="required" value="<?php echo $key->id_penyakit; ?>">
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
                                                <tr class="text-center">
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
        <!-- Data Penyakit end -->
    </div>