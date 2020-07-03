  <div class="content-wrapper">    <!-- Content Header (Page header) -->
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
                      <th>Kode RM</th>  
                      <th>Nama Pasien</th>
                      <th>Tanggal Lahir</th>
                       <th>Umur</th>                 
                     <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                          $no_rm = 1;
                          foreach($pasien as $r) {
                            $awal = strtotime($r->tanggal_lahir);
                            $ayeuna = time();
                     ?> 
                     <tr>
                      <td><?= $no_rm ++ ?></td>
                      <td><?= $r->kd_rm ?></td>
                      <td><?= $r->nama_pasien ?></td> 
                      <td><?= $r->tanggal_lahir ?></td>
                      <td><?= timespan($awal, $ayeuna, 2);  ?></td>

                      <td>
                        
                        <a href="<?= base_url('pemeriksaan/periksa/'.$r->kd_rm) ?>" class="btn btn-primary btn-xs "> Tambah Pemeriksaan</a>  
            
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
   </section>
 
 

      <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>