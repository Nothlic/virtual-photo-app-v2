
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
            <th>Nama</th>
            <th>Nama Toko</th>
            <th>Nomor HP</th>
            <th>Provinsi</th>
            <th>Chat</th>
            <th>Waktu</th>
            <!-- <th>Aksi</th> -->
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>Nama Toko</th>
            <th>Nomor HP</th>
            <th>Provinsi</th>
            <th>Chat</th>
            <th>Waktu</th>
          </tr>
        </tfoot>
        <tbody>
        <?php 
        $no = 1; foreach($chat as $u) : ?>


        <tr>
          <td><?php echo $no?></td>
          <td><?php echo $u['nama'] ?></td>
          <td><?php echo $u['namaToko'] ?></td>
          <td><?php echo $u['noHp'] ?></td>
          <td><?php echo $u['provinsi'] ?></td>
          <td><?php echo $u['isi'] ?></td>
          <td><?php echo $u['waktu'] ?></td>
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