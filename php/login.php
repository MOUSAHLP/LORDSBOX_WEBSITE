<?php
include "config.php";

if ($data_base && isset($_POST['uniqueId'])) {
    
    $uniqueId = $_POST['uniqueId'];

    $isLogged = getAllData("drivers", "uniqueId = '$uniqueId' AND active = 1 ");
}

?>