<?php
// header("Access-Control-Allow-Origin: *");
// header("Access-Control-Allow-Methods", "GET,PUT,PATCH,POST,DELETE");
// header("Access-Control-Allow-Headers", "Origin, X-Requested-With, Content-Type, Accept");
include "config.php";

if ($data_base && isset($_POST['id'])) {
    $id =$_POST['id'];
    
    getAllDataOrderd("counter", "userId = $id","id","DESC");
}
// echo json_encode(array("status" => "success"));


?>