<?php

if(empty($_SESSION['mem'])){
    to("index.php?do=login");
    exit();
}

if(!empty($_GET['id'])){
    $_SESSION['cart'][$_GET['id']] = $_GET['qt'];
}
if(empty($_SESSION['cart'])){
    echo "購物車中沒有商品";
}else{
?>
<h1 class="ct"><?=$_SESSION['mem']?>的購物車</h1>
<table class="all">
    <tr class="tt">
        <td>編號</td>
        <td>商品名稱</td>
        <td>數量</td>
        <td>庫存量</td>
        <td>單價</td>
        <td>小計</td>
        <td>刪除</td>
    </tr>
    <?php
    foreach ($_SESSION['cart'] as $k => $qt) {
        $row = find("goods",$k);
        ?>
        <tr class="pp">
            <td><?=$row['no']?></td>
            <td><?=$row['name']?></td>
            <td><?=$qt?></td>
            <td><?=$row['qt']?></td>
            <td><?=$row['price']?></td>
            <td><?=($row['price']*$qt)?></td>
            <td><img src="./icon/0415.jpg" onclick="delCart(<?=$k?>)" alt=""></td>
        </tr>

        <?php
    }
    ?>
</table>
<div class="ct">
    <img src="./icon/0411.jpg" onclick="lof('index.php')" alt="">
    <img src="./icon/0412.jpg" onclick="lof('index.php?do=billing')" alt="">
</div>
<?php
};
?>

<script>
function delCart(id){
    $.post("./api/del_cart.php",{id},function(){
        // 這邊不能用 location.reload();
        lof("index.php?do=buycart");
    })
}
</script>