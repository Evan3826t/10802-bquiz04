<h1 class="ct">編輯會員資料</h1>
<?php
$mem = find("member",$_GET['id']);
?>
<form action="./api/edit_mem.php" method="post">
    <table class="all">
        <tr>
            <td class="tt">帳號</td>
            <td class="pp"><?=$mem['acc']?></td>
        </tr>
        <tr>
            <td class="tt">密碼</td>
            <td class="pp"><?=str_repeat("*",strlen($mem['pw']));?></td>
        </tr>
        <tr>
            <td class="tt">累積交易額</td>
            <td class="pp"><?=$mem['total']?></td>
        </tr>
        <tr>
            <td class="tt">姓名</td>
            <td class="pp"><input type="text" name="name" value="<?=$mem['name']?>"></td>
        </tr>
        <tr>
            <td class="tt">電話</td>
            <td class="pp"><input type="text" name="tel" value="<?=$mem['tel']?>"></td>
        </tr>
        <tr>
            <td class="tt">住址</td>
            <td class="pp"><input type="text" name="addr" value="<?=$mem['addr']?>"></td>
        </tr>
        <tr>
            <td class="tt">電子信箱</td>
            <td class="pp"><input type="email" name="email" value="<?=$mem['email']?>"></td>
        </tr>
        <input type="hidden" name="id" value="<?=$mem['id']?>">
    </table>
    <div class="ct">
        <input type="submit"  value="修改">
        <input type="reset" value="重置">
        <input type="button" value="取消" onclick="lof('admin.php?do=mem')">
    </div>
</form>
