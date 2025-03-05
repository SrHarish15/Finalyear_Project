<?php
session_start();
if (!isset($_SESSION["umail"]) || empty($_SESSION["umail"])) {
    header('Location: AdminLogin.php');
    exit();
}


include("database.php");

// Delete Faculty Record
if (isset($_GET['deleteid'])) {
    $deleteid = intval($_GET['deleteid']);
    $sql = "DELETE FROM facutlytable WHERE FID = $deleteid";

    if (mysqli_query($connect, $sql)) {
        echo "<div class='alert alert-success text-center'>Faculty record deleted successfully.</div>";
    } else {
        echo "<div class='alert alert-danger text-center'>Error deleting record: " . mysqli_error($connect) . "</div>";
    }
}
?>

<!-- Custom Styling -->
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');

    body {
        font-family: 'Poppins', sans-serif;
        background: #f4f4f9;
        margin: 0;
        padding: 0;
    }

    .container {
        margin-top: 10px;
    }

    .faculty-grid {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 20px;
    }
h3{
    text-align:center;
    font-family:'Poppins', sans-serif;
    font-size:30px;
}
    .card {
        background: #ffffff;
        border-radius: 12px;
        padding: 20px;
        width: 250px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        text-align: center;
        transition: transform 0.3s;
    }

    .card:hover {
        transform: translateY(-5px);
    }

    .card h4 {
        color: #333;
        font-weight: 600;
        margin-bottom: 10px;
    }

    .card p {
        color: #555;
        margin-bottom: 8px;
    }

    .btn-container {
        margin-top: 10px;
        display: flex;
        justify-content: space-between;
    }

    .btn {
        padding: 8px 12px;
        border: none;
        border-radius: 5px;
        text-decoration: none;
        font-weight: 600;
        cursor: pointer;
        transition: 0.3s;
    }

    .btn-edit {
        background: #28a745;
        color: white;
    }

    .btn-edit:hover {
        background: #218838;
    }

    .btn-delete {
        background: #dc3545;
        color: white;
    }

    .btn-delete:hover {
        background: #c82333;
    }

    @media (max-width: 768px) {
        .faculty-grid {
            flex-direction: column;
            align-items: center;
        }
    }
</style>

<div class="container">
    <h3 class="text-center">Faculty Details</h3>
    <div class="faculty-grid">
        <?php
        $sql = "SELECT * FROM facutlytable";
        $result = mysqli_query($connect, $sql);

        while ($row = mysqli_fetch_array($result)) { ?>
            <div class="card">
                <h4><?php echo $row['FName']; ?></h4>
                <p><strong>Address:</strong> <?php echo $row['Addrs']; ?></p>
                <p><strong>Gender:</strong> <?php echo $row['Gender']; ?></p>
                <p><strong>City:</strong> <?php echo $row['City']; ?></p>
                <p><strong>Phone:</strong> <?php echo $row['PhNo']; ?></p>
              
            </div>
        <?php } ?>
    </div>
</div>

<?php include('allfoot.php'); ?>
