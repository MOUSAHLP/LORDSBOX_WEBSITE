<?php
include "config.php";

if ($data_base && isset($_POST['name'])&& isset($_POST['password'])) {
    
    $name = $_POST['name'];
    $password = $_POST['password'];

    getAllData("admins", "name = '$name' AND password = '$password' ");
}

?>