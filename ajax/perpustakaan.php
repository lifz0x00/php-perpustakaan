<?php 
sleep(1);
require '../functions.php';
$keyword = $_GET['keyword'];
$sql =  "SELECT * FROM buku WHERE
		penulis LIKE '%$keyword%' OR
		penerbit LIKE '%$keyword%' OR
		email LIKE '%$keyword%'		
		";
$perpustakaan = query($sql);

?>
<table border="1" cellpadding="5" cellspacing="0">
	<tr>
		<th>No.</th>
		<th>Gambar</th>
		<th>Judul</th>
		<th>Penulis</th>
		<th>Email</th>
		<th>Harga</th>
		<th>Penerbit</th>			
		<th>Aksi</th>
	</tr>
	<? $i = 1; ?>
	<?php foreach( $perpustakaan as $row) : ?>
	<tr>
		<td><?= $i; ?></td>
		<td><img  align="center" width="60px" src="assets/img/<?= $row["gambar"]; ?>"></td>
		<td><?= $row["judul"]; ?></td>
		<td><?= $row["penulis"]; ?></td>
		<td><?= $row["email"]; ?></td>
		<td><?= $row["harga"]; ?></td>
		<td><?= $row["penerbit"]; ?></td>
		<td>
			<a href="functions/update.php?id=<?= $row["id"]; ?>">Update</a>
			<a href="functions/delete.php?id=<?= $row["id"]; ?>" onclick="return confirm('Do you want to delete this book?');">Delete</a> 
		</td>
	</tr>
	<?php $i++; ?>
	<?php endforeach; ?>
</table>