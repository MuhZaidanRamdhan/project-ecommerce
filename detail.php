<?php require_once 'dbkoneksi.php' ?>
<?php
// Mendapatkan nilai id dari parameter GET
$_id = $_GET['id'];

// Membuat query SQL untuk mengambil data produk dengan id tertentu
$sql = "SELECT * FROM product WHERE id=?";
$st = $dbh->prepare($sql);

// Menjalankan query dengan parameter id yang telah didapatkan sebelumnya
$st->execute([$_id]);

// Mengambil hasil query dan menyimpannya ke dalam variabel $row
$row = $st->fetch();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/build.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
  <title>Garlic.id</title>
</head>

<body style="background-color:#f2f6fc;">
  <nav class="navbar navbar-expand-lg" id="container-detail">
    <div class="container-fluid" id="contain-nav">
      <a class="navbar-brand" href="#" id="nav-logo">GARLIC.ID</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon" id="humburger"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item" id="list-demo">
            <a class="nav-link active" aria-current="page" href="index.php" id="linked">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#about-items" id="linked">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#product-items" id="linked">Product</a>
          </li>
        </ul>
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="login.php" id="login">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="register.php" id="sign">Sign Up</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div data-aos="fade-right" data-aos-offset="300" data-aos-easing="ease-in-sine">
    <section class="detail-card">
      <div class="card mb-03" style="width: 1000px; height:500px;" id="card-in">
        <div class="row g-0" id="card-row">
          <div class="col-md-6" id="card-too">
            <img src="assets/<?= $row['foto'] ?>" class="img-fluid" alt="..."
              style=" background-size:cover;background-position:center; height:480px;width:480px; aspect-ratio:1/1; ">
          </div>
          <div class="col-md-6" id="desain-card">
            <div class="card-body">
              <h5 class="card-title" id="title-sku">
                <?= $row['sku'] ?>
              </h5>
              <p id="title-name">
                <?= $row['name'] ?>
              </p>
              <p id="title-price">Rp
                <?= number_format($row['sell_price'], 0, ',', '.') ?>
              </p>
              <p id="title-stock">Stok Tersedia :
                <?= $row['stock'] ?>
              </p>
              <form action="login.php" class="f-flex">
                <input type="number" class="form-control" id="input-numb" placeholder="" aria-label="pesan"
                  aria-describedby="basic-addon1" min="1">
                <button class="submit">Pesan Sekarang</button>
            </div>
            </form>
          </div>
        </div>
      </div>
  </div>
  <h1 id="product-items">Produk Lainnya</h1>
  </section>
  <section class="section-card">
    <?php
    $sqlcard = "SELECT * FROM product";
    $rs = $dbh->query($sqlcard);
    ?>
    <?php
    foreach ($rs as $row) {
      ?>
      <div data-aos="fade-up" data-aos-duration="3000">
        <div class="card" style=" width: 17rem; height: 25rem;">
          <img src="assets/<?= $row['foto'] ?>" class="card-img-top" alt="..." width="40%" height="50%"
            style="object-fit:1/1; background-size:cover; background-position:center;">
          <div class="card-body">
            <h6 class="card-title">
              <?= $row['sku'] ?>
              </h5>
              <h5 class="card-title">
                <?= $row['name'] ?>
              </h5>
              <p class="card-text">Rp
                <?= number_format($row['sell_price'], 0, ',', '.') ?>
              </p>
              <a href="detail.php?id=<?= $row['id'] ?>" class="btn btn-secondary">Detail Produk</a>
          </div>
        </div>
      </div>
      </div>
      <div>
        <?php
    }
    ?>
  </section>
  <!-- Footer -->
  <footer class="text-center text-lg-start text-white" style="background-color: #081b29;" id="footer-marg">
    <!-- Grid container -->
    <div class="container p-5 pb-0" id="section-footer">
      <!-- Section: Links -->
      <section class="">
        <!--Grid row-->
        <div class="row">
          <!-- Grid column -->
          <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
            <h6 class="text-uppercase mb-4 font-weight-bold">
              GARLIC.ID
            </h6>
            <p>
              Sebuah website yang memudahkan ibu rumah tangga dalam memilih peralatan dapur.
            </p>
          </div>
          <!-- Grid column -->

          <hr class="w-100 clearfix d-md-none" />

          <!-- Grid column -->
          <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
            <h6 class="text-uppercase mb-4 font-weight-bold">Jelajahi GARLIC.ID</h6>
            <p>
              <a href="#" style="text-decoration:none;color:#69707A ;">Tentang kami</a>
            </p>
            <p>
              <a href="#" style="text-decoration:none; color:#69707A;">Kebijakan Privasi</a>
            </p>
            <p>
              <a href="#" style="text-decoration:none; color:#69707A;;">Blog</a>
            </p>
            <p>
              <a href="#" style="text-decoration:none; color:#69707A;;">Kebijakan GARLIC.ID</a>
            </p>
          </div>
          <!-- Grid column -->

          <hr class="w-100 clearfix d-md-none" />

          <!-- Grid column -->
          <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
            <h6 class="text-uppercase mb-4 font-weight-bold">
              Layanan Pelanggan
            </h6>
            <p>
              <a href="#" style="text-decoration:none; color:#69707A;">Bantuan</a>
            </p>
            <p>
              <a href="#" style="text-decoration:none; color:#69707A;">Metode Pembayaran</a>
            </p>
            <p>
              <a href="#" style="text-decoration:none; color:#69707A;">Pengembalian Barang & Dana</a>
            </p>
            <p>
              <a href="#" style="text-decoration:none; color:#69707A;">Garansi</a>
            </p>
          </div>

          <!-- Grid column -->
          <hr class="w-100 clearfix d-md-none" />

          <!-- Grid column -->
          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
            <h6 class="text-uppercase mb-4 font-weight-bold">Kontak</h6>
            <p style="color:#69707A;"><i class="fas fa-home mr-3"></i> Bekasi, Indonesia</p>
            <p style="color:#69707A;"><i class="fas fa-envelope mr-3"></i> garlic@gmail.com</p>
            <p style="color:#69707A;"><i class="fas fa-phone mr-3"></i> + 01 234 567 88</p>
            <p style="color:#69707A;"><i class="fas fa-print mr-3"></i> + 01 234 567 89</p>
          </div>
          <!-- Grid column -->
        </div>
        <!--Grid row-->
      </section>
      <!-- Section: Links -->

      <hr class="my-3">

      <!-- Section: Copyright -->
      <section class="p-3 pt-0">
        <div class="row d-flex align-items-center">
          <!-- Grid column -->
          <div class="col-md-7 col-lg-8 text-center text-md-start">
            <!-- Copyright -->
            <div class="p-3">
              © 2023 Copyright
              <a style="text-decoration:none;color:white; font-weight:bold;" href="#">GARLIC.ID</a>
            </div>
            <!-- Copyright -->
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <!-- Grid column -->
        </div>
      </section>
      <!-- Section: Copyright -->
    </div>
    <!-- Grid container -->
  </footer>
  <!-- Footer -->
  </div>
  <!-- End of .container -->
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init();
</script>

</html>