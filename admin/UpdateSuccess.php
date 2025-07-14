<?php
include '../connect.php';
include '../session.php';
include '../log_activity.php';

if (!($_SESSION['type'] == 'admin')) {
    header('location:..\index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jockey+One&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="..\styles\SubmitJobstyle.css">

    <style>
        h1 {
            font-family: "Jockey One", sans-serif;
        }
    </style>
</head>

<body >
    <div class="topbar">
        <h1 class="topbar-text">Welcome <?php echo $_SESSION['username']?> </h1>

        <a href="..\logout.php">
            <h1 class="topbar-logout">Logout &nbsp</h1>
        </a>
        <h1 class="topbar-username"><?php echo $_SESSION['username']?>&nbsp</h1>

    </div>
    <div class="container mt-5 ">
        <div class="mt-5">
            <h1>Data Updated Successfully.</h1>
            
            <button type="back" class="btn btn-danger mt-3" name="back" ><a href="..\admin\indexAdmin.php"
                style="text-decoration:none;color:white">Back to Main</a></button>
        </div>
    </div>



</body>
</body>