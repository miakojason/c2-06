<?php include_once "./db.php";
$_POST['acc']=$_SESSION['user'];
if($Log->count($_POST)>0){
    $Log->del($_POST);
}else{
    $Log->save($_POST);
}