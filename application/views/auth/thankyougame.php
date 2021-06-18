<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-lg-6" style="margin-top:10%">

            <div class="card o-hidden border-0  my-5" >
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <?= $this->session->flashdata('message'); ?>
                    <a href="<?php echo base_url('auth/registration') ?>" class="btn btn-info btn-user btn-block" style="font-family:centraleregular;"><b>Terimakasih Telah Berpatisipasi</b></a>
                    <small class="text-white" style="font-family:centraleregular;">
                    </small>


                </div>
            </div>
        </div>

    </div>

</div>
<script src="<?php echo base_url() ?>assets/assetsfront2/js/sweetalert.min.js"></script>
