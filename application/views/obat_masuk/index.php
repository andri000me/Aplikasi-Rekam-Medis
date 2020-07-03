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
                <a href="<?= base_url();  ?>obat_masuk/tambah" class="btn btn-primary"> Tambah Obat Masuk</a>
              </div>

           
          </div>
          <br>  
           <div class="box-body">
              <table id="example1" class="table table-bordered table-striped ">
                  <thead>
                    


                    <tr>
                      <th>No.</th>
                      <th>Kode Transaksi</th>
                      <th>Tanggal Transaksi</th>
                      <th>Subtotal</th>
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
                      <td><?= $o->kd_masuk ?></td>
                      <td><?= $o->tanggal ?></td>
                      <td><?= 'Rp. '.number_format($o->subtotal,0,',','.'); ?></td>
                      <td>   
                        <a href="<?= base_url('obat_masuk/hapus/'.$o->kd_masuk) ?>" class="btn btn-danger btn-xs"  onclick="return confirm('yakin, data obatnya mau dihapus?');" >Hapus</a> 
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