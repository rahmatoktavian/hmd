<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Perpustakaan - <?php echo $judul;?></title>
</head>
<body>
	<form method="post" action="<?php echo site_url('petugas/insert_submit/');?>">
		<table>
			<tr>
				<td>Nama</td>
				<td><input type="text" name="nama" value="" required=""></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td><button type="submit">Simpan</button></td>
			</tr>
		</table>
	</form>
</body>
</html>