<div class="container">
	<div class="row mt-3">
		<div class="col-12">
		 <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
            	 
				<form action="" method="">
				  <div class="form-group row">
				    <label for="nama_karyawan" class="col-sm-2 col-form-label">Nama Karyawan</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="nama_karyawan" name="nama_karyawan" placeholder="Masukan Nama Karyawan" value="<?= $karyawan['nama_karyawan'];?>" readonly>
				    </div>
				  </div>
				  <div class="form-group">
				    <div class="row">
					<legend class="col-form-label col-sm-2 pt-0">Jenis Kelamin</legend>
				      <div class="col-sm-10">
				    	<div class="custom-control custom-radio custom-control-inline">
						  <input type="radio" id="laki" name="jk" class="custom-control-input" value="Laki-Laki"
						  <?php if($karyawan['jk'] == 'Laki-Laki'){echo 'checked';}?>/>
						   <label class="custom-control-label" for="Laki-Laki">Laki-Laki</label>
						</div>
						<div class="custom-control custom-radio custom-control-inline">
						  <input type="radio" id="cewe" name="jk" class="custom-control-input" value="Perempuan"
						   <?php if($karyawan['jk'] =='Perempuan'){echo 'checked';} ?>/>
						   <label class="custom-control-label" for="Perempuan">Perempuan</label>
						</div>
					</div>
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="jabatan" class="col-sm-2 col-form-label">Jabatan </label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="jabatan" name="jabatan"  placeholder="Masukan Jabatan" value="<?= $karyawan['jabatan'];?>" readonly>
				    </div>
				</div>
				   <div class="form-group row">
					<label for="alamat" class="col-sm-2 col-form-label" >Alamat</label>
					<div class="col-sm-10">
					<textarea class="form-control" id="alamat" name="alamat" rows="3" readonly>
					<?= $karyawan['alamat'];?></textarea>
					</div>
				  </div>
				  <div class="form-group row">
				    <div class="col-sm-10">
				      <a href="<?= base_url('data_karyawan/index'); ?>" class="btn btn-secondary">Kembali</a> 
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