<?php
include 'koneksi.php';

if (!isset($_GET['nim'])) {
    echo "no tidak ditemukan.";
    exit;
}

$nim = $_GET['nim'];
if (!is_numeric($nim)) {
    echo "Parameter tidak valid.";
    exit;
}

$query = "SELECT * FROM portfolio WHERE no = '$nim'";
$result = mysqli_query($koneksi, $query);

if (mysqli_num_rows($result) == 0) {
    echo "Data tidak ditemukan.";
    exit;
}

$data = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $no = mysqli_real_escape_string($koneksi, $_POST['no']);
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama_kegiatan']);
    $tanggal = mysqli_real_escape_string($koneksi, $_POST['waktu']);
    $name_file = mysqli_real_escape_string($koneksi, $_POST['bukti']);

    $update = "UPDATE portfolio 
               SET nama_kegiatan = '$nama', waktu = '$tanggal', bukti = '$name_file'
               WHERE no = '$no'";
    
    if (mysqli_query($koneksi, $update)) {
        header("Location: index23.php");
        exit;
    } else {
        echo "Gagal mengupdate data: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Portofolio</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .form-group { margin-bottom: 15px; }
        .form-control { width: 100%; padding: 8px; box-sizing: border-box; }
        .btn { padding: 8px 12px; text-decoration: none; background-color: #4CAF50; color: white; border: none; }
        .btn:hover { background-color: #45a049; }
        .img-preview { max-height: 120px; margin-top: 10px; }
    </style>
</head>
<body>

    <h2>Edit Data Portofolio</h2>

    <form action="" method="POST" enctype="multipart/form-data">
        <!-- Hidden input agar 'no' tetap terkirim -->
        <input type="hidden" name="no" value="<?php echo htmlspecialchars($data['no']); ?>">

        <div class="form-group">
            <label>No:</label>
            <input type="text" class="form-control" value="<?php echo htmlspecialchars($data['no']); ?>" disabled>
        </div>
        <div class="form-group">
            <label>Nama Kegiatan:</label>
            <input type="text" name="nama_kegiatan" class="form-control" value="<?php echo htmlspecialchars($data['nama_kegiatan']); ?>" required>
        </div>
        <div class="form-group">
            <label>Waktu:</label>
            <input type="date" name="waktu" class="form-control" value="<?php echo htmlspecialchars($data['waktu']); ?>" required>
        </div>
        <div class="form-group">
            <label>Bukti (path gambar):</label>
            <input type="text" name="bukti" class="form-control" value="<?php echo htmlspecialchars($data['bukti']); ?>" required>
        </div>
        <button type="submit" class="btn">Simpan Perubahan</button>
    </form>

</body>
</html>
