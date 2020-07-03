        <div class="container-fluid">
        <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800"><?= $desc; ?></h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            
            <div class="card-body">
              <div class="container">
                <?php foreach ($pasien as $u) { ?>

                  <div class="row" style="height: 35px">
                    <div class="col-4"><b>Kode RM</b></div>
                    <div class="col-8"> <?php echo $u->kd_rm ?></div>
                  </div>

                  <div class="row" style="height: 35px">
                    <div class="col-4"><b>Nama Lengkap</b></div>
                    <div class="col-8"> <?php echo $u->nama_pasien ?></div>
                  </div>

                  <div class="row" style="height: 35px">
                    <div class="col-4"><b>Jenis Kelamin</b></div>
                    <div class="col-8"> <?php echo $u->jenkel ?></div>
                  </div>

                  <div class="row" style="height: 35px">
                    <div class="col-4"><b>Tempat Tanggal Lahir</b></div>
                    <div class="col-8"> <?php echo $u->tempat_lahir.', '.date('d F Y', strtotime($u->tanggal_lahir)); ?></div>
                  </div>

                  <div class="row" style="height: 35px">
                    <div class="col-4"><b>Alamat</b></div>
                    <div class="col-8"> <?php echo $u->alamat ?></div>
                  </div>

                
                  <div class="row" style="height: 35px">
                    <div class="col-4"><b>No. HP</b></div>
                    <div class="col-8"> <?php echo $u->telp ?></div>
                  </div>

                <?php }?>

              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->