<a href="<?php echo site_url('buku/insert');?>" class="btn btn-primary">
	<i class="fas fa-plus"></i> Tambah
</a>
<br /><br />

<table class="table table-striped" id="datatable">
	<thead class="thead-dark">
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
				<a href="<?php echo site_url('buku/update/'.$buku['id']);?>" class="btn btn-primary">
					<i class="fa fa-edit"></i> Ubah
				</a>
				<a href="<?php echo site_url('buku/delete/'.$buku['id']);?>" class="btn btn-danger" onClick="return confirm('Anda yakin?')">
					Hapus
				</a>
			</td>
		</tr>
		<?php endforeach?>		
	</tbody>
</table>