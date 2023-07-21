<?php
// header("Access-Control-Allow-Origin: *");
// header("Access-Control-Allow-Methods", "GET,PUT,PATCH,POST,DELETE");
// header("Access-Control-Allow-Headers: X-Requested-With");
// header("Access-Control-Allow-Headers", "Origin, X-Requested-With, Content-Type, Accept");
include "config.php";

if ($data_base && isset($_POST['getUsers'])) {
    
    getAllDataOrderd("drivers", "1 = 1","isOnline","DESC");
}
// echo json_encode(array("status" => "success"));


?>