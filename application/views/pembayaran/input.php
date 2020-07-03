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
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body">
    
 

               <form action="<?= base_url('pembayaran/tambah_aksi'); ?>" method="post">
                  <div class="form-group row">
                  <label for="kode_bayar" class="col-sm-2 col-form-label">Kode Pembayaran </label>
                  <div class="col-sm-4">
                  <input type="text" class="form-control" id="kd_bayar" name="kd_bayar" value="<?= $kodebayar ?>" readonly>           
                </div>
                  <?php foreach ($kode as $b) { ?>
                  <label for="kode_resep" class="col-sm-2 col-form-label">Kode Resep </label>
                 <div class="col-sm-4">
                  <input type="text" class="form-control" id="kd_resep" name="kd_resep" value="<?php echo  $b->kd_resep ?>" readonly> <?php } ?>
                </div>
              </div>
              <div class="form-group row">
                  <?php foreach ($pemeriksaan as $b) { ?>
                  <label for="kode_resep" class="col-sm-2 col-form-label">Kode Pemeriksaan </label>
                 <div class="col-sm-4">
                  <input type="text" class="form-control" id="id_periksa" name="id_periksa" value="<?php echo  $b->id_periksa ?>" readonly>
                </div>
                <label for="tanggal_bayar" class="col-sm-2 col-form-label">Tanggal </label>
              <div class="col-sm-4">
                <input type="date" class="form-control" id="tanggal_bayar" name="tanggal_bayar" value="<?= date('Y-m-d')?>" >
            </div>
                </div> 
                <div class="form-group row">
                  <label for="kode_resep" class="col-sm-2 col-form-label">Tindakan </label>
                 <div class="col-sm-4">
                  <textarea type="text" class="form-control" id="id_periksa" name="tindakan" readonly rows="3">
                    <?php echo  $b->tindakan ?>
                  </textarea> 
                </div>
                  <label for="kode_resep" class="col-sm-2 col-form-label">Pengobatan </label>
                 <div class="col-sm-4">
                  <input type="text" class="form-control" id="id_periksa" name="pengobatan" value="<?php echo  $b->pengobatan ?>" readonly> <?php } ?>
                </div>
                </div> 
           <div class="form-group row">
              <label for="nama_tarif" class="col-sm-2 col-form-label">Jasa</label> 
                  <div class="col-sm-4"><select class="form-control select2"  id="id_tarif" name="id_tarif"><option value=''>Pilih Jasa</option>
                        <?php foreach ($tarif as $r) : ?>
                         <option value="<?= $r['id_tarif'] ?>"><?= $r['nama_tarif'] ?></option>
                       <?php endforeach; ?>
                            </select>
           </div> 
           <label for="harga" class="col-sm-2 col-form-label">Harga </label>
            <div class="col-sm-4">
            <input type="text" class="form-control" id="harga" name="total">         
          </div>                 
          </div>      
          <div class="box-footer">
              <input type="submit" name="tambah" class="btn btn-primary" value="Tambah">
          </div>
        

              </div>
               <div class="box-header">
              <h3 class="box-title">Data Pembayaran</h3>
            </div>
           <div class="box-body">
              <table id="example2" class="table table-bordered table-hover ">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Jasa</th>
                      <th>Harga</th>           
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
                      <td><?= $r->nama_tarif ?> </td>
                      <td style="text-align: right;"><?= 'Rp. '.number_format($r->total,0,',','.') ?></td>
                      <td>
                        
                        
            
                      </td>
                      
                        
                      
                    
                    </tr> 
                     <?php } ?>
                  </tbody>
                          <tfoot>
                  <tr >
                    <td colspan="2" style="font-weight: bold; text-align: center; ">Subtotal</td>
                     <td style="text-align: right;"><?= "Rp. ".number_format($subtotal,0,',','.') ?></td>
                    <td>
                    </td>
                  </tr>
                  <tr>  
                   
                    <td colspan="2" style="font-weight: bold; text-align:center;">
                        Biaya Obat
                     </td>
                     <?php foreach ($kode as $b) { ?>
                     <td style="text-align: right;"><?php echo "Rp. ".number_format($b->subtotal,0,',','.')  ?>  </td><?php   } ?>

                    <td> 
                 
                    </td>
                  </tr>
                  <tr>  
                    <td colspan="2" style="font-weight: bold; text-align: center;">Total Bayar</td>
                     <td style="text-align: right;"><?= "Rp. ".number_format($totalbayar,0,',','.') ?></td>
                    <td><center>
                      
                      
                        <a class="btn btn-warning" href="<?= base_url().'Pembayaran/hapus_detail_bayar/'.$kodebayar;?>">Batal</a>
                      </center>
                    </td><input type="submit" class="btn btn-success" value="Simpan" name="save">
                  </tr>
                </tfoot>            
                </table>
              </div>
            </form>
            </div>
        </div>
    </div>
  </div>

    
              </div>
              
            </div>
        </div>
    </div>
</div>

      <script src="<?php echo base_url('assets/js/ajax.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-3.3.1.js'?>"></script>

    <script type="text/javascript">
  $(document).ready(function(){
    $('#id_tarif').change(function() {
      var id = $(this).val();
      $.ajax({
        type : 'POST',
        url : '<?= base_url('pembayaran/cek_tarif') ?>',
        Cache : false,
        dataType: "json",
        data : 'id_tarif='+id,
        success : function(resp) {
            $('#id_tarif').val(resp.id_tarif);
            $('#harga').val(resp.harga);  
        }
      });
      // alert(id);
    });


    
  });
</script>

 <script type="text/javascript">
  $(document).ready(function(){
    $('#kd_resep').change(function() {
      var id = $(this).val();
      $.ajax({
        type : 'POST',
        url : '<?= base_url('pembayaran/cek_harga') ?>',
        Cache : false,
        dataType: "json",
        data : 'kd_resep='+id,
        success : function(resp) {
            $('#kd_resep').val(resp.kd_resep);
            $('#subtotal').val(resp.subtotal);  
        }
      });
      // alert(id);
    });


    
  });
</script>