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
              <div class="col-md-9">
                <a href="<?= base_url();  ?>tarif/tambah" class="btn btn-primary"> Tambah Data Tarif</a>
              </div>           
          </div>
          <br>  
                 <div class="box-body">
              <table id="example1" class="table table-bordered table-striped ">
                  <thead>
                    


                    <tr>
                      <th>No.</th>
                      <th>Nama Jasa</th>
                      <th>Harga</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                    <?php 
                          $id = 1;
                          foreach($tarif as $u) {
                     ?>
                    <tr>
                      <td><?= $id ++ ?></td>
                      <td><?= $u->nama_tarif ?></td>
                      <td><?= 'Rp. '.number_format($u->harga,0,',','.'); ?></td>
                      <td>
                        <a href="<?= base_url('tarif/hapus/'.$u->id_tarif) ?>" class="btn btn-danger "  onclick="return confirm('yakin , data Tarif mau dihapus?');" ><i class="fa fa-trash"></i>Hapus</a>    
                        <a href="<?= base_url('tarif/ubah/'.$u->id_tarif) ?>" class="btn btn-success" ><i class="fa fa-edit"></i>Ubah</a>
                      </td>
                      
                    </tr>   
                  <?php } ?>
                  </tbody>
                </table>
              </div>
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