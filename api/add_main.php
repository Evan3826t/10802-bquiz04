<?php
include_once ("../base.php");

$data['text'] =$_POST['text'];
$data['parent'] = 0;
save("type",$data);


?>