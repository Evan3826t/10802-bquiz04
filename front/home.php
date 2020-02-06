<?php
$nav="全部商品";

if(!empty($_GET['type'])){
    $type=find("type",$_GET['type']);
    if($type['parent'] == 0){
        $nav=$type['text'];
        $items= all("goods",['main'=>$type['id'],'sh'=>1]);
    }else{
        $main = find("type",$type['parent']);
        $nav = $main['text']." > ".$type['text'];
        $items=all("goods",["sub"=>$type['id'],'sh'=>1]);
    }
}else{
    $items=all("goods",['sh'=>1]);
}

?>
<style>

</style>
<h3><?= $nav?></h3>
<?php
    foreach ($items as $k => $v) {
        ?>
        <table>
            <tr>
                <td class="pp" rowspan="4"><a href="index.php?do=detail&id=<?=$v['id']?>"><img src="./img/<?=$v['file']?>" alt="" width="200px"></a></td>
                <td class="tt"><?=$v['name']?></td>
            </tr>
            <tr>
                <td class="pp">價錢:<?=$v['price']?>
                    <a href="index.php?do=buycart&id=<?=$v['id']?>&qt=1"><img src="./icon/0402.jpg" alt="" style="float:right"></a>
                </td>
            </tr>
            <tr>
                <td class="pp">規格:<?=$v['spec']?></td>
            </tr>
            <tr>
                <td class="pp">簡介:<?=mb_substr($v['intro'],0,20,"utf8")?>...</td>
            </tr>
        </table>
        <?php
    }
?>