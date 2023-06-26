<?php
    $con = mysqli_connect("localhost", "root","", "market_place");

    //cek connect
    if (mysqli_connect_errno()){
        echo "gagal konek ke MySQL: ". mysqli_connect_error();
        exit();
    }
?>