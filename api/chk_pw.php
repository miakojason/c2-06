<?php include_once "./db.php";
$res = $User->count($_POST);
$_SESSION['user']=$_POST['acc'];
echo $res;
