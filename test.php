<?php
include_once("base.php");

$data['acc']="admin";
$data['pw']="1234";
$data['pr']=serialize([1,2,3,4,5]);
save("admin",$data);
$data['acc']="test";
$data['pw']="1234";
$data['pr']=serialize([1,3,5]);
save("admin",$data);

?>