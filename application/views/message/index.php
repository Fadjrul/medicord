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
        <!-- Message start -->
        <section class="section">
            <div class="card">
                <div class="card-content">
                    <div class="row me-4 mt-4">
                        <div class="col-md-12 col-12 text-end">
                            <a href="<?php echo site_url('message')?>" class="btn btn-success btn-sm" title="Refresh halaman">refresh</a>
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
                                            <th>Subjek</th>
                                            <th>Isi Pesan</th>
                                            <th>Respon</th>
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
                                                    <td><?php echo $key->message_subject;?></td>
                                                    <td><?php echo $key->message_text;?></td>
                                                    <td><?php echo $key->message_reply;?></td>
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
                                                                    <?php echo form_open_multipart("message/delete") ?>
                                                                    <?php echo csrf(); ?>
                                                                    <button type="submit" class="dropdown-item">Hapus</button>
                                                                    <input type="hidden" class="form-control" name="message_id" required="required" value="<?php echo $key->message_id; ?>">
                                                                    <?php echo form_close(); ?>
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
                                        <?php
                                                $no++;
                                            }
                                        } else {
                                            echo '
                                                <tr class="text-center">
                                                    <td colspan="7">Tidak ada data ditemukan</td>
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
        <!-- Message end -->
    </div>