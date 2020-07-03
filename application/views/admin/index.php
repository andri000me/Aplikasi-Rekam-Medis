<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?= $judul; ?>
      </h1>
      <h1 class="h3 mb-4 text-gray-800">Selamat Datang <span><?= $admin['nama']; ?></span> </h1> 
    </section>
        
 

     
              
      <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?= $jumlahpasien; ?></h3>

              <p>Data (Pasien)</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="<?= base_url('data_pasien'); ?>" class="small-box-footer">Lihat Data Pasien <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?= $jumlahrm; ?></h3>

              <p>Rekam Medis (RM)</p>
            </div>
            <div class="icon">
              <i class="fa fa-file-text"></i>
            </div>
            <?php if ($_SESSION["status"]=="dokter"){ ?>
            <a href="<?= base_url('pemeriksaan'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a><?php } ?>
          </div>
        </div>
           
      </div>
    </section>

      	

           

              
      	
      </div>

      
     

  </div>
