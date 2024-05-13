<?php

include_once 'config.php';

try {

    $tableName = 'users';

    $query = "SELECT *
                  FROM $tableName
                  WHERE level = 'user'";
                  
    $statement = $con->prepare($query);
    $statement->execute();

    $result = $statement->get_result();
    
    $records = $result->fetch_all(MYSQLI_ASSOC);

} catch (Exception $e) {

    echo "Error: " . $e->getMessage();
}

?>