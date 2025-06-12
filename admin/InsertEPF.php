<?php
include '../connect.php';
include '../session.php';

date_default_timezone_set('Asia/Colombo');
$date = date("Y-m-d G:i:s");
if (!($_SESSION['type'] == 'admin')) {
    header('location:..\index.php');
}

if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $namewinitials = $_POST['namewinitials'];
    $epfno = $_POST['epfno'];
    $dept = $_POST['dept'];
    $raddress = $_POST['raddress'];
    $nic = $_POST['nic'];
    $dob = $_POST['dob'];
    $mobile=$_POST['mobile'];
    $applicant1 = $_POST['applicant1'];
    $relation1 = $_POST['relation1'];
    $applicant2 = $_POST['applicant2'];
    $relation2 = $_POST['relation2'];
    $applicant3 = $_POST['applicant3'];
    $relation3 = $_POST['relation3'];
    $applicant4 = $_POST['applicant4'];
    $relation4 = $_POST['relation4'];
    $applicant5 = $_POST['applicant5'];
    $relation5 = $_POST['relation5'];
    $applicant6 = $_POST['applicant6'];
    $relation6 = $_POST['relation6'];
    $applicant7 = $_POST['applicant7'];
    $relation7 = $_POST['relation7'];
    $applicant8 = $_POST['applicant8'];
    $relation8 = $_POST['relation8'];
    $applicant9 = $_POST['applicant9'];
    $relation9 = $_POST['relation9'];
    $applicant10 = $_POST['applicant10'];
    $relation10 = $_POST['relation10'];



    // Intert Data
    $sql = "insert into `member_info` (fname,lname,namewinitials,epfno,dept,raddress,nic,dob,mobile,applicant1,relation1,applicant2,relation2,applicant3,relation3,applicant4,relation4,applicant5,relation5,applicant6,relation6,applicant7,relation7,applicant8,relation8,applicant9,relation9,applicant10,relation10) values ('$fname','$lname','$namewinitials','$epfno','$dept','$raddress','$nic','$dob','$mobile','$applicant1','$relation1','$applicant2','$relation2','$applicant3','$relation3','$applicant4','$relation4','$applicant5','$relation5','$applicant6','$relation6','$applicant7','$relation7','$applicant8','$relation8','$applicant9','$relation9','$applicant10','$relation10')";



    $result = mysqli_query($con, $sql);
    if ($result) {
        header('location:InsertSuccess.php');
    } else {
        die(mysqli_error($con));
    }
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
        <h1 class="topbar-text">Welcome <?php echo $_SESSION['username'] ?></h1>

        <a href="..\logout.php">
            <h1 class="topbar-logout">Logout &nbsp</h1>
        </a>

    </div>

    <div class="container mt-5 ">
        <h1>Insert EPF Entry</h1>
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
                                <input type="text" class="form-control" name="fname" id="exampleInputEmail1" placeholder="First Name">
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
                                            <select id="Relation1" class="form-control" name="relation9" >
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

                            </td>
                        </tr>
                        <!-- <tr>
                            <td class="py-3">
                                 <label for="Mobile Phone">Mobile Phone</label>
                            </td>
                            <td class="px-3">
                                <input class="form-control" type="text" id="Relation10" name="Relation1" placeholder="Relation to Member">
                            </td>
                        </tr> -->
                    </div>
        </div>
        </table>
        <button type="submit" class="btn btn-primary mt-3" name="submit">Submit</button>
        <button type="back" class="btn btn-danger mt-3" name="back"><a href="..\admin\indexAdmin.php"
                style="text-decoration:none;color:white">Back to Main</a></button>
        </form>
    </div>
    </div>




</body>