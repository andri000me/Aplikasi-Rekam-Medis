 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?= $desc; ?>
      </h1>
    </section>
         
 <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            
              <div class="box-body">
    
 

                <form action="<?= base_url('resep_obat/tambah_aksi'); ?>" method="post">
                <?php foreach ($pemeriksaan as $u) { ?>

                <div class="form-group row">
                <label for="kd_rm" class="col-sm-2 col-form-label">Kode RM </label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" id="kd_rm" name="kd_rm" value="<?= $u->kd_rm ?>" readonly>
                </div>
                <label for="id_periksa" class="col-sm-2 col-form-label">Kode Pemeriksaan</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" id="id_periksa" name="id_periksa" value="<?= $u->id_periksa ?>" readonly>
                </div>
                </div>
                 <div class="form-group row">
                <label for="nama_pasien" class="col-sm-2 col-form-label">Nama Pasien </label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" id="nama_pasien" name="nama_pasien" value="<?= $u->nama_pasien ?>" readonly>
                </div>
                <label for="kode_resep" class="col-sm-2 col-form-label">Kode Resep </label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" id="kd_resep" name="kd_resep" value="<?= $koderesep ?>" readonly>
                </div>
                </div> 
                <div class="form-group row">
                <label for="kode_resep" class="col-sm-2 col-form-label">Pengobatan </label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" id="kd_resep" name="pengobatan" value="<?= $u->pengobatan ?>" readonly>
                </div>
                <label for="tanggal_resep" class="col-sm-2 col-form-label">Tanggal </label>
              <div class="col-sm-4">
                <input type="date" class="form-control" id="tanggal_resep" name="tanggal_resep" value="<?= date('Y-m-d')?>" >
            </div>
                </div>               
                <?php }?>

                <div class="form-group row">
              <label  class="col-sm-2 col-form-label">Nama Obat </label>
              <div class="col-sm-3">

                <select class="form-control select2"  id="id_obat" name="id_obat" >
                  <option selected="selected">Pilih Obat</option>
                        <?php foreach ($obat as $r) : ?>
                         <option value="<?= $r->id_obat ?>" value="<?= $r->id_obat ?>"><?= $r->nama_obat ?></option>
                       <?php endforeach; ?>
                            </select>
            </div>
            <label for="harga" class="col-sm-1 col-form-label">Harga </label>
            <div class="col-sm-2">
            <input type="text" class="form-control" id="harga" name="harga">         
          </div>
           <label for="stok" class="col-sm-1 col-form-label">Stok </label>
            <div class="col-sm-1">
            <input type="text" class="form-control" id="stok" name="stok" readonly >         
          </div>
          <label for="stok_out" class="col-sm-1 col-form-label">Stok Keluar </label>
            <div class="col-sm-1">
            <input type="number" class="form-control" name="stok_out" >         
          </div>
          </div>
                <div class="form-group row">
                <label for="aturan_pakai" class="col-sm-2 control-label">Aturan Pakai</label>
                <div class="col-sm-10">
                <select class="form-control select2" multiple="multiple"  id="aturan_pakai" name="aturan_pakai[]"><option value=''>Pilih Aturan Pakai</option>
                   <?php foreach ($aturan as $r) : ?>
                         <option value="<?= $r->nama_aturan ?>"><?= $r->nama_aturan ?></option>
                       <?php endforeach; ?>
                    </select>
              </div>
            </div>
            <div class="box-footer">
              <input type="submit" name="tambah" class="btn btn-primary" value="Tambah">
          </div>                            
        </div>
       
        
        <div class="box-header">
              <h3 class="box-title">Data Resep Obat</h3>
            </div>
          <div class="box-body">            
           <table id="example2" class="table table-bordered table-striped ">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Nama Obat</th>
                      <th>Aturan Pakai</th> 
                      <th>Harga</th>
                      <th>Stok</th>
                      <th>Stok Keluar</th> 
                      <th>Total Stok</th>  
                      <th>Total</th>          
                     <th>Aksi</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                          $no_rm = 1;
                          foreach($resep as $r) {
                     ?> 
                     <tr>
                      <td><?= $no_rm ++ ?></td>
                      <td><?= $r->nama_obat ?></td>
                      <td><?= $r->aturan_pakai ?></td>
                      <td><?= 'Rp. '.number_format($r->harga,0,',','.') ?></td>
                      <td><?= $r->stok ?></td>
                      <td><?= $r->stok_out ?></td>
                      <td><?= $r->stok_tot ?></td>
                      <td><?= 'Rp. '.number_format($r->total,0,',','.') ?></td>
                      <td>
                        
                        <a href="<?= base_url('resep_obat/hapus/'.$r->id_detail) ?>" class="btn btn-danger btn-xs float-right">Hapus</a>  
            
                      </td>
                      
                        
                      
                    
                    </tr> 
                     <?php } ?>
                  </tbody>
                          <tfoot>
                  <tr>
                    <td colspan="7" style="text-align: center;">Subtotal</td>
                    <td><?= "Rp. ".number_format($subtotal)." ,-" ?></td>
                    <td><center>
                         <div class="box-footer">
                      
                        <a class="btn btn-warning" href="<?= base_url().'cetak/cetak_resep/'.$koderesep ?>">Cetak</a>
                        <a class="btn btn-primary" href="<?= base_url().'resep_obat/hapus_detail_resep/'.$koderesep ?>">Batal</a>
                      </div>

                      </center>
                    </td><input type="submit" class="btn btn-success" value="Simpan" name="simpan">
                  </tr>
                </tfoot>            
                </table>
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


<script type="text/javascript">

        $(document).ready(function(){
            $("#id_obat").chosen();
        })
    </script>

    <script type="text/javascript">
  $(document).ready(function(){
    $('#id_obat').change(function() {
      var id = $(this).val();
      $.ajax({
        type : 'POST',
        url : '<?= base_url('resep_obat/cek_obat') ?>',
        Cache : false,
        dataType: "json",
        data : 'id_obat='+id,
        success : function(resp) {
            $('#id_obat').val(resp.id_obat);
            $('#stok').val(resp.stok);
            $('#harga').val(resp.harga);  
        }
      });
      // alert(id);
    });


    
  });
</script>


