<?php include_once "db.php";

$res=$Member->count(['acc'=>$_POST['acc']]);

if($res>0){
    echo 1;
}else{
    echo 0;
}