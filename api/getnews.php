<?php include_once "./db.php";
$res=$News->find($_POST);
    ?>
    <div><?=$res['text'];?></div>
