<?php

include_once ("../base.php");
$data['acc']=$_POST['acc'];
$data['pw']=$_POST['pw'];
$chk = nums($_POST['table'],$data);
$table =$_POST['table'];
if($chk > 0){
    echo 1;
    switch($table){
        case "admin":
            $_SESSION['admin']=$data['acc'];
        break;
        case "member":
            $_SESSION['mem']=$data['acc'];
        break;
    }
}else{
    echo 0;
}


?>