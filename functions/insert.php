<?php
session_start();

if ( !isset($_SESSION['login']) ) {
	header('Location: ../login.php');
	exit;
} 

require "../functions.php";
	
	// check apakah tombol submit sudah ditekan atau belum
	if(isset($_POST["submit"])){ 
	
	
		// check apakah data berhasil ditambahkan atau tidak
		if ( insert($_POST) > 0 ) {
			echo "
				<script>
					alert('Insert data success!');
					document.location.href='../index.php';
				</script>
			";
		} else {
			echo "
				<script>
					alert('Insert data failed!');
				</script>
			";
			echo mysqli_error($conn);
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Insert</title>
	<link rel="icon" href="../assets/icons/library.png">
	<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
</head>
<body>
	<h1>Insert</h1>
    <form action="" method="post" enctype="multipart/form-data">
    	<fieldset style="width: 400px;">
    		<legend>Insert Form</legend>
	    	<table>
	    		<tr>
	    		    <td><label for="judul">Judul:&nbsp;</label></td>
	    		    <td><input size="40" type="text" name="judul" id="judul" required></td>
	    		</tr>
	    		<tr>
	    		    <td><label for="penulis">Penulis:&nbsp;</label></td>
	    		    <td><input size="35" type="text" name="penulis" id="penulis" required></td>
	    		</tr>
	    		<tr>
	    		    <td><label for="email">Email:&nbsp;</label></td>
	    		    <td><input size="35" type="email" name="email" id="email"></td>
	    		</tr>
	    		<tr>
	    		    <td><label for="harga">Harga:&nbsp;</label></td>
	    		    <td><input size="30" type="text" name="harga" id="harga" required></td>
	    		</tr>
	    		<tr>
	    		    <td><label for="penerbit">Penerbit:&nbsp;</label></td>
	    		    <td><input size="35" type="text" name="penerbit" id="penerbit" required></td>
	    		</tr>
	    		<tr>
	    		    <td><label for="gambar">Gambar:&nbsp;</label></td>
	    		    <td><input size="20" type="file" name="gambar" id="gambar"></td>
	    		</tr>
	    		<tr>
	    			<td><button type="submit" name="submit">Insert Data!</button></td>
	    		</tr>
	    	</table>	    	
		    <div align="right"><a href="../index.php">Home</a></div>
    	</fieldset>
    </form>
</body>
</html>
