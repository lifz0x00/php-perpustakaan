<?php
session_start();

if ( !isset($_SESSION['login']) ) {
	header('Location: ../login.php');
	exit;
}
 
require "../functions.php";

// ambil data di url
$id = $_GET["id"];
// query data buku berdasarkan id
$book = query("SELECT * FROM buku WHERE id = $id")[0];

	// check apakah tombol submit sudah ditekan atau belum
	if(isset($_POST["submit"])){ 

		// check apakah data berhasil diubah atau tidak
		if ( update($_POST) > 0 ) {
			echo "
				<script>
					alert('Update data success!');
					document.location.href='../index.php';
				</script>
			";
		} else {
			echo "
				<script>
					alert('Update data failed!');
				</script>
			";
			echo mysqli_error($conn);
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Update</title>
	<link rel="icon" href="assets/icons/library.png">
	<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
</head>
<body>
	<h1>Update</h1>
    <form action="" method="post" enctype="multipart/form-data">
    	<input type="hidden" name="id" value="<?= $book["id"]; ?>">
    	<input type="hidden" name="oldFileImages" value="<?= $book["gambar"]; ?>">
    	<fieldset style="width: 400px;">
    		<legend>Update Form</legend>
    		<div align="right">
    			<a href="../index.php">Home</a>
    		</div>
	    	<table>
	    		<tr>
	    		    <td><label for="judul">Judul:&nbsp;</label></td>
	    		    <td><input size="40" type="text" name="judul" id="judul" required value="<?= $book["judul"]; ?>"></td>
	    		</tr>
	    		<tr>
	    		    <td><label for="penulis">Penulis:&nbsp;</label></td>
	    		    <td><input size="35" type="text" name="penulis" id="penulis" required value="<?= $book["penulis"]; ?>"></td>
	    		</tr>
	    		<tr>
	    		    <td><label for="email">Email:&nbsp;</label></td>
	    		    <td><input size="35" type="email" name="email" id="email" value="<?= $book["email"]; ?>"></td>
	    		</tr>
	    		<tr>
	    		    <td><label for="harga">Harga:&nbsp;</label></td>
	    		    <td><input size="30" type="text" name="harga" id="harga" required value="<?= $book["harga"]; ?>"></td>
	    		</tr>
	    		<tr>
	    		    <td><label for="penerbit">Penerbit:&nbsp;</label></td>
	    		    <td><input size="35" type="text" name="penerbit" id="penerbit" required value="<?= $book["penerbit"]; ?>"></td>
	    		</tr>
	    		<tr>
	    		    <td><label for="gambar">Gambar:&nbsp;</label></td>
	    		    <td><img width="50" src="../assets/img/<?= $book["gambar"]; ?>"></td>
	    		</tr>
	    	</table>
		    <tr>
		    <input size="20" type="file" name="gambar" id="gambar"><br><br>

		    <div align="right">
	    		<button type="submit" name="submit">Update Data!</button>
	    	</div>
    	</fieldset>
    	
    </form>
</body>
</html>
