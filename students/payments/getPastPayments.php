<?php
require_once '../../connection/db_connection.php';

session_start();
if (!isset($_SESSION['username']) || !isset($_SESSION['password'])) {
    header("Location: login.php"); 
    exit();
}

$username = $_SESSION['username'];
$StudentID = $_SESSION['StudentID'];

$sql = "SELECT p.PaymentID, p.PaymentAmount, p.PaymentDate
        FROM studentpayments p
        INNER JOIN studentbilling b ON p.BillingID = b.BillingID  
        WHERE b.StudentID = ? ";

$stmt = $mysqli->prepare($sql);
$stmt->bind_param("i", $StudentID);
$stmt->execute();
$result = $stmt->get_result();
$pastPayments = $result->fetch_all(MYSQLI_ASSOC);

 json_encode($pastPayments);


?>
