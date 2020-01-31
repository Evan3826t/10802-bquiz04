<h1 class="ct">商品分類</h1>
<form action="./api/add_type.php" method="post">
    新增大分類
    <input type="text" name="text">
    <input type="submit" value="新增">
</form>
<form action="./api/add_type.php" method="post">
    新增中分類<select name="parent">
    <?php
    $bigs = all("type",['parent'=>0]);
    foreach ($bigs as $k => $v) {
        echo "<option value='". $v['id'] ."'>". $v['text'] ."</option>";
    }
    ?>
    </select>
    <input type="text" name="text" >
    <input type="submit" value="新增">
</form>
<table class="all">
<?php
foreach ($bigs as $k => $v) {
?>
<tr class="tt">
    <td><?=$v['text']?></td>
    <td>
        <button onclick="editType(this,<?=$v['id']?>)">修改</button>
        <button onclick="del('type',<?=$v['id']?>)">刪除</button>
    </td>
</tr>

<?php
    if(nums("type",["parent" => $v['id']])>0){
        $subs = all("type",['parent' => $v['id']]);
        foreach ($subs as $k => $s) {
        ?>
        <tr class="pp">
            <td><?=$s['text']?></td>
            <td>
                <button onclick="editType(this,<?=$s['id']?>)">修改</button>
                <button onclick="del('type',<?=$s['id']?>)">刪除</button>
            </td>
        </tr>

        <?php
        }
    }
}


?>
</table>

<h1 class="ct">商品管理</h1>
<div class="ct"><button onclick="lof('admin.php?do=add_goods')">新增商品</button></div>

<table class="all">
    <tr class="tt">
        <td class="ct">編號</td>
        <td class="ct">商品名稱</td>
        <td class="ct">庫存量</td>
        <td class="ct">狀態</td>
        <td class="ct">操作</td>
    </tr>
    <?php
    $goods = all("goods",[]);
    foreach ($goods as $k => $v) {
    ?>
    <tr class="pp">
        <td class="ct"><?=$v['no']?></td>
        <td class="ct"><?=$v['name']?></td>
        <td class="ct"><?=$v['qt']?></td>
        <td class="ct"><?=($v['sh']==1)?"販售中":"已下架"?></td>
        <td class="ct">
            <button onclick="lof('admin.php?do=edit_goods&id=<?=$v['id']?>')">修改</button>
            <button onclick="del('goods',<?=$v['id']?>)">刪除</button>
            <button onclick="shGoods(<?=$v['id']?>,1)">上架</button>
            <button onclick="shGoods(<?=$v['id']?>,0)">下架</button>
        </td>
    </tr>
    <?php
    }
    ?>
</table>


<script>
function editType(dom,id){
    let text = $(dom).parent("td").prev().html();
    console.log(text);
    let type = prompt("請輸入要修改的名稱",text);
    if(type !==null){
        $.post("./api/edit_type.php",{id,type},function(){
            location.reload();
        })
    }
}
function shGoods(id,sh){
    $.get("./api/show.php",{id,sh},function(){
        location.reload();
    })
}
</script>