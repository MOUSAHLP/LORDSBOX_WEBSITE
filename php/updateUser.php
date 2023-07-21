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


    if(isset($_FILES["file"])){

        $filename = $_FILES["file"]["name"]; 

        $oldImage = $userData["userImage"];
        $oldImagearray = explode("/",$oldImage);
        
        $oldImageName = end($oldImagearray);


        $savefile = "$target_dir/$oldImageName";

        if(file_exists("$savefile")){
            unlink($savefile);
        }

        $newSaveFile = "$target_dir/$filename";
        
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $newSaveFile)) {
            header('Content-Type: application/json');

            $userImage = "$baseUrl/usersPersonalImage/$filename";
        }

    }
    $data = array(
        "name" => $name,
        "carNumber" => $carNumber,
        "email" => $email,
        "phone" => $phone,
        "userImage" => $userImage
    );

    if(updateData("drivers", $data,"id = $id" , false) ){
        echo json_encode(array("status" => "success","data"=>$data));
    }
}
