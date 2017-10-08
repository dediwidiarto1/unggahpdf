<?php
include "../koneksi.php";
// Ambil data Id yang dikirim melalui URL
$Id = $_GET['Id'];

	// Query untuk menghapus data berdasarkan Id yang dikirim
    $query = "DELETE FROM tb_katakunci WHERE Id='".$Id."'";
	$sql = mysqli_query($koneksi, $query); // Eksekusi/ Jalankan query dari variabel $query

	if($sql){ // Cek jika proses hapus ke database sukses atau tidak
		// Jika Sukses, Lakukan :
		echo "<script>window.alert('Berhasil Menghapus Data !');
                    window.location=('../index.php?link=datakatakunci')</script>";
	}else{
		// Jika Gagal, Lakukan :
		echo "<script>window.alert('Gagal Menghapus Data !');
                    window.location=('../index.php?link=datakatakunci')</script>";
	}

?>
