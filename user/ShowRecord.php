<?php
include '../connect.php';
include '../session.php';
include '../log_activity.php';

if (!($_SESSION['type'] == 'user')) {
    header('location:..\index.php');
    exit;
}

$idu = $_GET['updateid'];

// Fetch member info
$sql = "SELECT * FROM member_info WHERE id='$idu'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);

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
logActivity($con, $_SESSION['userID'], $_SESSION['username'], "Viewed EPF record of member ID $idu");
// Check if Self → Death or Retirement grant exists
$blockGrant = false;
$check_termination_query = "SELECT * FROM grants g 
                            INNER JOIN applicants a ON g.applicant_id = a.id 
                            WHERE g.member_id = '$idu' 
                            AND a.relation = 'Self' 
                            AND (g.grant_type = 'Death' OR g.grant_type = 'Retirement')";
$result_termination_check = mysqli_query($con, $check_termination_query);
if (mysqli_num_rows($result_termination_check) > 0) {
    $blockGrant = true;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View EPF Record</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Jockey+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../styles/SubmitJobstyle.css">
    <style>
        h1 { font-family: "Jockey One", sans-serif; }
    </style>
</head>

<body>
<div class="topbar">
    <h1 class="topbar-text">Welcome Non-Admin User</h1>
    <a href="../logout.php"><h1 class="topbar-logout">Logout &nbsp</h1></a>
    <h1 class="topbar-username"><?php echo $_SESSION['username'] ?>&nbsp</h1>
</div>

<div class="container mt-5">
    <h1>View EPF Record</h1>

    <?php if ($blockGrant): ?>
        <div class="alert alert-danger mt-4">
            ⚠️ This member is marked as <strong>terminated</strong> (Self → Death or Retirement).  
            No further grants are allowed to the member or their family.
        </div>
    <?php endif; ?>

    <form method="POST">
        <table class="table table-striped w-75">
            <tr><td>First Name</td><td><?php echo htmlspecialchars($fname); ?></td></tr>
            <tr><td>Last Name</td><td><?php echo htmlspecialchars($lname); ?></td></tr>
            <tr><td>Name with Initials</td><td><?php echo htmlspecialchars($namewinitials); ?></td></tr>
            <tr><td>EPF No</td><td><?php echo htmlspecialchars($epfno); ?></td></tr>
            <tr><td>Department</td><td><?php echo htmlspecialchars($dept); ?></td></tr>
            <tr><td>Address</td><td><?php echo htmlspecialchars($raddress); ?></td></tr>
            <tr><td>NIC</td><td><?php echo htmlspecialchars($nic); ?></td></tr>
            <tr><td>Date of Birth</td><td><?php echo htmlspecialchars($dob); ?></td></tr>
            <tr><td>Marital Status</td><td><?php echo htmlspecialchars($marital); ?></td></tr>
            <tr><td>Recruitment Date</td><td><?php echo htmlspecialchars($rd); ?></td></tr>
            <tr><td>Date of Permanent</td><td><?php echo htmlspecialchars($dop); ?></td></tr>
            <tr><td>Mobile</td><td><?php echo htmlspecialchars($mobile); ?></td></tr>

            <tr>
                <td>Death Grant Applicants<br>according to Welfare Constitution</td>
                <td>
                    <table class="table table-bordered">
                        <thead><tr><th>Name</th><th>Relation</th></tr></thead>
                        <tbody>
                        <?php
                        $sql_applicants = "SELECT applicant_name, relation FROM applicants WHERE member_id = '$idu'";
                        $result_app = mysqli_query($con, $sql_applicants);
                        while ($app = mysqli_fetch_assoc($result_app)) {
                            echo "<tr><td>".htmlspecialchars($app['applicant_name'])."</td><td>".htmlspecialchars($app['relation'])."</td></tr>";
                        }
                        ?>
                        </tbody>
                    </table>
                </td>
            </tr>

            <tr>
                <td>Existing Grants</td>
                <td>
                    <table class="table table-bordered table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Applicant Name</th>
                                <th>Relation</th>
                                <th>Grant Type</th>
                                <th>Grant Date</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $sql_grants = "SELECT g.id, a.applicant_name, a.relation, g.grant_type, g.grant_date 
                                       FROM grants g 
                                       INNER JOIN applicants a ON g.applicant_id = a.id 
                                       WHERE g.member_id = '$idu' 
                                       ORDER BY g.grant_date DESC";
                        $result_grants = mysqli_query($con, $sql_grants);
                        $counter = 1;

                        if (mysqli_num_rows($result_grants) > 0) {
                            while ($grant = mysqli_fetch_assoc($result_grants)) {
                                echo "<tr>
                                        <td>{$counter}</td>
                                        <td>".htmlspecialchars($grant['applicant_name'])."</td>
                                        <td>".htmlspecialchars($grant['relation'])."</td>
                                        <td>".htmlspecialchars($grant['grant_type'])."</td>
                                        <td>".htmlspecialchars($grant['grant_date'])."</td>
                                      </tr>";
                                $counter++;
                            }
                        } else {
                            echo "<tr><td colspan='5' class='text-center text-muted'>No grants added yet.</td></tr>";
                        }
                        ?>
                        </tbody>
                    </table>
                </td>
            </tr>
        </table>

        <div class="mt-4">
            <a href="../user/BrowseEPFNo.php" class="btn btn-info mx-2">Back to Search</a>
            <a href="../admin/indexAdmin.php" class="btn btn-danger mx-2">Back to Main</a>
        </div>
    </form>
</div>
</body>
</html>
