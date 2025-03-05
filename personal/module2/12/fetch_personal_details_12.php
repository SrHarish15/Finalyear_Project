<?php
// Include database connection
include("database.php");

// Fetch personal details from database
$sql = "SELECT * FROM personal_details WHERE id = 12"; // Change '1' to the required user ID
$result = $connect->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo json_encode($row);
} else {
    echo json_encode(["error" => "No records found"]);
}
?>
