

    <!-- Begin Page Content -->
    <div class="container-fluid">

<!-- Page Heading -->

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h5 class="m-0 font-weight-bold text-primary"><?= $title?></h5>
    <?= $this->session->flashdata('message'); ?>
    <a href="<?php echo base_url()?>Admin/tambahPeserta" class="btn btn-sm btn-success float-right" hidden><i class="fa fa-plus"></i></a>
  </div>
  
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No.</th>
            <th>Kode Unik</th>
            <th>No Whatsapp</th>
            <th>Nama</th>
            <th>Nama Toko</th>
            <th>Nama Sales</th>
            <th>Provinsi</th>
            <th>Tanggal Registrasi</th>
            <th hidden>Aksi</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
          <th>No.</th>
            <th>Kode Unik</th>
            <th>No Whatsapp</th>
            <th>Nama</th>
            <th>Nama Toko</th>
            <th>Nama Sales</th>
            <th>Provinsi</th>
            <th>Tanggal Registrasi</th>
            <th hidden>Aksi</th>
          </tr>
        </tfoot>
        <tbody>
        <?php 
        $no = 1; foreach($peserta as $u) : ?>


        <tr>
          <td><?php echo $no?></td>
          <td><?php echo $u['kodeUnik'] ?></td>
          <td><?php echo $u['noHp'] ?></td>
          <td><?php echo $u['name'] ?></td>
          <td><?php echo $u['namaToko'] ?></td>
          <td><?php echo $u['namaSales'] ?></td>
          <td><?php echo $u['provinsi'] ?></td>
          <td><?=  $u['tanggalRegistrasi']?></td>
            <td hidden>
          <div class="btn-group">
                <a href="<?php echo base_url()?>User/edit/<?php echo $u['id']?>" class="btn btn-info btn-flat mr-2"><i class="fa fa-edit"></i></a>
          </div>
          </td>
   
        </tr>
        <?php 
        $no++;
        endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
</div></div>
<!-- /.container-fluid -->



</body>

</html>