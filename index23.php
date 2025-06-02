<?php
include 'koneksi.php';


// Ambil data dari database
$query = "SELECT * FROM portfolio";
$result = mysqli_query($koneksi, $query);

$no = 1;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Portfolio</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { border-collapse: collapse; width: 100%; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        tr:nth-child(even) { background-color: #f9f9f9; }
        .btn { padding: 5px 10px; cursor: pointer; text-decoration: none; display: inline-block; }
        .btn-danger { background-color: #f44336; color: white; border: none; }
        .btn-danger:hover { background-color: #d32f2f; }
        .btn-primary { background-color: #4CAF50; color: white; border: none; }
        .btn-primary:hover { background-color: #45a049; }
        .form-group { margin-bottom: 15px; }
        .form-control { width: 100%; padding: 8px; box-sizing: border-box; }
        img { max-width: 120px; height: auto; }
    </style>
</head>
<body>
    <h2>Data Portfolio</h2>

    <!-- Form Tambah Data -->
    <h3>Tambah Kegiatan</h3>
    <form action="tambah.php" method="POST">
        <div class="form-group">
            <label>Nama Kegiatan:</label>
            <input type="text" name="nama_kegiatan" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Waktu:</label>
            <input type="text" name="waktu" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Bukti (path gambar):</label>
            <input type="text" name="bukti" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>

    <table>
        <tr>
            <th>No</th>
            <th>Nama Kegiatan</th>
            <th>Waktu</th>
            <th>Bukti</th>
            <th>Aksi</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $row['nama_kegiatan']; ?></td>
            <td><?php echo $row['waktu']; ?></td>
            <td><img src="<?php echo $row['bukti']; ?>" alt="Bukti"></td>
            <td>
                <a href="edit.php?nim=<?php echo $row['no']; ?>" class="btn btn-primary"> edit </a>
                <a href="hapus.php?no=<?php echo $row['no']; ?>" 
                   class="btn btn-danger" 
                   onclick="return confirm('Yakin ingin menghapus data ini?')">
                    Hapus
                </a>
                
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
