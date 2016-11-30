<html>
<head>
<meta charset='utf-8'>
<title>查询页面</title>
</head>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
<style>

</style>

<?php
session_start();

if(!$_SESSION['username']){
    header("location:index.php");
}

if(isset($_POST['delete_show'])){
    $db=new mysqli('localhost','root','chenzeshu8','workbase');
    $db->set_charset('utf8');
    if($db->connect_errno){
        echo "无法连接数据库";
    }else {
        $delete_show = $_POST['delete_show'];
        $delete_query = "DELETE FROM workcontent WHERE id=$delete_show";
        $delete = $db->query($delete_query);
        if (!$delete) {
            echo "删除失败";
        }
    }
}

if (isset($_POST['name'])&&isset($_POST['stand'])&&isset($_POST['des_small'])&&isset($_POST['system'])){
    $db=new mysqli('localhost','root','chenzeshu8','workbase');
    $db->set_charset('utf8');
    if($db->connect_errno){
        echo "无法连接数据库";
    }else{      
        $name =$_POST['name'];
        $stand=$_POST['stand'];
        $des_small= $_POST['des_small'];
        $system = $_POST['system'];

        $query ="SELECT * FROM workcontent WHERE name like '%$name%' and system like '%$system%' and stand like '%$stand%' and des_small like '%$des_small%'";  
        $result=$db->query($query);
            if ($result->num_rows){
            echo "<table class='table table-bordered table-striped'>";
            echo "<tr>";
            echo "<td>序号</td>";
            echo "<td>分系统</td>";
            echo "<td>设备名称</td>";
            echo "<td>设备型号</td>";
            echo "<td>品牌</td>";
            echo "<td>简单参数描述</td>";
            echo "<td>详细参数描述</td>";
            echo "<td>数量</td>";
            echo "<td>单位</td>";
            echo "<td>产地</td>";
            echo "<td>体积</td>";
            echo "<td>机柜尺寸</td>";
            echo "<td>重量</td>";
            echo "<td>功耗</td>";
            echo "<td>成本单价</td>";
            echo "<td>出厂单价</td>";
            echo "<td>操作1</td>";
            echo "</tr>";
             for($i=1;$row=$result->fetch_assoc();$i++){
                echo "<tr>";
                echo "<td class='id'>".$row['id']."</td>";
                echo "<td>".$row['system']."</td>";
                echo "<td>".$row['name']."</td>";
                echo "<td>".$row['stand']."</td>";
                echo "<td>".$row['brand']."</td>";
                echo "<td>".$row['des_small']."</td>";
                echo "<td>".$row['des_all']."</td>";
                echo "<td>".$row['number']."</td>";
                echo "<td>".$row['unit']."</td>";
                echo "<td>".$row['area']."</td>";
                echo "<td>".$row['volume']."</td>";
                echo "<td>".$row['u']."</td>";
                echo "<td>".$row['weight']."</td>";
                echo "<td>".$row['power']."</td>";
                echo "<td>".$row['cost']."</td>";
                echo "<td>".$row['sale']."</td>";
                echo "<td>"; 
                echo "<form action='DATABASE_SEARCH.php' method='post'>";                   //删除
                echo "<input type='hidden' name='delete_show' value='".$row['id']."'/>";  
                echo "<input style='margin:2% 0 -5% 0' type='submit' value='删除'>";                                 
                echo "</form>";                                                           
                echo "</td>";                                                             
                
                echo "</tr>";
             }
            echo "</table>";
        }else{
            var_dump($db->error_list);
            echo "错误 ";
		}
        $db->close();
      }
}
?>
<body>
</br>
<div class="panel panel-default">
    <div class="panel-heading">
        <label>
            搜索栏
        </label>
    </div>
    <div class="panel-body">
        <form action="DATABASE_SEARCH.php" method="post" style="margin-left:100px;">
            分系统：　<select name = 'system' style="width:18%">
                <option value='卫星通信天线'>一、卫星通信天线</option>
                <option value='卫星功放'>二、卫星功放</option>
                <option value='卫星LNB'>三、卫星LNB</option>
                <option value='卫星通信机设备'>四、卫星通信机设备</option>
                <option value='卫星通信的辅助设备和器材'>五、卫星通信的辅助设备和器材</option>
                <option value='软件'>六、软件</option>
                <option value='北斗设备'>七、北斗设备</option>
                <option value='TD-LTE专网设备'>八、TD-LTE专网设备</option>
                <option value='卫星电话'>九、卫星电话</option>
                <option value='对讲设备'>十、对讲设备</option>
                <option value='短波设备'>十一、短波设备</option>
                <option value='VOIP语音网关'>十二、VOIP语音网关</option>
                <option value='语音调度及周边设备'>十三、语音调度及周边设备</option>
                <option value='计算机及网络设备'>十四、计算机及网络设备</option>
                <option value='视讯会议和编解码器'>十五、视讯会议和编解码器</option>
                <option value='图传设备'>十六、图传设备</option>
                <option value='视音频输入输出设备'>十七、视音频输入输出设备</option>
                <option value='电源设备'>十八、电源设备</option>
                <option value='辅助设备'>十九、辅助设备</option>
                <option value='载车'>二十、载车</option>
                <option value='信道、服务费用'>二十一、信道、服务费用</option>
            </select>   　　　
            设备名称：<input type="text" name="name" style="width:18%"></br></br>
            设备规格：<input type="text" name="stand" style="width:18%">  　设备简单描述：<input type="text" name="des_small" style="width:18%"></br></br>
            <input type="submit" class="btn btn-default" value="查询"> <a href="DATABASE_SHOW.php" class="btn btn-default">返回数据库页面</a>
        </form>

    </div>
</div>

    
</body>
</html>
   