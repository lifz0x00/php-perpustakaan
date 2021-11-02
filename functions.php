<?php
	$conn = mysqli_connect("localhost", "root", "", "perpustakaan");

	function query( $sql ) {
		global $conn;
		$result = mysqli_query($conn, $sql);
		$rows = [];
		while ($row = mysqli_fetch_assoc($result)){
			$rows[] = $row;
		}
		return $rows;
	}

	function insert( $data ) {
		global $conn;

		$judul = htmlspecialchars($data["judul"]);
		$penulis = htmlspecialchars($data["penulis"]);
		$email = htmlspecialchars($data["email"]);
		$harga = htmlspecialchars($data["harga"]);
		$penerbit = htmlspecialchars($data["penerbit"]);

		// upload gambar
		$gambar = upload();
		if (!$gambar) {
			return false;
		} 

		$sql = "INSERT INTO buku (judul, penulis, email, harga, penerbit, gambar) 
				VALUES ('$judul', '$penulis', '$email', '$harga', '$penerbit', '$gambar')";
		mysqli_query($conn,$sql);

		return mysqli_affected_rows($conn);
	}

	function upload() {
		$fileName = $_FILES['gambar']['name'];
		$fileSize = $_FILES['gambar']['size'];
		$error = $_FILES['gambar']['error'];
		$tmpName = $_FILES['gambar']['tmp_name'];

		// check apakah tidak ada gambar yang diupload
		// 4, tidak ada gambar yang diupload
		if ( $error === 4 ) {
			echo "<script>
					alert('Please upload your image!'); 
				</script>";
			return false;
		}

		// check yang diupload adalah gambar
		$validImageExtensions = ['jpg','jpeg','png'];
		$imageExtensions = explode('.', $fileName);
		$imageExtensions = strtolower(end($imageExtensions));

		// jika tidak ada ekstensi gambar di array $validImageExtensions
		if ( !in_array($imageExtensions, $validImageExtensions) ) {
			echo "<script>
					alert('Your uploaded is not image!'); 
				</script>";
			return false;
		}

		// check ukuran gambar, tidak boleh terlalu besar, size dalam byte, 1jt bytes = 1mb
		if ( $fileSize > 1000000) {
			echo "<script>
					alert('Image size too large!'); 
				</script>";
			return false;
		}

		// lolos pengecekan . gambar siap diupload
		$newFileName = uniqid();
		$newFileName .= '.';
		$newFileName .= $imageExtensions;

		move_uploaded_file($tmpName, '../../assets/img/' . $newFileName);

		return $newFileName;
	}
 
	function update( $data ) {
		global $conn;
		
		$id = $data["id"];
		$judul = htmlspecialchars($data["judul"]);
		$penulis = htmlspecialchars($data["penulis"]);
		$email = htmlspecialchars($data["email"]);
		$harga = htmlspecialchars($data["harga"]);
		$penerbit = htmlspecialchars($data["penerbit"]);

		$oldFileImages = htmlspecialchars($data["oldFileImages"]);

		// check apakah user pilih gambar baru atau tidak
		if ( $_FILES['gambar']['error'] === 4  ) {
			$gambar = $oldFileImages;
		} else {
			$gambar = upload();
		}

		$sql = "UPDATE buku SET
					judul = '$judul',
					penulis = '$penulis',
					email = '$email',
					harga = '$harga',
					penerbit = '$penerbit',
					gambar = '$gambar'
				WHERE id = $id
				";
		mysqli_query($conn,$sql);

		return mysqli_affected_rows($conn);
	}

	function delete( $id ) {
		global $conn;
		
		$sql = "DELETE FROM buku WHERE id = $id";
		mysqli_query($conn,$sql);

		return mysqli_affected_rows($conn);
	}

	function search($keyword){
		$sql = "SELECT * FROM buku WHERE
				penulis LIKE '%$keyword%' OR
				penerbit LIKE '%$keyword%' OR
				email LIKE '%$keyword%'		
		";

		return query($sql);
	}

	function registration($data) {
		global $conn;

		$username = strtolower(stripslashes($data['username']));
		$password = mysqli_real_escape_string($conn, $data['password']);
		$passwordConfirmation = mysqli_real_escape_string($conn, $data['passwordConfirmation']);

		// check username sudah ada atau belum
		$sqlCheckUsername = "SELECT username FROM users WHERE username = '$username'";
		$result = mysqli_query($conn, $sqlCheckUsername);

		if ( mysqli_fetch_assoc($result) ) {
			echo "<script>
				alert('Error! Username already registered!');
			</script>
			";
			return false;
		}

		// check confirmation password
		if ($password !== $passwordConfirmation) {
			echo "<script>
					alert('Password does not match');
				</script>
			";
			return false;
		}


		// encryption password
		$password = password_hash($password, PASSWORD_DEFAULT);

		// tambahkan user kedalam database
		$sql = "INSERT INTO users (username,password) VALUES ('$username', '$password')";
		mysqli_query($conn, $sql);

		return mysqli_affected_rows($conn);
	}

?>