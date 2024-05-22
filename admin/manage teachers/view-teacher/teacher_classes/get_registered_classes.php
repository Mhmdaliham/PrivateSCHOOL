<?php
require_once '../../../../connection/db_connection.php';

session_start();


$doctorID = $_SESSION['doctorID'];

$sql = "SELECT C.ClassID , 
            O.CourseName ,  
            R.RoomName, 
            C.Schedule
        FROM classes C
        INNER JOIN courses O ON O.CourseID  = C.CourseID
        INNER JOIN rooms R ON R.RoomID  = C.RoomID
        WHERE C.DoctorID = ? ";

$stmt = $mysqli->prepare($sql);
$stmt->bind_param("i", $doctorID);
$stmt->execute();
$result = $stmt->get_result();
$doctorsSchedual = $result->fetch_all(MYSQLI_ASSOC);

 json_encode($doctorsSchedual);

// $stmt->close();
// $mysqli->close();
?>
