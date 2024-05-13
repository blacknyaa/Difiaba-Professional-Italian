<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    include 'config.php';
    $service = $_POST['service_name'];
    $price = $_POST['service_price'];
    $opt = $_POST['service_optgroup'];

    $insert_sql = "INSERT INTO services (service, price, optgroup) VALUES (?, ?, ?)";
    $insert_stmt = $con->prepare($insert_sql);
    
    $insert_stmt->bind_param("sss", $service, $price, $opt);
    
    if ($insert_stmt->execute()) {

        echo "success";

    } else {

        echo "Error: " . $insert_sql . "<br>" . $insert_stmt->error;

    }

    $insert_stmt->close();

    
}

    $con->close();

?>