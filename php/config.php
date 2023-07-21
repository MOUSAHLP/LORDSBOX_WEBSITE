<?php

// معلومات اتصال مع قاعدة البيانات
$dbusername="root";
$dbpassword="";
$data_base= new pdo("mysql:host=localhost; dbname=lordsbox; charset=utf8",$dbusername,$dbpassword);

//رابط الموقع
$baseUrl = "https://lordsbox.com"; 
include "functions.php";
?>