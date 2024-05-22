<?php
require_once '../../connection/db_connection.php';

// session_start();
if (!isset($_SESSION['username']) || !isset($_SESSION['password'])) {
    header("Location: login.php"); 
    exit();
}

$StudentID = $_SESSION['StudentID'];

$sql = "SELECT b.BillingID, b.AmountDue, b.BillingDueDate 
        FROM studentbilling b 
        LEFT JOIN studentpayments p ON p.BillingID = b.BillingID 
        WHERE b.StudentID = ? and 
        (b.BillingID not in (SELECT BillingID from studentpayments));";


$stmt = $mysqli->prepare($sql);
$stmt->bind_param("i", $StudentID);
$stmt->execute();
$result = $stmt->get_result();
$upcomingPayments = $result->fetch_all(MYSQLI_ASSOC);

 json_encode($upcomingPayments);

// $stmt->close();
// $mysqli->close();
?>
