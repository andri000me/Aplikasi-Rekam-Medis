<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?= $judul; ?>
      </h1>
    </section>

 <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped ">
                     <thead>
                    


                    <tr>
                      <th>No</th>
                      <th>Tanggal</th>
                      <th>Kode Pemeriksaan</th>
                      <th>Nama</th>
                      <th>Keluhan</th>
                      <th>Diagnosa</th>
                      <th>Tindakan</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                    <?php 
                          $id = 1;
                          foreach($pemeriksaan as $r) {
                     ?>
                    <tr>
                      <td><?= $id ++ ?></td>
                       <td><?= $r['tanggal']; ?></td>
                       <td><?= $r['id_periksa']; ?></td>
                       <td> <?= $r['nama_pasien'];?></td>
                       <td><?= $r['keluhan']?></td>
                       <td><?= $r['diagnosa']?></td>
                       <td><?= $r['tindakan']?></td>
                      <td>
                        <a href="<?= base_url('resep_obat/detail/'.$r['id_periksa']) ?>" class="btn btn-success btn-xs">Tambah</a>
                        <a href="<?= base_url('resep_obat/lihat/'.$r['id_periksa']) ?>" class="btn btn-primary btn-xs "> lihat</a>  
                      </td>
                     <?php } ?>
                    </tr>
                  </tbody>
                  
                </table>
              </div>
            </div>
          </div>
<!-- 
        </div> -->
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
   

      <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>