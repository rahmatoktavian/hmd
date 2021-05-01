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
	<form method="post" action="<?php echo site_url('peminjaman_buku/insert_submit/'.$peminjaman_id_url);?>">
		<table>
			<tr>
				<td>Buku</td>
				<td>
					<select name="buku_id" class="form-control">
						<?php foreach($data_buku as $buku):?>
						<option value="<?php echo $buku['id'];?>">
							<?php echo $buku['judul'];?>	
						</option>
						<?php endforeach;?>
					</select>
				</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td><button type="submit" class="btn btn-primary">Simpan</button></td>
			</tr>
		</table>
	</form>
</body>
</html>