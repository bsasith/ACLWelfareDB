<?php
include '../connect.php';
include '../session.php';

if (!($_SESSION['type'] == 'admin')) {
    header('location:../index.php');
    exit;
}

$idu = $_GET['updateid'];

// Fetch member info
$sql = "SELECT * FROM member_info WHERE id='$idu'";
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
$rd = $row['rd'];
$dop = $row['dop'];
$marital = $row['marital'];

// Insert grant
if (isset($_POST['submit'])) {
    $applicat_id = $_POST['applicant'];
    $grant_type = $_POST['grant_type'];
    $grant_date = date("Y-m-d");

    $sql_insert_grants = "INSERT INTO `grants` (member_id, applicant_id, grant_type, `grant_date`) 
                          VALUES ($idu, $applicat_id, '$grant_type', '$grant_date')";
    
    $insert_grants = mysqli_query($con, $sql_insert_grants);

    if ($insert_grants) {
        echo "<script>alert('Grant successfully added'); window.location.href='../admin/indexAdmin.php';</script>";
        exit;
    } else {
        echo "Error inserting grant: " . mysqli_error($con);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add New Grant</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Jockey+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../styles/SubmitJobstyle.css">
    <style> h1 { font-family: "Jockey One", sans-serif; } </style>
</head>

<body>
    <div class="topbar">
        <h1 class="topbar-text">Welcome <?php echo $_SESSION['username'] ?> </h1>
        <a href="../logout.php"><h1 class="topbar-logout">Logout &nbsp</h1></a>
        <h1 class="topbar-username"><?php echo $_SESSION['username'] ?>&nbsp</h1>
    </div>

    <div class="container mt-5">
        <h1>Granted Privileges</h1>
        <a href="../admin/indexAdmin.php" class="btn btn-danger mt-3">Back to Main</a>
    </div>

    <div class="container mt-5">
        <h1>Add New Grant</h1>
        <form method="POST" onsubmit="return validateForm();">
            <table class="table table-striped w-50">
                <tr><td>First Name</td><td><?php echo $fname; ?></td></tr>
                <tr><td>Last Name</td><td><?php echo $lname; ?></td></tr>
                <tr><td>Name with Initials</td><td><?php echo $namewinitials; ?></td></tr>
                <tr><td>EPF No</td><td><?php echo $epfno; ?></td></tr>
                <tr><td>Department</td><td><?php echo $dept; ?></td></tr>
                <tr><td>Address</td><td><?php echo $raddress; ?></td></tr>
                <tr><td>NIC</td><td><?php echo $nic; ?></td></tr>
                <tr><td>Date of Birth</td><td><?php echo $dob; ?></td></tr>
                <tr><td>Marital Status</td><td><?php echo $marital; ?></td></tr>
                <tr><td>Recruitment Date</td><td><?php echo $rd; ?></td></tr>
                <tr><td>Date of Permanent</td><td><?php echo $dop; ?></td></tr>
                <tr><td>Mobile</td><td><?php echo $mobile; ?></td></tr>

                <tr>
                    <td>Grant to be Applied</td>
                    <td>
                        <select name="applicant" id="applicantDropdown" class="form-control" onchange="updateGrantType()">
                            <option value="">-- Select Applicant --</option>
                            <?php
                            $sql_applicants = "SELECT id, applicant_name, relation FROM applicants WHERE member_id = '$idu'";
                            $result_applicants = mysqli_query($con, $sql_applicants);
                            while ($row = mysqli_fetch_assoc($result_applicants)) {
                                echo "<option value='{$row['id']}' data-relation='{$row['relation']}'>{$row['applicant_name']} - {$row['relation']}</option>";
                            }
                            ?>
                        </select>
                        <br>
                        <select name="grant_type" id="grantTypeDropdown" class="form-control">
                            <option value="">-- Select Grant Type --</option>
                        </select>
                    </td>
                </tr>
            </table>

            <button type="submit" name="submit" class="btn btn-success mx-2" onclick="return confirm('Are you sure?')">Add Grant</button>
            <a href="../admin/BrowseEPFNo.php" class="btn btn-info mx-2">Back to Search</a>
            <a href="../admin/indexAdmin.php" class="btn btn-danger mx-2">Back to Main</a>
        </form>
    </div>

    <script>
        function updateGrantType() {
            const applicantDropdown = document.getElementById("applicantDropdown");
            const grantTypeDropdown = document.getElementById("grantTypeDropdown");
            const selectedOption = applicantDropdown.options[applicantDropdown.selectedIndex];
            const relation = selectedOption.getAttribute("data-relation");

            grantTypeDropdown.innerHTML = "<option value=''>-- Select Grant Type --</option>";

            if (relation === "Self") {
                grantTypeDropdown.innerHTML += "<option value='Death'>Death</option>";
                grantTypeDropdown.innerHTML += "<option value='Retirement'>Retirement</option>";
                grantTypeDropdown.innerHTML += "<option value='Marriage'>Marriage</option>";
            } else if (relation === "Son" || relation === "Daughter") {
                grantTypeDropdown.innerHTML += "<option value='Birth'>Birth</option>";
                grantTypeDropdown.innerHTML += "<option value='Deathb6'>Death before age 6 months</option>";
                grantTypeDropdown.innerHTML += "<option value='Deatha6'>Death after age 6 months</option>";
            } else {
                grantTypeDropdown.innerHTML += "<option value='Death'>Death</option>";
            }
        }

        function validateForm() {
            const applicantDropdown = document.getElementById("applicantDropdown");
            const grantTypeDropdown = document.getElementById("grantTypeDropdown");

            if (applicantDropdown.value === "") {
                alert("Please select an applicant.");
                return false;
            }
            if (grantTypeDropdown.value === "") {
                alert("Please select a grant type.");
                return false;
            }
            return true;
        }
    </script>
</body>
</html>
