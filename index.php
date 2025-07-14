<?php
ini_set('session.cookie_httponly', 1);
ini_set('session.use_only_cookies', 1);
if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
    ini_set('session.cookie_secure', 1);
}
session_start();

include 'connect.php';


if (isset($_SESSION['userID'])) {
    switch ($_SESSION['type']) {
        case 'admin':
            header('Location: ./admin/indexAdmin.php');
            exit();
        case 'user':
            header('Location: ./user/indexNonAdmin.php');
            exit();
       
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $user = trim($_POST['username']);
    $pass = $_POST['password'];

    $stmt = $con->prepare("SELECT id, username, password, type FROM users WHERE username = ?");
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();

        // ⚠ Plain password comparison — NOT SAFE
        if ($pass === $row['password']) {
            session_regenerate_id(true);
            $_SESSION['LOGGEDIN'] = true;
            $_SESSION['userID'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['type'] = $row['type'];

            switch ($row['type']) {
                case 'admin':
                    header('Location: ./admin/indexAdmin.php');
                    break;
                case 'user':
                    header('Location: ./user/indexNonAdmin.php');
                    break;
          
            }
            exit();
        }
    }

    $error = "Invalid username or password.";
    $stmt->close();
}
$con->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        h1 {

            font-family: "Jockey One", sans-serif;
            margin-left: auto;
            margin-right: auto;


        }

        div .headingweb {
            margin-top: 100px;
        }

        div .loginform {
            max-width: fit-content;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login to Maintenance Job Card Web</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jockey+One&display=swap" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="headingweb">
            <center>
                <div>
                    <img src="logo.jpg" style="height:100px; width:200px" alt="">
                </div>
                <h1>ACL Welfare Society DB</h1>

            </center>
        </div>

        <div class="loginform">
            <form method="POST">

                <div class="mb-3 ">
                    <label for="exampleInputEmail1" class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" id="exampleInputEmail1"
                        aria-describedby="emailHelp" placeholder="Username">

                </div>
                <div class="mb-3 ">
                    <label for="exampleInputPassword1" class="form-label">Password</label>

                    <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                        placeholder="Password">
                </div>


                <button type="submit" class="btn btn-primary" name="login">Login</button>
            </form>
        </div>
    </div>

</body>

</html>