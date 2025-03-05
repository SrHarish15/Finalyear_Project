<?php
session_start();
error_reporting(0);

// Database connection details
$host = 'localhost'; // Hostname, usually 'localhost'
$dbname = 'classroom'; // Your database name
$username = 'root'; // Your database username
$password = ''; // Your database password

// Establish database connection using PDO
try {
    $dbh = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit;
}

// Check if the user is logged in
if (strlen($_SESSION['alogin']) == 0) {
    header('location:adminlogin.php');
} else {
    // Handle record deletion
    if (isset($_GET['del'])) {
        $id = $_GET['del'];
        $sql = "DELETE FROM tblauthors WHERE id = :id";
        $query = $dbh->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_STR);
        $query->execute();
        $_SESSION['delmsg'] = "Job record deleted successfully";
        header('location:manage-author.php');
    }
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Manage Job Entries</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- DATATABLE STYLE  -->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
</head>
<body>
    <!-- HEADER SECTION -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Job Management</a>
    </nav>

    <!-- MAIN CONTENT -->
    <div class="container mt-4">
        <h4>Manage Job Entries</h4>

        <!-- Error/Success Messages -->
        <?php if ($_SESSION['error'] != "") { ?>
        <div class="alert alert-danger">
            <strong>Error :</strong> 
            <?php echo htmlentities($_SESSION['error']); ?>
            <?php echo htmlentities($_SESSION['error'] = ""); ?>
        </div>
        <?php } ?>

        <?php if ($_SESSION['msg'] != "") { ?>
        <div class="alert alert-success">
            <strong>Success :</strong> 
            <?php echo htmlentities($_SESSION['msg']); ?>
            <?php echo htmlentities($_SESSION['msg'] = ""); ?>
        </div>
        <?php } ?>

        <?php if ($_SESSION['delmsg'] != "") { ?>
        <div class="alert alert-success">
            <strong>Success :</strong> 
            <?php echo htmlentities($_SESSION['delmsg']); ?>
            <?php echo htmlentities($_SESSION['delmsg'] = ""); ?>
        </div>
        <?php } ?>

        <!-- Job Entries Table -->
        <div class="panel panel-default">
            <div class="panel-heading">
                Job Listings
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Student Name</th>
                                <th>Job Description</th>
                                <th>Company Name</th>
                                <th>Address</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        // Fetch all job records from the database
                        $sql = "SELECT * from tblauthors";
                        $query = $dbh->prepare($sql);
                        $query->execute();
                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                        $cnt = 1;
                        if ($query->rowCount() > 0) {
                            foreach ($results as $result) { ?>
                                <tr>
                                    <td><?php echo htmlentities($cnt); ?></td>
                                    <td><?php echo htmlentities($result->StudentName); ?></td>
                                    <td><?php echo htmlentities($result->JobDescription); ?></td>
                                    <td><?php echo htmlentities($result->CompanyName); ?></td>
                                    <td><?php echo htmlentities($result->Address); ?></td>
                                    <td>
                                        <a href="edit-author.php?athrid=<?php echo htmlentities($result->id); ?>"><button class="btn btn-primary"><i class="fa fa-edit"></i> Edit</button></a>
                                    </td>
                                </tr>
                            <?php $cnt = $cnt + 1;
                            }
                        } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    <!-- FOOTER SECTION -->
    <footer class="text-center mt-4">
        <p>&copy; 2025 Job Management System</p>
    </footer>

    <!-- JAVASCRIPT FILES -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
    <script src="assets/js/custom.js"></script>

</body>
</html>
