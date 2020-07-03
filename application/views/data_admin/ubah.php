
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
            <?php foreach ($admin as $u) { ?>        	 
				<form action="<?= base_url('data_admin/update'); ?>" method="post">
				  <div class="form-group row">
	  		  	<input type="hidden" name="id_admin" value="<?= $u->id_admin?>"> 
				    <label for="nama" class="col-sm-2 col-form-label">Nama </label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="nama" name="nama" value="<?= $u->nama?>">
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="username" class="col-sm-2 col-form-label">Username</label>
				    <div class="col-sm-4">
				      <input type="text" class="form-control" id="username" name="username" value="<?= $u->username?>">
				    </div>
				   <label class="col-form-label col-sm-2 pt-0">Status Akun</label>
				      <div class="col-sm-4">
				    	<div class="custom-control custom-radio custom-control-inline">
						  <input type="radio" id="1" name="aktif" class="minimal" value="1"
						  <?php if($u->aktif == '1'){echo 'checked';} ?>/>
						   <label class="custom-control-label" for="1">Aktif</label>
						</div>
						<div class="custom-control custom-radio custom-control-inline">
						  <input type="radio" id="2" name="aktif" class="minimal" value="0"
						   <?php if($u->aktif == '0'){echo 'checked';} ?>/>
						   <label class="custom-control-label" for="0">Tidak Aktif</label>
				  </div><?php } ?>
				</div>
			</div>
				  

				  <div class="form-group row">
				    <div class="col-sm-10">
				      <button type="submit" name="ubah" class="btn btn-primary">Ubah</button>
				       <a href="<?= base_url('data_admin/index'); ?>" class="btn btn-success">Kembali</a>
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