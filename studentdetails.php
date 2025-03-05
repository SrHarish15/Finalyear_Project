<?php
session_start();

if (!isset($_SESSION["umail"]) || empty($_SESSION["umail"])) {
    header('Location: facultylogin.php');
    exit();
}
$userid = $_SESSION["umail"];
?>
 <style>
        body {
            background-color: #f4f6f9;
            font-family: 'Arial', sans-serif;
        }
        .faculty-container {
            max-width: 1000px;
            margin: 50px auto;
            text-align: center;
        }
        .faculty-header {
            font-size: 26px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .faculty-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 20px;
            justify-content: center;
        }
        .card {
            background: white;
			height:160px;
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
	 <div class="faculty-container">
        <h3 class="faculty-header">Welcome<a href="welcomefaculty.php">Faculty</a></h3>

        <div class="faculty-grid">
            <div class="card">
                <i class="fa fa-graduation-cap"></i>
                <a href="./academy/module 1/page1.html">Student Academy Details</a>
            </div>
            <div class="card">
                <i class="fa fa-users"></i>
                <a href="./personal/module 1/page1.html">Student Personal Details</a>
            </div>
		<div class="card">
                <i class="fa fa-users"></i>
                <a href="./skill/module 1/page1.html">Student SKill Set</a>
            </div>
		<div class="card">
                <i class="fa fa-users"></i>
                <a href="./job/module1/index.html">Student Job Details</a>
            </div>
           
        </div>
        <a href="logoutfaculty.php" class="logout-btn">
            <i class="fa fa-sign-out-alt"></i> Logout
        </a>
	</div>
	</div>