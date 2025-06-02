<?php
include 'koneksi.php'; // pastikan koneksi ke database berhasil
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Portofolio Ilham Dwi Kurniawan, mahasiswa informatika dengan minat di teknologi dan inovasi digital." />
  <title>Ilham Dwi Kurniawan - Portfolio</title>
  <link rel="icon" href="favicon.ico" type="image/x-icon" />
  <link rel="stylesheet" href="Style.css" />
</head>

<body>
  <nav>
    <div class="nav-container">
      <a href="#home" class="logo-link">
        <img src="aset/th.jpg" alt="Logo" class="logo-img">
      </a>
      <ul class="nav-menu">
        <li><a href="#home">Home</a></li>
        <li><a href="#about">About Me</a></li>
        <li><a href="#portfolio">Portfolio</a></li>
        <li><a href="#opini">Opini</a></li>
        <li><a href="#kontak">Contact Me</a></li>
        <li class="dropdown">
          <a href="#">More</a>
          <ul class="dropdown-content">
            <li><a href="https://web.facebook.com/profile.php?id=100070874801355" target="_blank">Facebook</a></li>
            <li><a href="https://www.instagram.com/ilh_amdwi/" target="_blank">Instagram</a></li>
            <li><a href="https://www.tiktok.com/@mell_tiktok31" target="_blank">Tiktok</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
  
  <section id="home" class="hero-section">
    <div class="hero-container">
      <img src="aset/Profile.jpeg" alt="Ilham Dwi Kurniawan" class="hero-photo">
      <div class="hero-text">
        <h1>Halo, saya <span class="highlight">Ilham Dwi Kurniawan</span></h1>
        <h2>Mahasiswa Informatika & Penggemar Teknologi</h2>
        <p>Saya memiliki ketertarikan mendalam pada dunia teknologi, pemrograman, dan inovasi digital.</p>
        <a href="#about" class="btn-primary">Kenali Saya</a>
      </div>
    </div>
  </section>
  
  <section id="about" class="about">
    <div class="about-container">
      <div class="about-text">
        <h2>Tentang Saya</h2>
        <p>
          Halo! Saya Ilham Dwi Kurniawan, seorang mahasiswa semester 2 di Program Studi Teknik Informatika di Universitas Nahdlatul Ulama Sunan Giri. Saya memiliki ketertarikan besar dalam bidang teknologi, terutama pemrograman, kecerdasan buatan, dan inovasi digital. Saya suka belajar hal baru, bekerja dalam tim, dan selalu berusaha menciptakan solusi yang berdampak.
        </p>
        <p>
          Saat ini saya aktif mengikuti berbagai kegiatan seperti lomba infografis, kompetisi teknologi, dan seminar digital. Saya percaya bahwa teknologi adalah jembatan menuju masa depan yang lebih baik.
        </p>
      </div>
      <div class="about-image">
        <img src="aset/Abaout.jpeg" alt="Foto profil Ilham Dwi Kurniawan">
      </div>
    </div>
  </section>

  <section id="portfolio" class="portfolio-section">
  <h2 class="section-title">Portfolio</h2>
  <a href="index23.php" class="btn-tambah">TAMBAH</a>
  <div class="table-wrapper">
    <table class="portfolio-table">
      <thead>
        <tr>
          <th>No.</th>
          <th>Nama Kegiatan</th>
          <th>Waktu</th>
          <th>Bukti</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $query = "SELECT * FROM portfolio";
        $result = mysqli_query($koneksi, $query);
        $no = 1;

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $no++ . "</td>";
            echo "<td>" . $row['nama_kegiatan'] . "</td>";
            echo "<td>" . $row['waktu'] . "</td>";
            echo "<td><img src='aset/" . $row['bukti'] . "' alt='Bukti' class='sertifikat-img' style='width: 100px;'></td>";
            echo "</tr>";
        }
        ?>
      </tbody>
    </table>
  </div>
</section>


  <section id="opini" class="opini-section">
    <h2 class="section-title">Opini</h2>
    <div class="opini-grid">
      <!-- Baris Atas -->
      <a href="https://www.w3schools.com/html/default.asp" target="_blank" class="opini-card-link">
        <div class="opini-card">
          <img src="aset/html.png" alt="Google Solution Challenge">
          <div class="opini-info">
            <h3>Belajar HTML</h3>
          </div>
        </div>
      </a>
      
      <a href="https://www.malasngoding.com//" target="_blank" class="opini-card-link">
        <div class="opini-card">
          <img src="aset/Belajar Ngoding.png"Google Solution Challenge">
          <div class="opini-info">
            <h3>Dasar Web Development</h3>
          </div>
        </div>
      </a>
  
      <a href="https://www.jagoweb.com/" target="_blank" class="opini-card-link">
        <div class="opini-card">
          <img src="aset/Web Hosting.png" alt="Google Solution Challenge">
          <div class="opini-info">
            <h3>Web Hosting</h3>
          </div>
        </div>
      </a>
  
      <!-- Baris Bawah -->
      <a href="https://www.petanikode.com/" target="_blank" class="opini-card-link">
        <div class="opini-card">
          <img src="aset/Tani Kode.png" alt="Google Solution Challenge">
          <div class="opini-info">
            <h3>Belajar budidaya kode</h3>
          </div>
        </div>
      </a>
  
      <a href="https://buildwithangga.com/" target="_blank" class="opini-card-link">
        <div class="opini-card">
          <img src="aset/Design.png" alt="Google Solution Challenge">
          <div class="opini-info">
            <h3>kelas UI/UX design</h3>
          </div>
        </div>
      </a>
  
      <a href="" target="_blank" class="opini-card-link">
        <div class="opini-card">
          <img src="aset/CSS.png" alt="Google Solution Challenge">
          <div class="opini-info">
            <h3>Belajar CSS</h3>
          </div>
        </div>
      </a>
  </section>

  <section id="kontak" class="kontak-section">
    <h2 class="section-title">Hubungi saya</h2>
    <div class="kontak-container">
      <form class="kontak-form">
        <label for="email">E-mail</label>
        <input type="email" id="email" placeholder="Masukkan email anda" required />
  
        <label for="name">Nama</label>
        <input type="text" id="name" placeholder="Masukkan nama anda" required />
  
        <label for="subject">Subjek</label>
        <input type="text" id="subject" placeholder="Subjek pesan" required />
  
        <label for="message">Isi</label>
        <textarea id="message" rows="5" placeholder="Tulis pesan anda disini" required></textarea>
  
        <button type="submit">Kirim</button>
      </form>
  
      <div class="kontak-map">
        <iframe
        src="https://www.google.com/maps?q=-7.153986,111.904014&hl=id&z=16&output=embed"
        width="100%" 
        height="450" 
        style="border:0;" 
        allowfullscreen="" 
        loading="lazy">
        </iframe>
      </div>
    </div>
  </section>
</body>

<footer>
    <p>Copyright © 2025 by Ilham</p>
    <p>Temukan saya di: 
      <a href="https://web.facebook.com/profile.php?id=100070874801355" target="_blank">Facebook</a> | 
      <a href="https://www.instagram.com/ilh_amdwi/" target="_blank">Instagram</a> | 
      <a href="https://www.tiktok.com/@mell_tiktok31" target="_blank">Tiktok</a>
    </p>
</footer>
</html>
