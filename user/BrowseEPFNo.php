<?php
include '../connect.php';
include '../session.php';
include '../log_activity.php';

if (!($_SESSION['type'] == 'user')) {
    header('location:..\user\indexNonAdmin.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Started Jobs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jockey+One&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="..\styles\SubmitJobstyle.css">

    <style>
        h1 {
            font-family: "Jockey One", sans-serif;
        }

        th,
        td {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="topbar">
        <h1 class="topbar-text">Welcome Non-Admin User</h1>

        <a href="..\logout.php">
            <h1 class="topbar-logout">Logout &nbsp</h1>
        </a>
        <h1 class="topbar-username"><?php echo $_SESSION['username'] ?>&nbsp</h1>

    </div>
    <div class="container mt-5 ">

        <div class="mt-5">
            <h1>Certified Jobs</h1>
            <form method="post">
                <div><input type="text" class="form-control w-25" style="float:left" name="query"></div>
                <div><button class="btn btn-dark mb-4 mx-3 " type="submit" name="search"
                        style="float:left">Search</button></div>

            </form>
            <table class="table table-hover mt-3">
                <thead>
                    <tr>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">EPF No</th>
                        <th scope="col">Department</th>
                        <th scope="col">Address</th>
                        <th scope="col">NIC</th>
                        <th scope="col">DOB</th>
                        <th scope="col">Marital<br>Status</th>
                        <th scope="col">Mobile</th>
                        <th scope="col">Grants</th>
                        <!-- <th scope="col">Operations</th> -->


                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = '';
                    if (isset($_POST['search'])) {

                        $query = $_POST['query'];

                        $sql = "SELECT * FROM `member_info` 
                WHERE (fname LIKE '%$query%' 
                OR lname LIKE '%$query%' 
                OR epfno LIKE '%$query%'
                OR dept LIKE '%$query%' 
                OR NIC LIKE '%$query%'
                OR raddress LIKE '%$query%'
                OR  mobile LIKE '%$query%') 
                ORDER BY epfno DESC LIMIT 10
                ";



                        /*
                        $result = mysqli_query($con, $sql);
                        $num = mysqli_num_rows($result);
                        $numberPerPages = 3;
                        $totalPages = ceil($num / $numberPerPages);
                        $btn=null;
                        for ($btn = 1; $btn <= $totalPages; $btn++) {
                            //echo $btn;
                            echo "<button class='btn btn-dark mx-1 mb-3'><a href=CertifiedJobsEMUser.php?page=$btn class='text-light'>$btn</a></button>";
                        }
                        if (isset($_GET['page'])) {
                            $page = $_GET['page'];
                           // echo $page;
                        } else {
                            $page = 1;
                        }
                        $startinglimit = (intval($page) - 1) * $numberPerPages;

                        if ($workplace == 'Electrical') {
                            $sql3 = "Select * from `jobdatasheet` where (BDescription like '%$query%' or MachineName like '%$query%' or JobCodeNo like '%$query%' or JobPostingDev like '%$query%' or ReportTo like '%$query%') and JobStatusE='Finished' and Certification='Certified' and (ReportTo='$workplace' or ReportTo='Both') limit $startinglimit,$numberPerPages";
                        } else {
                            $sql3 = "Select * from `jobdatasheet` where (BDescription like '%$query%' or MachineName like '%$query%' or JobCodeNo like '%$query%' or JobPostingDev like '%$query%' or ReportTo like '%$query%') and  JobStatusM='Finished' and Certification='Certified' and (ReportTo='$workplace' or ReportTo='Both') limit $startinglimit,$numberPerPages";
                        }
                            */
                        $result = mysqli_query($con, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                            $id = $row['id'];
                            $fname = $row['fname'];
                            $lname = $row['lname'];
                            $namewinitials = $row['namewinitials'];
                            $epfno = $row['epfno'];
                            $dept = $row['dept'];
                            $raddress = $row['raddress'];
                            $nic = $row['nic'];
                            $dob = $row['dob'];
                            $marital = $row['marital'];
                            $mobile = $row['mobile'];

                            echo
                            "


     <tr class='clickable-row' data-href='..\user\ShowRecord.php?updateid=$id'>
        
        <td>$fname</td>
        <td>$lname</td>
        <td>$epfno</td>
        <td>$dept</td>
        <td>$raddress</td>
        <td>$nic</td>
        <td>$dob</td>
        <td>$marital</td>
             <td>$mobile</td>   
          
      </tr>
      
      ";
                        }
                    }


                    ?>
                </tbody>
            </table>
            <button type="back" class="btn btn-danger mt-3" name="back"><a
                    href="..\user\indexNonAdmin.php" style="text-decoration:none;color:white">Back to
                    Main</a></button>
        </div>
    </div>


    <script>
        jQuery(document).ready(function($) {
            $(".clickable-row").click(function() {
                window.location = $(this).data("href");
            });
        });
    </script>
</body>