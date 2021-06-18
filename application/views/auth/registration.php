<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-lg">
            <center>
                <img src="<?php echo base_url() ?>assets/assetsfront2/images/Home-11.png" style="transform:scale(1.2);"class="img-fluid mt-4" alt="Responsive image">
            </center>
        <div class="card o-hidden border-0 my-5" style="background:transparent">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h6 class="text-white mt-1" style="font-family:centraleregular;"><b>Daftarkan toko Anda untuk mengikuti event ini!</b></h6>
                                </div>
                                <br>
                                <?= $this->session->flashdata('message'); ?>

                                <form class="user" method="post" action="<?= base_url('auth/registration'); ?>">
                                     <small class="text-white text-center mt-3">
                                        <center style="font-family:centraleregular;">Masukan Nama Anda</center>
                                    </small>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="namaUser" name="namaUser" value="<?= set_value('namaUser'); ?>">
                                        <?= form_error('namaUser', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <small class="text-white text-center mt-3">
                                        <center style="font-family:centraleregular;">Masukan Nama Toko*</center>
                                    </small>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="namaToko" name="namaToko" value="<?= set_value('namaToko'); ?>">
                                        <?= form_error('namaToko', '<small class="text-danger pl-3">', '</small>'); ?>
                                    
                                     <small class="text-white text-center mt-3">
                                        <center style="font-family:centraleregular;">*Wajib diisi</center>
                                    </small>
                                    </div>
                                    
                                    <small class="text-white text-center mt-3">
                                        <center style="font-family:centraleregular;">Pilih Daerah/Regional Anda*</center>
                                    </small>
                                    <div class="form-group">
                                        <select name="provinsi" class="form-control provinsi" style="border-radius: 15px 15px 15px 15px">
                                            <option disabled selected value="">Pilih Daerah</option>
                                            <?php foreach($provinsi as $p){ ?>
                                                <option value=<?= $p['id'];?>><?= $p['name'];?></option>    
                                            <?php }?>
                                        </select>
                                        
                                     <small class="text-white text-center mt-3">
                                        <center style="font-family:centraleregular;">*Wajib diisi</center>
                                    </small>
                                    <?= form_error('provinsi', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    
                                     <small class="text-white text-center mt-3">
                                        <center style="font-family:centraleregular;">Pilih Nama Sales Representatif Anda*</center>
                                    </small>
                                    <div class="form-group">
                                        <select name="namaSales" class="form-control namaSales"  style="border-radius: 15px 15px 15px 15px">
                                             <option disabled selected value="">Pilih Sales</option>
                                        </select>
                                        
                                     <small class="text-white text-center mt-3">
                                        <center style="font-family:centraleregular;">*Wajib diisi</center>
                                    </small>
                                    <?= form_error('namaSales', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <small class="text-white text-center">
                                        <center style="font-family:centraleregular;">Masukkan No. Whatsapp Aktif Anda*</center>
                                    </small>
                                    <div class="form-group">
                                        <input type="text" inputmode="tel" class="form-control form-control-user" placeholder='' id="noHp" name="noHp" value="<?= set_value('noHp'); ?>">
                                        
                                    
                                     <small class="text-white text-center mt-3">
                                        <center style="font-family:centraleregular;">*Wajib diisi</center>
                                    </small>
                                    <?= form_error('noHp', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <small class="text-white text-center">
                                        <center style="font-family:centraleregular;">Masukkan Alamat Email Anda</center>
                                    </small>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" placeholder='' id="email" name="email" value="<?= set_value('email'); ?>">
                                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    
                                    <div class="form-group">
                                        <input type="checkbox" required class"setuju" id="setuju"><small class="text-white" style="font-family:centraleregular;"> Saya setuju untuk memberikan data saya kepada PT Signify Commercial Indonesia dan bersedia untuk dihubungi selanjutnya sehubungan dengan produk Philips lighting.</small>
                                    </div>
                                    
                                    
                                    <center>
                                        <p class="text-white"><a href="<?php echo base_url();?>/auth" class="btn btn-warning btn-user" style="width:100px;font-family:centraleregular;">Kembali</a>  
                                        <!--<button  data-toggle="modal" data-target="#exampleModal" class="btn btn-warning btn-user" style="width:100px;font-family:centraleregular;">Daftar</button></p><br>-->
                                        
                                        <button class="btn btn-warning btn-user" style="width:100px;font-family:centraleregular;">
 Daftar
</button>

                                    </center>
                                        
                                    <!-- <div class="row">
                                        <div class="col-md-6">
                                            <a href="#" style="background:transparent" class="btn btn-sm  btn-user btn-block float-right text-white"  > Registrasi  </a>
                                        </div>
                                        <div class="col-md-6">
                                            <button type="submit" class="btn btn-sm btn-warning btn-user btn-block float-right" > Masuk </button>
                                        </div>
                                </div>    -->


                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                            ...
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                </form>

                                <hr>
                                <!-- <div class="text-center">
                                    <a class="small" href="<?= base_url('auth/forgotpassword'); ?>">Forgot Password?</a>
                                </div> -->
                                <!-- <div class="text-center">
                                    <a class="small" href="<?= base_url('auth/registration'); ?>">Create an Account!</a>
                                </div> -->

                              
                            </div>

                        </div>
                    </div>
                </div>
                
            </div>
    
          <img src="<?php echo base_url() ?>assets/assetsfront2/images/footerhd.png" style="transform:scale(1.2);margin-top:-10px"class="img-fluid" alt="Responsive image">
           
        </div>

    </div>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/assetsfront2/js/sweetalert.min.js"></script> 
<script>
    var sales = <?php echo json_encode($sales); ?>;
    $(document).ready(function() {
        $('.provinsi').change(function() {
             var sales_html = '<option disabled selected value="">Pilih Sales</option>';
             var id_provinsi = $('.provinsi').val();
             $.each(sales, function(index, value) {
                 if (value['idProvinsi'].trim() == id_provinsi) {
                     sales_html = sales_html + "<option value = " + value['namaSales'] + ">" + value['namaSales'] + "</option>";
                 }
             });
             
             $('.namaSales').html(sales_html);
        });
        
    })
    // function validate(){
    //         if (document.getElementById('setuju').checked) {
    //             if($('#namaToko').val() != ""){
    //                 if($('#namaSales').val() != ""){
    //                      if($('#provinsi').val() != ""){
    //                          if($('#noHp').val() != ""){
    //                              swal({
    //                                 title: "Registrasi Berhasil",
    //                                 text:  "Terima kasih. Anda sudah melakukan pendaftaran untuk mengikuti Philips Hue Virtual Gathering 2020. Kami akan mengirimkan konfirmasi melalui nomor whatsapp Anda yang aktif dalam waktu maksimal 2x24 jam.",
    //                             });
    //                          }
    //                      }
    //                  }
    //             }
    //         } 
    // }
</script>