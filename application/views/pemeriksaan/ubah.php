 <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
            	<?php if(validation_errors() ) : ?>
            	<div class="alert alert-danger" role="alert">
				  <?= validation_errors(); ?>
				</div>
			<?php endif; ?>
            	 
				<form action="" method="post">

					<input type="hidden" name="id_rm" value="<?= $pemeriksaan['id_rm']; ?>">
					<div class="form-group row">
				    <label for="kd_pasien" class="col-sm-2 col-form-label">Kode Pasien </label>
				    <div class="col-sm-4">
				    	 <input type="text" class="form-control" id="kd_pasien" name="kd_pasien" value="<?= $pemeriksaan['id_pasien'] ;?>">
				    <!-- <select class="form-control" id="id_pasien" name="id_pasien"> 

                        <?php foreach ($pasien as $p) : ?> 
                        <option value="<?= $p['id_pasien']; ?>" readonly> <?= $p['kd_pasien']; ?> | <?= $p['nama_pasien']; ?> </option> 
                                <?php endforeach; ?>
                            </select> -->
				    </div>

				    <label for="kd_rm" class="col-sm-2 col-form-label">Kode Rekam Medis </label>
				    <div class="col-sm-4">
				      <input type="text" class="form-control" id="kd_rm" name="kd_rm" value="<?= $pemeriksaan['kd_rm']; ?>" readonly>
				    </div>
				</div>
				<!-- <div class="form-group row">
				    
				</div> -->

					<div class="form-group row">
				    <label for="tanggal" class="col-sm-2 col-form-label">Tanggal Pemeriksaan </label>
				    <div class="col-sm-10">
				      <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= $pemeriksaan['tanggal'];?>">
				    </div>
				</div>


				
				    <div class="form-group row">
					<label for="keluhan" class="col-sm-2 col-form-label" >Keluhan</label>
					<div class="col-sm-10">
					<textarea class="form-control" id="keluhan" name="keluhan" rows="3">
						<?= $pemeriksaan['keluhan'];?>
					</textarea>
					</div>
				</div>
				  
				   <div class="form-group row">
					<label for="diagnosa" class="col-sm-2 col-form-label" >Diagnosis</label>
					<div class="col-sm-10">
					<textarea class="form-control" id="diagnosa" name="diagnosa" rows="3">
						<?= $pemeriksaan['diagnosa'];?>
					</textarea>
					</div>
				  </div>

				  
				<!--   <div class="form-group row">
					<label for="jenkel" class="col-sm-2 col-form-label">Nama Penyakit</label>
					<div class="col-md-8">
					<select class="form-control" id="jenkel" name="jenkel">
						
					</select>
				</div>
			</div> -->
 					<fieldset class="form-group">
				    <div class="row">
					<legend class="col-form-label col-sm-2 pt-0">Tindakan</legend>
				      <div class="col-sm-10">
				    	<div class="custom-control custom-radio custom-control-inline">
						  <input type="radio" id="KONSULTASI DOKTER" name="tindakan" class="custom-control-input" value="KONSULTASI DOKTER"  <?php if($pemeriksaan['tindakan'] == 'KONSULTASI DOKTER'){echo 'checked';}?>/>
						  <label class="custom-control-label" for="KONSULTASI DOKTER">KONSULTASI DOKTER</label>
						</div>
						<div class="custom-control custom-radio custom-control-inline">
						  <input type="radio" id="PEMERIKSAAN LAB" name="tindakan" class="custom-control-input" value="PEMERIKSAAN LAB"  <?php if($pemeriksaan['tindakan'] == 'PEMERIKSAAN LAB'){echo 'checked';}?>/>
						  <label class="custom-control-label" for="PEMERIKSAAN LAB">PEMERIKSAAN LAB</label>
						</div>
					</div>
				    </div>
				  </fieldset>
				

				  <!-- <div class="form-group row">
				    <label for="id_penyakit" class="col-sm-2 col-form-label">Nama Penyakit </label>
				    <div class="col-sm-10">
				       <select class="form-control" id="id_penyakit" name="id_penyakit"> 

                        <?php foreach ($penyakit as $p) : ?> 
                        <option value="<?= $p['id_penyakit']; ?>"><?= $p['nama_penyakit']; ?> </option> 
                                <?php endforeach; ?>
                            </select>
				    </div>
				</div>
				   -->
				
				  <div class="form-group row">
				    <div class="col-sm-10">
				      <button type="submit" name="tambah" class="btn btn-primary">Simpan</button>
				       <a href="<?= base_url('pemeriksaan/index'); ?>" class="btn btn-secondary">Kembali</a>
				    </div>
				  </div>
				</form>

            	</div>
            	
            </div>
        </div>
    </div>