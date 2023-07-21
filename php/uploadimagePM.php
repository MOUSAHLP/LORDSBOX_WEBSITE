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
            $taskId = intval($_POST["taskId"]);
            $workHours = $_POST["worksHour"];


            $data = array(
                "imgPM" => "$baseUrl/uploadedImage/$userId/$filename",
                "workHours" => $workHours,
            );

            if(updateData("counter", $data,"id = $taskId" , false) ){
                echo json_encode(array("status" => "success"));
            }
        }
}
