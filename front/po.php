<div>目前位置:首頁>分類網誌><span id="span">健康新知</span></div>
<fieldset>
    <legend>分類網誌</legend>
    <a class="tag" data-type="1">健康新知</a>
    <a class="tag" data-type="2">菸害防治</a>
    <a class="tag" data-type="3">癌症防治</a>
    <a class="tag" data-type="4">慢性病防治</a>
</fieldset>
<fieldset>
    <legend>文章列表</legend>
    <div class="lists"></div>
    <pre class="article"></pre>
</fieldset>
<script>
    $(".tag").on('click',function(){
        $("#span").text($(this).text())
        let type =$(this).data('type')
        getlist(type)
    })
    function getlist(type){
$.post("./api/getlist.php",{type},(res)=>{
    $(".article").html('')
    $(".lists").html(res)
})
    }
    function getnews(id){
        $.post("./api/getnews.php",{id},(res)=>{
            $(".lists").html('')
            $(".article").html(res)
        })
    }
</script>