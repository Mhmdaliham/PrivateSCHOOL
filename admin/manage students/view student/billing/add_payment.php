<?php
    require_once '../../../../connection/db_connection.php';

    session_start();
    if (!isset($_SESSION['username']) || !isset($_SESSION['password'])) {
        header("Location: login.php"); 
        exit();
    }

    $StudentID = $_SESSION['StudentID'];

    $insertStmt = $mysqli->prepare("INSERT INTO studentbilling ( StudentID, CourseID, HoursAttended, AmountDue, BillingDueDate) VALUES (?, ?, ?, ?, ?)");
    $insertStmt->bind_param("iisss", $StudentID, $_POST['CourseID'], $_POST['HoursAttended'], $_POST['AmountDue'], $_POST['BillingDueDate']);
    $insertStmt->execute();

    if ($insertStmt->affected_rows > 0) {
        echo json_encode(array("success" => "New record created successfully"));
    } else {
        echo json_encode(array("error" => "Error: " . $mysqli->error));
    }
    ?>
