<?php
session_start();

if (!isset($_SESSION["umail"]) || empty($_SESSION["umail"])) {
    header('Location:facultyLogin.php');
    exit();
}

$userid = $_SESSION["umail"];
include("database.php");

// DELETE STUDENT LOGIC (WITH SQL INJECTION PREVENTION)
if (isset($_GET['deleteid'])) {
    $deleteid = $_GET['deleteid'];

    // Secure query with prepared statement
    $stmt = $connect->prepare("DELETE FROM studenttables WHERE Eno = ?");
    $stmt->bind_param("i", $deleteid);

    if ($stmt->execute()) {
        echo "
        <div class='alert alert-success fade in mt-3'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <strong>Success!</strong> Student details deleted.
        </div>";
    } else {
        echo "<div class='alert alert-danger'><strong>Deletion Failed!</strong> Try again.</div>";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        body {
            background-color: #f4f6f9;
            font-family: 'Arial', sans-serif;
        }
        .admin-container {
            max-width: 1200px;
            margin: 20px auto;
            text-align: center;
        }
        .admin-header {
            font-weight: bold;
            margin-bottom: 30px;
        }
        .container a{
            text-decoration:none;
            color:blue;
        }
        .add-btn {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            text-decoration: none;
            transition: background-color 0.3s ease;
            display: inline-block;
        }
        .add-btn:hover {
            background-color: #0056b3;
        }
        .student-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            justify-content: center;
        }
        .card {
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            position: relative;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.15);
        }
        .card i {
            font-size: 50px;
            color: #007bff;
            margin-bottom: 10px;
        }
        .card h4 {
            font-size: 18px;
            margin-bottom: 10px;
        }
        .card p {
            font-size: 14px;
            color: #555;
            margin-bottom: 8px;
        }
        .btn-group {
            margin-top: 10px;
        }
        .btn-edit{
            padding: 3px 8px;
            border-radius: 5px;
            font-size: 15px;
            font-weight: bold;
            text-decoration: none;
            display: inline-block;
        }
        .btn-edit {
            background-color: #28a745;
            color: white;
        }
        .btn-edit:hover {
            background-color: #218838;
        }
      
    </style>
</head>
<body>

    <div class="admin-container">
        <div class="container" style="display:flex;justify-content:space-around">
        <h2 class="admin-header">Welcome, <a href="welcomeadmin.php">Admin</a></h2>
        <h2 class="admin-header"><a href="welcomeadmin.php">Home</a></h2>
        </div>
      

        <div class="student-grid">
            <?php
            $sql = "SELECT * FROM studenttables";
            $result = mysqli_query($connect, $sql);
            
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <div class="card">
                    <i class="fa fa-user-graduate"></i>
                    <h4><?= htmlspecialchars($row['FName'] . " " . $row['LName']) ?></h4>
                    <p><strong>Contact:</strong> <?= htmlspecialchars($row['PhNo']) ?></p>
                    <p><strong>Email:</strong> <?= htmlspecialchars($row['Eid']) ?></p>
                    <p><strong>Job:</strong> <?= htmlspecialchars($row['Job']) ?></p>
                    <div class="btn-group">
                        <a href="updatestudent.php?eno=<?= $row['Eno'] ?>" class="btn-edit">
                             Edit
                        </a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

<?php include('allfoot.php'); ?>

</body>
</html>
