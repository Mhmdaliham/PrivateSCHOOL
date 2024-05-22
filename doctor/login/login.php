<?php
include_once "../../connection/db_connection.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST['username'];
    $password = $_POST['password']; 


    $sql = "SELECT Password, DoctorID FROM doctors WHERE username = ? OR Email = ?";
    $stmt = $mysqli->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("ss", $username, $username);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($DBPass, $DBDoctorID);
            $stmt->fetch();

            if (password_verify($password, $DBPass)) {
                $_SESSION['username'] = $username;
                $_SESSION['password'] = $password;
                $_SESSION['doctorID'] = $DBDoctorID;

                echo json_encode(
                    array("success" =>  "user loged in successfully"));
            } else {
               echo json_encode(array("error" => "Incorrect password."));
            }
        } else {
           echo json_encode(array("error" => "this email is not fount. Please register your user to proceed."));
        }

        $stmt->close();
    } else {
       echo json_encode(array("error" => "Error preparing statement: " . $mysqli->error));
    }

    $mysqli->close();
} else {
    echo json_encode(array("error" =>"Invalid request method."));
}
?>
