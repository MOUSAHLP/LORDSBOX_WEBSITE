<?php
include "config.php";

if ($data_base && isset($_POST['id'])) {
    $id =$_POST['id'];
    
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