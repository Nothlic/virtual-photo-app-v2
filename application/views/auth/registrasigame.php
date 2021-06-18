<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-lg-6">
            <div class="card o-hidden border-0 my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h6 class=" mt-1" style="font-family:centraleregular;"><b>Daftarkan toko Anda untuk mengikuti event ini!</b></h6>
                                </div>
                                <br>
                                <?= $this->session->flashdata('message'); ?>

                                <form class="user" method="post">
                                    <small class=" text-center mt-3">
                                        <center style="font-family:centraleregular;">Nama</center>
                                    </small>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="nama" name="nama" value="<?= set_value('nama'); ?>">
                                        <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                                        <small class=" text-center mt-3">
                                            <center style="font-family:centraleregular;">*Wajib diisi</center>
                                        </small>
                                    </div>
                                    
                                    <small class=" text-center mt-3">
                                        <center style="font-family:centraleregular;">Nama Toko</center>
                                    </small>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="namaToko" name="namaToko" value="<?= set_value('namaToko'); ?>">
                                        <?= form_error('namaToko', '<small class="text-danger pl-3">', '</small>'); ?>

                                        <small class=" text-center mt-3">
                                            <center style="font-family:centraleregular;">*Wajib diisi</center>
                                        </small>
                                    </div>

                                    <small class=" text-center mt-3">
                                        <center style="font-family:centraleregular;">Pilih Daerah/Regional Anda*</center>
                                    </small>
                                    <div class="form-group">
                                        <select name="provinsi" class="form-control provinsi" style="border-radius: 15px 15px 15px 15px">
                                            <option disabled selected value="">Pilih Daerah</option>
                                            <?php foreach ($provinsi as $p) { ?>
                                                <option value=<?= $p['name']; ?>><?= $p['name']; ?></option>
                                            <?php } ?>
                                        </select>

                                        <small class=" text-center mt-3">
                                            <center style="font-family:centraleregular;">*Wajib diisi</center>
                                        </small>
                                        <?= form_error('provinsi', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>

                                    <small class=" text-center">
                                        <center style="font-family:centraleregular;">No Hp</center>
                                    </small>
                                    <div class="form-group">
                                
                                    <input name="noHp" type="text" placeholder="Nomor HP" class="form-control" onkeypress="return isNumberKey(event)" style="border-radius: 15px 15px 15px 15px">

                                        <small class=" text-center mt-3">
                                            <center style="font-family:centraleregular;">*Wajib diisi</center>
                                        </small>
                                        <?= form_error('noHp', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="text-center">
                                        <button class="btn btn-info btn-user" style="width:100px;font-family:centraleregular;">
                                            Daftar
                                        </button>

                                    </div>


                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/assetsfront2/js/sweetalert.min.js"></script>
<script src="<?php echo base_url() ?>assets/assetsfront2/js/java.js"></script>
<script>

    // var sales = <?php echo json_encode($sales); ?>;
    // $(document).ready(function() {
    //     $('.provinsi').change(function() {
    //         var sales_html = '<option disabled selected value="">Pilih Sales</option>';
    //         var id_provinsi = $('.provinsi').val();
    //         $.each(sales, function(index, value) {
    //             if (value['idProvinsi'].trim() == id_provinsi) {
    //                 sales_html = sales_html + "<option value = " + value['namaSales'] + ">" + value['namaSales'] + "</option>";
    //             }
    //         });

    //         $('.namaSales').html(sales_html);
    //     });

    // })
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