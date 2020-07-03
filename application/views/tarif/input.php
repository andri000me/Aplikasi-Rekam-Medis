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
          	<?php if(validation_errors() ) : ?>
            	<div class="alert alert-danger" role="alert">
				  <?= validation_errors(); ?>
				</div>
			<?php endif; ?>
            <div class="box-body">
				<form action="" method="post">
				  <div class="form-group row">
				  	<?= $this->session->flashdata('message'); ?>
				    <label for="nama" class="col-sm-2 col-form-label">Nama Jasa</label>
				    <div class="col-sm-4">
				      <input type="text" class="form-control" id="nama_tarif" name="nama_tarif" placeholder="Masukan Nama Tarif" value="<?= set_value('nama_tarif') ?>" >
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="username" class="col-sm-2 col-form-label">Harga</label>
				    <div class="col-sm-4">
				      <input type="text" class="form-control" id="username" name="harga" placeholder="Masukan Tarif" value="<?= set_value('harga') ?>" >
				    </div>
				    </div>
				  <div class="form-group row">
				    <div class="col-sm-10">
				      <button type="submit" name="tambah" class="btn btn-primary">Simpan</button>
				       <a href="<?= base_url('tarif/index'); ?>" class="btn btn-success">Kembali</a>
				    </div>
				  </div>
				</form>

            	</div>
            	
            </div>
        </div>
    </div>