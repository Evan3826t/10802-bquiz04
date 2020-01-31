<?php
include_once ("../base.php");

$type = all("type",['parent'=> $_GET['main']]);

foreach ($type as $k => $v) {
    echo "<option value='". $v['id'] ."'>". $v['text'] ."</option>";
}

?>
