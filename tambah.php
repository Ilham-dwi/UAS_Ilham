<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nim = mysqli_real_escape_string($koneksi, $_POST['no']);
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama_kegiatan']);
    $tanggal = mysqli_real_escape_string($koneksi, $_POST['waktu']);
    $name_file = mysqli_real_escape_string($koneksi, $_POST['bukti']);
    
    // Cek apakah NIM sudah ada
    $cek = mysqli_query($koneksi, "SELECT * FROM portfolio WHERE no = '$nim'");
    if (mysqli_num_rows($cek) > 0) {
        header("Location: index23.php?status=gagal&pesan=NIM sudah terdaftar");
        exit();
    }
    
    // Query tambah data
    $query = "INSERT INTO portfolio (no, nama_kegiatan, waktu, bukti) VALUES ('$nim', '$nama', '$tanggal', '$name_file')";
    
    if (mysqli_query($koneksi, $query)) {
        header("Location: index23.php?status=sukses");
    } else {
        header("Location: index23.php?status=gagal");
    }
} else {
    header("Location: index23.php");
}
?>