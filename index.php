<?php
session_start();

if (!isset($_SESSION['login']) ) {
	header('Location: login.php');
	exit;
} 

require "functions.php";
$perpustakaan = query("SELECT * FROM buku");

// jika tombol cari ditekan
if(isset($_POST["search"])) {
	$perpustakaan = search($_POST["keyword"]);
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Page</title>
	<style type="text/css">
		.loader {
		  width: 150px;
		  position: absolute;
		  top: 70px;
		  left: 225px;
		  z-index: 1;
		  display: none;
		}

		@media print {
			.logout {
				display: none;
			}
		}
	</style>
	<link rel="icon" href="assets/icons/library.png">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<script src="js/jquery-3.4.1.min.js"></script>
</head>
<body>
	<center>
		<h1>Book List</h1>

			<div align="left">
				<h4><a href="functions/insert.php">Insert a new book!</a></h4>
				<form action="" method="post">
					<input size="30" type="text" placeholder="Book?" autocomplete="off" name="keyword" id="keyword" autofocus>
					<button type="submit" name="search"id="search-button">Search!</button>
					<img src="assets/img/loader.gif" class="loader">
				</form>
			</div><br>

			<div align="right">
				<a href="logout.php" class="logout">Logout</a>
			</div><br>

			<div id="container">
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
			</div>

		</center>
<script src="js/script.js"></script>
</body>
</html>