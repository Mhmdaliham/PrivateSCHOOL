<?php
require_once '../../../connection/db_connection.php';

session_start();
if (!isset($_SESSION['username']) || !isset($_SESSION['password'])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['CourseID'])) {
    $CourseID  = $_GET['CourseID'];

    // Prepare and execute the delete query
    $stmt = $mysqli->prepare("DELETE FROM courses WHERE CourseID  = ?");
    $stmt->bind_param("s", $CourseID );
    $stmt->execute();

    // Check if any rows were affected (if the Course existed)
    if ($stmt->affected_rows > 0) {
        $DeletedCourse = array('success' => 'Course deleted successfully.');
        echo json_encode($DeletedCourse);
        exit();
    } else {
        $DeletedCourse = array('success' => 'Course not found or could not be deleted.');
        echo json_encode($DeletedCourse);
        exit();
    }
} else {
    $DeletedCourse = array('success' => 'Invalid request.');
    echo json_encode($DeletedCourse);
    exit();
}
?>
