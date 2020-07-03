<!DOCTYPE html>
<html lang="en">
 <head>
    <title>Cetak Nota Pembayaran</title>
</head>
<style>
  .tbl{
    border:1px solid #000000;
    border-radius: 3px;
    height: 800px;
    width: 700px
  }
</style>
<body  style="font-family:Times New Roman;font-size:30px">

<center><h1></h1></center>
<table  id="example1" class="tbl">
<tr align="center" border="1">
	<td colspan="3">
			<h1>Nota Pembayaran</h1>
			<h3><i>dr. Cecep Ismawan</i></h3>
		<hr>
	</td>
</tr>

<tr>
	<td>Kode Bayar
		<hr>
	</td>
	<td>:<hr></td>
	<td><?php echo $kd_bayar['kd_bayar'] ?>
		<hr>
	</td>     
</tr>

<tr>
	<td><strong>Nama Layanan</strong><hr></td>
	<td>|<hr></td>
	<td><strong>Biaya</strong><hr></td>
</tr>
<?php foreach($bayar->result() as $row){ ?>
<tr>
	<td><?php echo $row->nama_tarif ?></td>
	<td>:</td>
	<td><?= "Rp. ".number_format($row->total ,0,',','.') ?></td>
<?php } ?>
</tr>	
	

<tr><?php foreach($obat->result() as $row){ ?>
	<td>Biaya Obat</td>
	<td>:</td>
	<td><?php echo "Rp. ".number_format($row->subtotal ,0,',','.') ?></td>     
</tr>
<tr>
	<td><hr>Total Bayar <hr></td>
	<td><hr>: <hr></td>
	<td><hr><b><?php echo "Rp. ".number_format($row->totalbayar ,0,',','.') ?></b> <hr></td>     
</tr>
<tr>
	
	<td></td>   
	<td></td> 
	<td>Tanda Tangan</td> 
</tr>
<tr>
	<td></td>
	<td></td>

<td>
	<br>
	<br>
	<br>
	<br>
	<?php echo $row->nama ?></td>    



</tr>
<?php } ?>
</table>
</body>
</html>