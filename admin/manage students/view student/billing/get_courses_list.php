<?php
require_once '../../../../connection/db_connection.php';

$sql = "SELECT * FROM courses";

$stmt = $mysqli->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
$CoursesList = $result->fetch_all(MYSQLI_ASSOC);

json_encode($CoursesList);

?>
