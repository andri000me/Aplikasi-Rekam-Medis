
           
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?= $title; ?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-pencil-square-o fa-fw"></i> Input kelas
                        </div>



          
              <form  method="post" action="<?= base_url('input/reg_kelas'); ?>" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>ID Kelas</label>
                                            <input type="text" name="idkelas" value="<?= $kodeunik; ?>" class="form-control form-control-user" readonly>
                                            
                                        </div>
                                        <div class="form-group">
                                            <label>Nama kelas</label>
                                            <input type="text" class="form-control form-control-user" id="nama_kelas" name="nama_kelas" placeholder="Masukan nama_kelas" value="<?= set_value('nama_kelas'); ?>">
                                            <?= form_error('nama_kelas','<small class="text-danger pl-3">','</small>'); ?>
                                            
                                        </div>
                                        
                                        
                                        <hr>
                                        <button type="submit" class="btn btn-default">Simpan</button>
                                        <button type="reset" class="btn btn-default">Bersihkan</button>
                                    </form> 
            </div>
          </div>
        </div>
      </div>
    