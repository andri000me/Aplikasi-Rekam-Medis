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
              <h3 class="m-0 font-weight-bold text-primary"><?php echo $ket; ?></h3>
                <a target="_blank" href="<?php echo $url_cetak; ?>" class="btn btn-default"><i class="fa fa-print"></i> CETAK PDF</a>
    <br>  
              <table id="example2" class="table table-bordered table-striped ">
                  <thead>
                    


                    <tr>
                      <th>No.</th>
                      <th>Nama Obat</th>
                      <th>Stok</th>
                      <th>Harga</th>
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