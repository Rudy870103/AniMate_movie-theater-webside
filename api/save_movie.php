<?php include_once "db.php";

if(!empty($_FILES['poster']['tmp_name'])){
    move_uploaded_file($_FILES['poster']['tmp_name'],"../img/{$_FILES['poster']['name']}");
    $_POST['poster']=$_FILES['poster']['name'];
}

if(!isset($_POST['id'])){
    $_POST['sh']=1;
}

$Movie->save($_POST);

to("../back.php?do=movie");