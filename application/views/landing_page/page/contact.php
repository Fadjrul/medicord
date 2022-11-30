

     
     <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="<?php echo site_url('LandingPage')?>">Home</a></li>
                <li><a href="#">Kontak</a></li>
            </ol>
            <h2>Kontak</h2>

        </div>
    </section>
    <main id="main">
       
    
    <section id="contact" class="contact">
        <div class="container-fluid" data-aos="fade-up">
            <div class="section-title">
                <h2>Kontak</h2>
            </div>
            <div class="row mt-1 d-flex justify-content-end" data-aos="fade-right" data-aos-delay="100">
                <div class="col-lg-4">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d497.5224134464673!2d122.4984860124531!3d-3.9834999971029514!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2d98f2bff90d1e31%3A0x48d77d8b9ff2e3f6!2sPUSKESMAS%20Mekar!5e0!3m2!1sid!2sid!4v1669787474787!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="col-lg-2">
                    <div class="info">
                        <div class="address">
                            <i class="icofont-google-map"></i>
                            <h4>Lokasi Kantor:</h4>
                            <p><?php echo $setting[0]->setting_address;?></p>
                        </div>

                        <div class="email">
                            <i class="icofont-envelope"></i>
                            <h4>Email:</h4>
                            <p><?php echo $setting[0]->setting_email;?></p>
                        </div>

                        <div class="phone">
                            <i class="icofont-phone"></i>
                            <h4>Telepon:</h4>
                            <p><?php echo $setting[0]->setting_phone;?></p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 mt-5 mt-lg-0" data-aos="fade-left" data-aos-delay="100">
                    <?php echo form_open_multipart("page/create_message")?>
                        <div class="form-row">
                            <div class="col-md-6 form-group">
                                <?php echo csrf();?>
                                <input type="text" name="message_name" class="form-control" id="name" placeholder="Nama Anda" data-rule="minlen:4" data-msg="Nama minimal 4 karakter" required/>
                                <div class="validate"></div>
                            </div>
                            <div class="col-md-3 form-group">
                                <input type="text" class="form-control" name="message_phone" id="email" placeholder="Nomor HP Anda" data-rule="minlen:16" data-msg="Masukkan nomor telpon yang valid" required/>
                                <div class="validate"></div>
                            </div>
                            <div class="col-md-3 form-group">
                                <input type="email" class="form-control" name="message_email" id="email" placeholder="Email Anda" data-rule="email" data-msg="Masukkan email anda yang valid" required/>
                                <div class="validate"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="message_subject" id="subject" placeholder="Subjek Pesan" data-rule="minlen:4" data-msg="Subject minimal 4-8 karakter" required/>
                            <div class="validate"></div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="message_text" rows="5" data-rule="required" data-msg="Tulis sesuatu dikolom pesan" placeholder="Pesan Anda" required></textarea>
                            <div class="validate"></div>
                        </div>
                        
                        <div class="text-center"><button class="btn btn-danger" type="submit">Kirim Pesan</button></div>
                    <?php echo form_close(); ?>

                </div>

            </div>
        </div>
    </section>
        
    </main>