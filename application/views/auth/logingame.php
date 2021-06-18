<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-lg-6" style="margin-top: 10%;">
            <div class="card o-hidden border-0 my-5">
                <div class="card-body p-0">

                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <?= $this->session->flashdata('message'); ?>

                                <form class="user" method="post" action="<?= base_url('auth/login'); ?>">

                                    <small class=" text-center mt-3">
                                        <center style="font-family:centraleregular;">Masukan kode e-store Anda</center>
                                    </small>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="kodeUnik" name="kodeUnik" value="<?= set_value('kodeUnik'); ?>">
                                        <?= form_error('kodeUnik', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <center>
                                        <p>
                                            <button class="btn btn-success btn-user" style="width:100px;font-family:centraleregular;font-size:15px;">
                                                <b>Masuk</b>
                                            </button>
                                        </p>
                                    </center>
                                </form>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


        </div>

    </div>

</div>