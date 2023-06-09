<?php
require_once '../../dbkoneksi.php';
?>

<?php
// cek apakah terdapat parameter id pada URL, jika ada maka dilakukan edit data
$_id = isset($_GET['id']) ? $_GET['id'] : null;
if (!empty($_id)) {
    // ambil data orders berdasarkan id
    $sql = "SELECT * FROM orders WHERE id=?";
    $st = $dbh->prepare($sql);
    $st->execute([$_id]);
    $row = $st->fetch();
} else {
    // jika tidak ada parameter id pada URL, maka dianggap input data baru
    // inisialisasi variabel $row sebagai array kosong
    $row = [];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>SB Admin</title>
    <link href="../css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<style>
    #main-content {
        margin: 30px;
    }

    #col-hover {
        color: white;
    }
    
</style>

<body>
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="../index.php">Admin</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..."
                    aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i
                        class="fas fa-search"></i></button>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Settings</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="../../index.php">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="../index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Interface</div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Data
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="../customer/customer.php">Customer</a>
                                <a class="nav-link" href="../orders/orders.php" id="col-hover">Order</a>
                                <a class="nav-link" href="../produk/produk.php">Produk</a>
                                <a class="nav-link" href="../type/type.php">Type Produk</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages"
                            aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            Pages
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                    data-bs-target="#pagesCollapseAuth" aria-expanded="false"
                                    aria-controls="pagesCollapseAuth">
                                    Authentication
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne"
                                    data-bs-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="login.php">Login</a>
                                        <a class="nav-link" href="register.php">Register</a>
                                        <a class="nav-link" href="password.php">Forgot Password</a>
                                    </nav>
                                </div>
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                    data-bs-target="#pagesCollapseError" aria-expanded="false"
                                    aria-controls="pagesCollapseError">
                                    Error
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne"
                                    data-bs-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="401.php">401 Page</a>
                                        <a class="nav-link" href="404.php">404 Page</a>
                                        <a class="nav-link" href="500.php">500 Page</a>
                                    </nav>
                                </div>
                            </nav>
                        </div>
                        <div class="sb-sidenav-menu-heading">Addons</div>
                        <a class="nav-link" href="charts.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                            Charts
                        </a>
                        <a class="nav-link" href="tables.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Tables
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    Admin
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main id="main-content">
            <form method="POST" action="proses_orders.php">
                <div class="form-group row">
                    <label for="order_number" class="col-4 col-form-label">Order Number</label>
                    <div class="col-8">
                        <div class="input-group">
                            <div class="input-group-prepend">
                            </div>
                            <input id="order_number" name="order_number" type="text" class="form-control" value="<?php if (isset($row['order_number']))
                                echo $row['order_number']; ?>">
                        </div>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="date" class="col-4 col-form-label">Date</label>
                    <div class="col-8">
                        <div class="input-group">
                            <div class="input-group-prepend">
                            </div>
                            <input id="date" name="date" type="text" class="form-control" value="<?php if (isset($row['date']))
                                echo $row['date']; ?>">
                        </div>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="qty" class="col-4 col-form-label">Qty</label>
                    <div class="col-8">
                        <div class="input-group">
                            <div class="input-group-prepend">
                            </div>
                            <input id="qty" name="qty" value="<?php if (isset($row['qty']))
                                echo $row['qty']; ?>" type="text" class="form-control">
                        </div>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="total_price" class="col-4 col-form-label">Total Price</label>
                    <div class="col-8">
                        <div class="input-group">
                            <div class="input-group-prepend">
                            </div>
                            <input id="total_price" name="total_price" value="<?php if (isset($row['total_price']))
                                echo $row['total_price']; ?>" type="text" class="form-control">
                        </div>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="customer_id" class="col-4 col-form-label">Customer id</label>
                    <div class="col-8">
                        <?php
                        $sqlcus = "SELECT * FROM customer";
                        $rscus = $dbh->query($sqlcus);
                        ?>
                        <select id="customer_id" name="customer_id" class="custom-select">
                            <?php
                            foreach ($rscus as $rowcus) {
                                ?>
                                <option value="<?= $rowcus['id'] ?>"><?= $rowcus['name'] ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="product_id" class="col-4 col-form-label">Product id</label>
                    <div class="col-8">
                        <?php
                        $sqlprod = "SELECT * FROM product";
                        $rsprod = $dbh->query($sqlprod);
                        ?>
                        <select id="product_id" name="product_id" class="custom-select">
                            <?php
                            foreach ($rsprod as $rowprod) {
                                ?>
                                <option value="<?= $rowprod['id'] ?>"><?= $rowprod['name'] ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <div class="offset-4 col-8">
                        <?php
                        $button = (empty($_id)) ? "Simpan" : "Update";
                        ?>
                        <input type="submit" name="proses" type="submit" class="btn btn-primary"
                            value="<?= $button ?>" />
                        <input type="hidden" name="id" value="<?= $_id ?>" />
                    </div>
                </div>
            </form>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2023</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="../js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="../assets/demo/chart-area-demo.js"></script>
    <script src="../assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="../js/datatables-simple-demo.js"></script>
</body>

</html>
<form>