<?php 

include "config.php";

if(isset($_POST["id"])){

    $id = $_POST['id'];
    $uniqueId = $_POST['uniqueId'];
    
     if(getAllData("drivers", "uniqueId = $uniqueId ",false)){

        echo json_encode(array("status" => "failure"));
    }else{

        
        $data = array(
            "uniqueId" => $uniqueId,
            "active" => "1",
        );
        
        if(updateData("drivers", $data,"id = $id" , false) ){
            echo json_encode(array("status" => "success"));
        }
    }
}
