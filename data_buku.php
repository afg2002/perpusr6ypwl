<?php
// Menggunakan koneksi ke database
include 'koneksi.php';
session_start();

// Memeriksa apakah pengguna memiliki peran admin
if ($_SESSION['role'] != 'admin') {
  // Jika bukan admin, redirect ke halaman lain atau tampilkan pesan error
  header("Location: index.php?error=unauthorized");
  exit();
}

// Query untuk mengambil data buku
$query = "SELECT * FROM buku";
$result = mysqli_query($conn, $query);
?>

<?php include 'header.php'; ?>

<section class="section">
  <div class="container">
    <h1 class="title">Data Buku</h1>
    <a class="button is-primary" href="tambah_buku.php">Tambah Buku</a>

    <table class="table is-striped is-hoverable" style="width:100%;">
      <thead>
        <tr>
          <th>ID</th>
          <th>Judul</th>
          <th>Penulis</th>
          <th>Penerbit</th>
          <th>Tahun Terbit</th>
          <th>Sinopsis</th>
          <th>Stok</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        // Memeriksa apakah data buku ditemukan
        if (mysqli_num_rows($result) > 0) {
          // Mengambil data buku
          while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            $judul = $row['judul'];
            $penulis = $row['penulis'];
            $penerbit = $row['penerbit'];
            $tahun_terbit = $row['tahun_terbit'];
            $sinopsis = $row['sinopsis'];
            $stok = $row['stok'];
            ?>
            <tr>
              <td><?php echo $id; ?></td>
              <td><?php echo $judul; ?></td>
              <td><?php echo $penulis; ?></td>
              <td><?php echo $penerbit; ?></td>
              <td><?php echo $tahun_terbit; ?></td>
              <td><?php echo $sinopsis; ?></td>
              <td><?php echo $stok; ?></td>
              <td>
                <a href="edit_buku.php?id=<?php echo $id; ?>" class="button is-primary is-small" style="width:100%">Edit</a>
                <a href="hapus_buku.php?id=<?php echo $id; ?>" class="button is-danger is-small" onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini?')" style="width:100%">Hapus</a>
              </td>
            </tr>
          <?php
          }
        } else {
          // Jika data buku tidak ditemukan
          ?>
          <tr>
            <td colspan="8">Tidak ada data buku.</td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>
</section>
