<!DOCTYPE html>
<html lang="en">
 <head>
    <title>Cetak Resep OBat</title>
</head>
<style>
  .tbl{
    border:1px solid #000000;
    border-radius: 3px;
    padding : 10px 10px 10px 10px;
  }
</style>
<body  style="font-family:Times New Roman;font-size:12px">

<center><h1></h1></center>
<table  id="example1" class="tbl">
<tr align="center" border="1">
	<td colspan="3">
		<center>
			<h3>Resep Obat</h3>
			<h5><i>dr. Cecep Ismawan</i></h5>
		</center>
		<hr>
	</td>
</tr>

<tr>
	<td>Kode Resep
		<hr>
	</td>
	<td>:<hr></td>
	<td><?php echo $kd_resep['kd_resep'] ?><hr></td>     
</tr>

<tr>
	<td><strong>Nama Obat</strong><hr></td>
	<td>|<hr></td>
	<td><strong>Aturan Pakai</strong><hr></td>
	
</tr>
<?php foreach($resep->result() as $row){ ?>
<tr>
	<td><?php echo $row->nama_obat ?></td>
	<td>:</td>
	<td><?php echo $row->aturan_pakai ?></td>
</tr>	
	
<?php } ?>
</table>
</body>
</html>