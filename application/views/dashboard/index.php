    <!-- Page content Header -->
    <div class="page-heading">
        <div class="row">
            <!-- Page Title -->
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Dashboard</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <!-- Breadcrumb -->
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </nav>
            </div>
        </div>
        <?php 
            if ($this->session->flashdata('alert')) {
                echo $this->session->flashdata('alert');
                unset($_SESSION['alert']);
            } 
        ?>
    </div>

    <!-- Page Content -->
    <div class="page-content">
        <section class="row">

                <div class="col-12 col-md-4 col-lg-4">
                    <div class="row">
                        <div class="col-12 col-lg-6 col-md-6">
                            <div class="card">
                                <div class="card-body px-4 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4 col-lg-12 d-flex justify-content-start ">
                                            <div class="stats-icon purple mb-2">
                                                <i class="fas fa-user-injured"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                            <h6 class="text-muted font-semibold">Total Pasien</h6>
                                            <h6 class="font-extrabold mb-0"><?php echo $widget[0]->total_pasien;?></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 col-md-6">
                            <div class="card">
                                <div class="card-body px-4 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4 col-lg-12 d-flex justify-content-start ">
                                            <div class="stats-icon green mb-2">
                                                <i class="fas fa-notes-medical"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                            <h6 class="text-muted font-semibold">RM Pengkajian Awal</h6>
                                            <h6 class="font-extrabold mb-0">1.000</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 col-md-6">
                            <div class="card">
                                <div class="card-body px-4 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4 col-lg-12 d-flex justify-content-start ">
                                            <div class="stats-icon red mb-2">
                                                <i class="fas fa-notes-medical"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                            <h6 class="text-muted font-semibold">RM Riwayat Kunjungan Pasien</h6>
                                            <h6 class="font-extrabold mb-0">1.000</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 col-md-6">
                            <div class="card">
                                <div class="card-body px-4 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4 col-lg-12 d-flex justify-content-start ">
                                            <div class="stats-icon blue mb-2">
                                                <i class="fas fa-notes-medical"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-lg-12">
                                            <h6 class="text-muted font-semibold">RM Pemeriksaan Odontogram</h6>
                                            <h6 class="font-extrabold mb-0">200</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-8 col-lg-8">
                    <div class="row">
                        <div class="col-12 col-lg-12 col-md-12">
                            <div class="card">
                                <div class="row ms-4 mt-4">
                                    <div class="col-md-12 col-12 text-start">
                                        <h4>Pesan Terbaru</h4>
                                    </div>
                                </div>
                                <div class="row me-4">
                                    <div class="col-md-12 col-12 text-end">
                                        <a href="<?php echo site_url('message')?>" class="btn btn-success btn-sm">Cek Pesan Lainnya</a>
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
                                                        <th>Nama Pengirim</th>
                                                        <th>Tanggal Pesan</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    if ($message) {
                                                        $nox = 1;
                                                        $no = 1;
                                                        foreach ($message as $key) {

                                                    ?>
                                                            <tr>
                                                                <td><?php echo $no + $numbers; ?></td>
                                                                <td>
                                                                    <?php echo $key->message_name."<br>".$key->message_email."<br>".$key->message_phone;
                                                                    
                                                                        if($key->message_status == 0){
                                                                            echo "<br><span class='badge bg-light-danger'>Belum Di Proses</span><br>";
                                                                        }else{
                                                                            echo "<br><span class='badge bg-light-success'>Sudah Di Proses</span><br>";
                                                                        }
                                                                    ?>
                                                                </td>
                                                                <td><?php echo indonesiaDate($key->message_date);?></td>
                                                                <td>
                                                                    <div class="btn-group dropstart mb-1">
                                                                        <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                                                                            Aksi
                                                                        </button>
                                                                        <ul class="dropdown-menu">
                                                                            <li>
                                                                                <button type="submit" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#FormDetail<?php echo $key->message_id;?>">Detail</button>
                                                                            </li>
                                                                            <li>
                                                                                <button type="submit" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#FormRespond<?php echo $key->message_id;?>">Balas Pesan</button>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </td>
                                                            </tr>

                                                            <!-- Modal Detail message -->
                                                            <div class="modal fade text-start" id="FormDetail<?php echo $key->message_id?>" tabindex="-1" role="dialog"
                                                                aria-labelledby="myModalLabel33" aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header bg-info">
                                                                            <h4 class="modal-title" id="myModalLabel33">Form Detail Pesan</h4>
                                                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><i data-feather="x"></i></button>
                                                                        </div>
                                                                        <?php echo form_open("message/detail")?>
                                                                        <form>
                                                                            <div class="modal-body">
                                                                                <div class="row">
                                                                                    <div class="form-group">
                                                                                    <b>Nama Pengadu :</b><br><?php echo $key->message_name;?><br><br>
                                                                                    <b>Email Pengadu :</b><br><?php echo $key->message_email;?><br><br>
                                                                                    <b>Subjek Aduan :</b><br><?php echo $key->message_subject;?><br><br>
                                                                                    <b>Isi Aduan :</b><br><?php echo $key->message_text;?><br><br>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                                    
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">Tutup</span>
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                        <?php echo form_close(); ?>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- Modal Respond message -->
                                                            <div class="modal fade text-start" id="FormRespond<?php echo $key->message_id?>" tabindex="-1" role="dialog"
                                                                aria-labelledby="myModalLabel33" aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header bg-info">
                                                                            <h4 class="modal-title" id="myModalLabel33">Form Balas Pesan</h4>
                                                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><i data-feather="x"></i></button>
                                                                        </div>
                                                                        <?php echo form_open("message/update")?>
                                                                        <form>
                                                                            <div class="modal-body">
                                                                                <div class="row">
                                                                                    <div class="form-group">
                                                                                        <label for=""><b>Respon <span style="color:red">*</span></b></label>
                                                                                        <textarea class="form-control" name="message_reply" placeholder="Respon" rows="3" required></textarea>
                                                                                        <input type="hidden" class="form-control" name="message_id" required="required" value="<?php echo $key->message_id;?>">
                                                                                        <input type="hidden" class="form-control" name="message_code" required="required" value="<?php echo $key->message_code;?>">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                                    
                                                                                    <div class="modal-footer">
                                                                                        <button type="submit" class="btn btn-light-info">Balas</span>
                                                                                        </button>
                                                                                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">Tutup</span>
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
                                                                <td colspan="4">Belum ada pesan masuk</td>
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
                    </div>
                </div>

            <div class="p-3">
                <p><small>Page rendered in <strong>{elapsed_time}</strong> seconds.</small></p>
            </div>
        </section>
    </div>