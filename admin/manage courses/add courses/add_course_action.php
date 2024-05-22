<?php
    require_once '../../../connection/db_connection.php';

    session_start();
    if (!isset($_SESSION['username']) || !isset($_SESSION['password'])) {
        header("Location: login.php"); 
        exit();
    }

    $insertStmt = $mysqli->prepare("INSERT INTO courses (CourseName, CourseDescription, CreditHours) VALUES (?, ?, ?)");
    $insertStmt->bind_param("sss", $_POST['CourseName'],$_POST['CourseDescription'], $_POST['CreditHours']);
    $insertStmt->execute();

    if ($insertStmt->affected_rows > 0) {
        $insertedId = $mysqli->insert_id;
        $insertStmtr = $mysqli->prepare("INSERT INTO courserates (CourseID, RateAmountPerHour) VALUES (?, ?)");
        $insertStmtr->bind_param("is", $insertedId, $_POST['RateAmountPerHour']);
        $insertStmtr->execute();
        echo json_encode(array("success" => "New record created successfully"));
    } else {
        echo json_encode(array("error" => "Error: " . $mysqli->error));
    }

    ?>
