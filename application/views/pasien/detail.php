    <!-- Page content Header -->
    <div class="page-heading">
        <div class="row">
            <!-- Page Title -->
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Detail Data Pasien</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <!-- Breadcrumb -->
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard/index'); ?>"> Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo site_url('pasien/index'); ?>"> Data Pasien</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Detail Data Pasien</li>
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
                            <div class="row">
                                <div class="col-12 text-center">
                                    <h3>Data Pasien</h3>
                                </div>
                            </div>
                        </div>

                        <div class="card-content">
                            <div class="card-body">
                                <?php echo form_open_multipart("pasien/detail_page") ?>
                                <form class="form">
                                    <div class="row">
                                        <div class="row mb-3">
                                            <div class="col-12 text-end">
                                                <strong>
                                                    <p>No. Rekam Medis : <?php echo $pasien[0]->no_rekam_medis; ?></p>
                                                </strong>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2 col-12">
                                                <label for="nama_pasien">Nama Pasien</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <?php echo csrf(); ?>
                                                <p>: <?php echo $pasien[0]->nama_pasien; ?></p>
                                            </div>
                                            <div class="col-md-2 col-12">
                                                <label for="nama_kepala_keluarga">Nama Kepala Keluarga</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <p>: <?php echo $pasien[0]->nama_kepala_keluarga; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2 col-12">
                                                <label for="nik_pasien">NIK / No. KTP </label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <p>: <?php echo $nik_pasien; ?></p>
                                            </div>
                                            <div class="col-md-2 col-12">
                                                <label for="no_bpjs_pasien">Nomor BPJS</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <p>: <?php echo $pasien[0]->no_bpjs_pasien; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2 col-12">
                                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <p>: <?php echo $pasien[0]->jenis_kelamin; ?></p>
                                            </div>
                                            <div class="col-md-2 col-12">
                                                <label for="dw">dw</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <p>: <?php echo $pasien[0]->dw; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2 col-12">
                                                <label for="tgl_lahir_pasien">Tanggal Lahir</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <p>: <?php echo $pasien[0]->tgl_lahir_pasien; ?></p>
                                            </div>
                                            <div class="col-md-2 col-12">
                                                <label for="lw">lw</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <p>: <?php echo $pasien[0]->lw; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2 col-12">
                                                <label for="alamat_pasien">Alamat</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <p>: <?php echo $alamat_pasien; ?></p>
                                            </div>
                                            <div class="col-md-2 col-12">
                                                <label for="no_telp_pasien">Nomor Telepon</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <p>: <?php echo $no_telp_pasien; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2 col-12">
                                                <label for="status_pasien_id">Status Pasien</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <p>:
                                                    <?php
                                                    foreach ($status_pasien as $sp) {
                                                        if ($pasien[0]->status_pasien_id == $sp->id_status_pasien) {
                                                            echo "$sp->nama_status_pasien";
                                                        }
                                                    }
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2 col-12">
                                                <label for="kepesertaan_pasien_id">Jenis Kepesertaan</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <p>:
                                                    <?php
                                                    foreach ($kepesertaan_pasien as $kp) {
                                                        if ($pasien[0]->kepesertaan_pasien_id == $kp->id_kepesertaan_pasien) {
                                                            echo "$kp->nama_kepesertaan_pasien";
                                                        }
                                                    }
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <?php echo form_close(); ?>
                            </div>
                        </div>
                        <div class="p-3">
                            <p><small>Page rendered in <strong>{elapsed_time}</strong> seconds.</small></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Data Pasien end -->
    </div>