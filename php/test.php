<?php 

include "config.php";

if(isset($_POST["id"])){

    $id = $_POST['id'];
    $name = $_POST['name'];
    $carNumber = $_POST['carNumber'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    
    
    
    $target_dir = "../usersPersonalImage"; 
    
    $userData = getAllData("drivers", "id = $id ",false)[0];
    $userImage = $userData["userImage"];

    $data = array(
        "name" => $name,
        "carNumber" => $carNumber,
        "email" => $email,
        "phone" => $phone,
        "userImage" => $userImage
    );

    if(updateData("drivers", $data,"id = $id" , false) ){
        echo json_encode(array("status" => "success"));
    }
}
