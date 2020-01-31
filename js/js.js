// JavaScript Document
function lof(x)
{
	location.href=x
}

// 第三題也可以用，可以先寫
function del(table,id){
    $.post("./api/del.php",{table,id},function(res){
        location.reload();
    })
}
