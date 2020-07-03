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
  <!-- Profile Image -->
           <?php echo form_open_multipart('data_admin/edit_profil');?>
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="<?= base_url('assets/img/profile/').$admin['gambar'] ?>" alt="User profile picture">

              <h3 class="profile-username text-center"><?= $admin['nama'];?></h3>


              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                <div class="form-group row">
				    <label for="nama" class="col-sm-2 col-form-label">Nama </label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="nama" name="nama" value="<?= $admin['nama']?>">
				    </div>
				</div>
                </li>
                <li class="list-group-item">
                  <div class="form-group row">
				    <label for="username" class="col-sm-2 col-form-label">Username</label>
				    <div class="col-sm-4">
				      <input type="text" class="form-control" id="username" name="username" value="<?= $admin['username']?>" readonly>
				    </div>
				    <label for="username" class="col-sm-2 col-form-label">Gambar</label>
				    <div class="col-sm-4">
            <input type="file" id="gambar" name="gambar">
				    </div>
				  </div>
                </li>
              </ul>
          <button class="btn btn-primary btn-block" type="submit">Edit</button>
          </form>

              
            </div>
            <!-- /.box-body -->
          </div>