<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.3/css/bulma.min.css">
</head>

<body>
  <?php
  // Memeriksa peran pengguna (admin atau member)
  if ($_SESSION['role'] == 'admin') {
    // Navbar untuk admin
    ?>
    <nav class="navbar is-primary" role="navigation" aria-label="main navigation">
      <div class="container">
        <div class="navbar-brand">
          <a class="navbar-item" href="#">
            <h1 class="title is-5">Perpustakaan Online</h1>
          </a>
        </div>

        <div class="navbar-menu">
          <div class="navbar-start">
            <a class="navbar-item" href="dashboard_admin.php">Dashboard</a>
            <a class="navbar-item" href="data_anggota.php">Data Anggota</a>
            <a class="navbar-item" href="data_buku.php">Data Buku</a>
            <a class="navbar-item" href="data_peminjam.php">Data Peminjam</a>
          </div>

          <div class="navbar-end">
            <div class="navbar-item">
              <p class="subtitle is-6">Selamat datang, <?php echo $_SESSION['username']; ?>!</p>
            </div>
            <div class="navbar-item">
              <a class="button is-light" href="logout.php">Logout</a>
            </div>
          </div>
        </div>
      </div>
    </nav>
  <?php
  } else if ($_SESSION['role'] == 'member') {
    // Navbar untuk member
    ?>
    <nav class="navbar is-primary" role="navigation" aria-label="main navigation">
      <div class="container">
        <div class="navbar-brand">
          <a class="navbar-item" href="./dashboard.php">
            <h1 class="title is-5">Perpustakaan Online</h1>
          </a>
        </div>

        <div class="navbar-menu">
          <div class="navbar-start">
            <a class="navbar-item" href="dashboard.php">Dashboard</a>
            <a class="navbar-item" href="buku_yang_dipinjam.php">Buku Yang Dipinjam</a>
          </div>

          <div class="navbar-end">
            <div class="navbar-item">
              <p class="subtitle is-6">Selamat datang, <?php echo $_SESSION['username']; ?>!</p>
            </div>
            <div class="navbar-item">
              <a class="button is-light" href="logout.php">Logout</a>
            </div>
          </div>
        </div>
      </div>
    </nav>
  <?php
  }
  ?>
