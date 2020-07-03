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
            	 <div class="box-body">
				<form action="" method="post">
				  <div class="form-group row">
				  	<input type="hidden" name="id_obat" value="<?= $obat['id_obat']; ?>">
				    <label for="nama" class="col-sm-2 col-form-label">Nama Obat</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="nama" name="nama" value="<?= $obat['nama']; ?>" >
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="harga" class="col-sm-2 col-form-label">Harga </label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="harga" name="harga" value="<?= $obat['harga'];?>" >
				    </div>
				  </div>

				  <div class="form-group row">
				    <div class="col-sm-10">
				      <button type="submit" name="ubah" class="btn btn-primary">Ubah</button>
				       <a href="<?= base_url('data_obat/index'); ?>" class="btn btn-success">Kembali</a>
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