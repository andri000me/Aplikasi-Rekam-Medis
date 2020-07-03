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
            <?php foreach ($pemeriksaan as $r) { ?>
               <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Kode Rekam Medis </label>
                 <div class="col-sm-4">
                  <input type="text" class="form-control" value="<?= $r->kd_rm ?>" readonly>
                </div>
                </div>    
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nama Pasien</label>
                 <div class="col-sm-4">
                  <input type="text" class="form-control" value="<?= $r->nama_pasien ?>" readonly>
                </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Kode Pemeriksaan</label>
                 <div class="col-sm-4">
                  <input type="text" class="form-control" value="<?= $r->id_periksa ?>" readonly>
                </div>
                </div>
<?php } ?>
                              
          

<div class="box-body">            
           <table id="example1" class="table table-bordered table-striped ">
                      <thead>
                        <tr>
                        <th>No</th>
                        <th>Kode Bayar</th>
                        <th>Total Bayar</th>
                        <th>Aksi</th>
                      </tr>
                      </thead>
                        <tbody>
                          <?php 
                         $no = 1;
                         foreach ($pembayaran as $r) { ?>
                          <tr>
                          <td><?php echo $no++ ?></td>
                        <td><?php echo $r->kd_bayar ?></td>
                        <td><?php echo $r->totalbayar ?></td>
                        <td><a class="btn btn-default" href="<?= base_url('cetak/cetak_bayar/').$r->kd_bayar ?>"><i class="fa fa-print"></i>Cetak</a>
                          <a class="btn btn-danger" href="<?= base_url('pembayaran/hapus/').$r->kd_bayar ?>"><i class="fa fa-trash"></i>Hapus</a>
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