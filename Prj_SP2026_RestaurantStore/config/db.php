<?php
// Database connection file
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "Prj_SP2026_RestaurantStore";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}
?>
