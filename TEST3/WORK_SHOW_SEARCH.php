<html>
<head>
<meta charset='utf-8'>
<title>表单展示页面</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<script type="text/javascript" src="js/jquery-1.11.3.min.js" ></script>
<script type="text/javascript" src="js/bootstrap.min.js" ></script>
</head>

<?php
session_start();
	
if(empty($_SESSION['username'])){
    header("location:index.php");
}else {
    $db=new mysqli('localhost','root','chenzeshu8','workbase');
    $db->set_charset('UTF8');
	$system_data=$_POST['system'];
	$name = $_POST['name'];
	$brand = $_POST['brand']; 
	$stand = $_POST['stand'];
	
	    echo "<table class='table table-striped table-bordered table-hover' style='clear:both'>";
        echo "<tr class='ir info'>";
        echo "<td>选择</td>";
            echo "<td>序号</td>";
            echo "<td class='id2'>分系统</td>";
            echo "<td class='id2'>设备名称</td>";
            echo "<td>设备型号</td>";
            echo "<td>简单参数描述</td>";
            echo "<td>详细参数描述</td>";
            echo "<td>数量</td>";
            echo "<td>单位</td>";
            echo "<td>产地</td>";
            echo "<td>品牌</td>";
            echo "<td>体积</td>";
            echo "<td>重量</td>";
            echo "<td>功耗</td>";
            echo "<td>成本单价</td>";
            echo "<td>出厂单价</td>";
        echo "</tr>";
	
	
        echo '<form action="WORK_RESULT.php" method="POST" id="search">';
            $system = $_SESSION['edit'];
            $query ="SELECT * FROM workcontent WHERE name like '%$name%' and brand like '%$brand%' and stand like '%$stand%' and system like '%$system_data%'";
	        $result = $db->query($query);
            if ($result->num_rows){
                for($i=1;$row=$result->fetch_assoc();$i++){
                    if (!empty($row['name'])){
                        echo "<tr>";
                        echo "<div class='checkbox'>";
                        echo "<td class='id'><label><input type='checkbox' name='chk[]' value='".$row['id']."'>点</label></td>";
                        echo "<td class='id'>".$row['id']."</td>";
                        echo "<td class='id5'>".$row['system']."</td>";
                        echo "<input type='hidden' name='system' value='".$system."'>";
                        echo "<td class='id6'>".$row['name']."</td>";
                        echo "<td class='id5'>".$row['stand']."</td>";
                        echo "<td class='id5'>".$row['des_small']."</td>";
                        echo "<td class='id5'>".$row['des_all']."</td>";
                        echo "<td class='id'>".$row['number']."</td>";
                        echo "<td class='id'>".$row['unit']."</td>";
                        echo "<td class='id'>".$row['area']."</td>";
                        echo "<td class='id2'>".$row['brand']."</td>";
                        echo "<td class='id2'>".$row['volume']."</td>";
                        echo "<td class='id3'>".$row['weight']."</td>";
                        echo "<td class='id3'>".$row['power']."</td>";
                        echo "<td class='id2'>".round($row['cost'],0)."</td>";
                        echo "<td class='id2'>".round($row['sale'],-1)."</td>";
                        echo "</div>";
                        echo "</tr>";
                    }
                }
                 
                echo "</table>";
                echo '<div class="btn-group pull-right">';
//                echo '<div class="btn-group"  style="margin-bottom:100px"><button class="btn btn-info btn-lg" type="submit" name="tool"/>批量提交</button></div>';
                echo '</div>';
				
                echo "</form>";
                 
            }else{
                echo "没有设备 ";
            }
	
	
}	
?>

<nav class="navbar navbar-default navbar-fixed-bottom">
	<a href="#" class="navbar-brand" style="font-size:25px;font-weight:bold;color:#46b8da;" >南京中网卫星通信股份有限公司</a>
    <div class="container" style="width:40%;text-align: center;display: inline-block;margin-left: 10%;">
        <div class="navbar-header">
			<!--按钮-->
			<button class="nav navbar-nav navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<!--按钮-->
			<!--LOGO-->

		</div>
     <div class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				<li><div class="btn-group">
<a href="WORK_RESULT.php" role="button" class="btn btn-default btn-block">返回业务表单</a>
				</div></li>
				<li><div class="btn-group">
						<button class="btn btn-primary btn-block" onclick="submitInfo()">提交表单</button>
				</div></li>
				<li><div class="btn-group">
         <a href="door.php" style="text-decoration: none"><button class="btn btn-default btn-block">返回首页</button></a>
				</div></li>
			</ul>
		</div>
  </div> <!-- container --> 
</nav>
<script src="js/jquery-1.11.3.min.js"></script>
<script>
	function submitInfo(){

		var chk = [];
		$('input:checked').each(function(){
			chk.push($(this).val());
		})
		$.post('work_result.php',{tool:'tool',chk:chk,system:$('input[type=hidden]').val()},function(){
			window.location.href="work_result.php";
		})
	}
</script>
</html>