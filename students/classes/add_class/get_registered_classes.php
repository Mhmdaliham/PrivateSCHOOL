<?php
require_once '../../connection/db_connection.php';

// session_start();

$sql = "SELECT C.ClassID, 
            O.CourseName,  
            R.RoomName, 
            CONCAT(D.Firstname, ' ', D.LastName) AS doctorName,
            C.Schedule
        FROM classes C
        INNER JOIN courses O ON O.CourseID  = C.CourseID
        INNER JOIN doctors D ON D.DoctorID  = C.DoctorID
        INNER JOIN rooms R ON R.RoomID  = C.RoomID";

$stmt = $mysqli->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
$allSchedual = $result->fetch_all(MYSQLI_ASSOC);

 json_encode($allSchedual);

?>
