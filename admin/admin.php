<div class="ct"><button onclick="lof('admin.php?do=add_admin')">新增管理員</button></div>
<table class="all">
    <tr class="tt">
        <td class="ct">帳號</td>
        <td class="ct">密碼</td>
        <td class="ct">管理</td>
    </tr>
    <?php
    $admin = all("admin",[]);
    foreach ($admin as $k => $a) {
    ?>
    <tr class="pp">
        <td class="ct"><?=$a['acc']?></td>
        <td class="ct"> <?=str_repeat("*",strlen($a['pw'])) ?></td>
        <td class="ct">
        <?php
        if($a['acc']=="admin"){
            echo "此帳號為最高權限";
        }else{
        ?>
            
            <button onclick="lof('admin.php?do=edit_admin&id=<?=$a['id']?>')">修改</button>
            <button onclick="del('admin',<?=$a['id']?>)">刪除</button>
        <?php
        }
        ?>
        </td>
    </tr>
    <?php
    }
    ?>
</table>
<div class="ct"><button onclick="lof('index.php')">返回</button></div>
