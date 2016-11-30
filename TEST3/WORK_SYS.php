<html>
<head>
<meta charset='utf-8'>
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
<title>业务表单生成——系统选择</title>
<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
<style>
.excel{
	display:block; 
	float:left;
	padding:5px 0 0 0;
	text-align:center;
	width:200px;
	height:23px;
	color:black; 
	text-decoration:none;
	border:1px solid black;
	box-shadow:2px 2px black;
	border-radius:5px
}
table{
	width:1200px;
		border-collapse:collapse;
}
tr{
	height:40px;
}
td{
	border:1px solid black;
	width:100px;
	text-align:center;
}
.ir{
	background-color:lightblue !important;
	font-weight:bold;
	font-size:1.3em;
	font-family:'微软雅黑;
}
td.id{
	width:25px;
}
.id2{
	width:20px;
}
.luru{
	display:block;
	margin:5% 0 0 10%;
	float:left;
}
h1{
	text-align:center;
	font-family:'微软雅黑';
}
input{
	font-size:18px;
	padding:1%;
}
input['checkbox']{
	width:5%;
}
label{
	font-size:2rem;
}
</style>
<script>
        function check(){
        	var fm=document.getElementsByTagName('form')[0];
        		var fd = new FormData(fm);
        		var xhr = new XMLHttpRequest;
        		xhr.onreadystatechange = function(){
        			if(xhr.readyState==4){
        				if(xhr.responseText!="111"){
        					alert(xhr.responseText);
        				}else{
        					$('form').submit();
        				}
        			}
        		}
        		xhr.open('POST','WORK_RESULT_TEST_SYS.php');
        		xhr.send(fd);
        		return false;
        }

</script>
<?php
session_start();
if(!$_SESSION['username']){            
    header("location:index.php");
}else {
  echo "<h1>选择相应系统</hz><hr>";
    $db=new mysqli('localhost','root','chenzeshu8','workbase');
    $db->set_charset('UTF8');
    if($db->connect_errno){
        echo "无法连接服务器";
    }else{       

        if(isset($_POST['delete_show'])){
            $delete_show = $_POST['delete_show'];
            $delete_query="DELETE FROM worksys WHERE id=$delete_show";
            $delete=$db->query($delete_query);
            if(!$delete){
                echo "";
            }
        }
        
        $query ='SELECT * FROM worksys';      
        $result=$db->query($query);
        if ($result->num_rows){
            echo '<form action="WORK_RESULT.php" method="post" class="container">';
            echo "<table class='table table-bordered table-striped table-hover' style='margin-left:0'>";
            echo "<tr class='ir'>";
            echo "<td class='col-lg-2'>选择</td>";
            echo "<td class='id'>序号</td>";
            echo "<td>系统名称</td>";

            echo "</tr>";
             for($i=1;$row=$result->fetch_assoc();$i++){
                echo "<tr>";
                echo "<td class='id2'>";
                
                echo "<div class='checkbox'>";
                echo "<label>";
                echo "<input type='checkbox' name='chk[]' autocomplete='off' value='".$row['id']."'>点我";
                echo "</label>";
                echo "</div>";

                echo "</td>";
                echo "<td class='id' style='padding-top:20px'>".$row['id']."</td>";
                echo "<td><label>".$row['system']."</label></td>";
                
                echo "</tr>";
             }
            echo "<table>";

           echo "</form>";
            
        }else{
            echo "没有数据 ";
        }
        $db->close();
    }
}
?>
    <body>
<div class="container">
	<div class="row" style="margin-top:10px">
		<div class="col-lg-6"></div>

		<div class="col-lg-4">
			<button class="btn btn-info btn-lg" type="button" onclick="check()">提交选择的系统</button>
		</div>
		<div class="col-lg-2"></div>
	</div>
	<div class="row" style="margin-top:30px">
		<div class="col-lg-6"></div>

		<div class="col-lg-4">
			<a href="WORK_RESULT.php" class="btn btn-warning btn-lg" ">返回业务表单</a>
		</div>
		<div class="col-lg-2"></div>
	</div>
</div>


    </body>
</html>