<?php
require_once '../../../connection/db_connection.php';

session_start();
if (!isset($_SESSION['username']) || !isset($_SESSION['password'])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['doctorID'])) {
    $doctorID = $_GET['doctorID'];

    // Prepare and execute the delete query
    $stmt = $mysqli->prepare("DELETE FROM doctors WHERE doctorID = ?");
    $stmt->bind_param("s", $doctorID);
    $stmt->execute();

    // Check if any rows were affected (if the doctors existed)
    if ($stmt->affected_rows > 0) {
        $Deletedoctor = array('success' => 'doctors deleted successfully.');
        echo json_encode($Deletedoctor);
        exit();
    } else {
        $Deletedoctor = array('success' => 'doctors not found or could not be deleted.');
        echo json_encode($Deletedoctor);
        exit();
    }
} else {
    $Deletedoctor = array('success' => 'Invalid request.');
    echo json_encode($Deletedoctor);
    exit();
}
?>
