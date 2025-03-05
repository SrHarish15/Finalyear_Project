<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Login</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        /* Full page background image */
        body {
            font-family: 'Poppins', sans-serif;
            background-image: url('classroom.jpg'); /* Use a classroom image path here */
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            min-height: 100vh;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Adding a dark overlay to the background image */
        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.4); /* Semi-transparent dark overlay */
            z-index: 0;
        }

        .container {
            width: 100%;
            max-width: 400px;
            background-color: rgba(255, 255, 255, 0.2); /* Slight transparency to blend with the background */
            border-radius: 10px;
            padding: 40px 30px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(10px);
            animation: fadeIn 0.5s ease-in-out;
            position: relative;
            z-index: 1; /* Ensure the form is above the background */
        }

        h3 {
            text-align: center;
            font-size: 28px;
            font-weight: 500;
            margin-bottom: 30px;
        }

        .form-group {
            position: relative;
            margin-bottom: 25px;
        }

        input {
            width: 100%;
            padding: 14px 40px 14px 15px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            background-color: rgba(255, 255, 255, 0.2);
            color: white;
            margin-top: 10px;
            outline: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease-in-out;
        }

        input:focus {
            background-color: rgba(255, 255, 255, 0.3);
            box-shadow: 0 0 10px rgba(6, 112, 255, 0.8);
        }

        .input-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: rgba(255, 255, 255, 0.7);
        }

        button {
            width: 48%;
            padding: 12px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
            transition: all 0.3s ease;
        }

        .btn-success {
            background-color: #28a745;
            color: white;
            box-shadow: 0 5px 15px rgba(8, 7, 16, 0.3);
        }

        .btn-danger {
            background-color: #dc3545;
            color: white;
            box-shadow: 0 5px 15px rgba(8, 7, 16, 0.3);
        }

        button:hover {
            box-shadow: 0 10px 20px rgba(8, 7, 16, 0.6);
        }

        .btn-container {
            display: flex;
            justify-content: space-between;
        }

        /* Responsive Design */
        @media (max-width: 576px) {
            .container {
                width: 90%;
                padding: 25px 20px;
            }

            button {
                width: 100%;
                margin: 5px 0;
            }

            .btn-container {
                flex-direction: column;
                align-items: center;
            }
        }

        /* Animation */
        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>

    <div class="overlay"></div> <!-- Dark overlay to enhance form visibility -->
    
    <div class="container">
        <h3>Admin Login</h3>
        <form name="studentlogin" action="loginlinkadmin.php" method="POST">
            <!-- Student ID Field -->
            <div class="form-group">
                <i class="fas fa-user input-icon"></i>
                <input type="text" class="form-control" name="aid" placeholder="Enter your Admin ID" required>
            </div>
            
            <!-- Password Field -->
            <div class="form-group">
                <i class="fas fa-lock input-icon"></i>
                <input type="password" class="form-control" name="apass" placeholder="Enter your Password" required>
            </div>
            
            <!-- Buttons -->
            <div class="btn-container">
                <button type="submit" name="login" class="btn-success">Login</button>
                <button type="reset" class="btn-danger">Reset</button>
            </div>
        </form>
    </div>

    <!-- Footer Include (if any) -->
    <?php include('allfoot.php'); ?>

</body>
</html>
