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
              <?php if(validation_errors() ) : ?>
            	<div class="alert alert-danger" role="alert">
				  <?= validation_errors(); ?>
				</div>
			<?php endif; ?>
            </div>
             <div class="box-body">
				<form action="" method="post">
					<div class="form-group row">
				    <label for="kd_rm" class="col-sm-2 col-form-label">Kode RM </label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="kd_rm" name="kd_rm" value="<?= $kodeunik; ?>" readonly>
				    </div>
				</div>				
				  <div class="form-group row">
				    <label for="nama" class="col-sm-2 col-form-label">Nama Pasien </label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="nama" name="nama_pasien" placeholder="Masukan Nama Pasien" value="<?= set_value('nama_pasien') ?>">
				    </div>
				  </div>
				  <div class="form-group row">
					<label class="col-form-label col-sm-2 pt-0">Jenis Kelamin</label>
				      <div class="col-sm-10">
				    	<div class="custom-control custom-radio custom-control-inline">
						  <input type="radio" id="laki" name="jenkel" class="minimal" value="Laki-Laki" value="<?= set_value('jenkel') ?>">
						  <label class="custom-control-label" for="laki">Laki-Laki</label>
						</div>
						<div class="custom-control custom-radio custom-control-inline">
						  <input type="radio" id="cewe" name="jenkel" class="minimal" value="Perempuan">
						  <label class="custom-control-label" for="cewe">Perempuan</label>
						</div>
					</div>
				    </div>
				  <div class="form-group row">
				    <label for="lahir" class="col-sm-2 col-form-label">Tempat Lahir </label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="lahir" name="tempat_lahir"  placeholder="Masukan Tempat Lahir" value="<?= set_value('tempat_lahir') ?>">
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir </label>
				    <div class="col-sm-10">
				      <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"  placeholder="Masukan Tanggal Lahir" value="<?= set_value('tanggal_lahir') ?>">
				    </div>
				</div>
				   <div class="form-group row">
					<label for="alamat" class="col-sm-2 col-form-label" >Alamat</label>
					<div class="col-sm-10">
					<textarea class="form-control" id="alamat" name="alamat" rows="3" value="<?= set_value('alamat') ?>">	
					</textarea>
					</div>
				  </div>
				 <div class="form-group row">
					<label class="col-form-label col-sm-2 pt-0">Pengobatan</label>
				      <div class="col-sm-10">
				    	<div class="custom-control custom-radio custom-control-inline">
						  <input type="radio" id="umum" name="pengobatan" class="minimal" value="Umum" value="<?= set_value('pengobatan') ?>">
						  <label class="custom-control-label" for="umum">Umum</label>
						</div>
						<div class="custom-control custom-radio custom-control-inline">
						  <input type="radio" id="bpjs" name="pengobatan" class="minimal" value="BPJS">
						  <label class="custom-control-label" for="bpjs">BPJS</label>
						</div>
					</div>
				    </div>
				  <div class="form-group row">
				    <label for="no_bpjs" class="col-sm-2 col-form-label">No. BPJS </label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="no_bpjs" name="no_bpjs" placeholder="Masukan Nomor BPJS" value="<?= set_value('no_bpjs') ?>">
				    </div>
					</div>
				    <div class="form-group row">
				    <label for="telp" class="col-sm-2 col-form-label">Telepon/HP </label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="telp" name="telp" placeholder="Masukan Nomor Telepon/HP" value="<?= set_value('telp') ?>">
				    </div>
					</div>
				  <div class="form-group row">
				    <div class="col-sm-10">
				      <button type="submit" name="tambah" class="btn btn-primary">Simpan</button>
				       <a href="<?= base_url('data_pasien/index'); ?>" class="btn btn-success">Kembali</a>
				    </div>
				  </div>
				</form>

            	</div>
            	
            </div>
        </div>
    </div>