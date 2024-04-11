<?php include_once "db.php";

sort($_POST['seat']);

$_POST['seat']=serialize($_POST['seat']);

$id=$Orders->max('id')+1;

$_POST['no']=date("Ymd").sprintf("%04d",$id);

$_POST['acc']=$_SESSION['member'];

$Orders->save($_POST);

echo $_POST['no'];