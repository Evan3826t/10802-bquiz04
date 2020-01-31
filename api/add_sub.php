<?php
include_once ("../base.php");

$data['text'] =$_POST['text'];
$data['parent'] = $_POST['parent'];
save("type",$data);


?>