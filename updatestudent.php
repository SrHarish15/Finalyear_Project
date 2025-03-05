<?php
session_start();
if (!isset($_SESSION["umail"]) || empty($_SESSION["umail"])) {
    header('Location: AdminLogin.php');
    exit();
}

include("database.php");

// Fetch student data securely
if (isset($_GET['eno'])) {
    $new3 = $_GET['eno'];
    $stmt = $connect->prepare("SELECT * FROM studenttables WHERE Eno = ?");
    $stmt->bind_param("i", $new3);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $stmt->close();
}

// Handle form submission
if (isset($_POST['update'])) {
    $tempphno = $_POST['phno'];
    $tempemail = $_POST['email'];
    $tempaddrs = $_POST['addrs'];
    $tempjob = $_POST['job'];

    $stmt = $connect->prepare("UPDATE studenttables SET Addrs=?, PhNo=?, Eid=?, Job=? WHERE Eno=?");

    // Ensure `Eno` is an integer
    $new3 = (int) $new3;

    // Correctly bind parameters
    $stmt->bind_param("ssssi", $tempaddrs, $tempphno, $tempemail, $tempjob, $new3);

    if ($stmt->execute()) {
        echo "<div class='alert alert-success text-center'>Student details updated successfully!</div>";
    } else {
        echo "<div class='alert alert-danger text-center'>Error updating student details: " . $stmt->error . "</div>";
    }

    $stmt->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .admin-container{
            margin-top:30px;
            display:flex;
            justify-content:space-around;
        }
        .admin-container a{
            text-decoration:none;
        }
        .card {
            max-width: 500px;
            margin: auto;
            margin-top: 30px;
            border-radius: 12px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            background: white;
            padding: 30px;
        }
        .form-control {
            border-radius: 6px;
            box-shadow: none;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
            width: 100%;
            padding: 10px;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            transition: 0.3s;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .form-header {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            color: #333;
        }
    </style>
</head>
<body>

    <div class="container">
    <div class="admin-container">
        <h3 class="admin-header">Welcome, <a href="welcomeadmin.php">Admin</a></h3>
        <h4 class="admin-header"><a href="welcomeadmin.php">Home</a></h4>
    </div>
        <div class="card">
            <h3 class="form-header">Update Student Details</h3>
            <form action="" method="POST">
            <div class="mb-3">
                    <label class="form-label">Phone Number:</label>
                    <input type="tel" name="phno" class="form-control" value="<?= htmlspecialchars($row['PhNo']) ?>" pattern="[0-9]{10}" maxlength="10" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email:</label>
                    <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($row['Eid']) ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Address:</label>
                    <input type="text" name="addrs" class="form-control" value="<?= htmlspecialchars($row['Addrs']) ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Job:</label>
                    <input type="text" name="job" class="form-control" value="<?= htmlspecialchars($row['Job']) ?>" required>
                </div>
                <button type="submit" name="update" class="btn-primary">Update</button>
            </form>
        </div>
    </div>

</body>
</html>
