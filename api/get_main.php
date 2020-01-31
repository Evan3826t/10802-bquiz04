<?php
include_once ("../base.php");

$type = all("type",['parent'=> 0]);

foreach ($type as $k => $v) {
    echo "<option value='". $v['id'] ."'>". $v['text'] ."</option>";
}

?>
