<?php 

include "config.php";
if(isset($_FILES["file"])){
    
    $target_dir = "../uploadedImage"; 
    
    
        $filename = $_FILES["file"]["name"]; 
        $userId = explode("_",$filename)[0];
        if(!is_dir("$target_dir/$userId")){
            mkdir("$target_dir/$userId", 0700, true);
        }
        $savefile = "$target_dir/$userId/$filename";
    
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $savefile)) {
            header('Content-Type: application/json');

            $data = array(
                "userId" => intval($userId),
                "imgAM" => "$baseUrl/uploadedImage/$userId/$filename",
            );

            if(insertData("counter", $data, false)){
                $insertedData =getAllData("counter","imgAM = '$baseUrl/uploadedImage/$userId/$filename'",false)[0];
                echo json_encode(array("status" => "success","data" => $insertedData));
            }
            else{
                echo json_encode(array("status" => "failure","reason" => "Check Your Internet"));
            }
        }
}
