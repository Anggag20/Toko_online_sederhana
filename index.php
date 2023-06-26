<?php
    require "koneksi.php";
    $queryProduk = mysqli_query($con, "SELECT id,nama,harga,foto,detail FROM produk LIMIT 5")

    
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mekar Putra | Home</title>
    <link rel="stylesheet" href="bootstrap-5.2.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome-free-6.4.0-web/css/all.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body style="background: linear-gradient(white, rgb(180, 166, 166), white,grey);">
    <?php require "navbar.php"; ?>
        <!-- Banner -->
        <div class="container-fluid banner d-flex align-items-center">
            <div class="container text-center text-white">
                <h1>Selamat datang</h1>
                <h3>Mau Cari Apa?</h3>
                <div class="col-md-8 offset-md-2">
                    <form action="produk.php" method="get">
                        <div class="input-group input-group-lg my-4">
                            <input type="text" class="form-control" placeholder="Nama Barang" aria-label="Recipient's username" aria-describedby="basic-addon2" name="keyword" autocomplete="off">
                            <button type="submit" class="btn warna2 text-white">Cari</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>

        <!-- Highlight Kategori -->
        <div class="container-fluid py-5">
            <div class="container text-center ">
                <h3>Kategori</h3>

                <div class="row mt-5">
                    <div class="col-md-4 mb-3">
                        <div class="highlighted-kategori kategori-baju-pria d-flex justify-content-center align-items-center ">
                            <h4><a href="produk.php?kategori=Baju Pria " class="no-decoration">Baju Pria</a></h4>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="highlighted-kategori kategori-baju-wanita d-flex justify-content-center align-items-center">
                            <h4><a href="produk.php?kategori=Baju Wanita" class="no-decoration">Baju Wanita</a></h4>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="highlighted-kategori rumah d-flex justify-content-center align-items-center">
                            <h4><a href="produk.php?kategori=Rumah" class="no-decoration ">Rumah</a></h4>
                        </div>
                    </div>
                </div>
                
            </div>

            <!-- Tentang Kami -->
            <div class="container-fluid warna1 py-5 ">
                <div class="container text-center">
                    <h3>Tentang Kami</h3>
                    <p class="fs-5 mt-3">Toko kami adalah Toko yang bejalan dibidang Jual beli barang apapun itu. Kenapa kami memberi nama toko MEKAR PUTRA karena ini dikaitkan dengan anggtoa keluarga yang berjumlah 5 orang namun mayoritas berkelamin lakilaki atau 4 orang. <br> Toko kami dikelola oleh keluarga artinya Admin dipegang oleh anggota keluarga. Kami juga menerima untuk penitipan penjualan barang Apapun itu.</p>
                </div>

            </div>

            <!-- produk -->
            <div class="container-fluid py-5">
                <div class="container text-center ">
                    <h3>Produk</h3>

                    <div class="row mt-5 d-flex justify-content-center">
                        <?php while($data = mysqli_fetch_array($queryProduk)) {?>
                            <div class="col-sm-6 col-md-4 mb-3">
                                <div class="card h-100">
                                    <div class="image-box">
                                        <img src="image/<?php echo $data['foto']; ?>" class="card-img-top" alt="...">

                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $data['nama']; ?></h5>
                                        <p class="card-text text-truncate"><?php echo $data['detail']; ?></p>
                                        <p class="cart-text text-harga">Rp. <?php echo $data['harga']; ?></p>
                                        <!--<a href="produk-detail.php?nama= <?php echo $data['nama'];?>" class="btn warna2 ">Detail</a>-->
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        
                    </div>
                    <a class="btn btn-outline-warning mt-3 warna2 text-white" href="produk.php">Selengkapnya</a>
                </div>

            </div>

            <!-- footer -->
            <?php require "footer.php"; ?>

        </div>

    <script src="bootstrap-5.2.3-dist/js/bootstrap.bundle.min.js"></script>
    <script src="fontawesome-free-6.4.0-web/js/all.min.js"></script>
</body>
</html>