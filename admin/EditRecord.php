<?php
include '../connect.php';
include '../session.php';
include '../log_activity.php';
date_default_timezone_set('Asia/Colombo');
$date = date("Y-m-d G:i:s");
if (!($_SESSION['type'] == 'admin')) {
    header('location:..\index.php');
}
//
$idu = $_GET['updateid'];

$sql = "Select * from member_info where id='$idu'";
echo $idu;
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
$rd = $row['rd'];
$dop = $row['dop'];
$mobile = $row['mobile'];
$marital = $row['marital'];

$sql2 = "Select * from applicants where member_id=$idu";
$result2 = mysqli_query($con, $sql2);
$row2 = mysqli_fetch_assoc($result2);
$num_rows = mysqli_num_rows($result2);
echo ($num_rows);


if (isset($_POST['submit'])) {

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $namewinitials = $_POST['namewinitials'];
    $epfno = $_POST['epfno'];
    $dept = $_POST['dept'];
    $raddress = $_POST['raddress'];
    $nic = $_POST['nic'];
    $dob = $_POST['dob'];
    $marital = $_POST['marital'];
    $rd = $_POST['rd'];
    $dop = $_POST['dop'];
    $mobile = $_POST['mobile'];

    $insert = "update member_info set fname='$fname',lname='$lname',namewinitials='$namewinitials',epfno='$epfno',dept='$dept',nic='$nic',raddress='$raddress',dob='$dob',rd='$rd',dop='$dop',mobile='$mobile',marital='$marital' where id='$idu'";



    if ($con->query($insert) == TRUE) {
        //$_SESSION['SubmitJobSucess']=true;
        //echo "Sucessfully updated data";

        //header('location:.\UpdateJobSuccess.php');

    } else {

        echo mysqli_error($con);
        //  header('location:location:..\PUser\indexPUser.php');
    }
    $member_id = $idu;

    // 🧹 Step 1: Delete all existing applicants except 'Self'
    $con->query("DELETE FROM applicants WHERE member_id = $member_id AND relation != 'Self'");

    // ✅ Step 2: Get form data
    $applicant_names = $_POST['applicant_name'];
    $relations = $_POST['relation'];

    // ➕ Step 3: Insert all applicants from form (excluding 'Self')
    $insert_applicant = $con->prepare("INSERT INTO applicants (member_id, applicant_name, relation) VALUES (?, ?, ?)");

    for ($i = 0; $i < count($applicant_names); $i++) {
        $name = trim($applicant_names[$i]);
        $relation = trim($relations[$i]);

        // ❗ Skip 'Self'
        if ($relation === 'Self') {
            continue;
        }

        if (!empty($name) && !empty($relation)) {
            $insert_applicant->bind_param("iss", $member_id, $name, $relation);
            $insert_applicant->execute();
        }
    }
    logActivity($con, $_SESSION['userID'], $_SESSION['username'], "Edited EPF record of member ID $idu");
    header('location:.\UpdateSuccess.php');

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

<body>
    <div class="topbar">
        <h1 class="topbar-text">Welcome <?php echo $_SESSION['username'] ?> User</h1>

        <a href="..\logout.php">
            <h1 class="topbar-logout">Logout &nbsp</h1>
        </a>
        <h1 class="topbar-username"><?php echo $_SESSION['username'] ?>&nbsp</h1>

    </div>

    <div class="container mt-5 ">
        <h1> Edit EPF Entry</h1>
        <div class="mt-3">
            <form id="employeeForm" method="POST">
                <table>
                    <div class="form-group">
                        <!-- Row of input fields -->
                        <tr>
                            <td class="py-3">
                                <label for="exampleInputEmail1">First Name</label>
                            </td>
                            <td class="px-3">
                                <input type="text" value="<?php echo $fname; ?>" class="form-control" name="fname" id="exampleInputEmail1" placeholder="First Name">
                            </td>
                        </tr>
                        <!-- Row of input fields -->
                        <tr>
                            <td class="py-3">
                                <label for="exampleInputEmail1">Last Name</label>
                            </td>
                            <td class="px-3">
                                <input type="text" value="<?php echo $lname; ?>" class="form-control" name="lname" id="exampleInputEmail1" placeholder="Last Name">
                            </td>
                        </tr>
                        <!-- Row of input fields -->
                        <tr>
                            <td class="py-3">
                                <label for="exampleInputEmail1">Name with Initials</label>
                            </td>
                            <td class="px-3">
                                <input type="text" value="<?php echo $namewinitials; ?>" class="form-control" name="namewinitials" id="exampleInputEmail1" placeholder="Name with Initials" oninput="document.getElementById('input2').value = this.value;">
                            </td>
                        </tr>
                        <!-- Row of input fields -->
                        <tr>
                            <td class="py-3">
                                <label for="exampleInputEmail1">EPF No</label>
                            </td>
                            <td class="px-3">
                                <input type="text" value="<?php echo $epfno; ?>" class="form-control px-2" name="epfno" id="exampleInputEmail1" placeholder="EPF No">
                            </td>
                        </tr>
                        <!-- Row of input fields -->
                        <tr>
                            <td class="py-3">
                                <label for="exampleInputEmail1">Working Department</label>
                            </td>
                            <td class="px-3">
                                <select id="Departments" class="form-control" name="dept">>
                                    <option value="ACF" <?php if ($dept == 'ACF') {
                                                            echo 'selected';
                                                        } ?>>ACF</option>
                                    <option value="CCF" <?php if ($dept == 'CCF') {
                                                            echo 'selected';
                                                        } ?>>CCF</option>
                                    <option value="DRF" <?php if ($dept == 'DRF') {
                                                            echo 'selected';
                                                        } ?>>DRF</option>
                                    <option value="FCF" <?php if ($dept == 'FCF') {
                                                            echo 'selected';
                                                        } ?>>FCF</option>
                                    <option value="Electrical" <?php if ($dept == 'Electrical') {
                                                                    echo 'selected';
                                                                } ?>>Electrical</option>
                                    <option value="Maintenance" <?php if ($dept == 'Maintenance') {
                                                                    echo 'selected';
                                                                } ?>>Maintenance</option>
                                    <option value="Rodmill" <?php if ($dept == 'Rodmill') {
                                                                echo 'selected';
                                                            } ?>>Rodmill</option>
                                    <option value="Ceylon Copper" <?php if ($dept == 'Ceylon Copper') {
                                                                        echo 'selected';
                                                                    } ?>>Ceylon Copper</option>
                                    <option value="Accounts and Stores" <?php if ($dept == 'Accounts and Stores') {
                                                                            echo 'selected';
                                                                        } ?>>Accounts and Stores</option>
                                    <option value="GM Office" <?php if ($dept == 'GM Office') {
                                                                    echo 'selected';
                                                                } ?>>GM Office</option>
                                    <option value="IT" <?php if ($dept == 'IT') {
                                                            echo 'selected';
                                                        } ?>>IT</option>
                                    <option value="Die shop" <?php if ($dept == 'Die shop') {
                                                                    echo 'selected';
                                                                } ?>>Die shop</option>
                                    <option value="Civil" <?php if ($dept == 'Civil') {
                                                                echo 'selected';
                                                            } ?>>Civil</option>
                                    <option value="Logistics" <?php if ($dept == 'Logistics') {
                                                                    echo 'selected';
                                                                } ?>>Logistics</option>
                                    <option value="Drum Yard" <?php if ($dept == 'Drum Yard') {
                                                                    echo 'selected';
                                                                } ?>>Drum Yard</option>
                                    <option value="HR" <?php if ($dept == 'HR') {
                                                            echo 'selected';
                                                        } ?>>HR</option>
                                    <option value="TSD" <?php if ($dept == 'TSD') {
                                                            echo 'selected';
                                                        } ?>>TSD</option>
                                    <option value="QAD" <?php if ($dept == 'QAD') {
                                                            echo 'selected';
                                                        } ?>>QAD</option>



                                </select>
                            </td>
                        </tr>
                        <!-- Row of input fields -->
                        <tr>
                            <td class="py-3">
                                <label for="Residence Address">Residence Address</label>
                            </td>
                            <td class="px-3" style="width: 500px;">
                                <input type="text" class="form-control px-2 w-100" value="<?php echo $raddress; ?>" name="raddress" id="exampleInputEmail1" placeholder="Residence Address">
                            </td>
                        </tr>
                        <!-- Row of input fields -->
                        <tr>
                            <td class="py-3">
                                <label for="NIC No">NIC No</label>
                            </td>
                            <td class="px-3" style="width: 500px;">
                                <input type="text" class="form-control px-2 w-100" value="<?php echo $nic; ?>" name="nic" id="NIC No" placeholder="NIC No">
                            </td>
                        </tr>
                        <!-- Row of input fields -->
                        <tr>
                            <td class="py-3">
                                <label for="Date of Birth">Date of Birth</label>
                            </td>
                            <td class="px-3" style="width: 500px;">
                                <input type="date" class="form-control px-2 w-100" name="dob" value="<?php echo $dob; ?>" id="Date of Birth" placeholder="Date of Birth">
                            </td>
                        </tr>
                        <!-- Row of input fields -->
                        <tr>
                            <td class="py-3">
                                <label for="marital status">Marital Status</label>
                            </td>
                            <td class="px-3" style="width: 500px;">
                                <select id="MaritalStatus" name="marital" class="form-control px-2 w-100" onchange="updateApplicantsByMaritalStatus()">
                                    <option value="Single" value="Single" <?php if ($marital == 'Single') {
                                                                                echo 'selected';
                                                                            } ?>>Single</option>
                                    <option value="Married" <?php if ($marital == 'Married') {
                                                                echo 'selected';
                                                            } ?>>Married</option>
                                    <option value="Divorced" <?php if ($marital == 'Divorced') {
                                                                    echo 'selected';
                                                                } ?>>Divorced</option>
                                </select>
                            </td>
                        </tr>
                        <!-- Row of input fields -->
                        <tr>
                            <td class="py-3">
                                <label for="Recruitment Date">Recruitment Date</label>
                            </td>
                            <td class="px-3" style="width: 500px;">
                                <input type="date" class="form-control px-2 w-100" name="rd" value="<?php echo $rd; ?>" id="Recruitment Date" placeholder="Recruitment Date">
                            </td>
                        </tr>
                        <!-- Row of input fields -->
                        <tr>
                            <td class="py-3">
                                <label for="Date of Permanant">Date of Permanant</label>
                            </td>
                            <td class="px-3" style="width: 500px;">
                                <input type="date" class="form-control px-2 w-100" name="dop" value="<?php echo $dop; ?>" id="Date of Permanant" placeholder="Date of Permanant">
                            </td>
                        </tr>
                        <script>
                            document.getElementById('employeeForm').addEventListener('submit', function(event) {
                                const recruitmentDate = document.getElementById('Recruitment Date').value;
                                const permanentDate = document.getElementById('Date of Permanant').value;

                                if (recruitmentDate && permanentDate) {
                                    const rd = new Date(recruitmentDate);
                                    const dop = new Date(permanentDate);

                                    if (rd > dop) {
                                        event.preventDefault(); // Stop form from submitting
                                        alert("Recruitment Date should be earlier than Date of Permanent. Fix it before submitting!"); // You can make this fancier with a modal or inline error
                                    }
                                }
                            });
                        </script>

                        <!-- Row of input fields -->
                        <tr>
                            <td class="py-3">
                                <label for="Mobile Phone">Mobile Phone</label>
                            </td>
                            <td class="px-3" style="width: 500px;">
                                <input class="form-control" type="text" id="phone" name="mobile" value="<?php echo $mobile; ?>" placeholder="012-3456789" pattern="[0-9]{3}-[0-9]{7}">
                            </td>
                        </tr>
                        <!-- Row of input fields -->
                        <tr>
                            <td class="py-3">
                                <label for="Applicants">Applicants </label>
                            </td>
                            <td class="px-3" style="width: 500px;">

                                <table id="applicantTable">
                                    <thead>
                                        <tr>
                                            <th>Name:</th>
                                            <th>Relation:</th>
                                        </tr>
                                    </thead>
                                    <tbody id="applicants">
                                        <!-- Hardcoded SELF row (not editable) -->
                                        <tr>
                                            <td>
                                                <input class="form-control" type="text" name="applicant_name[]" value="<?php echo htmlspecialchars($namewinitials); ?>" id="input2" readonly>
                                            </td>
                                            <td>
                                                <select name="relation[]" class="form-control">
                                                    <option value="Self" selected>Self</option>
                                                </select>
                                            </td>
                                            <td></td>
                                        </tr>

                                        <?php
                                        // Move cursor back to first record
                                        mysqli_data_seek($result2, 0);

                                        while ($row2 = mysqli_fetch_assoc($result2)) {
                                            $applicant_name = htmlspecialchars($row2['applicant_name']);
                                            $relation = $row2['relation'];

                                            // Skip "Self" from being duplicated in the loop
                                            if ($relation == 'Self') {
                                                continue;
                                            }

                                            echo "<tr>";
                                            echo "<td><input class='form-control' type='text' name='applicant_name[]' value=\"$applicant_name\"></td>";
                                            echo "<td><select name='relation[]' class='form-control'>";

                                            $marriedOptions = ["Wife", "Son", "Daughter", "Mother", "Father", "Mother-in-law", "Father-in-law"];
                                            $singleOptions = ["Mother", "Father", "Sister", "Brother"];
                                            $divorcedOptions = ["Son", "Daughter", "Mother", "Father"];

                                            $allOptions = array_unique(array_merge($marriedOptions, $singleOptions, $divorcedOptions));
                                            if ($marital == 'Married') {
                                                $options = $marriedOptions;
                                            } elseif ($marital == 'Divorced') {
                                                $options = $divorcedOptions;
                                            } else {
                                                $options = $singleOptions;
                                            }
                                            
                                            foreach ($options as $opt) {
                                                $sel = ($relation == $opt) ? "selected" : "";
                                                echo "<option value=\"$opt\" $sel>$opt</option>";
                                            }
                                            echo "</select></td>";
                                            echo '<td class="text-center"><button type="button" class="btn btn-danger btn-sm" onclick="deleteRow(this)">Delete</button></td>';
                                            echo "</tr>";
                                        }
                                        ?>
                                    </tbody>


                                </table>
                                <button class="form-control bg-info w-50" type="button" onclick="addApplicant()">Add More Applicant</button>

                                <script>
                                    function updateApplicantsByMaritalStatus() {
                                        let applicants = document.getElementById('applicants');

                                        // Keep only the first row (Self), delete others
                                        while (applicants.rows.length > 1) {
                                            applicants.deleteRow(1);
                                        }
                                    }

                                    function generateRelationDropdown(maritalStatus) {
                                        if (maritalStatus === "Married") {
                                            return `
            <option value="Wife">Wife</option>
            <option value="Son">Son</option>
            <option value="Daughter">Daughter</option>
            <option value="Mother">Mother</option>
            <option value="Father">Father</option>
            <option value="Mother-in-law">Mother-in-law</option>
            <option value="Father-in-law">Father-in-law</option>
        `;
                                        } else if (maritalStatus === "Divorced") {
                                            return `
            <option value="Son">Son</option>
            <option value="Daughter">Daughter</option>
            <option value="Mother">Mother</option>
            <option value="Father">Father</option>
        `;
                                        } else {
                                            return `
            <option value="Mother">Mother</option>
            <option value="Father">Father</option>
            <option value="Sister">Sister</option>
            <option value="Brother">Brother</option>
        `;
                                        }
                                    }

                                    function addApplicant() {
                                        let container = document.getElementById('applicants');
                                        let marital = document.getElementById('MaritalStatus').value;
                                        let newRow = document.createElement('tr');

                                        newRow.innerHTML = `
        <td><input type="text" class="form-control" name="applicant_name[]"></td>
        <td>
            <select name="relation[]" class="form-control">
                ${generateRelationDropdown(marital)}
            </select>
        </td>
        <td class="text-center">
            <button type="button" class="btn btn-danger btn-sm" onclick="deleteRow(this)">Delete</button>
        </td>
    `;

                                        container.appendChild(newRow);
                                    }

                                    function deleteRow(button) {
                                        const row = button.closest('tr');
                                        const input = row.querySelector('input[name="applicant_name[]"]');
                                        const name = input.value.trim();

                                        // Create a hidden input to store deleted name
                                        const hidden = document.createElement('input');
                                        hidden.type = 'hidden';
                                        hidden.name = 'deleted_applicants[]';
                                        hidden.value = name;
                                        document.querySelector('form').appendChild(hidden);

                                        // Remove row from UI
                                        row.remove();
                                    }
                                </script>

                                <script>
                                    document.querySelector('form').addEventListener('submit', function(e) {
                                        const names = document.querySelectorAll('input[name="applicant_name[]"]');
                                        const relations = document.querySelectorAll('select[name="relation[]"]');

                                        let relationCount = {};
                                        const allowed = {

                                            "Wife": 1,
                                            "Father": 1,
                                            "Mother": 1,
                                            "Father-in-law": 1,
                                            "Mother-in-law": 1,
                                            "Son": Infinity,
                                            "Daughter": Infinity,
                                            "Brother": Infinity,
                                            "Sister": Infinity
                                        };

                                        let errors = [];

                                        for (let i = 0; i < names.length; i++) {
                                            const name = names[i].value.trim();
                                            const relation = relations[i].value;

                                            // Check empty name
                                            if (name === '') {
                                                errors.push(`Applicant name cannot be empty in row ${i + 1}`);
                                            }

                                            // Count relation
                                            relationCount[relation] = (relationCount[relation] || 0) + 1;

                                            // Enforce limit
                                            if (relationCount[relation] > allowed[relation]) {
                                                errors.push(`Only ${allowed[relation]} '${relation}' allowed.`);
                                            }
                                        }

                                        if (errors.length > 0) {
                                            e.preventDefault(); // stop form from submitting
                                            alert(errors.join('\n'));
                                        }
                                    });
                                </script>
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
</body>