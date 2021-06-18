

    <!-- Begin Page Content -->
    <div class="container-fluid">

<!-- Page Heading -->

<!-- DataTales Example -->
    <div class="col-lg-7">
        
                                <form class="user" method="post" action="<?= base_url('admin/detail'); ?>">
                                   
                                    <h3 class="mt-3" style="font-family:centrale;">
                                        Tanggal
                                    </h3>
                                    <div class="form-group">
                                        <input type="date" class="form-control form-control-user" id="tanggal" name="tanggal" >
                                        <?= form_error('kodeUnik', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    
                                    <button class="btn btn-warning btn-user float-right" style="font-family:centrale;font-size:15px;"><b>Filter</b></button>
                                   
                                  <!-- <div class="row">
                                        <div class="col-md-6">
                                            <a href="#" style="background:transparent" class="btn btn-sm  btn-user btn-block float-right "  > Registrasi  </a>
                                        </div>
                                        <div class="col-md-6">
                                            <button type="submit" class="btn btn-sm btn-warning btn-user btn-block float-right" > Masuk </button>
                                        </div>
                                </div>    -->

                                </form>
    </div>
</div></div>
<!-- /.container-fluid -->



</body>

</html>