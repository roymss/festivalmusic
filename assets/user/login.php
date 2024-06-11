<?php

session_start();

require '../../inc/function.php';

$err = "";
$username = "";
$ingataku = "";

if(isset($_COOKIE['cookie_username'])){
    $cookie_username = $_COOKIE['cookie_username'];
    $cookie_password = $_COOKIE['cookie_password'];

    $query = "SELECT * FROM user WHERE username = '$cookie_username'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    if($row['password'] == $cookie_password){
        $_SESSION['session_username'] = $cookie_username;
        $_SESSION['session_password'] = $cookie_password;
    }
}

if(isset($_SESSION['session_username'])){
    header("Location: ../../adminpanel/adminpanel.php");
    exit();
}

if(isset($_POST["login"])){
    $username = $_POST["username"];
    $password = $_POST["password"];
    $ingataku = $_POST["ingataku"];

    if($username == '' or $password == ''){
        $err .= "<li>Silahkan masukan username dan juga password</li>";
    } else {
        $query = "SELECT * FROM user WHERE username = '$username'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);

        if($row['username'] == ''){
            $err .= "<li>Username <b>$username</b> tidak tersedia.</li>";
        } elseif($row['password'] != md5($password)) {
            $err .= "<li>Password yang dimasukan tidak sesuai</li>";
        }

        if(empty($err)){
            $_SESSION['session_username'] = $username;
            $_SESSION['session_password'] = md5($password);

            if($ingataku == 1){

                $cookie_name = "cookie_username";
                $cookie_value = $username;
                $cookie_time = time() + (60 * 60 * 24 * 30);

                setcookie($cookie_name, $cookie_value, $cookie_time, "/");

                $cookie_name = "cookie_password";
                $cookie_value = md5($password);
                $cookie_time = time() + (60 * 60 * 24 * 30);

                setcookie($cookie_name, $cookie_value, $cookie_time, "/");


            }

            header("Location: ../../adminpanel/adminpanel.php");
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Login</title>
</head>



<body class="d-flex w-100 vh-100 align-items-center py-4 bg-body-tertiary">

    <div class="container">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-lg-4 border rounded-1 p-3">
                <main class="form-signin w-100 m-auto">
                    <?php if($err){ ?>

                        <div id="login-alert" class="alert alert-danger col-sm-12">
                            <ul><?= $err; ?></ul>
                        </div>
                        
                    <?php } ?>
                    <form action="" method="post">
                        <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

                        <div class="form-floating">
                            <input type="text" class="form-control" placeholder="name@example.com" name="username">
                            <label>Username</label>
                        </div>
                        <div class="form-floating mt-2">
                            <input type="password" class="form-control" placeholder="Password" name="password" >
                            <label>Password</label>
                        </div>

                        <div class="form-check text-start my-3">
                            <input name="ingataku" class="form-check-input" type="checkbox" value="1">
                            <label class="form-check-label">
                                Remember me
                            </label>
                        </div>
                        <button class="btn btn-danger w-100 py-2 mt-2" type="submit" name="login">Sign in</button>
                        <p class="mt-5 mb-3 text-body-secondary text-center">© 2017–2024</p>
                    </form>
                </main>
            </div>
        </div>
    </div>






    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>