<?php
include "../koneksi.php";
// Ambil Data yang Dikirim dari Form
$TermStem = $_POST['TermStem'];

	$query = "INSERT INTO tb_katakunci VALUES('', '".$TermStem."')";
	$sql = mysqli_query($koneksi, $query); // Eksekusi/ Jalankan query dari variabel $query

	if($sql){ // Cek jika proses simpan ke database sukses atau tidak
		// Jika Sukses, Lakukan :
		echo "<script>window.alert('Berhasil Menyimpan Data !');
                    window.location=('../index.php?link=datakatakunci')</script>";
	}else{
		// Jika Gagal, Lakukan :
		echo "<script>window.alert('Gagal Menyimpan Data !');
                    window.location=('../index.php?link=datakatakunci')</script>";
	}

?>
