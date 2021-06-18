

    <!-- Begin Page Content -->
    <div class="container-fluid">

<!-- Page Heading -->

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h5 class="m-0 font-weight-bold text-primary"><?= $title?></h5>
    <?= $this->session->flashdata('message'); ?>
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
            <th>Email</th>
            <th>Provinsi</th>
            <th>Date Create</th>
            <th>Tanggal Registrasi</th>
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
            <th>Email</th>
            <th>Provinsi</th>
            <th>Date Create</th>
            <th>Tanggal Registrasi</th>
          </tr>
        </tfoot>
        <tbody>
        <?php 
        $no = 1; foreach($data as $u) : ?>


        <tr>
          <td><?php echo $no?></td>
          <td><?php echo $u['kodeUnik'] ?></td>
          <td><?php echo $u['noHp'] ?></td>
          <td><?php echo $u['name'] ?></td>
          <td><?php echo $u['namaToko'] ?></td>
          <td><?php echo $u['namaSales'] ?></td>
          <td><?php echo $u['email'] ?></td>
          <td><?php echo $u['provinsi'] ?></td>
          <td><?php echo $u['date_created'] ?></td>
          <td><?=  $u['tanggalRegistrasi']?></td>
   
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