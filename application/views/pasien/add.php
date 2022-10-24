    <!-- Page content Header -->
    <div class="page-heading">
        <div class="row">
            <!-- Page Title -->
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Tambah Data Pasien</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <!-- Breadcrumb -->
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard/index');?>"> Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo site_url('pasien/index');?>"> Data Pasien</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
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
                                <?php echo form_open_multipart("pasien/create")?>
                                    <form class="form">
                                        <div class="row">
                                            <div class="row">
                                                <div class="col-md-2 col-12">
                                                    <label for="nama_pasien">Nama Pasien</label>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                <?php echo csrf();?>
                                                    <input type="text" id="nama_pasien" class="form-control"
                                                        placeholder="Nama Pasien" name="nama_pasien" required="required">
                                                </div>
                                                <div class="col-md-2 col-12">
                                                    <label for="nama_kepala_keluarga">Nama Kepala Keluarga</label>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <input type="text" id="nama_kepala_keluarga" class="form-control"
                                                    name="nama_kepala_keluarga" placeholder="nama kepala keluarga" required="required">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-2 col-12">
                                                    <label for="nik_pasien">NIK / No. KTP </label>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <input type="text" id="nik_pasien" class="form-control" placeholder="nik atau no. ktp"
                                                    name="nik_pasien" required="required">
                                                </div>
                                                <div class="col-md-2 col-12">
                                                    <label for="no_telp_pasien">Nomor Telepon</label>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <input type="text" id="no_telp_pasien" class="form-control"
                                                        placeholder="+62 " name="no_telp_pasien">
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
                                                <div class="col-md-2 col-12">
                                                    <label for="no_bpjs_pasien">Nomor BPJS</label>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <input type="text" id="no_bpjs_pasien" class="form-control"
                                                        placeholder="nomor BPJS" name="no_bpjs_pasien">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-2 col-12">
                                                    <label for="tgl_lahir_pasien">Tanggal Lahir</label>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <input type="date" id="tgl_lahir_pasien" class="form-control" name="tgl_lahir_pasien" required="required">
                                                </div>
                                                <div class="col-md-2 col-12">

                                                </div>
                                                <div class="col-md-1 col-12">
                                                    <label for="dw">dw</label>
                                                </div>
                                                <div class="col-md-1 form-group">
                                                    <input type="text" id="dw" class="form-control"
                                                            placeholder="dw" name="dw">
                                                </div>
                                                <div class="col-md-1 col-12">
                                                    <label for="lw">lw</label>
                                                </div>
                                                <div class="col-md-1 form-group">
                                                    <input type="text" id="lw" class="form-control"
                                                            placeholder="lw" name="lw">
                                                </div>
                                            </div>    
                                            <div class="row">
                                                <div class="col-md-2 col-12">
                                                    <label for="alamat_pasien">Alamat</label>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <textarea id="alamat_pasien" class="form-control" name="alamat_pasien" placeholder="Alamat" rows="4"></textarea>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-2 col-12">
                                                    <label for="status_pasien_id">Status Pasien</label>
                                                </div>   
                                                <div class="col-md-4 form-group">
                                                    <fieldset class="form-group">
                                                        <select class="form-select" id="status_pasien_id" name="status_pasien_id">
                                                            <?php
                                                                foreach($status_pasien as $sp){
                                                                    if($pasien[0]->status_pasien_id == $sp->id_status_pasien){
                                                                        echo '<option value="'.$sp->id_status_pasien.'" selected>'.$sp->nama_status_pasien.'</option>';
                                                                    }else{
                                                                        echo '<option value="'.$sp->id_status_pasien.'">'.$sp->$nama_status_pasien.'</option>';
                                                                    }
                                                                }
                                                            ?>
                                                        </select>
                                                    </fieldset>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-2 col-12">
                                                    <label for="kepesertaan_pasien_id">Jenis Kepesertaan</label>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <fieldset class="form-group">
                                                        <select class="form-select" id="kepesertaan_pasien_id" name="kepesertaan_pasien_id">
                                                            <?php
                                                                foreach($kepesertaan_pasien as $kp){
                                                                    if($pasien[0]->kepesertaan_pasien_id == $kp->id_kepesertaan_pasien){
                                                                        echo '<option value="'.$kp->id_kepesertaan_pasien.'" selected>'.$kp->nama_kepesertaan_pasien.'</option>';
                                                                    }else{
                                                                        echo '<option value="'.$kp->id_kepesertaan_pasien.'">'.$kp->nama_kepesertaan_pasien.'</option>';
                                                                    }
                                                                }
                                                            ?>
                                                        </select>
                                                    </fieldset>
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
        <!-- Data Pasien end -->
    </div>