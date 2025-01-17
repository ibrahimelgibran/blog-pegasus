<?php

session_start();
require_once 'function/functions.php';
require_once 'function/constant.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Open Graph -->
  <meta property="og:title" content="<?= getName(); ?> - Home" />
  <meta name="author" content="<?= getName(); ?>" />
  <meta property="og:locale" content="id" />
  <meta name="description" content="Blog Dokumentasi" />
  <link rel="canonical" href="<?= getLink("Domain"); ?>" />
  <meta property="og:url" content="<?= getLink("Domain"); ?>" />
  <meta property="og:site_name" content="<?= getName(); ?>" />

  <meta property="og:country-name" content="Indonesia" />
  <meta property="og:image" content="assets/img/me/logo.png" />
  <meta property="og:image:width" content="460" />
  <meta property="og:image:height" content="230" /> 

  <meta property="twitter:card" content="summary_large_image" />
  <meta property="twitter:title" content="<?= getName(); ?> - Home" />
  <meta property="twitter:author" content="<?= getName(); ?>" />
  <meta property="twitter:image:src" content="assets/img/me/logo.png" />

  <title><?= getName(); ?> - Home</title>
  <link rel="icon" type="image/svg" href="<?= getFavIcon(); ?>">

  <link rel="stylesheet" href="assets/css/bootstrap/bootstrap.css">
  <link rel="stylesheet" href="assets/css/fontawesome/all.css">
  <link rel="stylesheet" href="assets/css/highlight/atom-one-dark.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/theme.css">
</head>

<body class="<?= getDefaultTheme(); ?>">

  <!-- Start Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand custom-font" href=""><img src="<?= getFavIcon(); ?>" style="width: 50px;"> <?= getName(); ?></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <ul class="nav navbar-nav ms-auto w-100 justify-content-end me-5">
          <a class="nav-link" aria-current="page" href=""><i class="fas fa-home"></i> Home</a>
          <a class="nav-link" href="post/index.php"><i class="fas fa-book"></i> Blog</a>
          <!-- <a class="nav-link" href="about/index.php"><i class="fas fa-address-card"></i> About</a> -->
          <?php if (isset($_SESSION['login'])) : ?>
            <li class="nav-item dropdown mt-2">
            <a class="dropdown-toggle text-white" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="text-decoration: none;"><img src="assets/img/avatar/<?= $_SESSION['avatar']; ?>" alt="" class="rounded-circle" style="width: 30px;"></a>
              <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarScrollingDropdown">
                <li><a class="dropdown-item" href="admin/index.php"><i class="fas fa-plus"></i> Tambah Post</a></li>
                <li><a href="auth/daftar.php" class="dropdown-item"><i class="fas fa-user-plus"></i> Tambah Admin</a></li>
                <li><a class="dropdown-item" href="pengaturan/index.php?id=<?= $_SESSION["id"]; ?>"><i class="fas fa-cog"></i> Pengaturan</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item logout" href="#" id="logout" data-id="<?= $_SESSION["id"]; ?>"><i class="fas fa-sign-out-alt"></i> Keluar</a></li>
              </ul>
            </li>
          <?php endif; ?>
          <?php if (!isset($_SESSION['login'])) : ?>
            <a class="btn btn-outline-light tombol me-2 ps-3 pe-3" href="auth/login.php">
              Sign in
            </a>
          <?php endif; ?>
          <div class="text-center ms-3 mt-1">
            <label class="switch">
              <input type="checkbox">
              <span class="slider round toggle-theme"></span>
            </label>
          </div>
      </div>
    </div>
    </div>
  </nav>
  <!-- End Navbar -->

  <!-- Start Jumbotron -->
  <div class="container jumbotron">
    <div class="p-5 mt-4 bg-dark text-white about mb-5">
      <div class="row">
        <div class="col-lg-6">
          <a href="assets/img/me/logo.png" target="_blank">
            <img src="assets/img/me/logo.png" alt="Me" class="img-fluid rounded-circle avatar">
          </a>
        </div>
        <div class="col-lg-6 mt-5">
          <h4 class="about-text custom-font">
            <i class="fa-solid fa-book me-2"></i> Selamat datang di blog Pegasus Yogyakarta!
          </h4>
          <p class="mt-3 text-muted">Di sini, kamu bisa menemukan berbagai informasi seputar kursus sepatu roda kami, mulai dari jadwal pelatihan, tips dan trik seputar sepatu roda, hingga berita terbaru tentang dunia olahraga ini. Blog ini juga menyediakan ulasan tentang teknik-teknik dasar hingga tingkat lanjut, serta cerita inspiratif dari para peserta yang telah bergabung. Pastikan untuk terus mengikuti kami dan dapatkan wawasan serta update seputar sepatu roda di Yogyakarta!
          </p>
          <div class="contact">
            <!-- <a href="#" class="text-muted" id="errorAlert"><i class="fas fa-envelope"></i> Email</a> -->
            <!-- <a href="<?= getLink("GitHub"); ?>" target="_blank" class="text-muted"><i class="fab fa-github"></i> GitHub</a> -->
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  <!-- End Jumbotron -->

  <div class="container text-white">
    <div class="row">
      <div class="col-lg-auto">
        <button type="button" class="btn btn-success btn-floating btn-lg rounded-circle" id="btn-back-to-top">
          <i class="fas fa-arrow-up"></i>
        </button>
      </div>
    </div>
  </div>




  <!-- <pre class="language-php"><code>    // Test PHP
    class Show {
      private $text = 'Hello World!';
      public function __construct() 
      {
        return $this->text; 
      }
    }
    new Show();
  </code></pre> -->

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
  <script src="assets/js/bootstrap/bootstrap.js"></script>
  <script src="assets/js/highlight/highlight.min.js"></script>
  <script src="assets/js/highlight/highlightjs-line-numbers.min.js"></script>
  <script src="assets/js/script.js"></script>
  <script src="assets/js/sweetalert/sweetalert2.all.min.js"></script>
  <script src="assets/js/theme.js"></script>
  <?php if (isset($_SESSION["login"])) : ?>
    <script>
      const logout = document.querySelector('.logout');
      logout.addEventListener("click", function() {
        const dataid = this.dataset.id;
        Swal.fire({
          icon: 'warning',
          title: 'Apakah anda yakin ingin keluar',
          showCancelButton: true,
          confirmButtonColor: '#d9534f',
          cancelButtonColor: '#5cb85c',
          confirmButtonText: `Ya`,
          cancelButtonText: `Tidak`,
        }).then((result) => {
          if (result.isConfirmed) {
            location.href = `auth/logout.php?id=${dataid}`
          }
        })
      });
    </script>
  <?php endif; ?>
</body>

</html>
