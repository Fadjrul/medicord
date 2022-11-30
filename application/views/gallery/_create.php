    <!-- Page content Header -->
    <div class="page-heading">
        <div class="row">
            <!-- Page Title -->
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Galeri Foto</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <!-- Breadcrumb -->
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Galeri Foto</li>
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
        <!-- Galeri Foto start -->
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-12 text-Start">
                            <h3>Galeri Foto</h3>
                        </div>
                    </div>
                </div>

                <div class="card-content">
                    <div class="row me-4">
                        <div class="col-md-12 col-12 text-end">
                            <a href="<?php echo site_url('gallery/all_photo/'.$this->uri->segment(3))?>" class="btn btn-warning btn-sm" title="Kembali ke halaman sebelumnya">kembali</a>
                        </div>
                    </div>

                    <!-- data tabel -->
                    <div class="row p-4">
                        <div class="col-12">
                            <div class="dropzone">
                                <div class="dz-message">
                                    <h4 style="color:black;"> Klik atau Drop gambar disini</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="p-3">
                    <p><small>Page rendered in <strong>{elapsed_time}</strong> seconds.</small></p>
                </div>
            </div>
    
        </section>
        <!-- Galeri foto end -->
    </div>

    <script src="<?php echo base_url();?>assets/core-thirdparty/dropzone/dist/dropzone.js"></script>
    <script type="text/javascript">

        Dropzone.autoDiscover = false;

        var foto_upload= new Dropzone(".dropzone",{
            url                : "<?php echo base_url('index.php/gallery/ajaxupload/'.$this->uri->segment(3)) ?>",
            maxFilesize        : 2,
            method             : "post",
            acceptedFiles      : "image/*",
            paramName          : "userfile",
            dictInvalidFileType: "Type file ini tidak dizinkan",
            addRemoveLinks     : true,
        });


        //Event ketika Memulai mengupload
        foto_upload.on("sending",function(a,b,c){
            a.token='token-'+'<?php echo date('YmdHis')?>'+'-'+Math.random();
            c.append("token",a.token);
        });


        //Event ketika foto dihapus
        foto_upload.on("removedfile",function(a){
            var token=a.token;
            $.ajax({
                type:"post",
                data:{token:token},
                url:"<?php echo base_url('index.php/gallery/ajaxremove/'.$this->uri->segment(3)) ?>",
                cache:false,
                dataType: 'json',
                success: function(){
                    console.log("Foto terhapus");
                },
                error: function(){
                    console.log("Error");

                }
            });
        });


    </script>
            