
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
				    <label for="nama" class="col-sm-2 col-form-label">Nama </label>
				    <div class="col-sm-4">
				      <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama " value="<?= set_value('nama') ?>">
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="username" class="col-sm-2 col-form-label">Username</label>
				    <div class="col-sm-4">
				      <input type="text" class="form-control" id="username" name="username" placeholder="Masukan Username" value="<?= set_value('username') ?>">
				    </div>
				    </div>
				  <div class="form-group row">
				    <label for="password1" class="col-sm-2 col-form-label">Password</label>
				    <div class="col-sm-4">
				      <input type="password" class="form-control" id="password1" name="password1" placeholder="Masukan Password" value="<?= set_value('password1') ?>">
				    </div>
				</div>
				   <div class="form-group row">
				    <label for="password2" class="col-sm-2 col-form-label">Konfirmasi Password</label>
				    <div class="col-sm-4">
				      <input type="password" class="form-control" id="password2" name="password2" placeholder="Masukan Password" value="<?= set_value('password2') ?>">
				    </div>
				  </div>
				  <div class="form-group row">
				    <div class="col-sm-10">
				      <button type="submit" name="tambah" class="btn btn-primary">Simpan</button>
				       <a href="<?= base_url('data_admin/index'); ?>" class="btn btn-success">Kembali</a>
				    </div>
				  </div>
				</form>

            	</div>
            	
            </div>
        </div>
    </div>