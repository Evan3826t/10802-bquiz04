<?php
include_once ("../base.php");

$data = find("goods",$_GET['id']);
$data['sh'] =$_GET['sh'];

save("goods",$data);


?>