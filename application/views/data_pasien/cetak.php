<!DOCTYPE html>
<html lang="en">
 <head>
    <title>Cetak Kartu Pasien</title>
</head>
<style>
  .tbl{
    border:1px solid #000000;
    border-radius: 3px;
    padding : 10px 10px 10px 10px;
  }
</style>
<body  style="font-family:Times New Roman;font-size:12px">
<?php foreach($pasien->result() as $row){ ?>
<center><h1></h1></center>
<table  id="example1" class="tbl">
<tr align="center" border="1">
	<td colspan="3">
			<h3><i>	dr. Cecep Ismawan</i></h3>
			<h4>Kartu Berobat Pasien</h4>
			<hr>	
	</td>
</tr>	
<tr>
	<td>Kode RM </td>
	<td>:</td>
	<td><?php echo $row->kd_rm ?></td>                       
</tr>
<tr>
	<td>Pengobatan</td>
	<td>:</td>
	<td><?php echo $row->pengobatan ?></td>
</tr>
<tr>
	<td>Nama</td>
	<td>:</td>
	<td><?php echo $row->nama_pasien ?></td>
</tr>
<tr>
	<td>Jenis Kelamin</td>
	<td>:</td>
	<td><?php echo $row->jenkel ?></td>
</tr>	
<tr>
	<td>Alamat</td>
	<td>:</td>
	<td><?php echo $row->alamat ?></td>
</tr>
	
<?php } ?>
</table>
</body>
</html>