<?php
include "config.php";

if ($data_base && isset($_POST['id'])) {
    $id =$_POST['id'];

    
    
    $data = getAllData("counter", "userId = $id AND imgPM <> '' ",false);


    foreach($data as $row){
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

    deleteData("counter", "userId = $id AND imgPM <> '' ");
    
}


?>