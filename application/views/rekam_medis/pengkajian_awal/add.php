    <!-- Page content Header -->
    <div class="page-heading">
        <div class="row">
            <!-- Page Title -->
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Rekam Medis Pengkajian Awal</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <!-- Breadcrumb -->
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard/index');?>"> Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo site_url('pengkajian_awal/index');?>"> Rekam Medis Pengkajian Awal</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <!-- Page content -->
    <div class="page-content">
        <!-- Data Rekam Medis Pengkajian Awal start -->
        <section class="section">
            <div class="row" id="table-hover-row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-2 text-center">
                                    <img src="<?php echo base_url();?>assets/core-images/kota_kendari.png" alt="Logo Kota Kendari" height="120">
                                </div>
                                <div class="col-8 text-center">
                                    <h4>DINAS KESEHATAN KOTA KENDARI</h4>
                                    <h2>UPTD PUSKESMAS MEKAR</h2>
                                    <p><small><?php echo $setting[0]->setting_address;?> Telp <?php echo $setting[0]->setting_phone;?> <br> Email : <?php echo $setting[0]->setting_email;?></small></p>
                                </div>
                                <div class="col-2 text-center">
                                    <img src="<?php echo base_url();?>assets/core-images/puskesmas.png" alt="Logo Puskesmas" height="120">
                                </div>
                                <hr>
                            </div>
                        </div>

                        <div class="card-content">
                            <div class="row me-4 mt-1">
                                <div class="col-md-12 col-12 text-end">
                                    <a href="<?php echo site_url('pengkajian_awal')?>" class="btn btn-warning btn-sm" title="Kembali ke halaman sebelumya">kembali</a>
                                </div>
                            </div>
                            <div class="card-title">
                                <div class="row p-4">
                                    <div class="col-md-6 col-12 text-center">
                                        <h4>REKAM MEDIS KLIEN RAWAT JALAN PENGKAJIAN AWAL</h4>
                                    </div>
                                    <div class="col-md-6 col-12 border text-center">
                                        <h4>NO. REKAM MEDIS</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <?php echo form_open_multipart("pengkajian_awal/create")?>
                                    <form class="form">
                                        <div class="row table-responsive">
                                            <table cellpadding="5" class="table-borderless border-start border-end border-top border-bottom">
                                                <tr>
                                                    <td><label for="nama_pasien">Nama Lengkap</label></td>
                                                    <td><?php echo csrf();?>
                                                        <input type="text" id="nama_pasien" class="form-control"
                                                            placeholder="Nama Pasien" name="nama_pasien" required="required">
                                                    </td>
                                                    <td></td>
                                                    <td class="border-start"><label for="nama_petugas">Nama Petugas</label></td>
                                                    <td>
                                                        <input type="text" id="nama_petugas" class="form-control"
                                                            placeholder="Nama Petugas" name="nama_pegawai" required="required">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><label for="tgl_lahir_pasien">Tanggal Lahir</label></td>
                                                    <td>
                                                        <input type="date" id="tgl_lahir_pasien" class="form-control" name="tgl_lahir_pasien"  required="required">
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="Laki-laki" value="Laki-laki" checked>
                                                        <label for="Laki-laki">L</label>  / 
                                                        <input class="form-check-input" type="radio" name="jenis_kelamin" value="Perempuan" id="Perempuan">
                                                        <label for="Perempuan">P</label>
                                                    </td>
                                                    <td class="border-start"><label for="tgl_periksa">Tanggal Periksa</label></td>
                                                    <td>
                                                        <input type="date" id="tgl_periksa" class="form-control"
                                                            name="tgl_periksa" required="required">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-md-7">
                                                <label><strong>RIWAYAT KESEHATAN</strong></label>
                                            </div>
                                            <div class="col-md-2">
                                                <label for="alerrgi"><strong>ALERGI</strong></label>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="text" id="alerrgi" class="form-control input-border-bottom" name="alergi">
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-4">
                                                <label for="riwayat_penyakit">Riwayat Penyakit Dahulu</label>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="text" id="riwayat_penyakit" class="form-control input-border-bottom" name="riwayat_penyakit">
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-4">
                                                <label for="riwayat_pengobatan">Riwayat Pengobatan Terdahulu</label>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="text" id="riwayat_pengobatan" class="form-control input-border-bottom" name="riwayat_pengobatan">
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-4">
                                                <label for="riwayat_penyakit_keluarga">Riwayat Penyakit di Keluarga</label>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="text" id="riwayat_penyakit_keluarga" class="form-control input-border-bottom" name="riwayat_penyakit_keluarga">
                                            </div>
                                        </div>
                                        <div class="row mt-4 table-responsive">
                                            <table cellpadding="5" class="table-borderless border-start border-end border-top border-bottom">
                                                <tr>
                                                    <td colspan="4">
                                                        <label><strong>PEMERIKSAAN FISIK</strong></label>
                                                    </td>
                                                    <td>
                                                        <label><strong>MASALAH</strong></label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label for="kesadaran_fisik">Kesadaran</label>
                                                    </td>
                                                    <td>
                                                        <input type="text" id="kesadaran_fisik" class="form-control input-border-bottom" name="kesadaran_fisik">
                                                    </td>
                                                    <td>
                                                        <label for="gcs">GCS</label>
                                                    </td>
                                                    <td>
                                                        <input type="text" id="gcs" class="form-control input-border-bottom" name="gcs">
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="masalah_fisik" value="hipotermi" id="hipotermi">
                                                        <label class="form-check-label" for="hipotermi">hipotermi</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label for="tekanan_darah">Tekanan Darah</label>
                                                    </td>
                                                    <td>
                                                        <div class="input-group">
                                                            <input type="text" id="tekanan_darah" class="form-control input-border-bottom" name="tekanan_darah" aria-label="mmHg"><span class="input-group-text">mmHg</span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <label for="frekuensi_nadi">Frekuensi Nadi</label>
                                                    </td>
                                                    <td>
                                                        <div class="input-group">
                                                            <input type="text" id="frekuensi_nadi" class="form-control input-border-bottom" name="frekuensi_nadi" aria-label="x/mnt"><span class="input-group-text">x/mnt</span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="masalah_fisik" value="hipetermi" id="hiptermi">
                                                        <label class="form-check-label" for="hiptermi">hipetermi</label>
                                                    </td>
                                                </tr>
                                                <tr class="border-bottom">
                                                    <td>
                                                        <label for="frekuensi_nafas">Frekuensi Nafas</label>
                                                    </td>
                                                    <td>
                                                        <div class="input-group">
                                                            <input type="text" id="frekuensi_nafas" class="form-control input-border-bottom" name="frekuensi_nafas" aria-label="x/mnt"><span class="input-group-text">x/mnt</span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        
                                                        <label for="suhu_tubuh">Suhu Tubuh</label>
                                                    </td>
                                                    <td>
                                                        <input class="form-check-input" type="radio" name="suhu_tubuh" id="febris" value="febris">
                                                        <label for="febris">febris</label>  / 
                                                        <input class="form-check-input" type="radio" name="suhu_tubuh" value="afebris" id="afebris">
                                                        <label for="afebris">afebris</label>
                                                    </td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4">
                                                        <label><strong>SISTEM PERNAFASAN</strong></label>
                                                    </td>
                                                    <td class="border-start"></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label>a. Keluhan</label>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="keluhan_pernafasan" value="sesak" id="sesak">
                                                        <label class="form-check-label" for="sesak">sesak</label>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="keluhan_pernafasan" value="nyeri" id="nyeri">
                                                        <label class="form-check-label" for="nyeri">nyeri</label>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="keluhan_pernafasan" value="batuk" id="batuk">
                                                        <label class="form-check-label" for="batuk">batuk</label>
                                                    </td>
                                                    <td class="border-start">
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="masalah_pernafasan" value="Gangguan pola nafas" id="gangguan_pola_nafas">
                                                        <label class="form-check-label" for="gangguan_pola_nafas">Gangguan pola nafas</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label>b. Irama Nafas</label>
                                                    </td>
                                                    <td>
                                                        <input class="form-check-input" type="radio" name="irama_nafas" id="regular" value="regular">
                                                        <label for="regular">regular</label>
                                                    </td>
                                                    <td>
                                                        <input class="form-check-input" type="radio" name="irama_nafas" id="irregular" value="irregular">
                                                        <label for="irregular">irregular</label>
                                                    </td>
                                                    <td></td>
                                                    <td class="border-start">
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="masalah_pernafasan" value="Gangguan Pertukaran Gas" id="gangguan_pertukaran_gas">
                                                        <label class="form-check-label" for="gangguan_pertukaran_gas">Gangguan Pertukaran Gas</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label>c. Suara Nafas</label>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="suara_nafas" value="ronchi" id="ronchi">
                                                        <label class="form-check-label" for="ronchi">ronchi</label>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="suara_nafas" value="wheezing" id="wheezing">
                                                        <label class="form-check-label" for="wheezing">wheezing</label>
                                                    </td>
                                                    <td></td>
                                                    <td class="border-start">
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="masalah_pernafasan" value="Ketidak efektifan jalan napas" id="ketidak_efektifan">
                                                        <label class="form-check-label" for="ketidak_efektifan">Ketidak efektifan jalan napas</label>
                                                    </td>
                                                </tr>
                                                <tr class="border-bottom">
                                                    <td></td>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="suara_nafas" value="vesikuler" id="vesikuler">
                                                        <label class="form-check-label" for="vesikuler">vesikuler</label>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="suara_nafas" value="bronchovesikuler" id="bronchovesikuler">
                                                        <label class="form-check-label" for="bronchovesikuler">bronchovesikuler</label>
                                                    </td>
                                                    <td></td>
                                                    <td class="border-start"></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4">
                                                        <label><strong>SISTEM KARDIOVASKULAR</strong></label>
                                                    </td>
                                                    <td class="border-start"></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label>a. Nyeri Dada</label>
                                                    </td>
                                                    <td>
                                                        <input class="form-check-input" type="radio" name="nyeri_dada" id="nyeri_dada_ya" value="ya">
                                                        <label for="nyeri_dada_ya">ya</label>
                                                    </td>
                                                    <td>
                                                        <input class="form-check-input" type="radio" name="nyeri_dada" id="nyeri_dada_tidak" value="tidak">
                                                        <label for="nyeri_dada_tidak">tidak</label>
                                                    </td>
                                                    <td></td>
                                                    <td class="border-start">
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="masalah_kardiovaskular" value="Gangguan Tidur" id="gangguan_tidur">
                                                        <label class="form-check-label" for="gangguan_tidur">Gangguan Tidur</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label>b. Suara  Jantung</label>
                                                    </td>
                                                    <td>
                                                        <input class="form-check-input" type="radio" name="suara_jantung" id="normal" value="normal">
                                                        <label for="normal">normal</label>
                                                    </td>
                                                    <td>
                                                        <input class="form-check-input" type="radio" name="suara_jantung" id="tidak_normal" value="tidak normal">
                                                        <label for="tidak_normal">tidak normal</label>
                                                    </td>
                                                    <td></td>
                                                    <td class="border-start">
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="masalah_kardiovaskular" value="Nyeri" id="Nyeri">
                                                        <label class="form-check-label" for="Nyeri">Nyeri</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label>c. CRT</label>
                                                    </td>
                                                    <td>
                                                        <input class="form-check-input" type="radio" name="crt" id="<_3_detik" value="< 3 detik">
                                                        <label for="<_3_detik">< 3 detik</label>
                                                    </td>
                                                    <td>
                                                        <input class="form-check-input" type="radio" name="crt" id=">_3_detik" value="> 3 detik">
                                                        <label for=">_3_detik">> 3 detik</label>
                                                    </td>
                                                    <td></td>
                                                    <td class="border-start">
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="masalah_kardiovaskular" value="Penurunan Curah Jantung" id="Penurunan_curah_jantung">
                                                        <label class="form-check-label" for="Penurunan_curah_jantung">Penurunan Curah Jantung</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label>d. JVP</label>
                                                    </td>
                                                    <td>
                                                        <input class="form-check-input" type="radio" name="jvp" id="jvp_normal" value="normal">
                                                        <label for="jvp_normal">normal</label>
                                                    </td>
                                                    <td>
                                                        <input class="form-check-input" type="radio" name="jvp" id=">jvp_meningkat" value="meningkat">
                                                        <label for=">jvp_meningkat">meningkat</label>
                                                    </td>
                                                    <td></td>
                                                    <td class="border-start">
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="masalah_kardiovaskular" value="Gangguan Perfusi Jaringan" id="Gangguan_Perfusi_Jaringan">
                                                        <label class="form-check-label" for="Gangguan_Perfusi_Jaringan">Gangguan Perfusi Jaringan</label>
                                                    </td>
                                                </tr>
                                                <tr class="border-bottom">
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td class="border-start">
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="masalah_kardiovaskular" value="Intoleransi Aktivitas" id="Intoleransi_Aktivitas">
                                                        <label class="form-check-label" for="Intoleransi_Aktivitas">Intoleransi Aktivitas</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4">
                                                        <label><strong>SISTEM PERSYARAFAN</strong></label>
                                                    </td>
                                                    <td class="border-start"></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label>a. Keluhan Pusing</label>
                                                    </td>
                                                    <td>
                                                        <input class="form-check-input" type="radio" name="keluhan_pusing" id="pusing_ya" value="ya">
                                                        <label for="pusing_ya">ya</label>
                                                    </td>
                                                    <td>
                                                        <input class="form-check-input" type="radio" name="keluhan_pusing" id="pusing_tidak" value="tidak">
                                                        <label for="pusing_tidak">tidak</label>
                                                    </td>
                                                    <td></td>
                                                    <td class="border-start">
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="masalah_persyarafan" value="Gangguan Perfusi Jaringan Cerebral" id="Gangguan_Perfusi_Jaringan_Cerebral">
                                                        <label class="form-check-label" for="Gangguan_Perfusi_Jaringan_Cerebral">Gangguan Perfusi Jaringan Cerebral</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label>b. Kesadaran</label>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="kesadaran_persyarafan" value="composmentis" id="composmentis">
                                                        <label class="form-check-label" for="composmentis">composmentis</label>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="kesadaran_persyarafan" value="somnolent" id="somnolent">
                                                        <label class="form-check-label" for="somnolent">somnolent</label>
                                                    </td>
                                                    <td></td>
                                                    <td class="border-start">
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="masalah_persyarafan" value="Resiko TIK meningkat" id="Resiko_TIK_meningkat">
                                                        <label class="form-check-label" for="Resiko_TIK_meningkat">Resiko TIK meningkat</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="kesadaran_persyarafan" value="apatis" id="apatis">
                                                        <label class="form-check-label" for="apatis">apatis</label>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="kesadaran_persyarafan" value="sopor" id="sopor">
                                                        <label class="form-check-label" for="sopor">sopor</label>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="kesadaran_persyarafan" value="coma" id="coma">
                                                        <label class="form-check-label" for="coma">coma</label>
                                                    </td>
                                                    <td class="border-start">
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="masalah_persyarafan" value="Resiko Cedera" id="Resiko_Cedera">
                                                        <label class="form-check-label" for="Resiko_Cedera">Resiko Cedera</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label>c. Pupil</label>
                                                    </td>
                                                    <td>
                                                        <input class="form-check-input" type="radio" name="pupil" id="isokor" value="isokor">
                                                        <label for="isokor">isokor</label>
                                                    </td>
                                                    <td>
                                                        <input class="form-check-input" type="radio" name="pupil" id="anisokor" value="anisokor">
                                                        <label for="anisokor">anisokor</label>
                                                    </td>
                                                    <td></td>
                                                    <td class="border-start"></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label>d. Sklera</label>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="sklera" value="ikterik" id="ikterik">
                                                        <label class="form-check-label" for="ikterik">ikterik</label>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="sklera" value="Non-ikterik" id="Non-ikterik">
                                                        <label class="form-check-label" for="Non-ikterik">Non-ikterik</label>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="sklera" value="perdarahan" id="perdarahan">
                                                        <label class="form-check-label" for="perdarahan">perdarahan</label>
                                                    </td>
                                                    <td class="border-start"></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label>e. Kaku Kuduk</label>
                                                    </td>
                                                    <td>
                                                        <input class="form-check-input" type="radio" name="kaku_kuduk" id="kaku_kuduk_ya" value="ya">
                                                        <label for="kaku_kuduk_ya">ya</label>
                                                    </td>
                                                    <td>
                                                        <input class="form-check-input" type="radio" name="kaku_kuduk" id="kaku_kuduk_tidak" value="tidak">
                                                        <label for="kaku_kuduk_tidak">tidak</label>
                                                    </td>
                                                    <td></td>
                                                    <td class="border-start">
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="masalah_persyarafan" value="Gang. Komks. Verbal" id="Gang_Komks_Verbal">
                                                        <label class="form-check-label" for="Gang_Komks_Verbal">Gang. Komks. Verbal</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label>f. Kelumpuhan</label>
                                                    </td>
                                                    <td>
                                                        <input class="form-check-input" type="radio" name="kelumpuhan" id="kelumpuhan_ya" value="ya">
                                                        <label for="kelumpuhan_ya">ya</label>
                                                    </td>
                                                    <td>
                                                        <input class="form-check-input" type="radio" name="kelumpuhan" id="kelumpuhan_tidak" value="tidak">
                                                        <label for="kelumpuhan_tidak">tidak</label>
                                                    </td>
                                                    <td></td>
                                                    <td class="border-start">
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="masalah_persyarafan" value="Keterbt. mobilitas fisik" id="Keterbt_mobilitas">
                                                        <label class="form-check-label" for="Keterbt_mobilitas">Keterbt. mobilitas fisik</label>
                                                    </td>
                                                </tr>
                                                <tr class="border-bottom">
                                                    <td>
                                                        <label>g. Gangguan Persepsi Sensorik</label>
                                                    </td>
                                                    <td>
                                                        <input class="form-check-input" type="radio" name="gangg_persepsi_sensorik" id="gangg_persepsi_sensorik_ya" value="ya">
                                                        <label for="gangg_persepsi_sensorik_ya">ya</label>
                                                    </td>
                                                    <td>
                                                        <input class="form-check-input" type="radio" name="gangg_persepsi_sensorik" id="gangg_persepsi_sensorik_tidak" value="tidak">
                                                        <label for="gangg_persepsi_sensorik_tidak">tidak</label>
                                                    </td>
                                                    <td></td>
                                                    <td class="border-start">
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="masalah_persyarafan" value="Gangg. Persepsi Sensorik" id="Gangg_Persepsi">
                                                        <label class="form-check-label" for="Gangg_Persepsi">Gangg. Persepsi Sensorik</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4">
                                                        <label><strong>SISTEM EKSKRESI</strong></label>
                                                    </td>
                                                    <td class="border-start"></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label>a. Keluhan</label>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="keluhan_sistem_ekskresi" value="Kencing menetes" id="Kencing_menetes">
                                                        <label class="form-check-label" for="Kencing_menetes">Kencing menetes</label>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="keluhan_sistem_ekskresi" value="Anuri" id="Anuri">
                                                        <label class="form-check-label" for="Anuri">Anuri</label>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="keluhan_sistem_ekskresi" value="Disuri" id="Disuri">
                                                        <label class="form-check-label" for="Disuri">Disuri</label>
                                                    </td>
                                                    <td class="border-start">
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="masalah_ekskresi" value="Perub. pola eliminasi" id="Perub_pola">
                                                        <label class="form-check-label" for="Perub_pola">Perub. pola eliminasi</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="keluhan_sistem_ekskresi" value="Oliguria" id="Oliguria">
                                                        <label class="form-check-label" for="Oliguria">Oliguria</label>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="keluhan_sistem_ekskresi" value="Poliuria" id="Poliuria">
                                                        <label class="form-check-label" for="Poliuria">Poliuria</label>
                                                    </td>
                                                    <td></td>
                                                    <td class="border-start">
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="masalah_ekskresi" value="Incontinensia uri/alvi" id="Incontinensia">
                                                        <label class="form-check-label" for="Incontinensia">Incontinensia uri/alvi</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="keluhan_sistem_ekskresi" value="Retensi uri" id="Retensi">
                                                        <label class="form-check-label" for="Retensi">Retensi uri</label>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="keluhan_sistem_ekskresi" value="Gross Hematuria" id="Gross_Hematuria">
                                                        <label class="form-check-label" for="Gross_Hematuria">Gross Hematuria</label>
                                                    </td>
                                                    <td></td>
                                                    <td class="border-start">
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="masalah_ekskresi" value="Pola BAB/BAK" id="pola_bab">
                                                        <label class="form-check-label" for="pola_bab">Pola BAB/BAK</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="keluhan_sistem_ekskresi" value="Nokturia" id="Nokturia">
                                                        <label class="form-check-label" for="Nokturia">Nokturia uri</label>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="keluhan_sistem_ekskresi" value="Incontinensia uri" id="Incontinensia_uri">
                                                        <label class="form-check-label" for="Incontinensia_uri">Incontinensia uri</label>
                                                    </td>
                                                    <td></td>
                                                    <td class="border-start">
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="masalah_ekskresi" value="Resiko Retensio uri" id="Resiko_Retensio">
                                                        <label class="form-check-label" for="Resiko_Retensio">Resiko Retensio uri</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="keluhan_sistem_ekskresi" value="Kateter" id="Kateter">
                                                        <label class="form-check-label" for="Kateter">Kateter uri</label>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="keluhan_sistem_ekskresi" value="Cystostomi" id="Cystostotomi">
                                                        <label class="form-check-label" for="Cystostotomi">Cystostotomi</label>
                                                    </td>
                                                    <td></td>
                                                    <td class="border-start">
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="masalah_ekskresi" value="Resiko infeksi" id="Resiko_infeksi">
                                                        <label class="form-check-label" for="Resiko_infeksi">Resiko infeksi</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label for="produksi_urin">b. Produksi Urin</label>
                                                    </td>
                                                    <td>
                                                        <div class="input-group">
                                                            <input type="text" id="produksi_urin" class="form-control input-border-bottom" name="produksi_urin" aria-label="cc/hr"><span class="input-group-text">cc/hr</span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <label for="bak">BAK : </label>
                                                    </td>
                                                    <td>
                                                        <div class="input-group">
                                                            <input type="text" id="bak" class="form-control input-border-bottom" name="bak" aria-label="x/hr"><span class="input-group-text">x/hr</span>
                                                        </div>
                                                    </td>
                                                    <td class="border-start">
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="masalah_ekskresi" value="Nyeri" id="Nyeri">
                                                        <label class="form-check-label" for="Nyeri">Nyeri</label>
                                                    </td>
                                                </tr>
                                                <tr class="border-bottom">
                                                    <td>
                                                        <label for="produksi_urin">c. Warna</label>
                                                    </td>
                                                    <td>
                                                        <input type="text" id="warna_urin" class="form-control input-border-bottom" name="warna_urin">
                                                    </td>
                                                    <td>
                                                        <label for="bau_urin">Bau : </label>
                                                    </td>
                                                    <td>
                                                            <input type="text" id="bau_urin" class="form-control input-border-bottom" name="bau_urin">
                                                    </td>
                                                    <td class="border-start"></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4">
                                                        <label><strong>SISTEM PENCERNAAN</strong></label>
                                                    </td>
                                                    <td class="border-start"></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label>a. Mulut</label>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="mulut" value="Nyeri telan" id="Nyeri_telan">
                                                        <label class="form-check-label" for="Nyeri_telan">Nyeri telan</label>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="mulut" value="Nyeri rongga mulut" id="Nyeri_rongga_mulut">
                                                        <label class="form-check-label" for="Nyeri_rongga_mulut">Nyeri rongga mulut</label>
                                                    </td>
                                                    <td>
                                                    </td>
                                                    <td class="border-start">
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="masalah_pencernaan" value="Gangguan menelan" id="Gangguan_menelan">
                                                        <label class="form-check-label" for="Gangguan_menelan">Gangguan menelan</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label>b. Abdomen</label>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="abdomen" value="Nyeri tekan" id="Nyeri_tekan">
                                                        <label class="form-check-label" for="Nyeri_tekan">Nyeri tekan</label>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="abdomen" value="Distensi" id="Distensi">
                                                        <label class="form-check-label" for="Distensi">Distensi</label>
                                                    </td>
                                                    <td>
                                                    </td>
                                                    <td class="border-start">
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="masalah_pencernaan" value="Diare" id="Diare">
                                                        <label class="form-check-label" for="Diare">Diare</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="abdomen" value="Ascites" id="Ascites">
                                                        <label class="form-check-label" for="Ascites">Ascites</label>
                                                    </td>
                                                    <td>
                                                        <div class="input-group">
                                                            <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="abdomen" value="Pembengkakan" id="Pembengkakan">
                                                            <label class="form-check-label" for="Pembengkakan">Pembengkakan</label>
                                                            <input type="text" class="form-control input-border-bottom" name="abdomen">
                                                        </div>
                                                    </td>
                                                    <td>
                                                    </td>
                                                    <td class="border-start">
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="masalah_pencernaan" value="Kekurangan/kelebihan cairan" id="Ke_cairan">
                                                        <label class="form-check-label" for="Ke_cairan">Kekurangan/kelebihan cairan</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label for="bab">c. BAB</label>
                                                    </td>
                                                    <td>
                                                        <div class="input-group">
                                                            <input type="text" id="bab" class="form-control input-border-bottom" name="bab" aria-label="x/hr"><span class="input-group-text">x/hr</span>
                                                        </div>
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td class="border-start">
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="masalah_pencernaan" value="Kekurangan/kelebihan nutrisi" id="Ke_nutrisi">
                                                        <label class="form-check-label" for="Ke_nutrisi">Kekurangan/kelebihan nutrisi</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label>Konsistensi</label>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="konsistensi_bab" value="Keras" id="Keras">
                                                        <label class="form-check-label" for="Keras">Keras</label>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="konsistensi_bab" value="Lunak" id="Lunak">
                                                        <label class="form-check-label" for="Lunak">Lunak</label>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="konsistensi_bab" value="Cair" id="Cair">
                                                        <label class="form-check-label" for="Cair">Cair</label>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="konsistensi_bab" value="Darah" id="Darah">
                                                        <label class="form-check-label" for="Darah">Darah</label>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="konsistensi_bab" value="Hitam" id="Hitam">
                                                        <label class="form-check-label" for="Hitam">Hitam</label>
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td class="border-start">
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="masalah_pencernaan" value="Resiko keganasan" id="Resiko_keganasan">
                                                        <label class="form-check-label" for="Resiko_keganasan">Resiko keganasan</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label>d. Diet</label>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="diet" value="Padat" id="Padat">
                                                        <label class="form-check-label" for="Padat">Padat</label>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="diet" value="Lunak" id="Lunak_d">
                                                        <label class="form-check-label" for="Lunak_d">Lunak</label>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="diet" value="Cair" id="Cair_d">
                                                        <label class="form-check-label" for="Cair_d">Cair</label>
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td class="border-start"></td>
                                                </tr>
                                                <tr class="border-bottom">
                                                    <td>
                                                        <label for="frekuensi_diet">Frekuensi</label>
                                                    </td>
                                                    <td>
                                                        <div class="input-group">
                                                            <input type="text" id="frekuensi_diet" class="form-control input-border-bottom" name="frekuensi_diet" aria-label="x/hr"><span class="input-group-text">x/hr</span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <label for="jml_frekuensi_diet">Jumlah</label>
                                                    </td>
                                                    <td>
                                                        <div class="input-group">
                                                            <input type="text" id="jml_frekuensi_diet" class="form-control input-border-bottom" name="jml_frekuensi_diet" aria-label="Kal."><span class="input-group-text">Kal.</span>
                                                        </div>
                                                    </td>
                                                    <td class="border-start"></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4">
                                                        <label><strong>SISTEM MUSKULOSKELETAL (tulang-otot-integumen)</strong></label>
                                                    </td>
                                                    <td class="border-start"></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label>a. Pergerakan sendi</label>
                                                    </td>
                                                    <td>
                                                        <input class="form-check-input" type="radio" name="pergerak_sendi" id="bebas" value="bebas">
                                                        <label for="bebas">bebas</label>
                                                    </td>
                                                    <td>
                                                        <input class="form-check-input" type="radio" name="pergerak_sendi" id="terbatas" value="terbatas">
                                                        <label for="terbatas">terbatas</label>
                                                    </td>
                                                    <td>
                                                    </td>
                                                    <td class="border-start">
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="masalah_muskuloskeletal" value="Gangguan mobilitas" id="Gangguan_mobilitas">
                                                        <label class="form-check-label" for="Gangguan_mobilitas">Gangguan mobilitas</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label>b. akral</label>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="akral" value="Hangat" id="Hangat">
                                                        <label class="form-check-label" for="Hangat">Hangat</label>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="akral" value="Panas" id="Panas">
                                                        <label class="form-check-label" for="Panas">Panas</label>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="akral" value="Dingin" id="Dingin">
                                                        <label class="form-check-label" for="Dingin">Dingin</label>
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td class="border-start">
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="masalah_muskuloskeletal" value="Gangguan integritas kulit" id="Gangguan_integritas_kulit">
                                                        <label class="form-check-label" for="Gangguan_integritas_kulit">Gangguan integritas kulit</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label for="patah">c. Patah tulang di</label>
                                                    </td>
                                                    <td>
                                                        <input type="text" id="patah" class="form-control input-border-bottom" name="patah_tulang">
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td class="border-start">
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="masalah_muskuloskeletal" value="Gangguan citra tubuh" id="Gangguan_citra_tubuh">
                                                        <label class="form-check-label" for="Gangguan_citra_tubuh">Gangguan citra tubuh</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label for="eks">d. Eksternal Fiksasi di</label>
                                                    </td>
                                                    <td>
                                                        <input type="text" id="eks" class="form-control input-border-bottom" name="eks_fiksasi">
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td class="border-start">
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="masalah_muskuloskeletal" value="Kurangnya perawatan diri" id="perawatan_diri">
                                                        <label class="form-check-label" for="perawatan_diri">Kurangnya perawatan diri</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="eks_fiksasi" value="Peradangan" id="Peradangan">
                                                        <label class="form-check-label" for="Peradangan">Peradangan</label>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="eks_fiksasi" value="luka" id="luka">
                                                        <label class="form-check-label" for="luka">luka</label>
                                                    </td>
                                                    <td>
                                                        <input type="text" id="luka" class="form-control input-border-bottom" name="eks_fiksasi">
                                                    </td>
                                                    <td></td>
                                                    <td class="border-start">
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="masalah_muskuloskeletal" value="Nyeri" id="Nyeri_m">
                                                        <label class="form-check-label" for="Nyeri_m">Nyeri</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="eks_fiksasi" value="deformitas" id="deformitas">
                                                        <label class="form-check-label" for="deformitas">deformitas</label>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="eks_fiksasi" value="nyeri" id="nyeri_e">
                                                        <label class="form-check-label" for="nyeri_e">nyeri</label>
                                                    </td>
                                                    <td>
                                                        <input type="text" id="nyeri_e" class="form-control input-border-bottom" name="eks_fiksasi">
                                                    </td>
                                                    <td></td>
                                                    <td class="border-start">
                                                        <div class="input-group">
                                                            <input type="checkbox" class="form-check-input form-check-primary form-check-glow">
                                                            <input type="text" class="form-control input-border-bottom" name="masalah_muskuloskeletal">
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label>e. Kekuatan otot</label>
                                                    </td>
                                                    <td>
                                                        <input class="form-check-input" type="radio" name="kekuatan_otot" id="kuat" value="kuat">
                                                        <label for="kuat">kuat</label>
                                                    </td>
                                                    <td>
                                                        <input class="form-check-input" type="radio" name="kekuatan_otot" id="lemah" value="lemah">
                                                        <label for="lemah">lemah</label>
                                                    </td>
                                                    <td></td>
                                                    <td class="border-start"></td>
                                                </tr>
                                                <tr class="border-bottom">
                                                    <td>
                                                        <label>e. Turgor</label>
                                                    </td>
                                                    <td>
                                                        <input class="form-check-input" type="radio" name="turgor" id="baik" value="baik">
                                                        <label for="baik">baik</label>
                                                    </td>
                                                    <td>
                                                        <input class="form-check-input" type="radio" name="turgor" id="buruk" value="buruk">
                                                        <label for="buruk">buruk</label>
                                                    </td>
                                                    <td></td>
                                                    <td class="border-start"></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4">
                                                        <label><strong>SISTEM REPRODUKSI</strong></label>
                                                    </td>
                                                    <td class="border-start"></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label>Laki-laki</label>
                                                    </td>
                                                    <td>
                                                        <div class="input-group">
                                                            <label for="penis">: Penis</label>
                                                            <input type="text" id="penis" class="form-control input-border-bottom" name="penis">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="input-group">
                                                            <label for="Scrotum">Scrotum</label>
                                                            <input type="text" id="Scrotum" class="form-control input-border-bottom" name="scrotum">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="input-group">
                                                            <label for="Testis">Testis</label>
                                                            <input type="text" id="Testis" class="form-control input-border-bottom" name="testis">
                                                        </div>
                                                    </td>
                                                    <td class="border-start">
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="masalah_reproduksi" value="Perubahan pola seksual" id="Perubahan_pola_seksual">
                                                        <label class="form-check-label" for="Perubahan_pola_seksual">Perubahan pola seksual</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label>Perempuan</label>
                                                    </td>
                                                    <td>
                                                        <div class="input-group">
                                                            <label for="Vagina">: Vagina</label>
                                                            <input type="text" id="Vagina" class="form-control input-border-bottom" name="vagina">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="input-group">
                                                            <label for="Pendarahan">Pendarahan</label>
                                                            <input type="text" id="Pendarahan" class="form-control input-border-bottom" name="pendarahan">
                                                        </div>
                                                    </td>
                                                    <td></td>
                                                    <td class="border-start">
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="masalah_reproduksi" value="Pendarahan" id="Pendarahan">
                                                        <label class="form-check-label" for="Pendarahan">Pendarahan</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>
                                                        <div class="input-group">
                                                            <label for="Payudara">Payudara</label>
                                                            <input type="text" id="Payudara" class="form-control input-border-bottom" name="payudara">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <label>Siklus Haid :</label>
                                                    </td>
                                                    <td>
                                                        <input class="form-check-input" type="radio" name="siklus_haid" id="Teratur" value="Teratur">
                                                        <label for="Teratur">Teratur</label>
                                                        <input class="form-check-input" type="radio" name="siklus_haid" id="Tidak_Teratur" value="Tidak teratur">
                                                        <label for="Tidak_Teratur">Tidak Teratur</label>
                                                    </td>
                                                    <td class="border-start">
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="masalah_reproduksi" value="Gangguan Konsepsi" id="Gangguan_Konsepsi">
                                                        <label class="form-check-label" for="Gangguan_Konsepsi">Gangguan Konsepsi</label>
                                                    </td>
                                                </tr>
                                                <tr class="border-bottom">
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td class="border-start">
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="masalah_reproduksi" value="Gangguan rasa nyaman" id="Gangguan_rasa_nyaman">
                                                        <label class="form-check-label" for="Gangguan_rasa_nyaman">Gangguan rasa nyaman</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4">
                                                        <label><strong>DATA PSIKOLOGIS, SOSIOLOGIS, DAN SPIRITUAL</strong></label>
                                                    </td>
                                                    <td class="border-start"></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label>a. Psikologis</label>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="psikologis" value="takut" id="takut">
                                                        <label class="form-check-label" for="takut">takut</label>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="psikologis" value="rendah diri" id="rendah_diri">
                                                        <label class="form-check-label" for="rendah_diri">rendah diri</label>
                                                    </td>
                                                    <td></td>
                                                    <td class="border-start">
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="masalah_psikologis" value="Cemas" id="Cemas">
                                                        <label class="form-check-label" for="Cemas">Cemas</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="psikologis" value="sedih" id="sedih">
                                                        <label class="form-check-label" for="sedih">sedih</label>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="psikologis" value="marah" id="marah">
                                                        <label class="form-check-label" for="marah">marah</label>
                                                    </td>
                                                    <td></td>
                                                    <td class="border-start">
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="masalah_psikologis" value="Gangguan interaksi sosial" id="Gangguan_interaksi_sosial">
                                                        <label class="form-check-label" for="Gangguan_interaksi_sosial">Gangguan interaksi sosial</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="psikologis" value="sedih" id="sedih">
                                                        <label class="form-check-label" for="sedih">sedih</label>
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td class="border-start">
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="masalah_psikologis" value="Menarik diri" id="Menarik_diri">
                                                        <label class="form-check-label" for="Menarik_diri">Menarik diri</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label>b. Sosiologis</label>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="sosiologis" value="Menarik diri" id="Menarik_diri">
                                                        <label class="form-check-label" for="Menarik_diri">Menarik diri</label>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="sosiologis" value="Komunikasi baik" id="Komunikasi_baik">
                                                        <label class="form-check-label" for="Komunikasi_baik">Komunikasi baik</label>
                                                    </td>
                                                    <td></td>
                                                    <td class="border-start">
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="masalah_psikologis" value="Keterbatasan dalam inspirasi" id="Keterbatasan_dalam_inspirasi">
                                                        <label class="form-check-label" for="Keterbatasan_dalam_inspirasi">Keterbatasan dalam inspirasi</label>
                                                    </td>
                                                </tr>
                                                <tr class="border-bottom">
                                                    <td>
                                                        <label>c. Spiritual</label>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="spiritual" value="perlu dibantu" id="perlu_dibantu">
                                                        <label class="form-check-label" for="perlu_dibantu">perlu dibantu</label>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="spiritual" value="Lain-lain" id="Lain-lain">
                                                        <label class="form-check-label" for="Lain-lain">Lain-lain</label>
                                                    </td>
                                                    <td></td>
                                                    <td class="border-start"></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="5">
                                                        <label><strong>HAMBATAN DIRI</strong></label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label>Jika ada :</label>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="hambatan_diri" value="Bahasa" id="Bahasa">
                                                        <label class="form-check-label" for="Bahasa">Bahasa</label>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="hambatan_diri" value="Tuna rungu" id="Tuna_rungu">
                                                        <label class="form-check-label" for="Tuna_rungu">Tuna rungu</label>
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="hambatan_diri" value="Budaya" id="Budaya">
                                                        <label class="form-check-label" for="Budaya">Budaya</label>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="hambatan_diri" value="Tuna wicara" id="Tuna_wicara">
                                                        <label class="form-check-label" for="Tuna_wicara">Tuna wicara</label>
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr class="border-bottom">
                                                    <td></td>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="hambatan_diri" value="Cacat fisik" id="Cacat_fisik">
                                                        <label class="form-check-label" for="Cacat_fisik">Cacat fisik</label>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="hambatan_diri" value="Tuna netra" id="Tuna_netra">
                                                        <label class="form-check-label" for="Tuna_netra">Tuna netra</label>
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="5">
                                                        <label for="data_penunjang"><strong>DATA PEMERIKSAAN PENUNJANG / LABORATORIUM YANG PENTING</strong></label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="5">
                                                        <textarea class="form-control" name="data_penunjang" id="data_penunjang" rows="4"></textarea>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-12 d-flex justify-content-end mt-2">
                                                <button type="submit" class="btn btn-primary btn-sm me-1 mb-1" title="tambah">Simpan</button>
                                                <button type="reset" class="btn btn-light-secondary btn-sm me-1 mb-1" title="reset">Reset</button>    
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
        <!-- Data Rekam Medis Pengkajian awal end -->
    </div>