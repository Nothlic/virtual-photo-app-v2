<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-lg">
            <center>
                             <img src="<?php echo base_url() ?>assets/assetsfront2/images/Home-11.png" style="transform:scale(1.2);"class="img-fluid mt-4" alt="Responsive image">
            </center>
           
            <div class="card o-hidden border-0  my-5" style="background:transparent">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    
                                <?= $this->session->flashdata('message'); ?>
                       <p style="text-align: left;color:white;font-family:centraleregular;">Memperkenalkan Philips Hue, smart lighting yang dapat mengubah bermain game menjadi lebih seru!</p>
                          <a href="<?php echo base_url('auth/registration')?>" class="btn btn-warning btn-user btn-block" style="font-family:centraleregular;"><b>Registrasi sekarang!</b></a>
                            <small class="text-white" style="font-family:centraleregular;"><center class="mt-3">Silakan <a  style="color:#f6bc31" href="<?= base_url('auth/login'); ?>"><b><u>LOGIN DI SINI</u></b></a> jika sudah melakukan registrasi.</center></small>
                            
                
                </div>
            </div>
                           <img src="<?php echo base_url() ?>assets/assetsfront2/images/footerbannerwelcome3.png" style="transform:scale(1.2);margin-top:-10px"class="img-fluid" alt="Responsive image">
           
   <img src="<?php echo base_url() ?>assets/assetsfront2/images/footerhd.png" style="transform:scale(1.2);margin-top:20px"class="img-fluid" alt="Responsive image">
           
        </div>

    </div>

</div>
<script src="<?php echo base_url() ?>assets/assetsfront2/js/sweetalert.min.js"></script>  
<script>
           swal({
                    title: "Pendaftaran Berhasil",
                    text:  "Terima kasih. Anda sudah melakukan pendaftaran untuk mengikuti Philips Hue Virtual Gathering 2020. Kami akan mengirimkan konfirmasi melalui nomor whatsapp Anda yang aktif dalam waktu maksimal 2x24 jam.",
            });
        
</script>