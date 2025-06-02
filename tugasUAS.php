<?php
// Panggil file koneksi
include 'koneksiUAS.php';

// Query untuk mengambil data dari tb_mahasiswa
$query = "SELECT tb_mhs.nim, tb_mhs.nama, tb_mk.nama_mk, tb_nilai.nilai
              FROM tb_nilai
              JOIN tb_mhs ON tb_nilai.nim = tb_mhs.nim
              JOIN tb_mk ON tb_nilai.kode_mk = tb_mk.kode_mk";
$result = mysqli_query($koneksi, $query);

// Cek apakah data ditemukan
if (mysqli_num_rows($result) > 0) {
    echo "<table border='1' cellpadding='8'>";
    echo "<tr><th>No</th><th>NIM</th><th>Nama</th><th>Mata Kuliah</th><th>Nilai</th></tr>";
    
    $no = 1;
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $no++ . "</td>";
        echo "<td>" . $row['nim'] . "</td>";
        echo "<td>" . $row['nama'] . "</td>";
        echo "<td>" . $row['nama_mk'] . "</td>";
        echo "<td>" . $row['nilai'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "Tidak ada data mahasiswa.";
}
?>
