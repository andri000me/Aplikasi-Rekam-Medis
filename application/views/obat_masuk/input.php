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
            
              <div class="box-body">
    
 

                <form action="<?= base_url('obat_masuk/tambah_aksi'); ?>" method="post">

                <div class="form-group row">
                <label for="kd_masuk" class="col-sm-2 col-form-label">Kode Transaksi</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="kd_masuk" name="kd_masuk" value="<?= $kodemasuk ?>" readonly>
                </div>
                </div>
                 <div class="form-group row">
                <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                <div class="col-sm-10">
                  <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= date('Y-m-d')?>">
                </div>
                </div>
                <div class="form-group row">
              <label  class="col-sm-2 col-form-label">Nama Obat </label>
              <div class="col-sm-3">

                 <select class="form-control select2"  id="id_obat" name="kd_obat" >
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
          <label for="stok_out" class="col-sm-1 col-form-label">Stok Masuk </label>
            <div class="col-sm-1">
            <input type="number" class="form-control" name="stok_in">         
          </div>
          </div>
            <div class="box-footer">
              <input type="submit" name="tambah" class="btn btn-primary" value="Tambah">
          </div>                            
        </div>
       
        
        <div class="box-header">
              <h3 class="box-title">Data Obat Masuk</h3>
            </div>
          <div class="box-body">            
           <table id="example2" class="table table-bordered table-striped ">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Nama Obat</th>
                      <th>Harga</th>
                      <th>Stok</th>
                      <th>Stok Masuk</th> 
                      <th>Total Stok</th>  
                      <th>Total</th>          
                     <th>Aksi</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                          $no_rm = 1;
                          foreach($masuk as $r) {
                     ?> 
                     <tr>
                      <td><?= $no_rm ++ ?></td>
                      <td><?= $r->nama_obat ?></td>
                      <td><?= 'Rp. '.number_format($r->harga,0,',','.') ?></td>
                      <td><?= $r->stok ?></td>
                      <td><?= $r->stok_in ?></td>
                      <td><?= $r->stok_tot ?></td>
                      <td><?= 'Rp. '.number_format($r->total,0,',','.') ?></td>
                      <td>
                        
                       
            
                      </td>
                      
                        
                      
                    
                    </tr> 
                     <?php } ?>
                  </tbody>
                          <tfoot>
                  <tr>
                    <td colspan="6" style="text-align: center;">Subtotal</td>
                    <td><?= "Rp. ".number_format($subtotal)." ,-" ?></td>
                    <td><center>
                         <div class="box-footer">
                        <a class="btn btn-primary" href="<?= base_url().'obat_masuk/hapus_detail_masuk/'.$kodemasuk ?>">Batal</a>
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


