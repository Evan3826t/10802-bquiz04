<?php
include_once ("../base.php");
// echo "<script>alert(`訂購成功\n感謝您的訂購`)</script>";
pre($_POST);
$data=$_POST;
$data['no']=date("Ymd").rand(000001,999999);
$data['acc']=$_SESSION['mem'];
$data['goods']=serialize($_SESSION['cart']);
pre($_SESSION);
pre($data);
save("ord",$data);
unset($_SESSION['cart']);
to("../index.php");
?>