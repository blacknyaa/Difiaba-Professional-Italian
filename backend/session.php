<?php

    session_start();

    $login = false;

    if(isset($_SESSION["user"])) {

        $login=true;
        
    }

?>