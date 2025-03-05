<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
{   
    header('location:login.php');
}
else { 

    if(isset($_POST['update']))
    {
        $athrid = intval($_GET['athrid']);
        $job = $_POST['job'];
        $company = $_POST['company'];
        $address = $_POST['address'];

        // Correct the parameter binding in the SQL query
        $sql = "UPDATE tblauthors SET JobDescription = :job, CompanyName = :company, Address = :address WHERE id = :athrid";
        $query = $dbh->prepare($sql);
        $query->bindParam(':job', $job, PDO::PARAM_STR);
        $query->bindParam(':company', $company, PDO::PARAM_STR);
        $query->bindParam(':address', $address, PDO::PARAM_STR);
        $query->bindParam(':athrid', $athrid, PDO::PARAM_STR);
        $query->execute();

        $_SESSION['updatemsg'] = "Job info updated successfully";
        header('location:manage-author.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Online Library Management System" />
    <meta name="author" content="Your Name" />
    <title>Update Author Job Info</title>

    <!-- Include Bootstrap 5 and Custom CSS -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="style.css" rel="stylesheet">
    <style>
        /* General Reset and Styling */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Roboto', sans-serif;
    background-color: #f7f7f7;
    color: #333;
    line-height: 1.6;
    padding-top: 60px; /* Adjusted for a better mobile header */
}

/* Body Gradient Background */
body {
    background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}

/* Container Styling */
.container {
    width: 100%;
    max-width: 1200px;
    padding: 20px;
    background-color: #ffffff;
    border-radius: 15px;
    box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
    margin: 30px auto;
    box-sizing: border-box;
}

/* Heading Styles */
h4.header-line {
    color: #333;
    font-size: 2rem;
    text-align: center;
    text-transform: uppercase;
    letter-spacing: 1px;
    font-weight: 600;
    margin-bottom: 25px;
}

/* Panel Styles (Form Container) */
.panel {
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    padding: 20px;
    margin-top: 20px;
}

/* Card Header Styling */
.panel-heading {
    background-color: #6a11cb;
    color: white;
    padding: 20px;
    text-align: center;
    border-radius: 10px 10px 0 0;
    font-size: 1.25rem;
    font-weight: bold;
    letter-spacing: 1px;
}

/* Form Group Styling */
.form-group {
    margin-bottom: 20px;
}

.form-label {
    font-size: 1.1rem;
    font-weight: 500;
    color: #444;
    margin-bottom: 8px;
}

/* Form Input Field Styles */
.form-control {
    width: 100%;
    padding: 15px;
    font-size: 1.1rem;
    border-radius: 8px;
    border: 1px solid #ddd;
    background-color: #f9f9f9;
    transition: all 0.3s ease-in-out;
}

.form-control:focus {
    border-color: #6a11cb;
    box-shadow: 0 0 10px rgba(106, 17, 203, 0.5);
    outline: none;
}

/* Success Message Styling */
.alert-success {
    background-color: #28a745;
    color: white;
    padding: 15px;
    border-radius: 10px;
    margin-bottom: 25px;
    text-align: center;
    font-weight: 500;
}

/* Button Styles */
.btn-primary {
    background-color: #2575fc;
    border: 1px solid #2575fc;
    color: white;
    padding: 15px 20px;
    font-size: 1.1rem;
    border-radius: 8px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1px;
    width: 100%;
    cursor: pointer;
    transition: background-color 0.3s ease-in-out, transform 0.2s ease;
}

.btn-primary:hover {
    background-color: #1a5bb8;
}

.btn-primary:active {
    background-color: #0e3a7d;
    transform: scale(0.98);
}

/* Card Hover Effect */
.panel:hover {
    transform: translateY(-8px);
    box-shadow: 0 12px 30px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
}

/* Media Queries for Responsiveness */
@media (max-width: 768px) {
    .container {
        padding: 15px;
    }

    h4.header-line {
        font-size: 1.5rem;
    }

    .form-control {
        font-size: 1rem;
        padding: 12px;
    }

    .btn-primary {
        padding: 14px;
        font-size: 1.05rem;
    }

    .panel-heading {
        font-size: 1.15rem;
    }
}

@media (max-width: 480px) {
    .container {
        width: 95%;
    }

    .panel {
        padding: 15px;
    }

    h4.header-line {
        font-size: 1.3rem;
    }

    .btn-primary {
        padding: 12px;
        font-size: 1rem;
    }
}

    </style>
</head>
<body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-center">Update Author Job Info</h4>
                <!-- Display success message if exists -->
                <?php if(isset($_SESSION['updatemsg'])): ?>
                    <div class="alert alert-success text-center"><?php echo $_SESSION['updatemsg']; unset($_SESSION['updatemsg']); ?></div>
                <?php endif; ?>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8 col-sm-10 col-xs-12">
                <div class="card">
                    <div class="card-header text-center bg-primary text-white">
                        <h5 class="card-title">Author Job Information</h5>
                    </div>
                    <div class="card-body">
                        <form method="post">
                            <?php 
                            $athrid = intval($_GET['athrid']);
                            $sql = "SELECT * FROM tblauthors WHERE id = :athrid";
                            $query = $dbh->prepare($sql);
                            $query->bindParam(':athrid', $athrid, PDO::PARAM_STR);
                            $query->execute();
                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                            if($query->rowCount() > 0)
                            {
                                foreach($results as $result)
                                {   
                            ?>
                            <div class="mb-3">
                                <label for="job" class="form-label">Job Description</label>
                                <input class="form-control" id="job" type="text" name="job" value="<?php echo htmlentities($result->JobDescription); ?>" required />
                            </div>
                            <div class="mb-3">
                                <label for="company" class="form-label">Company Name</label>
                                <input class="form-control" id="company" type="text" name="company" value="<?php echo htmlentities($result->CompanyName); ?>" required />
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <input class="form-control" id="address" type="text" name="address" value="<?php echo htmlentities($result->Address); ?>" required />
                            </div>
                            <?php }} ?>
                            <button type="submit" name="update" class="btn btn-primary w-100">Update Info</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Bootstrap JS and Custom JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/custom.js"></script>
</body>
</html>
<?php } ?>
