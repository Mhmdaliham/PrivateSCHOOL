<?php
require_once('../../connection/db_connection.php');
$sql = "SELECT * FROM doctors";

$stmt = $mysqli->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
$doctorsList = $result->fetch_all(MYSQLI_ASSOC);

 json_encode($doctorsList);

?>
