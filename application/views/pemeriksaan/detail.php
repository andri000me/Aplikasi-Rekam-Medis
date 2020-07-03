        <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?= $desc; ?>
      </h1>
    </section>
        <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
              <div class="box-body">
   
                <?php foreach ($pasien as $u) { ?>

                  <div class="form-group row">
                 <label for="tanggal" class="col-sm-2 col-form-label">Kode RM </label>
                  <div class="col-sm-4">
                   <input type="text" class="form-control" id="tanggal" name="tanggal" value="<?php echo $u->kd_rm ?>" readonly>
                   </div>
                 <label for="tanggal" class="col-sm-2 col-form-label">Nama Lengkap </label>
                  <div class="col-sm-4">
                   <input type="text" class="form-control" id="tanggal" name="tanggal" value="<?php echo $u->nama_pasien ?>" readonly>
                   </div>
                 </div>
                 <div class="form-group row">
                 <label for="tanggal" class="col-sm-2 col-form-label">Jenis Kelamin </label>
                  <div class="col-sm-4">
                   <input type="text" class="form-control" id="tanggal" name="tanggal" value="<?php echo $u->jenkel ?>" readonly>
                   </div>
                 <label for="tanggal" class="col-sm-2 col-form-label">Tempat Tanggal Lahir </label>
                  <div class="col-sm-4">
                   <input type="text" class="form-control" id="tanggal" name="tanggal" value="<?php echo $u->tempat_lahir.', '.date('d F Y', strtotime($u->tanggal_lahir)); ?>" readonly>
                   </div>
                 </div>
                  <div class="form-group row">
                 <label for="tanggal" class="col-sm-2 col-form-label">Alamat </label>
                  <div class="col-sm-4">
                   <input type="text" class="form-control" id="tanggal" name="tanggal" value="<?php echo $u->alamat ?>" readonly>
                   </div>
                 <label for="tanggal" class="col-sm-2 col-form-label">No. HP </label>
                  <div class="col-sm-4">
                   <input type="text" class="form-control" id="tanggal" name="tanggal" value="<?php echo $u->telp ?>" readonly>
                   </div>
                 </div>
                <?php }?>

              
         
      
        <!-- /.container-fluid -->
      </form>
    
 

</div>