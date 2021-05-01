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
	<a href="<?php echo site_url('petugas/insert');?>">
		Tambah
	</a>
	<br /><br />

	<table border="1">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php $no=1;?>
			<?php foreach($data_petugas as $petugas):?>
			<tr>
				<td><?php echo $no++;?></td>
				<td><?php echo $petugas['nama'];?></td>
				<td>
					<a href="<?php echo site_url('petugas/update/'.$petugas['id']);?>">
						Ubah
					</a>
					
					<a href="<?php echo site_url('petugas/delete/'.$petugas['id']);?>" onClick="return confirm('Anda yakin?')">
						Hapus
					</a>
				</td>
			</tr>
			<?php endforeach?>		
		</tbody>
	</table>
</body>
</html>