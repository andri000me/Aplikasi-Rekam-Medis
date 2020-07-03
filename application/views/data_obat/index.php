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
              <div class="row">
              <div class="col-md-4">
                <a href="<?= base_url();  ?>data_obat/tambah" class="btn btn-primary"> Tambah Obat Baru</a>
              </div>

           
          </div>
          <br>  
           <div class="box-body">
              <table id="example1" class="table table-bordered table-striped ">
                  <thead>
                    


                    <tr>
                      <th>No.</th>
                      <th>Nama Obat</th>
                      <th>Stok</th>
                      <th>Harga</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                    <?php 
                          $id_obat = 1;
                          foreach($obat as $o) {
                     ?>
                    <tr>
                      <td><?= $id_obat ++ ?></td>
                      <td><?= $o->nama_obat ?></td>
                      <td><?= $o->stok ?></td>
                      <td><?= 'Rp. '.number_format($o->harga,0,',','.'); ?></td>
                      <td>   
                        <a href="<?= base_url('data_obat/ubah/'.$o->id_obat) ?>" class="btn btn-success btn-xs" >Ubah</a>
                        <a href="<?= base_url('data_obat/hapus/'.$o->id_obat) ?>" class="btn btn-danger btn-xs"  onclick="return confirm('yakin, data obatnya mau dihapus?');" >Hapus</a> 
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