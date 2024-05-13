<?php


include "config.php";

$query = "SELECT * FROM services";
$result = mysqli_query($con, $query);

if ($result) {
    $services = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $services[] = $row;
    }

    header('Content-Type: application/json');
    echo json_encode($services);
} else {
    $error = array('error' => 'Failed to fetch services');
    header('Content-Type: application/json');
    http_response_code(500);
    echo json_encode($error);
}

mysqli_close($con);
?>