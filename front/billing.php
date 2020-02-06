<?php
$mem =find("member",["acc"=>$_SESSION['mem']]);

?>
<h2 class="ct">填寫資料</h2>
<form action="./api/billing.php" method="post">
    <table class="all">
        <tr>
            <td class="tt ct">登入帳號</td>
            <td class="pp"><?=$_SESSION['mem']?></td>
        </tr>
        <tr>
            <td class="tt ct">姓名</td>
            <td class="pp"><input type="text" name="name" value="<?=$mem['name']?>"></td>
        </tr>
        <tr>
            <td class="tt ct">電子信箱</td>
            <td class="pp"><input type="email" name="email" value="<?=$mem['email']?>"></td>
        </tr>
        <tr>
            <td class="tt ct">聯絡地址</td>
            <td class="pp"><input type="text" name="addr" value="<?=$mem['addr']?>"></td>
        </tr>
        <tr>
            <td class="tt ct">連絡電話</td>
            <td class="pp"><input type="text" name="tel" value="<?=$mem['tel']?>"></td>
        </tr>
    </table>
    <table class="all">
        <tr>
            <td class="tt">商品名稱</td>
            <td class="tt">編號</td>
            <td class="tt">數量</td>
            <td class="tt">單價</td>
            <td class="tt">小計</td>
        </tr>
        <?php
        $sum=0;
        foreach ($_SESSION['cart'] as $k => $v) {
            $row = find("goods",$k);
            $sum += ($v*$row['price']);
        ?>
        <tr>
            <td class="pp"><?=$row['name']?></td>
            <td class="pp"><?=$row['no']?></td>
            <td class="pp"><?=$v?></td>
            <td class="pp"><?=$row['price']?></td>
            <td class="pp"><?=($v*$row['price'])?></td>
        </tr>
        <?php
        }
        ?>
        <tr>
            <td colspan="5" class="tt ct">總價:<?=$sum?></td>
        </tr>
    </table>
    <input type="hidden" name="total" value="<?=$sum?>">
    <input type="submit" value="確認送出"><input type="button" value="返回修改訂單" onclick="lof('index.php')">
</form>

<script>
$("input[type=submit]").on("click",function(){
    alert(`訂購成功\n感謝您的訂購`);
})
</script>