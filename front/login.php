<fieldset>
    <legend>會員登入</legend>
    <table>
        <tr>
            <td class="clo">帳號</td>
            <td><input type="text" name="acc" id="acc"></td>
        </tr>
        <tr>
            <td class="clo">密碼</td>
            <td><input type="password" name="pw" id="pw"></td>
        </tr>
        <tr>
            <td>
                <input type="button" value="登入" onclick="login()">
                <input type="button" value="清除" onclick="clean()">
            </td>
            <td>
                <a href="?=forget">忘記密碼</a>|<a href="?do=reg">尚未註冊</a>
            </td>
        </tr>
    </table>
</fieldset>
<script>
function clean(){
    $("input[type='text'],input[type='password'],input[type='radio']").val('');
}
function login(){
    let acc=$("#acc").val();
    let pw=$("#pw").val();
    $.post("./api/chk_acc.php",{acc},(res)=>{
        if(parseInt(res)==0){
            alert("查無此帳號");
        }else{
            $.post("./api/chk_pw.php",{acc,pw},(res)=>{
                if(parseInt(res)==0){
                    alert("密碼錯誤")
                }else{
                    location.href='./back.php';
                }
            })
        }
    })
}
</script>