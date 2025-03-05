<?php
session_start();

if (!isset($_SESSION["umail"]) || empty($_SESSION["umail"])) {
    header('Location: AdminLogin.php');
    exit();
}
$userid = $_SESSION["umail"];
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <style>
        body {
            background-color: #f4f6f9;
            font-family: 'Arial', sans-serif;
        }
        .admin-container {
            max-width: 1000px;
            margin: 50px auto;
            text-align: center;
        }
        .admin-header {
            font-size: 26px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .admin-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            justify-content: center;
        }
        .card {
            background: white;
			height:200px;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.15);
        }
        .card i {
            font-size: 40px;
            color: #007bff;
            margin-bottom: 10px;
        }
        .card a {
            text-decoration: none;
            font-size: 18px;
            font-weight: bold;
            color: #333;
            transition: color 0.3s ease;
        }
        .card a:hover {
            color: #007bff;
        }
        .logout-btn {
            margin-top: 20px;
            background-color: #dc3545;
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            transition: background-color 0.3s ease;
            display: inline-block;
        }
        .logout-btn:hover {
            background-color: #c82333;
        }
    </style>

</head>
<body>
    <div class="admin-container">
        <h3 class="admin-header">Welcome, <a href="welcomeadmin">Admin</a></h3>

        <div class="admin-grid">
            <div class="card">
                <i class="fa fa-graduation-cap"></i>
                <a href="studentdetail.php">Student Details</a>
            </div>
            <div class="card">
                <i class="fa fa-users"></i>
                <a href="facultydetails.php">Faculty Details</a>
            </div>
           
        </div>

        <a href="logoutadmin.php" class="logout-btn">
            <i class="fa fa-sign-out-alt"></i> Logout
        </a>
    </div>
</body>
</html>
