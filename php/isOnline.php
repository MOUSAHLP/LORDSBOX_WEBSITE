<?php
include "config.php";

if ($data_base && isset($_POST['userId'])) {

    $userId = $_POST['userId'];

    $data = array(
        "isOnline" => 0
    );
    $id= intval($userId);

    if(updateData("drivers", $data,"id = '$id'", false)){
        echo json_encode(array("status" => "success","data" => $data));
    }
    else{
        echo json_encode(array("status" => "failure","reason" => "Check Your Internet"));
    }
}

?>