<?php
require 'dbkoneksi.php'
    ?>
<?php
$sql = "SELECT * FROM product";
$rs = $dbh->query($sql);
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
    <link rel="shortcut icon" href="assets/icon.jpg" type="image/x-icon">
    <title>Garlic.id</title>
</head>

<body style="background-color:#f2f6fc;">
    <nav class="navbar navbar-expand-lg" id="container">
        <div class="container-fluid" id="contain-nav">
            <a class="navbar-brand" href="#" id="nav-logo">GARLIC.ID</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon" id="humburger"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item" id="list-demo">
                        <a class="nav-link active" aria-current="page" href="#" id="linked">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about-items" id="linked">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#product-items" id="linked">Product</a>
                    </li>
                </ul>
                <div class="dropdown" id="drop">
                    <a class="btn dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" width="20px"
                        aria-expanded="false" id="drop-a" >
                        <img src="assets/user.png" alt="" class="img-acc" data-bs-toggle="tooltip"
                            data-bs-placement="bottom" data-bs-title="User">
                    </a>
                    <ul class="dropdown-menu" id="drop-menu">
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Profil</a></li>
                        <li><a class="dropdown-item" href="index.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <section class="section-hero">
        <main class="content">
            <h1 class="home-title">find kitchen equipment<br>only with <span>us</span></h1>
            <!-- <p class="home-paragraf">Karena produk kami merupakan produk kitchen set unggulan ibu rumah tangga. </p> -->
            <a href="#" class="cta">JOIN US</a>
        </main>
    </section>

    <h1 id="about-items">Tentang Kami</h1>

    <section class="about-card">
        <div data-aos="fade-down" data-aos-duration="3000">
            <section class="sec-flex1">
                <div class="card mb-3" style="max-width: 1000px;margin-top:2rem;" id="card-bg">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="assets/ibu-masak.jpeg" class="img-fluid" alt="..." id="img-about">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body" style="padding:0;">
                                <h5 class="card-title" id="title-about1">Latar Belakang</h5>
                                <p class="card-text" id="about-para1">website yang menyediakan layanan dan produk
                                    kitchen set berkaitan
                                    dengan meningkatnya minat dan kebutuhan masyarakat akan desain interior yang lebih
                                    fungsional dan
                                    estetis dalam rumah mereka.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <div data-aos="fade-up" data-aos-duration="3000" id="data">
            <section class="sec-flex2">
                <div class="card mb-3" style="max-width: 1000px;margin-top:2rem;" id="card-bg">
                    <div class="row g-0">
                        <div class="col-md-8">
                            <div class="card-body" style="padding:0;">
                                <h5 class="card-title" style="" id="title-about2">Perkembangan</h5>
                                <p class="card-text" id="about-para2">masyarakat dapat dengan mudah mencari dan memilih
                                    model kitchen
                                    set yang sesuai dengan kebutuhan dan budget mereka tanpa harus datang ke toko fisik
                                    secara langsung.
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <img src="assets/ramah-lingkungan.jpg" class="img-fluid" alt="..." id="img-about">
                        </div>
                    </div>
                </div>
            </section>
        </div>

    </section>
    <h1 id="product-items">Produk Kami</h1>
    <p class="product-paragraf">Best seller dari toko kami menyediakan berbagai macam peralatan dapur</p>
    <section class="section-card">
        <?php
        $id = 1;
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
                            <a href="detail-user.php?id=<?= $row['id'] ?>" class="btn btn-secondary" id="but-detail">Detail
                                Produk</a>
                    </div>
                </div>
            </div>
            <?php
            $id++;
        }
        ?>
    </section>

    <section class="section-owner">
        <div class="qoutes-body">
            <h5 class="qoutes">“ Garlic merupakan aplikasi pembelian barang peralatan dapur rumah,<br>dalam membantu
                ibu-ibu
                menemukan kebutuhannya. Sehingga ibu-ibu tidak perlu datang ke toko secara langsung.”</h5>
        </div>

        <div class="owner-body">
            <figure class="figure">
                <img src="assets/owner.jpg" class="figure-img img-fluid rounded-circle" alt="...">
                <figcaption class="figure-caption">
                    <h5>Muhammad Zaidan Ramdhan</h5>
                    <span>Owner</span>
                </figcaption>
            </figure>
        </div>
    </section>
    <!-- Remove the container if you want to extend the Footer to full width. -->
    <div>
        <!-- Footer -->
        <footer class="text-center text-lg-start text-white" style="background-color: #081b29;">
            <!-- Grid container -->
            <div class="container p-5 pb-0" id="section-footer">
                <!-- Section: Links -->
                <section class="">
                    <!--Grid row-->
                    <div class="row">
                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                            <h6 class="text-uppercase mb-4 font-weight-bold" style=" color:#F2F6FC;">
                                GARLIC.ID
                            </h6>
                            <p style=" color:#F2F6FC;">
                                Sebuah website yang memudahkan ibu rumah tangga dalam memilih peralatan dapur.
                            </p>
                        </div>
                        <!-- Grid column -->

                        <hr class="w-100 clearfix d-md-none" />

                        <!-- Grid column -->
                        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                            <h6 class="text-uppercase mb-4 font-weight-bold" style=" color:#F2F6FC;">Jelajahi GARLIC.ID
                            </h6>
                            <p>
                                <a href="#" style="text-decoration:none; color:#69707A;">Tentang kami</a>
                            </p>
                            <p>
                                <a href="#" style="text-decoration:none; color:#69707A;">Kebijakan Privasi</a>
                            </p>
                            <p>
                                <a href="#" style="text-decoration:none; color:#69707A;">Blog</a>
                            </p>
                            <p>
                                <a href="#" style="text-decoration:none; color:#69707A;">Kebijakan GARLIC.ID</a>
                            </p>
                        </div>
                        <!-- Grid column -->

                        <hr class="w-100 clearfix d-md-none" />

                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
                            <h6 class="text-uppercase mb-4 font-weight-bold" style=" color:#F2F6FC;">
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
                            <h6 class="text-uppercase mb-4 font-weight-bold" style="color:#F2F6FC;">Kontak</h6>
                            <p style=" color:#69707A;"><i class="fas fa-home mr-3"></i> Bekasi, Indonesia</p>
                            <p style=" color:#69707A;"><i class="fas fa-envelope mr-3"></i> garlic@gmail.com</p>
                            <p style=" color:#69707A;"><i class="fas fa-phone mr-3"></i> + 01 234 567 88</p>
                            <p style=" color:#69707A;"><i class="fas fa-print mr-3"></i> + 01 234 567 89</p>
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
                                <a style="text-decoration:none; color:white; font-weight:bold;" href="#">GARLIC.ID</a>
                            </div>
                            <!-- Copyright -->
                        </div>
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
<script>
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
</script>

</html>