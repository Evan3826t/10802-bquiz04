<h1 class="ct">新增管理帳號</h1>
<?php
$admin=find("admin",$_GET['id']);
$admin['pr']= unserialize($admin['pr']);
?>
<form action="./api/edit_admin.php" method="post">
    <table class="all">
        <tr>
            <td class="tt ct">帳號</td>
            <td class="pp"><input type="text" name="acc" id="acc" value="<?=$admin['acc']?>"></td>
        </tr>
        <tr>
            <td class="tt ct">密碼</td>
            <td class="pp"><input type="password" name="pw" id="pw" value="<?=$admin['pw']?>"></td>
        </tr>
        <tr>
            <td class="tt ct">權限</td>
            <td class="pp">
                <div><input type="checkbox" name="pr[]" value="1" <?=(in_array(1,$admin['pr']))?"checked":"";?>>商品分類與管理</div>
                <div><input type="checkbox" name="pr[]" value="2" <?=(in_array(2,$admin['pr']))?"checked":"";?>>訂單管理</div>
                <div><input type="checkbox" name="pr[]" value="3" <?=(in_array(3,$admin['pr']))?"checked":"";?>>會員管理</div>
                <div><input type="checkbox" name="pr[]" value="4" <?=(in_array(4,$admin['pr']))?"checked":"";?>>頁尾版權管理</div>
                <div><input type="checkbox" name="pr[]" value="5" <?=(in_array(5,$admin['pr']))?"checked":"";?>>最新消息管理</div>
                <input type="hidden" name="id" value="<?=$admin['id']?>">
            </td>
        </tr>
    </table>
    <div class="ct"><input type="submit" value="修改"><input type="reset" value="重置"></div>
</form>