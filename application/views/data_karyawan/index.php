         <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
             
               
              </div>
          
            <div class="card-body">
              <div class="row">
              <div class="col-sd-4">
                <a href="<?= base_url();  ?>data_karyawan/tambah" class="btn btn-primary"> Tambah Data Karyawan</a>
              </div>
                <div class="col-sm-4">
                <a href="<?= base_url();  ?>data_karyawan/cetak" class="btn btn-secondary" > Cetak data Karyawan</a>
              </div>
              
           
            </div>
              <br>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>NIP</th>
                      <th>Nama Karyawan</th>
                      <th>Jenis Kelamin</th>
                      <th>Jabatan</th>
                      <th>Alamat</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                          $id_karyawan = 1;
                          foreach($kar as $k) {
                     ?>
                    <tr>
                      <td><?= $id_karyawan ++ ?></td>
                      <td><?= $k->nip ?></td>
                      <td><?= $k->nama_karyawan ?></td>
                      <td><?= $k->jk ?></td>
                      <td><?= $k->jabatan ?></td>
                      <td><?= $k->alamat ?></td>
                      
                      <td>
                        <a href="<?= base_url('data_karyawan/hapus/'.$k->nip) ?>" class="badge badge-danger float-right"  onclick="return confirm('yakin?');" ><i class="fas fa-trash"></i>hapus</a>   
                        <a href="<?= base_url('data_karyawan/ubah/'.$k->nip) ?>" class="badge badge-success float-right" ><i class="fas fa-edit"></i>ubah</a>
                      </td>
                    </tr>
                    <?php } ?>
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