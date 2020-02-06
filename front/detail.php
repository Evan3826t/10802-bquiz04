<?php
$data = find("goods",$_GET['id']);
?>
<h1 class="ct"><?=$data['name']?></h1>
<table xlass="all">
    <tr>
        <td class="pp" rowspan="5">
            <img src="./img/<?=$data['file']?>" alt="" width="400px">
        </td>
        <td class="pp">分類:<?=find("type",$data['main'])['text']?> > <?=find("type",$data['sub'])['text']?></td>
    </tr>
    <tr>
        <td class="pp">編號:<?=$data['no']?></td>
    </tr>
    <tr>
        <td class="pp">價格:<?=$data['price']?></td>
    </tr>
    <tr>
        <td class="pp">詳細說明:<?=nl2br($data['intro'])?></td>
    </tr>
    <tr>
        <td class="pp">庫存量:<?=$data['qt']?></td>
    </tr>
    <form action="index.php" method="get">
        <tr>
            <td colspan="2" class="tt ct">
                購買數量: <input type="text" name="qt" id="qt">
                <input type="submit" value="" style="background:url('./icon/0402.jpg') no-repeat center;width:57px;height:18px;padding:0">
                <input type="hidden" name="id" value="<?=$data['id']?>">
                <input type="hidden" name="do" value='buycart'>
            </td>
        </tr>
    </form>
</table>
<div class="ct"><button onclick="lof('index.php')">返回</button></div>