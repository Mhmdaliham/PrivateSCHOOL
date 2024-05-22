<?php
require_once '../../../../connection/db_connection.php';

$sql = "SELECT r.RateAmountPerHour, c.CourseName, c.CourseID  
        FROM courses c
        INNER JOIN courserates r ON c.CourseID=r.CourseID ";

$stmt = $mysqli->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
$CoursesList = $result->fetch_all(MYSQLI_ASSOC);

json_encode($CoursesList);

?>
