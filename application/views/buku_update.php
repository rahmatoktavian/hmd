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
	<form method="post" action="<?php echo site_url('buku/update_submit/'.$data_buku_single['id']);?>" enctype="multipart/form-data">
		<table class="table table-striped">
			<tr>
				<td>Kategori</td>
				<td>
					<select name="kategori_id" class="form-control">
						<?php foreach($data_kategori as $kategori):?>

						<?php if($kategori['id'] == $data_buku_single['kategori_id']):?>
						<option value="<?php echo $kategori['id'];?>" selected>
							<?php echo $kategori['nama'];?>	
						</option>
						<?php else:?>
						<option value="<?php echo $kategori['id'];?>">
							<?php echo $kategori['nama'];?>	
						</option>
						<?php endif;?>
						
						<?php endforeach;?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Judul</td>
				<td><input type="text" name="judul" value="<?php echo $data_buku_single['judul'];?>" required=""></td>
			</tr>
			<tr>
				<td>Stok</td>
				<td><input type="number" name="stok" value="<?php echo $data_buku_single['stok'];?>" required=""></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td><button type="submit" class="btn btn-primary">Simpan</button></td>
			</tr>
		</table>
	</form>
</body>
</html>