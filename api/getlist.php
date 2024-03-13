<?php include_once "./db.php";
$ress=$News->all($_POST);
foreach($ress as $res){
    ?>
    <div onclick="getnews(<?=$res['id'];?>)"><?=$res['title'];?></div>
    <?php
}
?>