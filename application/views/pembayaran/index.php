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
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped ">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Kode Resep</th>
                      <th>Kode RM</th>  
                      <th>Nama Pasien</th>
                      <th>Tindakan</th>
                      <th>Pengobatan</th>                   
                      <th>Aksi</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                          $no_rm = 1;
                          foreach($bayar as $r) {
                     ?> 
                     <tr>
                      <td><?= $no_rm ++ ?></td>
                      <td><?php echo $r->kd_resep ?></td>
                      <td><?= $r->kd_rm ?></td>
                      <td><?= $r->nama_pasien ?></td> 
                      <td><?= $r->tindakan ?></td>
                      <td><?= $r->pengobatan ?></td>

                      <td>
                        
                        <a href="<?= base_url('pembayaran/tambah/'.$r->kd_resep) ?>" class="btn btn-primary btn-xs"><i class="fa fa-dollar"></i>Bayar</a>  
                        <a href="<?= base_url('pembayaran/lihat/'.$r->kd_resep) ?>" class="btn btn-default btn-xs"><i class="fa fa-eye"></i>Lihat</a>  
            
                      </td>
                      
                        
                      
                    
                    </tr> 
                     <?php } ?>
                  </tbody>
                                      
                </table>
           
               
              </div>
               

              </div>
           
        </div> 
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
   

      <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>