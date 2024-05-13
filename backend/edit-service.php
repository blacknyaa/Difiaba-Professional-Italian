<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    include 'config.php';
    $id = $_POST['service_id'];
    $service = $_POST['service_name'];
    $price = $_POST['service_price'];
    $opt = $_POST['service_optgroup'];

    $insert_sql = "UPDATE services SET service = ?, price = ?, optgroup = ? WHERE serviceID = ?";
    $insert_stmt = $con->prepare($insert_sql);
    
    $insert_stmt->bind_param("sssi", $service, $price, $opt, $id);
    
    if ($insert_stmt->execute()) {

        echo "success";

    } else {

        echo "Error: " . $insert_sql . "<br>" . $insert_stmt->error;

    }

    $insert_stmt->close();

    
}

    $con->close();

?>