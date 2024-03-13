<?php include_once "./db.php";
$_POST['acc'] = $_SESSION['user'];
$row = $News->find($_POST['news']);
if ($Log->count($_POST) > 0) {
    $Log->del($_POST);
    $row['good']--;
} else {
    $Log->save($_POST);
    $row['good']++; 
}
$News->save($row);