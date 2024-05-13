<?php


include "config.php";

$data = json_decode(file_get_contents("php://input"), true);

$errors = [];
$error_count = 0;

if(empty(trim($data['firstname']))) {
    $errors['firstname'] = "First name is required";
    $error_count += 1;
} else {
    
    $errors['firstname'] = "";

}
if(empty(trim($data['lastname']))) {
    $errors['lastname'] = "Last name is required";
    $error_count += 1;
} else {
    $errors['lastname'] = "";
    
}

if(empty(trim($data['email']))) {
    $errors['email'] = "Email is required";
    $error_count += 1;

} else {
    
    $errors['email'] = "";
    
}

if(empty(trim($data['email']))) {
    $errors['email'] = "Email is required";
    $error_count += 1;
} elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = "Invalid email format";
    $error_count += 1;
} else {
    $errors['email'] = "";
}

if(empty(trim($data['phone']))) {
    $errors['phone'] = "Phone number is required";
    $error_count += 1;

} else {
    
    $errors['phone'] = "";
    
}

if(empty(trim($data['password']))) {
    $errors['password'] = "Password is required";
    $error_count += 1;

} else {
    
    $errors['password'] = "";
    
}

if($error_count == 0) {

    $first_name = $data["firstname"];
    $last_name = $data["lastname"];
    $email = $data["email"];
    $contact_number = $data["phone"];
    $password = md5($data["password"]);
    $level = "user";

    $checkEmailStmt = $con->prepare("SELECT COUNT(*) FROM users WHERE email = ?");
    $checkEmailStmt->bind_param("s", $email);
    $checkEmailStmt->execute();
    $checkEmailStmt->bind_result($emailCount);
    $checkEmailStmt->fetch();
    $checkEmailStmt->close();

    if ($emailCount > 0) {

      $error = 2;
      $message = "Email already used. Please choose a different email.";
      $errors['count'] = $message;
      $errors['validate'] = "exists";

  } else {

      $password_pattern = '/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/';

      if (preg_match($password_pattern, $data['password'])) {
          
          $sql = "INSERT INTO users (firstname, lastname, phone, email, password, level) 
          VALUES (?, ?, ?, ?, ?, ?)";
          $stmt = $con->prepare($sql);
          $stmt->bind_param("ssssss", $first_name, $last_name, $contact_number, $email, $password, $level);

          if ($stmt->execute()) {

            $error = 1;
            $message = "Registration complete";
            $errors['success'] = "success";
            $errors['count'] = $message;

          } else {

              $error = 2;
              $message = "An Error Occurred";
              $errors['count'] = $message;

          }

          $stmt->close();

      } else {

          $errors['password'] = "Password  must have 1 uppercase, 1 lowercase, 1 number and atleast 8 characters";

      }

  }

} else {

  $errors['count'] = "Empty Field".$error_count;
  $error_count = 0;

}


header('Content-Type: application/json');
echo json_encode($errors);

?>