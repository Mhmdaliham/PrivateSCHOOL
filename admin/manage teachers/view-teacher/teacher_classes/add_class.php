<?php
    require_once '../../../../connection/db_connection.php';

    session_start();
    if (!isset($_SESSION['username']) || !isset($_SESSION['password'])) {
        header("Location: login.php"); 
        exit();
    }

    $doctorID = $_SESSION['doctorID'];


    $insertStmt = $mysqli->prepare("INSERT INTO classes ( CourseID, DoctorID, RoomID, Schedule) VALUES (?, ?, ?, ?)");
    $insertStmt->bind_param("iiis", $_POST['CourseID'], $doctorID,  $_POST['RoomID'], $_POST['Schedule']);
    $insertStmt->execute();

    if ($insertStmt->affected_rows > 0) {
        echo json_encode(array("success" => "New record created successfully"));
    } else {
        echo json_encode(array("error" => "Error: " . $mysqli->error));
    }
    ?>
