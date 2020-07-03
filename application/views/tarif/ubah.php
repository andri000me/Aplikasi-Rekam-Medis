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
          <!-- /.box -->
          <?php foreach ($tarif as $d) { ?>
				<form action="<?= base_url('tarif/update');?>" method="post">
				  <div class="form-group row">
				  	<input type="hidden" name="id_tarif" value="<?= $d->id_tarif?>">
				    <label for="nama" class="col-sm-2 col-form-label">Nama Jasa</label>
				    <div class="col-sm-4">
				      <input type="text" class="form-control" id="nama" name="nama_tarif" value="<?= $d->nama_tarif?>">
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="username" class="col-sm-2 col-form-label">Harga</label>
				    <div class="col-sm-4">
				      <input type="text" class="form-control" id="username" name="harga" value="<?= $d->harga?>">
				    </div>
				</div>
				<?php } ?>
				  <div class="form-group row">
				    <div class="col-sm-10">
				      <button type="submit" name="ubah" class="btn btn-primary">Ubah</button>
				       <a href="<?= base_url('tarif/index'); ?>" class="btn btn-success">Kembali</a>
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