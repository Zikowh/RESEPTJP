<!DOCTYPE html>
<?php include 'koneksi.php';
$sql = "SELECT * FROM pesanan";
$result = $conn->query($sql); ?>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>MENU RESEP</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    </head>
<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg bg-black text-uppercase fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="#page-top">Resep Emak</a>
                <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="index.php">Home</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="logout.php">Log Out</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="pesanan.php">Resep</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <br>
    <!-- Portfolio Section-->
<section class="page-section portfolio" id="portfolio">
    <div class="container">
        <!-- Portfolio Section Heading-->
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-5">Menu resep</h2>
        <!-- Portfolio Grid Items-->
        <div class="row justify-content-center">
        <?php foreach($result as $row) { ?>
            <div class="col-md-6 col-lg-4 mb-5">
                <div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="#portfolioModal1-<?= $row['id_pesanan'] ?>">
                    <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                        <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-plus fa-3x"></i></div>
                    </div>
                    <img class="img-fluid" src="assets/img/portfolio/<?= $row['foto'] ?>" alt="..." />
                </div>
            </div>
        <div class="portfolio-modal modal fade" id="portfolioModal1-<?= $row['id_pesanan'] ?>" tabindex="-1" aria-labelledby="portfolioModal1" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button></div>
                    <div class="modal-body text-center pb-5">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-5">
                                    <!-- Portfolio Modal - Title-->
                                    <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0"><?= $row['nama_barang'] ?></h2>
                                    <!-- Icon Divider-->
                                    <div class="divider-custom">
                                        <div class="divider-custom-line"></div>
                                        <div class="divider-custom-line"></div>
                                    </div>
                                    <!-- Portfolio Modal - Image-->
                                    <img class="img-fluid rounded mb-5" src="assets/img/portfolio/<?= $row['foto'] ?>" alt="..." />
                                    <button class="btn btn-primary" data-bs-dismiss="modal">
                                        Kembali
                                    </button>
                                    <a href='pembelian.php?id=<?= $row['id_pesanan'] ?>'><button type='button' class='btn btn-secondary'>
                                        Lihat resep</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
            <!-- Portfolio Item 1-->
            
        </div>
    </div>
    <div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-black text-white text-center">
                    <h3>Tambah Pesanan</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="proses_resep.php">
                        <div class="mb-3">
                            <label for="nama_barang" class="form-label">Nama Barang</label>
                            <input type="text" class="form-control" name="nama_barang" id="nama_barang" placeholder="Nama Barang" required>
                        </div>
                        <div class="mb-3">
                            <label for="bahan_bahan" class="form-label">Bahan-Bahan</label>
                            <input type="text" class="form-control" name="bahan_bahan" id="bahan_bahan" placeholder="Bahan-Bahan" required>
                        </div>
                        <div class="mb-3">
                            <label for="foto" class="form-label">URL Foto</label>
                            <input type="text" class="form-control" name="foto" id="foto" placeholder="URL Foto" required>
                        </div>
                        <div class="mb-3">
                            <label for="cara_membuat" class="form-label">Cara Membuat</label>
                            <textarea class="form-control" name="cara_membuat" id="cara_membuat" placeholder="Cara Membuat" rows="4" required></textarea>
                        </div>
                        <button type="submit" name="create" class="btn btn-success w-100">Tambah Pesanan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




</section>
<!-- Copyright Section-->
<div class="copyright py-4 text-center text-white">
            <div class="container"><small>Copyright &copy; ell Madepaker 2024</small></div>
        </div>
        
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>
</html>