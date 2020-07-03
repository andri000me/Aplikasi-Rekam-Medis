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
                <a href="<?= base_url();  ?>data_admin/tambah" class="btn btn-primary"> Tambah Data Admin</a>
              </div>
            <div class="col-md-3">
                <table>
                <tr>
                  <td colspan="2">Catatan :</td> 
                </tr>
                <tr>
                  <td> 1 = Status Akun Aktif </td>
                </tr>
                <tr>
                  <td> 0 = Status Akun Tidak Aktif </td>
                </tr></table>
        </div>

          </div>
          
              <!-- /.box-header -->
            <div class="box-body">

              <table id="example2" class="table table-bordered table-striped ">
                  <thead>
                    


                    <tr>
                      <th>No.</th>
                      <th>Nama </th>
                      <th>Username</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                    <?php 
                          $id = 1;
                          foreach($admin1 as $u) {
                     ?>
                    <tr>
                      <td><?= $id ++ ?></td>
                      <td><?= $u->nama ?></td>
                      <td><?= $u->username ?></td>
                      <td><?= $u->aktif ?></td>
                      <td>
                        <a href="<?= base_url('data_admin/hapus/'.$u->id_admin) ?>" class="btn btn-danger "  onclick="return confirm('yakin?');" ><i class="fa fa-trash"></i>Hapus</a>    
                        <a href="<?= base_url('data_admin/ubah/'.$u->id_admin) ?>" class="btn btn-success" ><i class="fa fa-edit"></i>Ubah</a>
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