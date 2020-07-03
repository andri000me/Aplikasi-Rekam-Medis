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
                
               <!--  <link rel="stylesheet" href="<?php echo base_url('assets/vendor/jquery/jquery-ui.min.css'); ?>" />
                <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>  --><!-- Load file jquery -->
                <!-- <form method="get" action="" class="form">
                  <div class="form-group">
                    <label>Filter Berdasarkan</label>
                    <select class="form-control" name="filter" id="filter" style="width: 50%">
                      <option value="">Pilih</option> -->
                     <!--  <option value="1">Per Tanggal</option> -->
                      <!-- <option value="1">Per Pasien</option>                    

                    </select>
                  </div> -->

                  <!-- <div class="form-group" id="form-tanggal">
                    <label>Dari Tanggal</label>
                    <input type="date" name="tanggal" class="form-control input-tanggal" style="width: 50%"/>
                  </div>

                  <div class="form-group" id="form-tanggal2">
                    <label>Sampai Tanggal</label>
                    <input type="date" name="tanggal2" class="form-control input-tanggal2" style="width: 50%"/>
                  </div>
 -->
                  <!-- <div class="form-group" id="form-kd_rm">
                    <label>Pasien</label>
                    <select name="kd_rm" class="form-control" style="width: 50%">
                      <option value="">Pilih</option>
                   -->    <!-- <?php
                        foreach($kd_rm as $data){ // Ambil data tahun dari model yang dikirim dari controller
                          echo '<option value="'.$data->kd_rm.'">'.$data->kd_rm.' | '.$data->nama_pasien.'</option>';
                        }
                      ?> -->
                    <!-- </select>
                  </div>
 -->
                                  
<!-- 
                  <button class="btn btn-primary" type="submit">Tampilkan</button>
                    <a href="<?php echo base_url()."data_pasien/laporan"; ?>" class="btn btn-warning">Reset Filter</a>
                </form>
 -->
            <h3 class="m-0 font-weight-bold text-primary"><?php echo $ket; ?></h3>
                <a target="_blank" href="<?php echo $url_cetak; ?>" class="btn btn-default"><i class="fa fa-print"></i> CETAK PDF</a>

              <table id="example2" class="table table-bordered table-striped ">
              <thead style="text-align: center">
                <tr>
                    <th >NO</th>
                    <th >Kode RM</th>
                    <th >Nama Pasien</th>
                    <th >Jenis Kelamin</th>
                    <th >Tempat Lahir</th>
                    <th >Tanggal Lahir</th>
                    <th >Alamat</th>
                    <!-- style="width: 27%;" -->
                </tr>
              </thead>
              <tbody>
              <?php
                if( ! empty($pasien)){
                  $no = 1;
                  foreach($pasien as $data){
                ?>    
                  <tr>
                    <td style="text-align: center;"><?php echo $no++ ?></td>
                   
                    <td><?php echo $data['kd_rm'] ?></td>
                    <td><?php echo $data['nama_pasien'] ?></td>
                    <td><?php echo $data['jenkel']?></td> 
                    <td><?php echo $data['tempat_lahir'] ?></td>
                    <td><?php echo date('d-m-Y', strtotime($data['tanggal_lahir'])); ?></td>
                    <td><?php echo $data['alamat'] ?></td>
                    
                  </tr>
                <?php }
                }
                ?>
              </tbody>
                
                <script src="<?php echo base_url('assets/vendor/jquery/jquery-ui.min.js'); ?>"></script> <!-- Load file plugin js jquery-ui -->
                <script>
                $(document).ready(function(){ // Ketika halaman selesai di load

                    $('#form-tanggal, #form-tanggal2, #form-kd_rm, #form-kd_pasien').hide(); // Sebagai default kita sembunyikan form filter tanggal, bulan & tahunnya

                    $('#filter').change(function(){ // Ketika user memilih filter
                      if($(this).val() == '1'){ // Jika filter nya 2 (per bulan)
                            $('#form-tanggal, #form-tanggal2, #form-kd_pasien, #form-bulan').hide();
                            $('#form-kd_rm').show(); // Tampilkan form bulan dan tahun
                        // }else if($(this).val() == '3'){ // Jika filter nya 2 (per bulan)
                        //     $('#form-tanggal, #form-tanggal2, ##form-kd_rm').hide();
                        //     $('#form-kelas, #form-tahun').show(); // Tampilkan form bulan dan tahun
                        }else{ // Jika filternya 3 (per tahun)
                            $('#form-tanggal, #form-tanggal2, #form-nis, #form-kelas, #form-tahun').hide();
                        }

                        $('#form-tanggal input, #form-bulan select, #form-tahun select').val(''); // Clear data pada textbox tanggal, combobox bulan & tahun
                    })
                       // if($(this).val() == '1'){ // Jika filter nya 1 (per tanggal)
                       //      $('#form-tanggal2, #form-kd_rm, #form-kd_pasien').hide();
                       //      $('#form-tanggal').show(); // Tampilkan form tanggal
                       //      $('#form-tanggal2').show(); // Tampilkan form tanggal
                       //  }
                })
                </script>
            </table>
          </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->