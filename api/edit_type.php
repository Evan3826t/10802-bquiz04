<?php
include_once ("../base.php");

$type = find("type",$_POST['id']);
$type['text'] = $_POST['type'];

save("type",$type);


?>