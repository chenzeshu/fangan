<html>
<head>
<meta charset='utf-8'>
<title>系统DEL页面</title>
</head>
<style>
.excel{
	display:block; 
	float:left;
	padding:5px 0 0 0;
	text-align:center;
	width:210px;
	height:25px;
	color:black; 
	text-decoration:none;
	border:1px solid black;
	box-shadow:2px 2px black;
	border-radius:5px
}
.clearfix{
	content:"";
	display:block;
	clear:both;
}
table{
	width:1100px;
		border-collapse:collapse;
}
td{
	border:1px solid black;
	width:100px;
	text-align:center;
}
td.id{
	width:30px;
}
.luru{
	display:block;
	margin:5% 0 0 10%;
	float:left;
}
</style>
<?php
session_start();

if(!$_SESSION['username']){          
    header("location:index.php");
}

    echo "正在进行重置……<hr>";  //
    
     $db = new mysqli('localhost','root','chenzeshu8','workbase');
     $db ->set_charset('UTF8');
     if ($db->connect_errno){
         echo "无法连接服务器";
     }else{
         $table = $_SESSION['username']."_yewu";
        //truncate table
         $query="truncate table ".$table;
         $result=$db->query($query);
         if($result){
             echo "重置成功";
         }else{
             echo "重置失败";
         }
         
     } 
     
   


?>
<body>
<div class="clearfix"></div>
<a href="WORK_SYS.php" class="excel" style="margin:50px 0 0 50px">去添加系统</a>
<a href="WORK_RESULT.php" class="excel" style="margin:50px 0 0 50px"">返回业务表单</a>

</body>
</html>
