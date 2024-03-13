<fieldset>
    <legend>目前位置:首頁>最新文章區</legend>
    <table>
        <tr>
            <th>標題</th>
            <th>內容</th>
            <th></th>
        </tr>
        <?php
        $total = $News->count(['sh' => 1]);
        $div = 5;
        $pages = ceil($total / $div);
        $now = $_GET['p'] ?? 1;
        $start = ($now - 1) * $div;
        $rows = $News->all(" limit $start,$div");
        foreach ($rows as $row) {
        ?>
            <tr>
                <td class="clo list" data-id="<?= $row['id']; ?>" style="width: 50%;">
                    <div><?= $row['title']; ?></div>
                </td>
                <td>
                    <div id="s<?= $row['id']; ?>"><?= mb_substr($row['text'], 0, 20); ?>...</div>
                    <pre style="display:none" id="a<?= $row['id']; ?>"><?= $row['text'] ?></pre>
                </td>
                <td>
                    <?php
                    if (isset($_SESSION['user'])) {
                        if ($Log->count(['news' => $row['id'], 'acc' => $_SESSION['user']]) > 0) {
                            echo  "<a onclick='good({$row['id']})'>收回讚</a>";
                        } else {
                            echo  "<a onclick='good({$row['id']})'>讚</a>";
                        }
                    }
                    ?>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
    <div>
        <?php
        if ($now > 1) {
            $prev = $now - 1;
            echo "<a href='?do=$do&p=$prev'><</a>";
        }
        for ($i = 1; $i <= $pages; $i++) {
            $fontsize = ($now == $i) ? '24px' : '16px';
            echo "<a href='?do=$do&p=$i'style='font-size:$fontsize'>$i</a>";
        }
        if ($now < $pages) {
            $next = $now + 1;
            echo "<a href='?do=$do&p=$next'>></a>";
        }
        ?>
    </div>
</fieldset>
<script>
    $(".list").on('click', function() {
        let id = $(this).data('id')
        $("#a" + id, ).toggle()
        $("#s" + id).toggle()

    })
    function good(news){
        $.post("./api/good.php",{news},()=>{
            location.reload()
        })
    }
</script>