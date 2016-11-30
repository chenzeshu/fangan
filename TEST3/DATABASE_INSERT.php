<html>
<head>
<meta charset='utf-8'>
<title>数据录入</title>
</head>
<style>
.shuru1{
	display:inline;
}
</style>
<?php
session_start();

if(!$_SESSION['username']){          
    header("location:index.php");
}
echo "请输入设备信息<hr>";
if (isset($_POST['name'])&&isset($_POST['stand'])){
    $db=new mysqli('localhost','root','chenzeshu8','workbase');
    $db->set_charset('UTF8');
    if($db->connect_errno){
        echo "无法连接服务器";
    }else{
            $system = $_POST['system'];
            $name =$_POST['name'];
            $stand=$_POST['stand'];
            $des_small = $_POST['des_small'];
            $des_all =$_POST['des_all'];
            $number=$_POST['number'];
            $unit = $_POST['unit'];
            $area =$_POST['area'];
            $brand=$_POST['brand'];
            $volume = $_POST['volume'];
            $weight =$_POST['weight'];
            $power = $_POST['power'];
            $cost_origin = $_POST['cost'];
//            $cost = $_POST['cost'];
            $sale_origin = $_POST['sale'];
//            $sale =$_POST['sale'];
            $u = $_POST['u'];
            $flag = $_POST['flag'];
            $remark = $_POST['remark'];
            $flag_times = $_POST['flag_times'];

            //汇率转换
            if($flag==1){
                //美元转换
                $query_mei = "SELECT mei_rate FROM workrate where id = 1 ";
                $query_tax = "SELECT tax FROM workrate where id = 1 ";
                $re_mei = $db->query($query_mei);
                $re_tax = $db->query($query_tax);
                $rate_mei = $re_mei->fetch_assoc()['mei_rate'];
                $rate_tax = $re_tax->fetch_assoc()['tax'];
                $cost = $cost_origin*$rate_mei*$rate_tax;
            }elseif($flag==2){
                //欧元转换
                $query_ou = "SELECT ou_rate FROM workrate where id = 1 ";
                $query_tax = "SELECT tax FROM workrate where id = 1 ";
                $re_ou = $db->query($query_ou);
                $re_tax = $db->query($query_tax);
                $rate_ou = $re_ou->fetch_assoc()['ou_rate'];
                $rate_tax = $re_tax->fetch_assoc()['tax'];
                $cost = $cost_origin*$rate_ou*$rate_tax;
            }else{
                $cost=$_POST['cost'];
            }
            //是否按比例
            if ($flag_times==1){
                $query_times = "SELECT times FROM workrate where id = 1 ";
                $re_times = $db->query($query_times);
                $times = $re_times->fetch_assoc()['times'];
                $sale = $cost_origin * $times;
            }else{
                $sale = $_POST['sale'];
            }

            $query ="INSERT INTO workcontent VALUES(NULL,'".$system."','".$name."','".$stand."','".$des_small."','".$des_all."',null,null,'".$number."','".$unit."','".$area."','".$brand."','".$volume."','".$weight."','".$power."','".$cost."','".$sale."','".$u."','".$flag."','".$remark."','".$flag_times."','".$cost_origin."','".$sale_origin."' )";
            $result=$db->query($query);


        if($result){
            header('location:DATABASE_SHOW.php');
        }else{
            var_dump($db->error_list);
            echo "录入失败";
        }
        $db->close();
      }
}
?>

</body>
</html>
   