<h1 class="ct">會員註冊</h1>
<form action="" method="post">
    <table class="all">
        <tr>
            <td class="tt">姓名</td>
            <td class="pp"><input type="text" name="name" id="name"></td>
        </tr>
        <tr>
            <td class="tt">帳號</td>
            <td class="pp"><input type="text" name="acc" id="acc"><input type="button" onclick="chkAcc()" value="檢查帳號"></td>
        </tr>
        <tr>
            <td class="tt">密碼</td>
            <td class="pp"><input type="passward" name="pw" id="pw"></td>
        </tr>
        <tr>
            <td class="tt">電話</td>
            <td class="pp"><input type="text" name="tel" id="tel"></td>
        </tr>
        <tr>
            <td class="tt">住址</td>
            <td class="pp"><input type="text" name="addr" id="addr"></td>
        </tr>
        <tr>
            <td class="tt">電子信箱</td>
            <td class="pp"><input type="email" name="email" id="email"></td>
        </tr>
    </table>
    <div class="ct">
        <input type="button" onclick="reg()" value="註冊">
        <input type="reset" value="重置">
    </div>
</form>
<script>
function chkAcc(){
    let acc=$("#acc").val();
    $.get("./api/chkacc.php",{acc},function(result){
        if(result == "1" || acc == "admin"){
            alert("此帳號已被使用");
        }else{
            alert("此帳號可使用");
        }
    })
}

function reg(){
    let acc=$("#acc").val();
    let pw=$("#pw").val();
    let name=$("#name").val();
    let addr=$("#addr").val();
    let email=$("#email").val();
    let tel=$("#tel").val();
    
    $.get("./api/chkacc.php",{acc},function(result){
        if(result == "1" || acc == "admin"){
            alert("此帳號已被使用");
        }else{
            $.post("./api/reg.php",{acc,pw,name,addr,email,tel},function(){
                location.href="index.php?do=login";
            })
        }
    })
}

</script>