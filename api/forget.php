<?php include_once "./db.php";
if ($User->count($_POST) > 0) {
    $res = $User->find($_POST);
    echo "您的密碼為:" . $res['pw'];
} else {
    echo "查無此資料";
}
