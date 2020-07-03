
            <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body">
    
 
               <form action="<?= base_url('pemeriksaan/tambah_aksi'); ?>" method="post">
                <?php foreach ($pasien as $u) { ?>
              
                 <?php } ?>
            <div class="form-group row">
              <label for="tanggal" class="col-sm-2 col-form-label">Tanggal Pemeriksaan </label>
              <div class="col-sm-4">
                <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= date('Y-m-d')?>" >
            </div>
            <label for="id_periksa" class="col-sm-2 col-form-label">No. Pemeriksaan </label>
            <div class="col-sm-4">
            <input type="text" class="form-control" id="id_periksa" name="id_periksa" value="<?= $kodeperiksa; ?>" readonly>
            <?php foreach ($pasien as $p) { ?>
              
          
             <input type="hidden"  name="kd_rm" value="<?= $p->kd_rm ?>"> <?php } ?>
          </div>
          </div>
           <div class="form-group row">
              <label for="keluhan" class="col-sm-2 col-form-label">Keluhan</label> 
              <div class="col-sm-4"> 
                <textarea class="form-control" id="keluhan" name="keluhan" rows="2" required="keluhan">
               </textarea>
           </div>  
              <label for="diagnosa" class="col-sm-2 col-form-label">Diagnosis</label>
              <div class="col-sm-4">
                 <textarea class="form-control" id="diagnosa" name="diagnosa" rows="2" required="diagnosa">
                  </textarea>
            </div>
          </div>
          <div class="form-group row">
          <label class="col-form-label col-sm-2">Tindakan</label>
              <div class="col-sm-10">
               <div class="form-check">
              <?php foreach ($tarif as $r) : ?>
            <div class="form-check">
              <input class="minimal" type="checkbox" multiple name="tindakan[]" value="<?= $r['nama_tarif']?>" >
              <label class="form-check-label" >
                        <?= $r['nama_tarif'] ?>
              </label>
            </div>
            <?php endforeach; ?>

          </div> 
          </div> 
        </div>
<div class="box-footer">
              <button type="submit" name="tambah" class="btn btn-primary">Simpan</button>
          </div>
       
        </form>
      </div>

              </div>
              <div class="box box-success">
           <div class="box-header">
              <h3 class="box-title">Data Pemeriksaan</h3>
            </div>
           <div class="box-body">
              <table id="example1" class="table table-bordered table-striped ">
                     <thead>
                    <tr>
                      <th>No.</th>
                      <th>Tanggal</th>
                      <th>Kode Pemeriksaan</th>
                      <th>Diagnosa</th>
                      <th>Keluhan</th>
                      <th>Tindakan</th>                   
                     <th>Aksi</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                          $no_rm = 1;
                          foreach($pemeriksaan as $r) {
                     ?> 
                     <tr>
                      <td><?= $no_rm ++ ?></td>
                      <td><?= $r->tanggal ?></td>
                      <td><?= $r->id_periksa ?></td>
                      <td><?= $r->diagnosa ?></td> 
                      <td><?= $r->keluhan ?></td>
                      <td><?= $r->tindakan ?></td>

                      <td>
                        
                        <a href="<?= base_url('pemeriksaan/hapus/'.$r->id_periksa) ?>" class="btn btn-danger float-right" onclick="return confirm('yakin dok, mau dihapus?');">Hapus</a>  
            
                      </td>
                      
                        
                      
                    
                    </tr> 
                     <?php } ?>
                  </tbody>
                                      
                </table>
            </div>
        </div>
    </div>
          	 
				
            	</div>
            	
            </div>
        </div>
    </div>
</div>
