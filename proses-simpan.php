<?php
// Panggil koneksi database
require_once "config/database.php";

if (isset($_POST['simpan'])) {
	$nik           = mysqli_real_escape_string($db, trim($_POST['nik']));
	$nama          = mysqli_real_escape_string($db, trim($_POST['nama']));
	$tempat_lahir  = mysqli_real_escape_string($db, trim($_POST['tempat_lahir']));

	$tanggal       = $_POST['tanggal_lahir'];
	$tgl           = explode('-',$tanggal);
	$tanggal_lahir = $tgl[2]."-".$tgl[1]."-".$tgl[0];

	$jenis_kelamin = $_POST['jenis_kelamin'];
	$agama         = $_POST['agama'];
	$alamat        = mysqli_real_escape_string($db, trim($_POST['alamat']));
	$no_telepon    = $_POST['no_telepon'];

	// perintah query untuk menyimpan data ke tabel data_karyawan
	$query = mysqli_query($db, "INSERT INTO data_karyawan(nik,
													 nama,
													 tempat_lahir,
													 tanggal_lahir,
													 jenis_kelamin,
													 agama,
													 alamat,
													 no_telepon)	
											  VALUES('$nik',
													 '$nama',
													 '$tempat_lahir',
													 '$tanggal_lahir',
													 '$jenis_kelamin',
													 '$agama',
													 '$alamat',
													 '$no_telepon')");		

	// cek hasil query
	if ($query) {
		// jika berhasil tampilkan pesan berhasil insert data
		header('location: index.php?alert=2');
	} else {
		// jika gagal tampilkan pesan kesalahan
		header('location: index.php?alert=1');
	}	
}					
?>