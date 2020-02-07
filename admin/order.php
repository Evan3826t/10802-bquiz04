<h1 class="ct">會員管理</h1>
<table class="all">
    <tr class="tt">
        <td class="ct">訂單編號</td>
        <td class="ct">金額</td>
        <td class="ct">會員帳號</td>
        <td class="ct">姓名</td>
        <td class="ct">下單時間</td>
        <td class="ct">操作</td>
    </tr>
    <?php
    $ord = all("ord",[]);
    foreach ($ord as $k => $m) {
    ?>
    <tr class="pp">
        <td class="ct"><a href="?do=ord_detail&id=<?=$m['id']?>"><?=$m['no']?></a></td>
        <td class="ct"><?=$m['total']?></td>
        <td class="ct"><?=$m['acc']?></td>
        <td class="ct"><?=$m['name']?></td>
        <td class="ct"><?=$m['orddate']?></td>
        <td class="ct">
            <button onclick="del('ord',<?=$m['id']?>)">刪除</button>
        </td>
    </tr>
    <?php
    }
    ?>
</table>
<div class="ct"><button onclick="lof('index.php')">返回</button></div>
