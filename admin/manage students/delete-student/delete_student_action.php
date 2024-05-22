<?php
require_once '../../../connection/db_connection.php';

session_start();
if (!isset($_SESSION['username']) || !isset($_SESSION['password'])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['StudentID'])) {
    $StudentID = $_GET['StudentID'];

    // Prepare and execute the delete query
    $stmt = $mysqli->prepare("DELETE FROM students WHERE StudentID = ?");
    $stmt->bind_param("s", $StudentID);
    $stmt->execute();

    // Check if any rows were affected (if the Students existed)
    if ($stmt->affected_rows > 0) {
        $DeleteStudent = array('success' => 'Students deleted successfully.');
        echo json_encode($DeleteStudent);
        exit();
    } else {
        $DeleteStudent = array('success' => 'Students not found or could not be deleted.');
        echo json_encode($DeleteStudent);
        exit();
    }
} else {
    $DeleteStudent = array('success' => 'Invalid request.');
    echo json_encode($DeleteStudent);
    exit();
}
?>
