<?php
include "config.php";

if ($data_base && isset($_FILES['file']) && isset($_POST['name'])) {
            
            $target_dir = "../usersPersonalImage"; 
        
            $filename = $_FILES["file"]["name"]; 
          
            if(!is_dir("$target_dir")){
                mkdir("$target_dir", 0700, true);
            }
            $savefile = "$target_dir/$filename";
        
            if(move_uploaded_file($_FILES["file"]["tmp_name"], $savefile)) {
                header('Content-Type: application/json');
                
                $name = $_POST['name'];
                $carNumber = $_POST['carNumber'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $userImage = "$baseUrl/usersPersonalImage/$filename";

                $data = array(
                    "name" => $name,
                    "carNumber" => $carNumber,
                    "email" => $email,
                    "phone" => $phone,
                    "userImage" => $userImage
                );

                if(insertData("drivers", $data, false)){

                    $insertedData =getAllData("drivers","userImage = '$userImage'",false)[0];
                    
                    echo json_encode(array("status" => "success","data" => $insertedData));
                }
                else{
                    echo json_encode(array("status" => "failure","reason" => "Check Your Internet"));
                }
        }
        else{
            echo json_encode(array("status" => "failure","reason" => "image Failed"));
        }
}
