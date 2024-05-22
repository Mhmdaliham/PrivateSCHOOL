<?php
include_once "../../../connection/db_connection.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $FirstName = $_POST['FirstName'];
    $LastName = $_POST['LastName'];
    $Email = $_POST['Email']; 
    $Phone = $_POST['Phone'];
    $Address = $_POST['Address'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    
    $sql = "SELECT Email, Username FROM doctors WHERE Email = ? OR Username = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("ss", $Email, $username);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($DBEmail, $DBUsername);
    $stmt->fetch();

    if ($stmt->num_rows > 0) {
        
        if ($DBEmail == $Email) {
            echo json_encode(array("error" => "Email Error: Email already exists in the database."));
        }
        if ($DBUsername == $username) {
            echo json_encode(array("error" => "Username Error: Username already exists in the database."));
        }
    } else {
        
        $password = trim($password);
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        
        $insertStmt = $mysqli->prepare("INSERT INTO doctors (FirstName, LastName, Email, Phone, Address, Username, Password) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $insertStmt->bind_param("sssssss", $FirstName, $LastName, $Email, $Phone, $Address, $username, $hashedPassword);
        $insertStmt->execute();
        
        if ($insertStmt->affected_rows > 0) {
            $_SESSION['username'] = $username;
            $_SESSION['Email'] = $Email;
            echo json_encode(array("success" => "New record created successfully"));
            
        } else {
            echo json_encode(array("error" => "Error: " . $mysqli->error));
        }

        $insertStmt->close();
    }

    $stmt->close();
}

$mysqli->close();
?>
