<?php
$ord= find("ord",$_GET['id']);

?>
<h2 class="ct">訂單編號<?=$ord['no']?>填寫資料</h2>
    <table class="all">
        <tr>
            <td class="tt ct">登入帳號</td>
            <td class="pp"><?=$ord['acc']?></td>
        </tr>
        <tr>
            <td class="tt ct">姓名</td>
            <td class="pp"><?=$ord['name']?></td>
        </tr>
        <tr>
            <td class="tt ct">電子信箱</td>
            <td class="pp"><?=$ord['email']?></td>
        </tr>
        <tr>
            <td class="tt ct">聯絡地址</td>
            <td class="pp"><?=$ord['addr']?></td>
        </tr>
        <tr>
            <td class="tt ct">連絡電話</td>
            <td class="pp"><?=$ord['tel']?></td>
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
        $cart=unserialize($ord['goods']);
        foreach ($cart as $k => $v) {
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
    <input type="button" value="返回修改訂單" onclick="lof('admin.php?do=order')">

