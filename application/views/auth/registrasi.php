<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center background-form">
        <div class="col-lg-6">
            <div class="card o-hidden border-0 my-5 card-bg">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <center>
                        <div class="wrapper-text">
                            <h2 class="mt-4 mb-4" style="font-weight:300;">Philips 3D Printed <br>Webinar 2020</h2>
                            <h6><b>Silakan login dibawah ini</b></h6>
                        </div>
                    </center>


                    <div class="row">
                        <div class="col-lg-12">
                            <div class="container mt-3">
                                
                                <?= $this->session->flashdata('message'); ?>

                                <form class="user" method="post">

                                    <small class=" text-center">
                                        <center style="font-family:centraleregular;">Masukan Nama Anda</center>
                                    </small>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="name" name="name" value="<?= set_value('name'); ?>">
                                        <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>

                                    <small class="text-center mt-3">
                                        <center style="font-family:centraleregular;">Kontraktor/Toko*</center>
                                    </small>
                                    <div class="form-group">
                                        <select name="jenisUser" required class="form-control jenis" style="border-radius: 15px 15px 15px 15px">
                                            <option disabled selected value="">Kontraktor/Toko*</option>
                                            <option value="Kontraktor">Kontraktor</option>    
                                            <option value="Toko">Toko</option>    
                                        </select>
                                    </div>

                                     
                                    <small class="text-center mt-3">
                                        <center style="font-family:centraleregular;">Masukan nama Toko/Perusahaan</center>
                                    </small>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="nameCompany" name="nameCompany" value="<?= set_value('nameCompany'); ?>">
                                        <?= form_error('nameCompany', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>


                                    <small class="text-center mt-3">
                                        <center style="font-family:centraleregular;">Pilih Daerah/Regional Anda*</center>
                                    </small>
                                    <div class="form-group">
                                        <select name="regional" class="form-control provinsi" style="border-radius: 15px 15px 15px 15px">
                                            <option disabled selected value="">Pilih Daerah</option>
                                            <?php foreach($provinsi as $p){ ?>
                                                <option value=<?= $p['id'];?>><?= $p['name'];?></option>    
                                            <?php }?>
                                        </select>
                                        
                                     <small class="text-center mt-3">
                                        <center style="font-family:centraleregular;">*Wajib diisi</center>
                                    </small>
                                    </div>


                                    <small class="text-center mt-3">
                                        <center style="font-family:centraleregular;">Masukan no whatsapp aktif anda</center>
                                    </small>
                                    <div class="form-group">
                                        <input type="tel" class="form-control form-control-user" id="phoneNumber" name="phoneNumber" value="<?= set_value('phoneNumber'); ?>">
                                        <?= form_error('phoneNumber', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>


                                    <small class="text-center mt-3">
                                        <center style="font-family:centraleregular;">Masukan Alamat Email Anda</center>
                                    </small>
                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-user" id="email" name="email" value="<?= set_value('email'); ?>">
                                    </div>

                                          
                                    <div class="form-group">
                                        <input type="checkbox" required id="setuju"><small style="font-family:centraleregular;"> 
                                            Saya setuju untuk memberikan data saya kepada PT Signify Commercial Indonesia dan bersedia untuk dihubungi selanjutnya sehubungan dengan produk Philips 3D Printing
                                        </small>
                                    </div>


                                        <div class="mb-5">
                                            <div class="row justify-content-center text-center">
                                                <a href="<?php echo base_url()?>auth/login" class="btn btn-primary btn-user" style="width:100px;font-family:centraleregular;font-size:13px;background-color:#0E3F7C">
                                                    <strong>Kembali</strong>
                                                </a>
                                                &nbsp;
                                                &nbsp;
                                                <button class="btn btn-primary btn-user" style="width:100px;font-family:centraleregular;font-size:13px;background-color:#0E3F7C">
                                                    <b>Daftar</b>
                                                </button>
                                            </div>
                                        </div>
                                </form>

                            </div>
        
                            <div class="text-center" style="margin-bottom: 4rem">
                                <img src="<?php echo base_url('assets/assetsfront2/images/iconhomefooter.png') ?>" class="img-fluid" alt="Responsive image">
                            </div>

                        </div>

                    </div>

                </div>

            </div>


        </div>

    </div>

</div>

