<?php
// Include database connection
include("database.php");

// Fetch education details from the database
$sql = "SELECT * FROM education";
$result = $connect->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Education Showcase</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;600;700&family=Montserrat:wght@300;400;600;700&family=Lobster&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: Montserrat, sans-serif;
            transition: background 0.5s ease-in-out;
            background: linear-gradient(to right, #8360c3, #2ebf91);
        }
        .container {
            padding: 50px 15px;
        }
        .card {
            transition: all 0.3s ease-in-out;
            border-radius: 15px;
            border: none;
            background: #29293d;
            color: #fff;
            position: relative;
            overflow: hidden;
        }
        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(to right, rgba(255, 255, 255, 0.1), transparent);
            transition: left 0.5s;
        }
        .card:hover::before {
            left: 100%;
        }
        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0px 15px 30px rgba(0, 0, 0, 0.5);
        }
        h1 {
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 3px;
            text-align: center;
            margin-bottom: 40px;
            font-size: 2.5rem;
        }
        .card-title {
            font-size: 1.7rem;
            font-weight: 700;
            letter-spacing: 1px;
        }
        .card-text {
            font-size: 1.2rem;
            font-weight: 400;
        }
        .small-card {
            height: 300px;
            margin-top: 60px;
        }
        .large-card {
            height: 400px;
            margin-top: 20px;
        }
    </style>
</head>
<body id="body">
    <div class="container text-center">
        <h1>Education Showcase</h1>
        <div class="row justify-content-center">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="col-md-4 mb-4">
                            <div class="card p-4 small-card">
                                <div class="card-body">
                                    <h2 class="card-title">' . htmlspecialchars($row["course_title"]) . '</h2>
                                    <p class="card-text">' . htmlspecialchars($row["institution"]) . ' | ' . htmlspecialchars($row["duration"]) . '</p>
                                    <p class="card-text">' . htmlspecialchars($row["description"]) . '</p>
                                </div>
                            </div>
                        </div>';
                }
            } else {
                echo "<p>No education details found.</p>";
            }
            ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
