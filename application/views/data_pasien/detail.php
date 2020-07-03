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
            <div class="box-header">
              <h3 class="box-title">Data Table With Full Features</h3>
            </div>
            	 
				<form action="" method="">
				  <div class="form-group row">
				    <label for="nik" class="col-sm-2 col-form-label">NIK</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="nik" name="nik" placeholder="Masukan NIK" value="<?= $pasien['nik'];?>" readonly>
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="nama" class="col-sm-2 col-form-label">Nama Pasien </label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="nama" name="nama_pasien" placeholder="Masukan Nama Pasien" value="<?= $pasien['nama_pasien'];?>" readonly>
				    </div>
				  </div>
				  <div class="form-group">
				    <div class="row">
					<legend class="col-form-label col-sm-2 pt-0">Jenis Kelamin</legend>
				      <div class="col-sm-10">
				    	<div class="custom-control custom-radio custom-control-inline">
						  <input type="radio" id="laki" name="jenkel" class="custom-control-input" value="Laki-Laki"
						  <?php if($pasien['jenkel'] == 'Laki-Laki'){echo 'checked';}?>/>
						   <label class="custom-control-label" for="Laki-Laki">Laki-Laki</label>
						</div>
						<div class="custom-control custom-radio custom-control-inline">
						  <input type="radio" id="cewe" name="jenkel" class="custom-control-input" value="Perempuan"
						   <?php if($pasien['jenkel'] =='Perempuan'){echo 'checked';} ?>/>
						   <label class="custom-control-label" for="Perempuan">Perempuan</label>
						</div>
					</div>
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="lahir" class="col-sm-2 col-form-label">Tempat Lahir </label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="lahir" name="tempat_lahir"  placeholder="Masukan Tempat Lahir" value="<?= $pasien['tempat_lahir'];?>" readonly>
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="tanggal" class="col-sm-2 col-form-label">Tanggal Lahir </label>
				    <div class="col-sm-10">
				      <input type="date" class="form-control" id="tanggal" name="tanggal_lahir"  placeholder="Masukan Tanggal Lahir" value="<?= $pasien['tanggal_lahir'];?>" readonly>
				    </div>
				</div>
				   <div class="form-group row">
					<label for="alamat" class="col-sm-2 col-form-label" >Alamat</label>
					<div class="col-sm-10">
					<textarea class="form-control" id="alamat" name="alamat" rows="3" readonly>
					<?= $pasien['alamat'];?></textarea>
					</div>
				  </div>
				  
				 <fieldset class="form-group">
				    <div class="row">
					<legend class="col-form-label col-sm-2 pt-0">Pengobatan</legend>
				      <div class="col-sm-10">
				    	<div class="custom-control custom-radio custom-control-inline">
						  <input type="radio" id="umum" name="pengobatan" class="custom-control-input" value="Umum"
						  <?php if($pasien['pengobatan'] == 'Umum'){echo 'checked';}?>/>
						  <label class="custom-control-label" for="umum">Umum</label>
						</div>
						<div class="custom-control custom-radio custom-control-inline">
						  <input type="radio" id="bpjs" name="pengobatan" class="custom-control-input" value="BPJS"
						  <?php if($pasien['pengobatan'] == 'BPJS'){echo 'checked';}?>/>
						  <label class="custom-control-label" for="bpjs">BPJS</label>
						</div>
					</div>
				    </div>
				  </fieldset>
				  <div class="form-group row">
				    <label for="no_bpjs" class="col-sm-2 col-form-label">No. BPJS </label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="no_bpjs" name="no_bpjs" placeholder="Masukan Nomor BPJS" value="<?= $pasien['tanggal_lahir'];?>" readonly>
				    </div>
					</div>
				    <div class="form-group row">
				    <label for="telp" class="col-sm-2 col-form-label">Telepon/HP </label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="telp" name="telp" placeholder="Masukan Nomor Telepon/HP" value="<?= $pasien['telp'];?>" readonly>
				    </div>
					</div>
				  <div class="form-group row">
				    <div class="col-sm-10">
				      <a href="<?= base_url('data_pasien/index'); ?>" class="btn btn-secondary">Kembali</a> 
				    </div>
				  </div>
				</form>

            	</div>
            	
            </div>
        </div>
    </div>
		</div>
	</div>
</div>