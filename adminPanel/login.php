<?php
    session_start();
    require "../koneksi.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="../bootstrap-5.2.3-dist/css/bootstrap.min.css">
</head>
<style>
    .main{
        height: 100vh;
    }

    .login-box{
        width: 500px;
        height: 350px;
        box-sizing: border-box;
        border-radius: 10px;
        background-color: white;
    }
    .bglogin{
    background-color: gray;
    }
    @media (max-width: 576px) {
        .login-box{
            width: 350px;
            height: 350px;
            box-sizing: border-box;
            border-radius: 10px;
            background-color: white;
        }
    
    }
    @media (max-width: 333px) {
        .login-box{
            width: 200px;
            height: 400px;
            box-sizing: border-box;
            border-radius: 10px;
            background-color: white;
        }
    
    }
</style>
<body class="bglogin">
    <div class="main d-flex flex-column justify-content-center align-items-center">
        <div class="login-box p-5 shadow">
            <h2 class="text-center">Masukan Akun</h2>
            <form action="" method="post">
                <div>
                    <label for="username">username</label>
                    <input type="text" class="form-control" name="username" id="username">
                </div>
                <div>
                    <label for="password">password</label>
                    <input type="password" class="form-control" name="password" id="password">
                </div>
                <div>
                    <button class="btn btn-success form-control mt-3" type="submit" name="loginbtn">login</button>
                </div>
                <div>
                    <button class="btn btn-success form-control mt-3"><a href="../index.php" style="text-decoration: none" class="text-white" >Kembali Ke Beranda</a></button>
                </div>
            </form>
        </div>

        <div class="mt-3" style="width:500px">
            <?php
                if(isset($_POST['loginbtn'])){
                    $username = htmlspecialchars($_POST['username']);
                    $password = htmlspecialchars($_POST['password']);

                    $query = mysqli_query($con, "SELECT * FROM users WHERE username='$username'");
                    $countdata = mysqli_num_rows($query);
                    $data = mysqli_fetch_array($query);
                    
                    if($countdata>0){
                        if ($password==$data['password']) {
                            
                            $_SESSION['username'] = $data['username'];
                            $_SESSION['login'] = true;
                            header('location:../adminPanel/index.php');
                        }else{
                            ?>
                            <div class="alert alert-warning" role="alert">
                            Akun tidak tersedia
                            </div>
                            <?php
                        }

                    }else{
                        ?>
                        <div class="alert alert-warning" role="alert">
                            Akun tidak tersedia
                        </div>
                        <?php
                    }

                }

            ?>
        </div>
    </div>
</body>
</html>