<?php include_once "./db.php";
$opt=$Que->find($_POST['vote']);
$opt['vote']++;
$Que->save($opt);
$row=$Que->find(['id'=>$opt['subject_id']]);
$row['vote']++;
$Que->save($row);
to("../index.php?do=result&id={$row['id']}");