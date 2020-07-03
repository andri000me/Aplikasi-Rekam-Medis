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
				  <div class="form-group row">
				  
				    <label for="nip" class="col-sm-2 col-form-label">NIP </label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="nip" name="nip" value="<?= $kode; ?>" readonly>
				    </div>
				</div>
				<div class="form-group row">
				    <label for="nama_karyawan" class="col-sm-2 col-form-label">Nama Karyawan</label>
				    <div class="col-sm-4">
				      <input type="text" class="form-control" id="nama_karyawan" name="nama_karyawan" placeholder="Masukan Nama Karyawan">
				    </div>
				    <label for="password" class="col-sm-2 col-form-label">Password </label>
				    <div class="col-sm-4">
				      <input type="password" class="form-control" id="password" name="password"  >
				    </div>
				  </div>
				  <div class="form-group">
				    <div class="row">
					<legend class="col-form-label col-sm-2 pt-0">Jenis Kelamin</legend>
				      <div class="col-sm-10">
				    	<div class="custom-control custom-radio custom-control-inline">
						  <input type="radio" id="laki" name="jk" class="custom-control-input" value="Laki-Laki">
						  <label class="custom-control-label" for="laki">Laki-Laki</label>
						</div>
						<div class="custom-control custom-radio custom-control-inline">
						  <input type="radio" id="cewe" name="jk" class="custom-control-input" value="Perempuan">
						  <label class="custom-control-label" for="cewe">Perempuan</label>
						</div>
					</div>
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="jabatan" class="col-sm-2 col-form-label">Jabatan </label>
				    <div class="col-sm-4">
				      <input type="text" class="form-control" id="jabatan" name="jabatan"  placeholder="Masukan Jabatan">
				    </div>
				      <label for="role_id" class="col-sm-2 col-form-label">Role ID </label>
				    <div class="col-sm-4">
				      <input type="number" class="form-control" id="role_id" name="role_id"  >
				    </div>

				</div>
				   <div class="form-group row">
					<label for="alamat" class="col-sm-2 col-form-label" >Alamat</label>
					<div class="col-sm-10">
					<textarea class="form-control" id="alamat" name="alamat" rows="3" >
					</textarea>
					</div>
				  </div>
				  
				  
				  <div class="form-group row">
				    <div class="col-sm-10">
				      <button type="submit" name="tambah" class="btn btn-primary">Simpan</button>
				       <a href="<?= base_url('data_karyawan/index'); ?>" class="btn btn-secondary">Kembali</a>
				    </div>
				  </div>
				</form>

            	</div>
            	
            </div>
        </div>
    </div>