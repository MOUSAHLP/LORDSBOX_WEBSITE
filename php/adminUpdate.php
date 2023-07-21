<?php 

include "config.php";

if(isset($_POST["name"])){

    $name = $_POST['name'];
    $password = $_POST['password'];
    
    $data = array(
        "name" => $name,
        "password" => $password,
    );

    if(updateData("admins", $data,"1 = 1 " , false) ){
        echo json_encode(array("status" => "success","data"=>$data));
    }else{
        echo json_encode(array("status" => "failure"));
    }
}
