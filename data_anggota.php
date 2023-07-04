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

// Query untuk mengambil data anggota
$query = "SELECT * FROM anggota";
$result = mysqli_query($conn, $query);
?>

<?php include 'header.php'; ?>

<section class="section">
  <div class="container">
    <h1 class="title">Data Anggota</h1>
    <a class="button is-primary" href="tambah_anggota.php">Tambah Anggota</a>

    <table class="table is-striped is-hoverable" style="width:100%  ;">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nama</th>
          <th>Username</th>
          <th>Alamat</th>
          <th>Email</th>
          <th>Role</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        // Memeriksa apakah data anggota ditemukan
        if (mysqli_num_rows($result) > 0) {
          // Mengambil data anggota
          while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            $nama = $row['nama'];
            $username = $row['username'];
            $alamat = $row['alamat'];
            $email = $row['email'];
            $role = $row['role'];
            ?>
            <tr>
              <td><?php echo $id; ?></td>
              <td><?php echo $nama; ?></td>
              <td><?php echo $username; ?></td>
              <td><?php echo $alamat; ?></td>
              <td><?php echo $email; ?></td>
              <td><?php echo $role; ?></td>
              <td>
                <a href="edit_anggota.php?id=<?php echo $id; ?>" class="button is-primary is-small">Edit</a>
                <a href="hapus_anggota.php?id=<?php echo $id; ?>" class="button is-danger is-small" onclick="return confirm('Apakah Anda yakin ingin menghapus anggota ini?')">Hapus</a>
              </td>
            </tr>
          <?php
          }
        } else {
          // Jika data anggota tidak ditemukan
          ?>
          <tr>
            <td colspan="5">Tidak ada data anggota.</td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>
</section>

