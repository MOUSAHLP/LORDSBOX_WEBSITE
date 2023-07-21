<?php
include "config.php";

if ($data_base && isset($_POST['userId']) && isset($_POST['latitude']) && isset($_POST['longitude'])) {

    $userId = $_POST['userId'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];

    $data = array(
        "latitude" => $latitude,
        "longitude" => $longitude,
        "isOnline" => 1
    );

   $id= intval($userId);
    if(updateData("drivers", $data,"id = $id", false)){
        echo json_encode(array("status" => "success","data" => $data));
    }
    else{
        echo json_encode(array("status" => "failure","reason" => "Check Your Internet"));
    }
}

?>