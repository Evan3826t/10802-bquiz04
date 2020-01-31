<?php
// add_main.php & add_sub.php 合併
include_once ("../base.php");

save("type",$_POST);

to("../admin.php?do=th");
?>