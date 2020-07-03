<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Cetak PDF</title>

  <style>
    .tabel { border-collapse: collapse;
              margin: auto; }
    .tabel th {
        padding: 8px 5px;
        background-color: #b2bec3;
        color: #000;
        font-size: 11px;
    }
  </style>

</head>
<body>
  <div style="padding: 4mm; border: 1px solid;" align="center">
    <h2>DATA KARYAWAN DPP DR. CECEP ISMAWAN</h2>
  </div>
  <br>
  <?php echo anchor('data_karyawan/cetak1/','<input type=button  value=\'Cetak Data\'>'); ?>
  <?php echo anchor('data_karyawan','<input type=button value=\'Kembali\'>'); ?> 
  <br>
  <br>
  <table border="1px" class="tabel">
    <tr>
                      <th>No.</th>
                      <th>NIP</th>
                      <th>Nama Karyawan</th>
                      <th>Jenis Kelamin</th>
                      <th>Jabatan</th>
                      <th>Alamat</th>
                      <th>Role ID</th>
                      
    </tr>

    <?php
    if( !empty($karyawan) ){
     $no = 1;
     foreach ($karyawan as $k) {
      ?>
      <tr>
                      <td><?= $no ++ ?></td>
                      <td><?= $k->nip ?></td>
                      <td><?= $k->nama_karyawan ?></td>
                      <td><?= $k->jk ?></td>
                      <td><?= $k->jabatan ?></td>
                      <td><?= $k->alamat ?></td>
                      <td><?= $k->role_id ?></td>
      </tr>
      <?php } ?>
    <?php } ?>
    
  </table>
</body>
</html>