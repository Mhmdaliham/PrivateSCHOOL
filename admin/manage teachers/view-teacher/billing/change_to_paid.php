<?php
    require_once '../../../../connection/db_connection.php';

    session_start();
    if (!isset($_SESSION['username']) || !isset($_SESSION['password'])) {
        header("Location: login.php"); 
        exit();
    }

    $PaymentID = $_GET['PaymentID'];

    date_default_timezone_set('America/New_York');
    $currentDateTime = date('Y-m-d H:i:s');

    $updateStmt = $mysqli->prepare("UPDATE doctorpayments SET  PaymentDate = ?, paid = 1 WHERE PaymentID = ?");
    $updateStmt->bind_param("si", $currentDateTime, $PaymentID);
    $updateStmt->execute(); 
    

    if ($updateStmt->affected_rows > 0) {
        echo json_encode(array("success" => "New payment made successfully"));
    } else {
        echo json_encode(array("error" => "Error: " . $mysqli->error));
    }
    ?>
