<?php


require_once("session.php");
include "config.php";

$data = json_decode(file_get_contents("php://input"), true);

$errors = [];
$error_count = 0;

if(empty(trim($data['email']))) {
    $errors['email'] = "Email is required";
    $error_count += 1;

} else {
    
    $errors['email'] = "";
    
}

if(empty(trim($data['email']))) {
    $errors['email'] = "Email is required";
    $error_count += 1;
    $errors['login'] = "";
} elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = "Invalid email format";
    $error_count += 1;
    $errors['login'] = "";
} else {
    $errors['email'] = "";
}

if(empty(trim($data['password']))) {
    $errors['password'] = "Password is required";
    $error_count += 1;
    $errors['login'] = "";

} else {
    
    $errors['password'] = "";
    
}

if ($error_count == 0) {

    $email = $data["email"];
    $password = md5($data["password"]);

    $stmt = mysqli_prepare($con, "SELECT * FROM users WHERE email = ? AND password = ?");
    
    if ($stmt) {

        mysqli_stmt_bind_param($stmt, "ss", $email, $password);
        
        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);
            
            if ($result) {
                $userData = mysqli_fetch_assoc($result);
                
                if ($userData) {

                    $errors['login'] = "Logged in";
                    $_SESSION['firstname'] = $userData['firstname'];
                    $_SESSION['lastname'] = $userData['lastname'];
                    $_SESSION['email'] = $userData['email'];
                    $_SESSION['phone'] = $userData['phone'];
                    $_SESSION['level'] = $userData['level'];
                    $_SESSION['user'] = $userData['level'];
                    $errors['level'] = $userData['level'];
                    $errors['success'] = "success";
                    
                } else {

                    $errors['login'] = "Invalid email or password";
                }
            } else {

                $errors['login'] = "An error occurred while fetching user data";
            }
        } else {
            $errors['login'] = "An error occurred while executing the statement 1";
        }
        
        mysqli_stmt_close($stmt);
    } else {
        $errors['login'] = "An error occurred while preparing the statement 2";
    }
}


header('Content-Type: application/json');
echo json_encode($errors);

?>