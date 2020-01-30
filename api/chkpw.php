<?php

include_once ("../base.php");
$data['acc']=$_POST['acc'];
$data['pw']=$_POST['pw'];
$chk = nums($_POST['table'],$data);
if($chk > 0){
    echo 1;
}else{
    echo 0;
}


?>