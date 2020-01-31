<h1 class="ct">新增商品</h1>
<?php
    $type = all("type",[]);
?>
<form action="./api/add_goods.php" method="post" enctype="multipart/form-data">
    <table class="all">
        <tr>
            <td class="tt ct">所屬大分類</td>
            <td class="pp">
                <select name="main" id="big"></select>
            </td>
        </tr>
        <tr>
            <td class="tt ct">所屬中分類</td>
            <td class="pp"><select name="sub" id="sub"></select></td>
        </tr>
        <tr>
            <td class="tt ct">商品編號</td>
            <td class="pp">完成分類後自動分配</td>
        </tr>
        <tr>
            <td class="tt ct">商品名稱</td>
            <td class="pp"><input type="text" name="name" id="name"></td>
        </tr>
        <tr>
            <td class="tt ct">商品價格</td>
            <td class="pp"><input type="number" name="price" id="price"></td>
        </tr>
        <tr>
            <td class="tt ct">規格</td>
            <td class="pp"><input type="text" name="spec" id="spec"></td>
        </tr>
        <tr>
            <td class="tt ct">庫存量</td>
            <td class="pp"><input type="number" name="qt" id="qt"></td>
        </tr>
        <tr>
            <td class="tt ct">商品圖片</td>
            <td class="pp"><input type="file" name="file" id="file"></td>
        </tr>
        <tr>
            <td class="tt ct">商品介紹</td>
            <td class="pp"><textarea name="intro" id="intro" cols="30" rows="10"></textarea></td>
        </tr>
    </table>
    <div class="ct"><input type="submit" value="送出"><input type="reset" value="重置"><input type="button" onclick="lof('admin.php?do=th')" value="返回"></div>
</form>
<script>
getMain();
$("#big").on("change",function(){
    getSub()
})

function getMain(){
    $.get("./api/get_main.php",{},function(res){
        $("#big").html(res);
        getSub();
    })
}

function getSub(){
    let main = $("#big").val();
    $.get("./api/get_sub.php",{main},function(res){
        $("#sub").html(res);
    })
}
</script>