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

	<form method="post" action="<?php echo site_url('peminjaman_buku_multi/insert_submit/'.$peminjaman_id_url);?>">
	<table border="1">
		<thead>
			<tr>
				<th>No</th>
				<th>Judul Buku</th>
				<th>Dipinjam</th>
			</tr>
		</thead>
		<tbody>
			<?php $no=1;?>
			<?php foreach($data_buku as $buku):?>
			<tr>
				<td><?php echo $no++;?></td>
				<td><?php echo $buku['judul'];?></td>
				<td>
					<?php if(!empty($list_peminjaman_buku_id[$buku['id']])):?>
						<input type="checkbox" name="list_buku_id[<?php echo $buku['id'];?>]" value="1" checked />
					<?php else:?>
						<input type="checkbox" name="list_buku_id[<?php echo $buku['id'];?>]" value="1" />
					<?php endif;?>
				</td>
			</tr>
			<?php endforeach?>		
		</tbody>
		<tfoot>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td><button type="submit" class="btn btn-primary">Simpan</button></td>
			</tr>
		</tfoot>
	</table>
	</form>

</body>
</html>