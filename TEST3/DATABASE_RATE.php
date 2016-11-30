<html>
<head>
    <meta charset='utf-8'>
</head>
</html>
<?php
echo "<hr>";

$db = new mysqli('localhost','root','chenzeshu8','workbase');
$db->set_charset('UTF8');
if ($db->connect_errno){
    echo "没有连接";
}else{
    if (isset($_POST['mei_rate'])){
        $mei_rate = $_POST['mei_rate'];
        echo "本次你更新了美元汇率【<b>".$mei_rate."</b>】<hr>";
        $query = "UPDATE workrate set mei_rate ='".$mei_rate."' where id = 1 ";
        $result = $db->query($query);
        if ($result){
            echo '更新成功';
        }else{
            echo '更新失败';
        }
    }elseif(isset($_POST['ou_rate'])){
        $ou_rate = $_POST['ou_rate'];
        echo "本次你更新了欧元汇率【<b>".$ou_rate."</b>】<hr>";
        $query = "UPDATE workrate set ou_rate ='".$ou_rate."' where id = 1 ";
        $result = $db->query($query);
        if ($result){
            echo '更新成功';
        }else{
            echo '更新失败';
        }
    }elseif(isset($_POST['tax'])){
        $tax = $_POST['tax'];
        echo "本次你更新了税率【<b>".$tax."</b>】<hr>";
        $query = "UPDATE workrate set tax ='".$tax."' where id = 1 ";
        $result = $db->query($query);
        if ($result){
            echo '更新成功';
        }else{
            echo '更新失败';
        }
    }elseif(isset($_POST['times'])){
        $times = $_POST['times'];
        echo "本次你更新了税率【<b>".$times."</b>】<hr>";
        $query = "UPDATE workrate set times ='".$times."' where id = 1 ";
        $result = $db->query($query);
        if ($result){
            echo '更新成功';
        }else{
            echo '更新失败';
        }
    }
}
$query_mei = "SELECT mei_rate FROM workrate where id = 1 ";
$re_mei = $db->query($query_mei);
echo "<br>美元汇率:".$rate_mei = $re_mei->fetch_assoc()['mei_rate'];

$query_ou = "SELECT ou_rate FROM workrate where id = 1 ";
$re_ou = $db->query($query_ou);
echo "<br>欧元汇率:".$rate_ou = $re_ou->fetch_assoc()['ou_rate'];

$query_tax = "SELECT tax FROM workrate where id = 1 ";
$re_tax = $db->query($query_tax);
echo "<br>大陆税率:".$rate_tax = $re_tax->fetch_assoc()['tax'];

$query_times = "SELECT times FROM workrate where id = 1 ";
$re_times = $db->query($query_times);
echo "<br>报价比例:".$times = $re_times->fetch_assoc()['times'];

echo "<br>【10秒后返回】";
echo "<script>
setTimeout(function(){
    window.location.href='database_show.php';
},10000);
</script>";