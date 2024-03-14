<?php
$row = $Que->find($_GET['id']);
?>
<fieldset>
    <legend>目前位置:首頁>問卷調查><?= $row['text']; ?></legend>
    <h3><?= $row['text']; ?></h3>
    <?php
    $rows = $Que->all(['subject_id' => $_GET['id']]);
    foreach ($rows as $row) {
        $total=$Que->find($_GET['id'])['vote'];
        $total=($total==0)?1:$total;
        $rate=round($row['vote']/$total,2)
    ?>
    <div style="display: flex;">
        <div style="width: 50%;"><?=$row['text'];?></div>
        <div style="width: <?=40*$rate;?>%;" class="clo"></div>
        <div style="width: 10%;"><?=$row['vote']?>票(<?=$rate*100;?>%)</div>
    </div>
    <?php
    }
    ?>
    <div class="ct"><input type="button" value="返回" onclick="location.href='./index.php?do=que'"></div>
</fieldset>