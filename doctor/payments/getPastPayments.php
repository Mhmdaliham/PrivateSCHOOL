<?php
require_once '../../connection/db_connection.php';

session_start();
if (!isset($_SESSION['username']) || !isset($_SESSION['password'])) {
    header("Location: login.php"); 
    exit();
}

$username = $_SESSION['username'];
$doctorID = $_SESSION['doctorID'];

$sql = "SELECT *
        FROM doctorpayments 
        WHERE doctorID = ?  AND paid = 1";

$stmt = $mysqli->prepare($sql);
$stmt->bind_param("i", $doctorID);
$stmt->execute();
$result = $stmt->get_result();
$pastPayments = $result->fetch_all(MYSQLI_ASSOC);

 json_encode($pastPayments);


?>
