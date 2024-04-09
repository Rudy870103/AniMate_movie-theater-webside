<?php include_once "db.php";

$data[$_POST['type']]=$_POST['val'];

$Orders->del($data);