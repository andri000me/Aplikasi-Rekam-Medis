
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
            	 
				<form action="" method="post">
				  <div class="form-group row">
				  	<input type="hidden" name="id_racik" value="<?= $racik_obat['id_racik']; ?>">
				    <label for="aturan_pakai" class="col-sm-2 col-form-label">Aturan pakai</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="aturan_pakai" name="aturan_pakai" value="<?= $racik_obat['aturan_pakai']; ?>" >
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="kd_rm" class="col-sm-2 col-form-label">Kode RM </label>
				    <div class="col-sm-10">
				    
				    <input type="text" name="kd_rm" class="form-control" value="<?= $racik_obat->kd_rm; ?>" readonly> 
                
				      </div>
				  </div>

				  <div class="form-group row">
				    <div class="col-sm-10">
				      <button type="submit" name="ubah" class="btn btn-primary">Ubah</button>
				       <a href="<?= base_url('racik_obat/index'); ?>" class="btn btn-secondary">Kembali</a>
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