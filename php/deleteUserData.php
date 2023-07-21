<?php
include "config.php";

if ($data_base && isset($_POST['id'])) {
    $id =$_POST['id'];
    $userCounterData = getAllData("counter", "userId = $id ",false);


    foreach($userCounterData as $row){
        $indexAM = strpos($row["imgAM"],"uploadedImage");
    
        $substrAM =substr($row["imgAM"],$indexAM);
    
        $dirAM ="../$substrAM";

        if(file_exists("$dirAM")){
            unlink($dirAM);
        }

        $indexPM = strpos($row["imgPM"],"uploadedImage");
    
        $substrPM =substr($row["imgPM"],$indexPM);
    
        $dirPM ="../$substrPM";

        if(file_exists("$dirPM")){
            unlink($dirPM);
        }
    }

    deleteData("counter", "userId = $id ",false);


    $target_dir = "../usersPersonalImage"; 

    $userData = getAllData("drivers", "id = $id ",false)[0];
    
    $userImage =$userData["userImage"];

        $imagearray = explode("/",$userImage);
        
        $imageName = end($imagearray);


        $savefile = "$target_dir/$imageName";

        if(file_exists("$savefile")){
            unlink($savefile);
        }

    deleteData("drivers", "id = $id ");
    
}


?>