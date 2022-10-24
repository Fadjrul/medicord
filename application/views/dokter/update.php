    <!-- Page content Header -->
    <div class="page-heading">
        <div class="row">
            <!-- Page Title -->
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Ubah Data Dokter</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <!-- Breadcrumb -->
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard/index');?>"> Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo site_url('dokter/index');?>"> Data Dokter</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Ubah Data</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <!-- Page content -->
    <div class="page-content">
        <!-- Ubah Data Dokter start -->
        <section class="section">
            <div class="row" id="table-hover-row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-2 text-center">
                                    <img src="<?php echo base_url();?>assets/images/kota_kendari.png" alt="Logo Kota Kendari" height="120">
                                </div>
                                <div class="col-8 text-center">
                                    <h4>DINAS KESEHATAN KOTA KENDARI</h4>
                                    <h2>UPTD PUSKESMAS MEKAR</h2>
                                    <p><small><?php echo $setting[0]->setting_address;?> Telp <?php echo $setting[0]->setting_phone;?> <br> Email : <?php echo $setting[0]->setting_email;?></small></p>
                                </div>
                                <div class="col-2 text-center">
                                    <img src="<?php echo base_url();?>assets/images/puskesmas.png" alt="Logo Puskesmas" height="120">
                                </div>
                                <hr>
                            </div>
                        </div>

                        <div class="card-content">
                            <div class="card-body">
                                <?php echo form_open_multipart("dokter/update")?>
                                    <form class="form">
                                        <div class="row">
                                            <div class="row">
                                                <div class="col-md-2 col-12">
                                                    <label for="nama_dokter">Nama Dokter</label>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                <?php echo csrf();?>
                                                    <input type="hidden" id="id_pasien" class="form-control" name="id_pasien" required="required" value="<?php echo $dokter[0]->id_dokter; ?>">
                                                    <input type="text" id="nama_dokter" class="form-control"
                                                        placeholder="Nama Dokter" name="nama_dokter" required="required" value="<?php echo $dokter[0]->nama_dokter; ?>">
                                                </div>
                                                <div class="col-md-2 col-12">
                                                    <label for="no_telp">Nomor Telepon</label>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <input type="text" id="no_telp" class="form-control"
                                                        placeholder="+62 " name="no_telp" value="<?php echo $dokter[0]->no_telp; ?>">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-2 col-12">
                                                    <label for="spesialis">Spesialis</label>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <input type="text" id="spesialis" class="form-control"
                                                    name="spesialis" placeholder="Spesialis" required="required" value="<?php echo $dokter[0]->spesialis; ?>">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-2 col-12">
                                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                                </div>
                                                <div class="col-md-4 form-group">
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
                                            <div class="row">
                                                <div class="col-md-2 col-12">
                                                    <label for="alamat">Alamat</label>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <textarea id="alamat" class="form-control" name="alamat" placeholder="Alamat" rows="4"><?php echo $dokter[0]->alamat; ?></textarea>
                                                </div>
                                            </div>

                                            <div class="col-12 d-flex justify-content-end mt-2">
                                                <button type="submit" class="btn btn-primary me-1 mb-1" title="tambah">Submit</button>
                                                <button type="reset" class="btn btn-white me-1 mb-1" title="reset">Reset</button>    
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
        <!-- Tambah Data Dokter end -->
    </div>