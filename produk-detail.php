<?php
    require "koneksi.php";

    $nama = htmlspecialchars($_GET['nama']);
    $queryProduk = mysqli_query($con, "SELECT * FROM produk WHERE nama= '$nama'");
    $produk = mysqli_fetch_array($queryProduk);
    
    
    $queryProdukTerkait = mysqli_query($con, "SELECT * FROM produk WHERE kategori_id = '$produk[kategori_id]' AND id!='$produk[id]'LIMIT 4");
   
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mekar Putra | Produk Detail</title>
    <link rel="stylesheet" href="bootstrap-5.2.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome-free-6.4.0-web/css/all.css">
    <link rel="stylesheet" href="css/style.css?<?=time()?>">
</head>
<body>
    <?php require "navbar.php"; ?>
    
    <!-- detail produk -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <!-- Gambar -->
                    <img src="image/<?php echo $produk['foto']; ?>" class="w-100" alt="">
                </div>
                <div class="col-md-6 offset-md-1">
                    <!-- Nama Produk -->
                    <h1> <?php echo $produk['nama'] ;?> </h1>
                    <!-- detail produk -->
                    <p class="fs-5">
                        <?php echo $produk['detail']; ?>
                    </p>
                    <p class="fs-3">
                        <!-- harga produk -->
                        Rp. <?php echo $produk['harga']; ?>
                    </p>
                    <!-- ketersediaan produk -->
                    <p class="fs-5">Status Ketersediaan : <strong><?php echo $produk['ketersediaan_stok']; ?></strong></p>
                    <a href="https://wa.me/082123306038" class="btn warna1" style="border-color: black;">Pesan Disini</a>
                </div>
            </div>
        </div>
    </div>

    <!--Produk terkait-->
    <div class="container-fluid py-5 warna3">
        <div class="container">
            <h2 class="text-center text-white mb-5">Produk Terkait</h2>
            <div class="row">
                <?php while($data=mysqli_fetch_array($queryProdukTerkait)) {?>
                    <div class="col-md-6 col-lg-3 mb-3">
                        <a href="produk-detail.php?=nama= <?php echo $data['nama'] ?>;">
                            <img src="image/<?php echo $data['foto']; ?>" class="img-fluid img-thumbnail produk-terkait-image" alt="">
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <?php require "footer.php"; ?>

    <script src="bootstrap-5.2.3-dist/js/bootstrap.bundle.min.js"></script>
    <script src="fontawesome-free-6.4.0-web/js/all.min.js"></script>
</body>
</html>