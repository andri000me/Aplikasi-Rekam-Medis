  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?= $judul; ?>
      </h1>
    </section>
        <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-body">
              <div class="col-sd-4">
                <a href="<?= base_url();  ?>data_pasien/tambah" class="btn btn-primary" > Tambah Data Pasien</a>
              </div>
          </div>
              <br>
               <div class="box-body">
              <table id="example1" class="table table-bordered table-striped ">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Kode RM</th>
                      <th>Nama Pasien</th>
                      <th>Jenis Kelamin</th>
                      <th>Tempat Lahir</th>
                      <th>Tanggal Lahir</th>
                      <th>Umur</th>
                      <th>Alamat</th>
                      <th>Pengobatan</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                          $id_pasien = 1;
                          foreach($pasien as $p) {
                            $awal = strtotime($p->tanggal_lahir);
                            $ayeuna = time();

                     ?>
                    <tr>
                      <td><?= $id_pasien ++ ?></td>
                      <td><?= $p->kd_rm ?></td>
                      <td><?= $p->nama_pasien ?></td>
                      <td><?= $p->jenkel ?></td>
                      <td><?= $p->tempat_lahir ?></td>
                      <td><?= $p->tanggal_lahir ?></td>
                      <td><?= timespan($awal, $ayeuna, 2);  ?></td>
                      <td><?= $p->alamat ?></td>
                      <td><?php echo $p->pengobatan ?></td>
                      <td>
                        <a href="<?= base_url('data_pasien/hapus/'.$p->kd_rm) ?>" class="btn btn-danger btn-xs" onclick="return confirm('yakin min, mau dihapus?');"><i class="fa fa-trash"></i>Hapus</a>  
                        <a href="<?= base_url('data_pasien/ubah/'.$p->kd_rm) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i>Ubah</a>
                        <a href="<?= base_url('cetak/cetak/'.$p->kd_rm) ?>" class="btn btn-default btn-xs"><i class="fa fa-print"></i>Cetak</a>
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
<!-- 
        </div> -->
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
   

      