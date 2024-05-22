<?php
require_once '../../connection/db_connection.php';

session_start();


$StudentID = $_SESSION['StudentID'];

$sql = "SELECT S.id, 
            O.CourseName ,  
            CONCAT(D.Firstname, ' ', D.LastName) AS DoctorName, 
            R.RoomName, 
            C.Schedule
        FROM student_courses S
        INNER JOIN classes C ON S.ClassID = C.ClassID
        INNER JOIN courses O ON O.CourseID  = C.CourseID
        INNER JOIN doctors D ON D.DoctorID  = C.DoctorID
        INNER JOIN rooms R ON R.RoomID  = C.RoomID
        WHERE S.student_ID = ? ";

$stmt = $mysqli->prepare($sql);
$stmt->bind_param("i", $StudentID);
$stmt->execute();
$result = $stmt->get_result();
$studentsSchedual = $result->fetch_all(MYSQLI_ASSOC);

 json_encode($studentsSchedual);

// $stmt->close();
// $mysqli->close();
?>
