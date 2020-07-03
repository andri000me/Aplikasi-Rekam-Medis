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
			<?= $this->session->flashdata('message'); ?>
            </div>
			<div class="box-body">
				<form action="" method="post">
				  <div class="form-group row">
				    <label for="nama" class="col-sm-2 col-form-label">Nama Obat</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="nama" name="nama_obat" placeholder="Masukan Nama Obat" value="<?= set_value('nama_obat') ?>">
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="harga" class="col-sm-2 col-form-label">Harga</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="harga" name="harga" placeholder="Masukan Harga" value="<?= set_value('harga') ?>">
				    </div>
				  </div>
				  
				  <div class="form-group row">
				    <div class="col-sm-10">
				      <button type="submit" name="tambah" class="btn btn-primary">Simpan</button>
				       <a href="<?= base_url('data_obat/index'); ?>" class="btn btn-success">Kembali</a>
				    </div>
				  </div>
				</form>

            	</div>
            	
            </div>
        </div>
    </div>