
    <!-- Begin Page Content -->
    <div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <?= $this->session->flashdata('message'); ?>

    <div class="col-lg-5">
    <form method="POST"> 
            <div class="form-group">
                <label>Link Youtube</label>
                <input type="text" class="form-control" id="judul" name="link" placeholder="Link Youtube" >
                <?= form_error('link', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>

         
            <button type="submit" class="btn btn-primary float-right ml-2">Submit</button>
            <a class="btn btn-secondary float-right"  href="<?php echo base_url()?>Youtube">Back</a>   
            </form>

    </div>
    </div>
    </div>


</body>
</html>