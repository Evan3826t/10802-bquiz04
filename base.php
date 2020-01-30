<?php
$dsn = "mysql:host=localhost;charset=utf8;dbname=db114";
$pdo = new PDO($dsn,"root","");

session_start();
function find($table,...$arg){
    global $pdo;
    $sql = "select * from $table where ";
    if(is_array($arg[0])){
        foreach ($arg[0] as $k => $v) {
            $tmp[]= sprintf("`%s`='%s'",$k,$v);
        }
        $sql .= implode(" && ",$tmp);
    }else{
        $sql .= "id='". $arg[0] ."'";
    }
    return $pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
}

function all($table,...$arg){
    global $pdo;
    $sql = "select * from $table ";
    if(!empty($arg[0])){
        foreach ($arg[0] as $k => $v) {
            $tmp[] = sprintf("`%s`='%s'",$k,$v);
        }
        $sql .= "where ".implode(" && ",$tmp);
    }
    if(!empty($arg[1])){
        $sql .= $arg[1];
    }
    return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}

function nums($table,...$arg){
    global $pdo;
    $sql = "select count(*) from $table ";
    if(!empty($arg[0])){
        foreach ($arg[0] as $k => $v) {
            $tmp[] = sprintf("`%s`='%s'",$k,$v);
        }
        $sql .=  "where ".implode(" && ",$tmp);
    }
    if(!empty($arg[1])){
        $sql .= $arg[1];
    }
    return $pdo->query($sql)->fetchcolumn();
}

function del($table,...$arg){
    global $pdo;
    $sql = "delete from $table where ";
    if(is_array($arg[0])){
        foreach ($arg[0] as $k => $v) {
            $tmp[]= sprintf("`%s`='%s'",$k,$v);
        }
        $sql .= implode(" && ",$tmp);
    }else{
        $sql .= "id='". $arg[0] ."'";
    }
    return $pdo->exec($sql);
}

function save($table,$data){
    global $pdo;
    if(!empty($data['id'])){
        foreach ($data as $k => $v) {
            if($k!="id"){
                $tmp[]=sprintf("`%s`='%s'",$k,$v);
            }
        }
        $sql ="update $table set ". implode(",",$tmp) ."where id='". $data['id'] ."'";
    }else{
        $sql ="insert into $table (`". implode("`,`",array_keys($data)) ."`) values ('". implode("','",$data) ."')";
    }
    return $pdo->exec($sql);
}

function q($sql){
    global $pdo;
    return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);  
}

function to($path){
    header("location:".$path);
}

function pre($data){
    echo "<pre>";print_r($data);"</pre>"; 
}
?>
