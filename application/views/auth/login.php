<style>
body{
	background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
	background-size: 400% 400%;
	animation: gradient 15s ease infinite;
}

@keyframes gradient {
	0% {
		background-position: 0% 50%;
	}
	50% {
		background-position: 100% 50%;
	}
	100% {
		background-position: 0% 50%;
	}
}

.card-custom {
  box-shadow: 0 0 1rem 0 rgba(0, 0, 0, .2); 
  border-radius: 5px;
  background-color: rgba(255, 255, 255, .15);
  
  backdrop-filter: blur(5px);
}
</style>

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">
        <div class="col-lg-6">

            <div class="card o-hidden border-0 my-5 card-custom" style="margin-top:120px!important">
                <h1 class="text-white text-center mt-5">Virtual Photobooth</h1>
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="container mt-5">
                                <?= $this->session->flashdata('message'); ?>
                                <form class="user" method="post" action="<?= base_url('auth/login'); ?>">

                                    <small class="text-white text-center">
                                        <center style="font-family:centraleregular;font-size:17px;">Masukan kode unik</center>
                                    </small>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="kodeUnik" name="kodeUnik" value="<?= set_value('kodeUnik'); ?>">
                                        <?= form_error('kodeUnik', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>

                                    <small class="text-white text-center mt-3">
                                        <center style="font-family:centraleregular;font-size:17px;">Masukan no whatsapp aktif anda</center>
                                    </small>
                                    <div class="form-group">
                                        <input type="tel" class="form-control form-control-user" id="phoneNumber" name="phoneNumber" value="<?= set_value('phoneNumber'); ?>">
                                        <?= form_error('phoneNumber', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                        <div class="float-right mb-5">
                                            <div class="row">
                                                <a href="<?php echo base_url()?>auth/registrasi" class="btn btn-user text-white" style="width:100px;font-family:centraleregular;font-size:13px;" hidden>
                                                    <strong>Registrasi</strong>
                                                </a>
                                                <button class="btn btn-primary btn-user" style="width:100px;font-family:centraleregular;font-size:13px;background-color:#0E3F7C">
                                                    <b>Masuk</b>
                                                </button>
                                            </div>
                                        </div>
                                </form>

                            </div>
        
                        </div>

                    </div>

                </div>

            </div>


        </div>

    </div>

</div>

