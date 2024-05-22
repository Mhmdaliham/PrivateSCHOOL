<?php
    require_once '../../../../connection/db_connection.php';

    session_start();
    if (!isset($_SESSION['username']) || !isset($_SESSION['password'])) {
        header("Location: login.php"); 
        exit();
    }

    $doctorID = $_SESSION['doctorID'];


    $insertStmt = $mysqli->prepare("INSERT INTO doctorpayments ( doctorID, CourseID, HoursTaught, PaymentAmount, PaymentDate, paid) VALUES (?, ?, ?, ?, ?, 0)");
    $insertStmt->bind_param("iisss", $doctorID, $_POST['CourseID'], $_POST['HoursTaught'], $_POST['PaymentAmount'], $_POST['PaymentDate']);
    $insertStmt->execute();

    if ($insertStmt->affected_rows > 0) {
        echo json_encode(array("success" => "New record created successfully"));
    } else {
        echo json_encode(array("error" => "Error: " . $mysqli->error));
    }
    ?>
