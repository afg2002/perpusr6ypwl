<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Aplikasi Perpustakaan Sederhana</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
  <style>
    .login-container {
      max-width: 400px;
      margin: 0 auto;
      padding: 40px;
      margin-top: 100px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      border-radius: 5px;
    }
  </style>
</head>

<body>
  <section class="section">
    <div class="container">
      <div class="columns is-centered">
        <div class="column is-half">
          <div class="login-container">
            <h1 class="title has-text-centered">Aplikasi Perpustakaan Sederhana</h1>
            <h5 class="has-text-centered">Afghan Eka Pangestu 202043501783 </h5>
            <h5 class="has-text-centered">Kevin Andika Mustafa 202043502677 </h5>
            <h5 class="has-text-centered">Ichwan Wahyudi 202043502679 </h5>
            <form action="process_login.php" method="POST">
              <div class="field">
                <label class="label">Username</label>
                <div class="control">
                  <input class="input" type="text" name="username" placeholder="Masukkan username" required>
                </div>
              </div>
              <div class="field">
                <label class="label">Password</label>
                <div class="control">
                  <input class="input" type="password" name="password" placeholder="Masukkan password" required>
                </div>
              </div>
              <div class="field is-grouped is-grouped-centered">
                <div class="control">
                  <button class="button is-primary" type="submit">Login</button>
                </div>
                <div class="control">
                  <a class="button is-link" href="register.php">Register</a>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>

</html>
