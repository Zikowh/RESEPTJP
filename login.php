<?php
session_start();
include 'koneksi.php';
$_SESSION['status'] = 0;

if (isset($_POST["submit"])) {
  $username = $_POST['username'];
  $password = $_POST['password'];



  $data = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password'");

  $baris = mysqli_num_rows($data);

  if ($baris > 0) {
    $_SESSION['status'] = 1;
    //header("location: index.php");
  } else {
    echo "<script type='text/javascript'>alert('login anda gagal, silahkan login lagi!!!');</script>";
    $_SESSION['status'] = 0;
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
        
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap');

* {
    margin: 0;
    border: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Poppins", sans-serif;

}

body {
    background: linear-gradient(45deg, red, black, blue);
    background-size: 500% 500%;
    -webkit-animation: Gradient 15s ease infinite;
    -moz-animation: Gradient 15s ease infinite;
    animation: Gradient 15s ease infinite;
    min-height: 100vh;
    min-width: 100vw;
    display: flex;
    align-items: center;
    justify-content: center;
}

@-webkit-keyframes Gradient {
    0% {
        background-position: 0% 50%
    }

    50% {
        background-position: 100% 50%
    }

    100% {
        background-position: 0% 50%
    }
}

@-moz-keyframes Gradient {
    0% {
        background-position: 0% 50%
    }

    50% {
        background-position: 100% 50%
    }

    100% {
        background-position: 0% 50%
    }
}

@keyframes Gradient {
    0% {
        background-position: 0% 50%
    }

    50% {
        background-position: 100% 50%
    }

    100% {
        background-position: 0% 50%
    }
}

.container {
    width: 400px;
    min-height: 400px;
    background: #FFF;
    border-radius: 5px;
    box-shadow: 0 0 5px rgba(0, 0, 0, .3);
    padding: 40px 30px;
    animation: bouncedown 3s ease 1 forwards;
}

/* form animation start */
@keyframes bouncedown {
    0% {
        opacity: 0;
        transform: translateY(-2000px);
    }

    60% {
        opacity: 1;
        transform: translateY(30px);
    }

    80% {
        transform: translateY(-10px);
    }

    100% {
        transform: translateY(0);
    }
}

/* form animation end */

.container .login-text {
    color: #111;
    font-weight: 500;
    font-size: 1.1rem;
    text-align: center;
    margin-bottom: 20px;
    display: block;
    text-transform: capitalize;
}

.container:hover .login-text:hover {
    animation: rubberBand 2s ease reverse;
}

/*rubberband*/
@keyframes rubberBand {
    from {
        transform: scale3d(1, 1, 1);
    }

    30% {
        transform: scale3d(1.25, 0.75, 1);
    }

    40% {
        transform: scale3d(0.75, 1.25, 1);
    }

    50% {
        transform: scale3d(1.15, 0.85, 1);
    }

    65% {
        transform: scale3d(.95, 1.05, 1);
    }

    75% {
        transform: scale3d(1.05, .95, 1);
    }

    to {
        transform: scale3d(1, 1, 1);
    }
}

.rubberBand {
    -webkit-animation-name: rubberBand;
    animation-name: rubberBand;
}

/*rubberband*/

.container .login-email .input-group {
    width: 100%;
    height: 50px;
    margin-bottom: 25px;
}

.container .login-email .input-group input {
    width: 100%;
    height: 100%;
    border: 2px solid #e7e7e7;
    padding: 15px 20px;
    font-size: 1rem;
    border-radius: 30px;
    background: transparent;
    outline: none;
    transition: .3s;
}

.container .login-email .input-group input:focus,
.container .login-email .input-group input:valid {
    border-color: #a29bfe;
}

.container .login-email .input-group .btn {
    display: block;
    width: 100%;
    padding: 15px 20px;
    text-align: center;
    border: none;
    background: #a29bfe;
    outline: none;
    border-radius: 30px;
    font-size: 1.2rem;
    color: #FFF;
    cursor: pointer;
    transition: .3s;
}

.container .login-email .input-group .btn:hover {
    transform: translateY(-5px);
    background: #6c5ce7;
}

.login-register-text {
    color: #111;
    font-weight: 600;
}

.login-register-text a {
    text-decoration: none;
    color: #6c5ce7;
}

.container-logout {
    width: 500px;
    min-height: 200px;
    background: #FFF;
    border-radius: 5px;
    box-shadow: 0 0 5px rgba(0, 0, 0, .3);
    padding: 40px 30px;
}

.container-logout .login-email .input-group .btn {
    display: block;
    width: 100%;
    padding: 15px 20px;
    text-align: center;
    border: none;
    background: #a29bfe;
    outline: none;
    border-radius: 30px;
    font-size: 1.2rem;
    color: #FFF;
    cursor: pointer;
    transition: .3s;
    margin-top: 20px;
}

.container-logout .login-email .input-group .btn:hover {
    transform: translateY(-5px);
    background: #6c5ce7;
}

@media (max-width: 430px) {
    .container {
        width: 300px;
    }
}
</style>
</head>
<html>
    <head>
    <title>jualbelisparepart/login/</title>
     <!-- Favicon-->
     <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="style.css" />
    </head>
<body>
    <div class="container">
    <!-- membuat form -->
        <form action="cek_login.php" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
            <div class="input-group">
                <input type="text" placeholder="Username" name="username" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Password" name="password" required>
            </div>
            <div class="input-group">
                <button name="submit" class="btn">Login</button>
            </div>
            <p class="login-register-text">Anda belum punya akun? <a href="register.php">Register</a></p>
        </form>
    </div>
</body>
</html>