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
	
	<table border="1">
		<tr>
			<td>Petugas</td>
			<td><?php echo $data_peminjaman['nama_petugas'];?></td>
		</tr>
		<tr>
			<td>Anggota</td>
			<td><?php echo $data_peminjaman['nama_anggota'];?></td>
		</tr>
		<tr>
			<td>Tgl Pinjam</td>
			<td><?php echo $data_peminjaman['tanggal_pinjam'];?></td>
		</tr>
		<tr>
			<td>Batas Kembali</td>
			<td><?php echo $data_peminjaman['tanggal_batas_kembali'];?></td>
		</tr>
	</table>
	<br />

	<form method="post" action="<?php echo site_url('peminjaman_buku/insert_barcode_submit/'.$peminjaman_id_url);?>">
		<table>
			<tr>
				<td>Barcode</td>
				<td>
					<input type="text" name="buku_barcode" value="" autofocus="">
				</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td><button type="submit" class="btn btn-primary">Simpan</button></td>
			</tr>
		</table>
	</form>
	<br />

	<a href="<?php echo site_url('peminjaman_buku/insert/'.$peminjaman_id_url);?>">
		Tambah Buku
	</a>
	<br />

	<table border="1">
		<thead>
			<tr>
				<th>No</th>
				<th>Judul Buku</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php $no=1;?>
			<?php foreach($data_peminjaman_buku as $peminjaman_buku):?>
			<tr>
				<td><?php echo $no++;?></td>
				<td><?php echo $peminjaman_buku['judul'];?></td>
				<td>
					<a href="<?php echo site_url('peminjaman_buku/delete/'.$peminjaman_id_url.'/'.$peminjaman_buku['id']);?>" onClick="return confirm('Anda yakin?')">
						Batal
					</a>
				</td>
			</tr>
			<?php endforeach?>		
		</tbody>
	</table>
</body>
</html>