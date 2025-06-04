<?php
include '../connect.php';
include '../session.php';

if (!($_SESSION['type'] == 'admin')) {
    header('location:..\index.php');
}


$idu = $_GET['updateid'];

$sql = "Select * from member_info where id='$idu'";

$result = mysqli_query($con, $sql);

$row = mysqli_fetch_assoc($result);

$id = $row['id'];
$fname = $row['fname'];
$lname = $row['lname'];
$namewinitials = $row['namewinitials'];
$epfno = $row['epfno'];
$dept = $row['dept'];
$raddress = $row['raddress'];
$nic = $row['nic'];
$dob = $row['dob'];
$mobile = $row['mobile'];
$applicant1 = $row['applicant1'];
$relation1 = $row['relation1'];
$applicant2 = $row['applicant2'];
$relation2 = $row['relation2'];
$applicant3 = $row['applicant3'];
$relation3 = $row['relation3'];
$applicant4 = $row['applicant4'];
$relation4 = $row['relation4'];
$applicant5 = $row['applicant5'];
$relation5 = $row['relation5'];
$applicant6 = $row['applicant6'];
$relation6 = $row['relation6'];
$applicant7 = $row['applicant7'];
$relation7 = $row['relation7'];
$applicant8 = $row['applicant8'];
$relation8 = $row['relation8'];
$applicant9 = $row['applicant9'];
$relation9 = $row['relation9'];
$applicant10 = $row['applicant10'];
$relation10 = $row['relation10'];

// $gen = explode(",",$gender);
// $lang = explode(",",$datas);
// $pl = explode(",",$place);

//echo  $BriefDescription;



// update operation
// if (isset($_POST['finish'])) {
//     $workplace=$_SESSION['workplace'];
// $finishcomment=$_POST['finishcomment'];
//     $_SESSION['FinishJob'] = true;
//     if ($workplace=='Electrical')
//     {
//         $insert = "update jobdatasheet set JobStatusE='Finished',FinishedCommentE='$finishcomment' where id='$id'";
//     }
//     elseif($workplace=='Mechanical')
//     {
//         $insert = "update jobdatasheet set JobStatusM='Finished',FinishedCommentM='$finishcomment' where id='$id'";
//     }

//     //$insert = "update jobdatasheet set JobStatusM='Finished' where id='$id'";

//     if ($con->query($insert) == TRUE) {
//         //$_SESSION['SubmitJobSucess']=true;
//         //echo "Sucessfully Started Job";

//         header('location:.\FinishedJobSuccesEMUser.php');

//     } else {

//         echo mysqli_error($con);
//         //  header('location:location:..\PUser\indexPUser.php');
//     }
//     //$insert->close();
// }






// delete operation
if (isset($_POST['delete'])) {

    $sql = "delete  from `member_info` where id='$idu'";
    $result = mysqli_query($con, $sql);
    $_SESSION['DeleteJobSucess'] = true;
    header('location:..\admin\DeleteSuccess.php');
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

        #inside {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
    </style>
</head>

<body onload="divSelect()">
    <div class="topbar">
        <h1 class="topbar-text">Welcome <?php echo $_SESSION['username'] ?> User</h1>

        <a href="..\logout.php">
            <h1 class="topbar-logout">Logout &nbsp</h1>
        </a>
        <h1 class="topbar-username"><?php echo $_SESSION['username'] ?>&nbsp</h1>

    </div>
    <div class="container mt-5 ">
        <h1>View EPF Record </h1>
        <div class="mt-3 mb-5">
            <form method="POST">
                <table class="table table-striped w-50">
                    <tr>
                        <!-- Table row -->
                    <tr>
                        <td>
                            First Name
                        </td>
                        <td>
                            <?php echo $fname; ?>
                        </td>
                    </tr>
                    <!-- Table row -->
                    <tr>
                        <td>
                            Last Name
                        </td>
                        <td>
                            <?php echo $lname; ?>
                        </td>
                    </tr>
                    <!-- Table row -->
                    <tr>
                        <td>
                            Name with Initials
                        </td>
                        <td>
                            <?php echo $namewinitials; ?>
                        </td>
                    </tr>
                    <!-- Table row -->
                    <tr>
                        <td>
                            EPF No
                        </td>
                        <td>
                            <?php echo $epfno; ?>
                        </td>
                    </tr>
                    <!-- Table row -->
                    <tr>
                        <td>
                            Department
                        </td>
                        <td>
                            <?php echo $dept; ?>
                        </td>
                    </tr>
                    <!-- Table row -->
                    <tr>
                        <td>
                            Address
                        </td>
                        <td>
                            <?php echo $raddress; ?>
                        </td>
                    </tr>
                    <!-- Table row -->
                    <tr>
                        <td>
                            NIC
                        </td>
                        <td>
                            <?php echo $nic; ?>
                        </td>
                    </tr>
                    <!-- Table row -->
                    <tr>
                        <td>
                            Date of Birth
                        </td>
                        <td>
                            <?php echo $dob; ?>
                        </td>
                    </tr>
                    <!-- Table row -->
                    <tr>
                        <td>
                            Mobile
                        </td>
                        <td>
                            <?php echo $mobile; ?>
                        </td>
                    </tr>
                    <!-- Table row -->
                    <tr>
                        <td>
                            Death grant Applicants<br> according to Welfare<br> constitution
                        </td>
                        <td>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Relation</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    for ($i = 1; $i <= 10; $i++) {
                                        $applicant = ${"applicant$i"};
                                        $relation = ${"relation$i"};
                                        if (!empty($applicant) || !empty($relation)) {
                                            echo "<tr><td>$applicant</td><td>$relation</td></tr>";
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </td>
                    </tr>


                </table>


                <!-- <button type="submit" class="btn btn-success mt-3" name="finish"
                    onclick="return confirm('Are you sure?')">Finish & send for Approval</button> -->
                <!-- <button type="submit" class="btn btn-warning mt-3" name="delete"
            onclick="return confirm('Are you sure?')">Transfer</button> -->
               
       <button type="submit" class="btn btn-success mt-3 mx-2"><a href="..\admin\indexAdmin.php" style="text-decoration:none;color:black">Edit Record</button>
       <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-warning mt-3 mx-2" name="delete">Delete Record</button>
       <button type="button" class="btn btn-info mt-3 mx-2"><a href="..\admin\BrowseEPFNo.php" style="text-decoration:none;color:black">Back to Search</a></button>
        <button type="back" class="btn btn-danger mt-3 mx-2" name="back"><a href="..\admin\indexAdmin.php" style="text-decoration:none;color:white">Back to Main</a></button>
            </form>
        </div>
    </div>




</body>
</body>