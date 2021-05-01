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
	<a href="<?php echo site_url('buku/insert');?>">
		<i class="fas fa-plus"></i> Tambah
	</a>
	<br /><br />

	<table border="1">
		<thead>
			<tr>
				<th>No</th>
				<th>Kategori</th>
				<th>Judul</th>
				<th>Stok</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php $no=1;?>
			<?php foreach($data_buku as $buku):?>
			<tr>
				<td><?php echo $no++;?></td>
				<td><?php echo $buku['nama_kategori'];?></td>
				<td><?php echo $buku['judul'];?></td>
				<td><?php echo $buku['stok'];?></td>
				<td>
					<a href="<?php echo site_url('buku/update/'.$buku['id']);?>">
						Ubah
					</a>
					<a href="<?php echo site_url('buku/delete/'.$buku['id']);?>" onClick="return confirm('Anda yakin?')">
						Hapus
					</a>
				</td>
			</tr>
			<?php endforeach?>		
		</tbody>
	</table>
</body>
</html>

