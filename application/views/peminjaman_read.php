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
	<a href="<?php echo site_url('peminjaman/insert');?>">
		Tambah
	</a>
	<br /><br />

	<table border="1">
		<thead>
			<tr>
				<th>No</th>
				<th>Petugas</th>
				<th>Anggota</th>
				<th>Tgl Pinjam</th>
				<th>Batas Kembali</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php $no=1;?>
			<?php foreach($data_peminjaman as $peminjaman):?>
			<tr>
				<td><?php echo $no++;?></td>
				<td><?php echo $peminjaman['nama_petugas'];?></td>
				<td><?php echo $peminjaman['nama_anggota'];?></td>
				<td><?php echo $peminjaman['tanggal_pinjam'];?></td>
				<td><?php echo $peminjaman['tanggal_batas_kembali'];?></td>
				<td>
					<a href="<?php echo site_url('peminjaman_buku/read/'.$peminjaman['id']);?>">
						Buku
					</a>

					<a href="<?php echo site_url('peminjaman/update/'.$peminjaman['id']);?>">
						Ubah
					</a>
					
					<a href="<?php echo site_url('peminjaman/delete/'.$peminjaman['id']);?>" onClick="return confirm('Anda yakin?')">
						Hapus
					</a>
				</td>
			</tr>
			<?php endforeach?>		
		</tbody>
	</table>
</body>
</html>