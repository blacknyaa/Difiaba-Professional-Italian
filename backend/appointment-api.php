<?php


include "config.php";

$data = json_decode(file_get_contents("php://input"), true);

$errors = [];
$error_count = 0;

if(empty(trim($data['date']))) {
    $errors['appt'] = "Please fill out all the data in the form";
    $error_count += 1;
} else {
    
    $errors['appt'] = "";
}
if(empty(trim($data['time']))) {
    $errors['appt'] = "Please fill out all the data in the form";
    $error_count += 1;
} else {
    
    $errors['appt'] = "";
}

if(empty(trim($data['service']))) {
    $errors['appt'] = "Please fill out all the data in the form";
    $error_count += 1;

}

if($error_count == 0) {

    $first_name = $data["firstname"];
    $last_name = $data["lastname"];
    $email = $data["email"];
    $contact_number = $data["phone"];
    $date = $data["date"];
    $time = $data["time"];
    $service = $data["service"];
    $price = $data["price"];
    $status = "pending";

    $checkEmailStmt = $con->prepare("SELECT COUNT(*) FROM appointments WHERE email = ? AND status = ?");
    $checkEmailStmt->bind_param("ss", $email, $status);
    $checkEmailStmt->execute();
    $checkEmailStmt->bind_result($emailCount);
    $checkEmailStmt->fetch();
    $checkEmailStmt->close();

    if ($emailCount > 0) {

      $error = 2;
      $message = "You already have an pending appointment";
      $errors['appt'] = $message;
      $errors['validate'] = "exists";

  } else {

          $sql = "INSERT INTO appointments (firstname, lastname, email, phone, date, time, service, price, status ) 
          VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
          $stmt = $con->prepare($sql);
          $stmt->bind_param("sssssssss", $first_name, $last_name, $email, $contact_number, $date, $time, $service, $price, $status);

          if ($stmt->execute()) {

            $error = 1;
            $message = "Appointment submitted check your email for confirmation";
            $errors['success'] = "success";
            $errors['count'] = $message;

          } else {

              $error = 2;
              $message = "An Error Occurred";
              $errors['count'] = $message;

          }

          $stmt->close();

  }

} else {

  $errors['count'] = "Empty Field".$error_count;
  $error_count = 0;

}


header('Content-Type: application/json');
echo json_encode($errors);

?>