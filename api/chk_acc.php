<?php include_once "./db.php";
$res = $User->count(['acc' => $_POST['acc']]);
if ($res == 0) {
    echo $res=0;
}else{
    echo $res=1;
}
