<?php
include_once ("../base.php");

save("member",$_POST);
to("../admin.php?do=mem");
?>