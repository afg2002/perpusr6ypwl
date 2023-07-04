<?php
session_start();

// Memeriksa apakah pengguna sudah login
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
  // Jika pengguna belum login atau bukan anggota, redirect ke halaman login
  header("Location: index.php");
  exit();
}

// Menggunakan koneksi ke database
include 'koneksi.php';

// Query untuk mendapatkan data peminjaman dengan informasi buku dan anggota
$query = "SELECT peminjaman.id, buku.judul, anggota.nama, peminjaman.tanggal_pinjam, peminjaman.tanggal_kembali
          FROM peminjaman
          INNER JOIN buku ON peminjaman.id_buku = buku.id
          INNER JOIN anggota ON peminjaman.id_anggota = anggota.id";

$result = mysqli_query($conn, $query);

include 'header.php';
?>

<section class="section">
  <div class="container">
    <h1 class="title">Data Peminjaman</h1>

    <?php
    // Periksa apakah ada data peminjaman
    if (mysqli_num_rows($result) > 0) {
      echo '<table class="table is-striped is-fullwidth">';
      echo '<thead>';
      echo '<tr>';
      echo '<th>ID</th>';
      echo '<th>Judul Buku</th>';
      echo '<th>Nama Anggota</th>';
      echo '<th>Tanggal Pinjam</th>';
      echo '<th>Tanggal Kembali</th>';
      echo '</tr>';
      echo '</thead>';
      echo '<tbody>';

      // Tampilkan data peminjaman
      while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>' . $row['id'] . '</td>';
        echo '<td>' . $row['judul'] . '</td>';
        echo '<td>' . $row['nama'] . '</td>';
        echo '<td>' . $row['tanggal_pinjam'] . '</td>';
        echo '<td>' . $row['tanggal_kembali'] . '</td>';
        echo '</tr>';
      }

      echo '</tbody>';
      echo '</table>';
    } else {
      // Jika tidak ada data peminjaman
      echo '<p>Tidak ada data peminjaman.</p>';
    }
    ?>
  </div>
</section>
