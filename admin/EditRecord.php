<?php
include '../connect.php';
include '../session.php';
date_default_timezone_set('Asia/Colombo');
$date = date("Y-m-d G:i:s");
if (!($_SESSION['type'] == 'admin')) {
    header('location:..\index.php');
}
//
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
if (isset($_POST['update'])) {

    $JobType = $_POST['JobType'];
    //$JobCodeNo = $_POST['JobCodeNo'];
    $JobIssuingDivision = $_POST['JobIssuingDivision'];
    $MachineName = $_POST['MachineName'];
    $priority = $_POST['priority'];
    $ReportTo = $_POST['ReportTo'];
    $BriefDescription = $_POST['BriefDescription'];
    $username = $_SESSION['username'];
    if ($JobType == "JobOrder") {
        $JobCodeNo = "JO" . (substr($JobCodeNo, 2));
    }
    if ($JobType == "WorkOrder") {
        $JobCodeNo = "WO" . (substr($JobCodeNo, 2));
    }
    $_SESSION['UpdateJobSucess'] = true;
    if ($ReportTo == 'Electrical') {
        $insert = "update jobdatasheet set JobCodeNo='$JobCodeNo',JobPostingDateTime='$date',JobPostingDev='$JobIssuingDivision',MachineName='$MachineName',Priority='$priority',ReportTo='$ReportTo',BDescription='$BriefDescription',Username='$username',JobStatusE='Pending',JobStatusM='NA' where id='$idu'";
    } elseif ($ReportTo == 'Mechanical') {
        $insert = "update jobdatasheet set JobCodeNo='$JobCodeNo',JobPostingDateTime='$date',JobPostingDev='$JobIssuingDivision',MachineName='$MachineName',Priority='$priority',ReportTo='$ReportTo',BDescription='$BriefDescription',Username='$username',JobStatusE='NA',JobStatusM='Pending' where id='$idu'";
    } else {
        $insert = "update jobdatasheet set JobCodeNo='$JobCodeNo',JobPostingDateTime='$date',JobPostingDev='$JobIssuingDivision',MachineName='$MachineName',Priority='$priority',ReportTo='$ReportTo',BDescription='$BriefDescription',Username='$username',JobStatusM='Pending',JobStatusE='Pending' where id='$idu'";
    }


    if ($con->query($insert) == TRUE) {
        //$_SESSION['SubmitJobSucess']=true;
        //echo "Sucessfully updated data";

        header('location:.\UpdateJobSuccess.php');
    } else {

        echo mysqli_error($con);
        //  header('location:location:..\PUser\indexPUser.php');
    }
    //$insert->close();
}




// delete operation
if (isset($_POST['delete'])) {

    $sql = "delete  from `jobdatasheet` where id='$idu'";
    $result = mysqli_query($con, $sql);
    $_SESSION['DeleteJobSucess'] = true;
    header('location:.\DeleteJobSuccess.php');
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

<body onload="divSelect()">
    <div class="topbar">
        <h1 class="topbar-text">Welcome <?php echo $_SESSION['workplace'] ?> User</h1>

        <a href="..\logout.php">
            <h1 class="topbar-logout">Logout &nbsp</h1>
        </a>
        <h1 class="topbar-username"><?php echo $_SESSION['username'] ?>&nbsp</h1>

    </div>
    <div class="container mt-5 ">
        <h1> Update or Delete Job </h1>
        <div class="mt-3">
            <form method="POST">
                <table>
                    <div class="form-group">
                        <!-- Row of input fields -->
                        <tr>
                            <td class="py-3">
                                <label for="exampleInputEmail1">First Name</label>
                            </td>
                            <td class="px-3">
                                <input type="text" class="form-control" name="fname" id="exampleInputEmail1" placeholder="First Name" value="">
                            </td>
                        </tr>
                        <!-- Row of input fields -->
                        <tr>
                            <td class="py-3">
                                <label for="exampleInputEmail1">Last Name</label>
                            </td>
                            <td class="px-3">
                                <input type="text" class="form-control" name="lname" id="exampleInputEmail1" placeholder="Last Name">
                            </td>
                        </tr>
                        <!-- Row of input fields -->
                        <tr>
                            <td class="py-3">
                                <label for="exampleInputEmail1">Name with Initials</label>
                            </td>
                            <td class="px-3">
                                <input type="text" class="form-control" name="namewinitials" id="exampleInputEmail1" placeholder="Name with Initials">
                            </td>
                        </tr>
                        <!-- Row of input fields -->
                        <tr>
                            <td class="py-3">
                                <label for="exampleInputEmail1">EPF No</label>
                            </td>
                            <td class="px-3">
                                <input type="text" class="form-control px-2" name="epfno" id="exampleInputEmail1" placeholder="EPF No">
                            </td>
                        </tr>
                        <!-- Row of input fields -->
                        <tr>
                            <td class="py-3">
                                <label for="exampleInputEmail1">Working Department</label>
                            </td>
                            <td class="px-3">
                                <select id="Departments" class="form-control" name="dept">
                                    <option value="ACF">ACF</option>

                                    <option value="CCF">CCF</option>
                                    <option value="DRF">DRF</option>
                                    <option value="FCF">FCF</option>
                                    <option value="Electrical">Electrical</option>
                                    <option value="Maintenance">Maintenance</option>
                                    <option value="Rodmill">Rodmill</option>
                                    <option value="Ceylon Copper">Ceylon Copper</option>
                                    <option value="Accounts and Stores">Accounts and Stores</option>
                                    <option value="GM Office">GM Office</option>
                                    <option value="IT">IT</option>
                                    <option value="Die shop">Die shop</option>
                                    <option value="Civil">Civil</option>
                                    <option value="Logistics">Logistics</option>
                                    <option value="Drum Yard">Drum Yard</option>
                                    <option value="HR">HR</option>
                                    <option value="TSD">TSD</option>
                                    <option value="QAD">QAD</option>

                                </select>
                            </td>
                        </tr>
                        <!-- Row of input fields -->
                        <tr>
                            <td class="py-3">
                                <label for="Residence Address">Residence Address</label>
                            </td>
                            <td class="px-3" style="width: 500px;">
                                <input type="text" class="form-control px-2 w-100" name="raddress" id="exampleInputEmail1" placeholder="Residence Address">
                            </td>
                        </tr>
                        <!-- Row of input fields -->
                        <tr>
                            <td class="py-3">
                                <label for="NIC No">NIC No</label>
                            </td>
                            <td class="px-3" style="width: 500px;">
                                <input type="text" class="form-control px-2 w-100" name="nic" id="NIC No" placeholder="NIC No">
                            </td>
                        </tr>
                        <!-- Row of input fields -->
                        <tr>
                            <td class="py-3">
                                <label for="Date of Birth">Date of Birth</label>
                            </td>
                            <td class="px-3" style="width: 500px;">
                                <input type="date" class="form-control px-2 w-100" name="dob" id="Date of Birth" placeholder="Date of Birth">
                            </td>
                        </tr>
                        <!-- Row of input fields -->
                        <tr>
                            <td class="py-3">
                                <label for="Mobile Phone">Mobile Phone</label>
                            </td>
                            <td class="px-3" style="width: 500px;">
                                <input class="form-control" type="text" id="phone" name="mobile" placeholder="123-4567890" pattern="[0-9]{3}-[0-9]{7}">
                            </td>
                        </tr>
                        <!-- Row of input fields -->
                        <tr>
                            <td class="py-3">
                                <label for="Mobile Phone">Death grant Applicants<br> according to Welfare<br> constitution</label>
                            </td>
                            <td class="px-3" style="width: 500px;">
                                <table>
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        Relation
                                    </th>
                                    <!-- <tr>
                                        <td>
                                            <label for="Name of Applicant">Name of Applicant</label>
                                        </td>
                                        <td>
                                            <label for="Relation to Member">Relation to Member</label>
                                        </td>
                                    </tr> -->
                                    <!-- Row of Table -->
                                    <tr>
                                        <td>
                                            <input autocomplete="off" class="form-control" type="text" id="NameOftheApplicant1" name="applicant1" placeholder="Name of the Applicant 1">
                                        </td>
                                        <td>
                                            <select id="Relation1" class="form-control" name="relation1">
                                                <option value=""></option>
                                                <option value="Father">Father</option>
                                                <option value="Mother">Mother</option>
                                                <option value="Wife">Wife</option>
                                                <option value="Son">Son</option>
                                                <option value="Daughter">Daughter</option>
                                                <option value="Father-in-law">Father-in-law</option>
                                                <option value="Mother-in-law">Mother-in-law</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <!-- Row of Table -->
                                    <tr>
                                        <td>
                                            <input autocomplete="off" class="form-control" type="text" id="NameOftheApplicant2" name="applicant2" placeholder="Name of the Applicant 2">
                                        </td>
                                        <td>
                                            <select id="Relation1" class="form-control" name="relation2">
                                                <option value=""></option>
                                                <option value="Father">Father</option>
                                                <option value="Mother">Mother</option>
                                                <option value="Wife">Wife</option>
                                                <option value="Son">Son</option>
                                                <option value="Daughter">Daughter</option>
                                                <option value="Father-in-law">Father-in-law</option>
                                                <option value="Mother-in-law">Mother-in-law</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <!-- Row of Table -->
                                    <tr>
                                        <td>
                                            <input autocomplete="off" class="form-control" type="text" id="NameOftheApplicant3" name="applicant3" placeholder="Name of the Applicant 3">
                                        </td>
                                        <td>
                                            <select id="Relation1" class="form-control" name="relation3">
                                                <option value=""></option>
                                                <option value="Father">Father</option>
                                                <option value="Mother">Mother</option>
                                                <option value="Wife">Wife</option>
                                                <option value="Son">Son</option>
                                                <option value="Daughter">Daughter</option>
                                                <option value="Father-in-law">Father-in-law</option>
                                                <option value="Mother-in-law">Mother-in-law</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <!-- Row of Table -->
                                    <tr>
                                        <td>
                                            <input autocomplete="off" class="form-control" type="text" id="NameOftheApplicant4" name="applicant4" placeholder="Name of the Applicant 4">
                                        </td>
                                        <td>
                                            <select id="Relation1" class="form-control" name="relation4">
                                                <option value=""></option>
                                                <option value="Father">Father</option>
                                                <option value="Mother">Mother</option>
                                                <option value="Wife">Wife</option>
                                                <option value="Son">Son</option>
                                                <option value="Daughter">Daughter</option>
                                                <option value="Father-in-law">Father-in-law</option>
                                                <option value="Mother-in-law">Mother-in-law</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <!-- Row of Table -->
                                    <tr>
                                        <td>
                                            <input autocomplete="off" class="form-control" type="text" id="NameOftheApplicant5" name="applicant5" placeholder="Name of the Applicant 5">
                                        </td>
                                        <td>
                                            <select id="Relation1" class="form-control" name="relation5">
                                                <option value=""></option>
                                                <option value="Father">Father</option>
                                                <option value="Mother">Mother</option>
                                                <option value="Wife">Wife</option>
                                                <option value="Son">Son</option>
                                                <option value="Daughter">Daughter</option>
                                                <option value="Father-in-law">Father-in-law</option>
                                                <option value="Mother-in-law">Mother-in-law</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <!-- Row of Table -->
                                    <tr>
                                        <td>
                                            <input autocomplete="off" class="form-control" type="text" id="NameOftheApplicant6" name="applicant6" placeholder="Name of the Applicant 6">
                                        </td>
                                        <td>
                                            <select id="Relation1" class="form-control" name="relation6">
                                                <option value=""></option>
                                                <option value="Father">Father</option>
                                                <option value="Mother">Mother</option>
                                                <option value="Wife">Wife</option>
                                                <option value="Son">Son</option>
                                                <option value="Daughter">Daughter</option>
                                                <option value="Father-in-law">Father-in-law</option>
                                                <option value="Mother-in-law">Mother-in-law</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <!-- Row of Table -->
                                    <tr>
                                        <td>
                                            <input autocomplete="off" class="form-control" type="text" id="NameOftheApplicant7" name="applicant7" placeholder="Name of the Applicant 7">
                                        </td>
                                        <td>
                                            <select id="Relation1" class="form-control" name="relation7">
                                                <option value=""></option>
                                                <option value="Father">Father</option>
                                                <option value="Mother">Mother</option>
                                                <option value="Wife">Wife</option>
                                                <option value="Son">Son</option>
                                                <option value="Daughter">Daughter</option>
                                                <option value="Father-in-law">Father-in-law</option>
                                                <option value="Mother-in-law">Mother-in-law</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <!-- Row of Table -->
                                    <tr>
                                        <td>
                                            <input autocomplete="off" class="form-control" type="text" id="NameOftheApplicant8" name="applicant8" placeholder="Name of the Applicant 8">
                                        </td>
                                        <td>
                                            <select id="Relation1" class="form-control" name="relation8">
                                                <option value=""></option>
                                                <option value="Father">Father</option>
                                                <option value="Mother">Mother</option>
                                                <option value="Wife">Wife</option>
                                                <option value="Son">Son</option>
                                                <option value="Daughter">Daughter</option>
                                                <option value="Father-in-law">Father-in-law</option>
                                                <option value="Mother-in-law">Mother-in-law</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <!-- Row of Table -->
                                    <tr>
                                        <td>
                                            <input autocomplete="off" class="form-control" type="text" id="NameOftheApplicant9" name="applicant9" placeholder="Name of the Applicant 9">
                                        </td>
                                        <td>
                                            <select id="Relation1" class="form-control" name="relation9">
                                                <option value=""></option>
                                                <option value="Father">Father</option>
                                                <option value="Mother">Mother</option>
                                                <option value="Wife">Wife</option>
                                                <option value="Son">Son</option>
                                                <option value="Daughter">Daughter</option>
                                                <option value="Father-in-law">Father-in-law</option>
                                                <option value="Mother-in-law">Mother-in-law</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <!-- Row of Table -->
                                    <tr>
                                        <td>
                                            <input autocomplete="off" class="form-control" type="text" id="NameOftheApplicant10" name="applicant10" placeholder="Name of the Applicant 10">
                                        </td>
                                        <td>
                                            <select id="Relation10" class="form-control" name="relation10">
                                                <option value=""></option>
                                                <option value="Father">Father</option>
                                                <option value="Mother">Mother</option>
                                                <option value="Wife">Wife</option>
                                                <option value="Son">Son</option>
                                                <option value="Daughter">Daughter</option>
                                                <option value="Father-in-law">Father-in-law</option>
                                                <option value="Mother-in-law">Mother-in-law</option>
                                            </select>
                                        </td>
                                    </tr>

                                </table>
                                <table>
                                    <div class="form-group">
                                        <tr>

                                            <td style="width:200px;padding:5px">
                                                <label class="pr-3">Job Type</label>
                                            </td>
                                            <td style="width:500px;padding:5px">
                                                <select name="JobType" id="JobType" class="form-select" onchange="updateTextbox()" required>

                                                    <option value="JobOrder" <?php if ((substr($JobCodeNo, 0, 2)) == "JO") {
                                                                                    echo "selected";
                                                                                } ?>>Job Order</option>
                                                    <option value="WorkOrder" <?php if ((substr($JobCodeNo, 0, 2)) == "WO") {
                                                                                    echo "selected";
                                                                                } ?>>Work Order</option>

                                            </td>

                                        </tr>
                                        <!-- Row of input fields -->
                                        <tr>

                                            <td style="width:200px;padding:5px">
                                                <label class="pr-3">Job code No</label>
                                            </td>
                                            <td style="width:500px;padding:5px">
                                                <input type="text" name="JobCodeNo" class="form-control" id="JobCodeNo"
                                                    value="<?php echo $JobCodeNo; ?>" readonly required>
                                            </td>

                                        </tr>

                                        <!-- Row of input fields -->
                                        <tr>

                                            <td style="width:200px;padding:5px">
                                                <label class="pr-3">Job Issuing Division</label>
                                            </td>
                                            <td style="width:500px;padding:5px">
                                                <select name="JobIssuingDivision" id="dept" onchange='divSelect()' class="form-select"
                                                    required>

                                                    <?php if ($_SESSION['workplace'] == "ACF") {
                                                        echo "<option value='ACF'>ACF</option>";
                                                    }
                                                    if ($_SESSION['workplace'] == "CCF") {
                                                        echo "<option value='CCF'>CCF</option>";
                                                    }
                                                    if ($_SESSION['workplace'] == "DR") {
                                                        echo "<option value='DR'>DR</option>";
                                                    }
                                                    if ($_SESSION['workplace'] == "Flexible") {
                                                        echo "<option value='Flexible'>Flexible</option>";
                                                    }
                                                    if ($_SESSION['workplace'] == "Aluminium Rodmill") {
                                                        echo "<option value='Aluminium Rodmill'>Aluminium Rodmill</option>";
                                                    }
                                                    if ($_SESSION['workplace'] == "Ceylon Copper") {
                                                        echo "<option value='Ceylon Copper'>Ceylon Copper</option>";
                                                    }
                                                    if ($_SESSION['workplace'] == "Bail Room") {
                                                        echo "<option value='Bail Room'>Bail Room</option>";
                                                    }
                                                    if ($_SESSION['workplace'] == "Drum Yard") {
                                                        echo "<option value='Drum Yard'>Drum Yard</option>";
                                                    }
                                                    if ($_SESSION['workplace'] == "Carpentry") {
                                                        echo "<option value='Carpentry'>Carpentry</option>";
                                                    }
                                                    ?>
                                                    <!-- <option value="ACF" <?php if ($JobIssuingDivision == "ACF") {
                                                                                    echo "selected";
                                                                                } ?>>ACF</option>>ACF</option>
                                    <option value="CCF" <?php if ($JobIssuingDivision == "CCF") {
                                                            echo "selected";
                                                        } ?>>CCF</option>
                                    <option value="DR" <?php if ($JobIssuingDivision == "DR") {
                                                            echo "selected";
                                                        } ?>>DR</option>
                                    <option value="Flexible" <?php if ($JobIssuingDivision == "Flexible") {
                                                                    echo "selected";
                                                                } ?>>Flexible</option>
                                    <option value="Aluminium Rodmill" <?php if ($JobIssuingDivision == "Aluminium Rodmill") {
                                                                            echo "selected";
                                                                        } ?>>Aluminium Rodmill</option>
                                    <option value="Ceylon Copper" <?php if ($JobIssuingDivision == "Ceylon Copper") {
                                                                        echo "selected";
                                                                    } ?>>Ceylon Copper</option> -->
                                                </select>
                                            </td>
                                        </tr>
                                        <!-- Row of input fields -->
                                        <tr>
                                            <?php echo $MachineName; ?>
                                            <td style="width:200px;padding:5px">
                                                <label class="pr-3">Name of the Machine</label>
                                            </td>
                                            <td style="width:500px;padding:5px">

                                                <select id='division' class="form-select" name="MachineName" required>
                                                    <?php
                                                    $workplace = $_SESSION['workplace'];
                                                    if ($workplace == 'ACF') {
                                                        $Factory = 'acfmachines';
                                                    }
                                                    if ($workplace == 'CCF') {
                                                        $Factory = 'ccfmachines';
                                                    }
                                                    if ($workplace == 'DR') {
                                                        $Factory = 'drmachines';
                                                    }
                                                    if ($workplace == 'Flexible') {
                                                        $Factory = 'flexiblemachines';
                                                    }
                                                    if ($workplace == 'Ceylon Copper') {
                                                        $Factory = 'ceyloncoppermachines';
                                                    }
                                                    if ($workplace == 'Aluminium Rodmill') {
                                                        $Factory = 'aluminiumrodmillmachines';
                                                    }
                                                    if ($workplace == 'Drum Yard') {
                                                        $Factory = 'drumyardmachines';
                                                    }

                                                    if ($workplace == 'Bail Room') {
                                                        $Factory = 'bailmachines';
                                                    }
                                                    if ($workplace == 'Carpentry') {
                                                        $Factory = 'carpentrymachines';
                                                    }

                                                    $query = "SELECT * FROM $Factory";
                                                    $result = $con->query($query);
                                                    echo $row['MachineName'];
                                                    if ($result->num_rows > 0) {
                                                        while ($row = $result->fetch_assoc()) { ?>

                                                            <option value="<?php echo $row['MachineName']; ?> " <?php if ($row['MachineName'] === $MachineName) {
                                                                                                                    echo 'selected';
                                                                                                                } ?>>
                                                                <?php echo $row['MachineName']; ?></option>

                                                    <?php }
                                                    } else {
                                                        echo '<option value="">No data available</option>';
                                                    }
                                                    ?>

                                                    <!-- <option value="<?php $MachineName ?>" <?php if ($MachineName != null) {
                                                                                                    echo "selected";
                                                                                                } ?>tion> -->

                                                </select>
                                            </td>
                                        </tr>
                                        <!-- Row of input fields -->
                                        <tr>

                                            <td style="width:200px;padding:5px">
                                                <label class="pr-3">Priority</label>
                                            </td>
                                            <td style="width:500px;padding:5px">
                                                <select name="priority" id="dept" class="form-select" required
                                                    placeholder="Choose Priority">

                                                    <option value="Low" <?php if ($priority == "Low") {
                                                                            echo "selected";
                                                                        } ?>>Low</option>
                                                    <option value="High" <?php if ($priority == "High") {
                                                                                echo "selected";
                                                                            } ?>>High</option>
                                                    <option value="Critical" <?php if ($priority == "Critical") {
                                                                                    echo "selected";
                                                                                } ?>>
                                                        Critical</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <!-- Row of input fields -->
                                        <tr>

                                            <td style="width:200px;padding:5px">
                                                <label class="pr-3">Report to</label>
                                            </td>
                                            <td style="width:500px;padding:5px">
                                                <select name="ReportTo" class="form-select" required placeholder="Report To">

                                                    <option value="Electrical" <?php if ($ReportTo == "Electrical") {
                                                                                    echo "selected";
                                                                                } ?>>
                                                        Electrical</option>
                                                    <option value="Mechanical" <?php if ($ReportTo == "Mechanical") {
                                                                                    echo "selected";
                                                                                } ?>>
                                                        Mechanical</option>
                                                    <option value="Both" <?php if ($ReportTo == "Both") {
                                                                                echo "selected";
                                                                            } ?>>Both</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <!-- Row of input fields -->
                                        <tr>

                                            <td style="width:200px;padding:5px">
                                                <label class="pr-3">Breif Description</label>
                                            </td>
                                            <td style="width:500px;padding:5px">
                                                <textarea name="BriefDescription" class="form-control" value="" rows="3"
                                                    required><?php echo $BriefDescription; ?></textarea>
                                            </td>

                                        </tr>
                                    </div>
                    </div>
                </table>
                <button type="submit" class="btn btn-success mt-3" name="update"
                    onclick="return confirm('Are you sure?')">Update</button>
                <button type="submit" class="btn btn-warning mt-3" name="delete"
                    onclick="return confirm('Are you sure?')">Delete</button>
                <button type="back" class="btn btn-danger mt-3" name="back"><a href="\MaintananceJobCard\PUser\indexPUser.php"
                        style="text-decoration:none;color:white">Back to Main</a></button>
            </form>
        </div>
    </div>


</body>
</body>