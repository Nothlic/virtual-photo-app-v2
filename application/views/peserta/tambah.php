
    <!-- Begin Page Content -->
    <div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <?= $this->session->flashdata('message'); ?>

    <div class="col-lg-5">
    <form method="POST"> 
            <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control form-control-user" id="name" name="name" placeholder="Nama Lengkap" value="<?= set_value('name'); ?>">
                <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
                <label>Kode Unik</label>
                <input type="text" class="form-control form-control-user" id="kodeUnik" name="kodeUnik" placeholder="Kode Unik" value="<?= set_value('kodeUnik'); ?>">
                <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
                <label>Nomor Whatsapp</label>
                <input type="text" class="form-control form-control-user" id="noHp" name="noHp" placeholder="+62" value="<?= set_value('noHp'); ?>">
                <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Email Address" value="<?= set_value('email'); ?>">
                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            
               <div class="form-group">
                <label>Provinsi</label>
            <select name="provinsi" id="provinsiinput" class="form-control provinsi mb-4">
                <option disabled selected>Pilih Provinsi</option>
                <?php foreach ($provinsi as $p) {
                ?> <option value="<?php echo $p['name']; ?>"><?= $p['name']; ?></option>
                <?php
                } ?>
            </select>
            </div>

         
            <button type="submit" class="btn btn-primary float-right ml-2">Submit</button>
            <a class="btn btn-secondary float-right"  href="<?php echo base_url()?>admin/peserta">Back</a>   
            </form>

    </div>
    </div>
    </div>


</body>
</html>