<?php
//header("Content-type:application/vnd.ms-excel"); 
//header("Content-Disposition:attachment; filename=test_data.xls");
header("Content-Type: text/html; charset=UTF-8");
?>
<html>
<head>
<meta charset='utf-8'>
<title>表单展示页面</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js" ></script>
</head>
<style>

/*模态框input的间距*/
.input-group{
	    margin-bottom: 6%;
}
.excel{
	display:block; 
	float:left;
	padding:5px 0 0 0;
	margin:50px 50px 0 0;
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
	width:100%;
		border-collapse:collapse;
}
#tb_title{

}
td{
	border:1px solid black;
	width:100px;
	text-align:center;
}

.id{
	width:2%;
}
.id2{
	width:5%;
}
.id3{
	width:3%;
}
.id4{
	width:10%;
}
.id5{
	width:6%;
	font-size:13px;
	font-family:'微软雅黑';
}
.id6{
	width:8%;
	font-weight:bold;
	font-family:'微软雅黑';
}
.luru{
	display:block;
	margin:5% 0 0 10%;
	float:left;
}
.ir{
	background-color:lightgreen;
	font-weight:bold;
	font-size:1em;
	font-family:'微软雅黑';
}
</style>

<?php
session_start();
include("page.class.php");
if(empty($_SESSION['username'])){
    header("location:index.php");
}else {
    $db=new mysqli('localhost','root','chenzeshu8','workbase');
    $db->set_charset('UTF8');
    
    if($db->connect_errno){
        echo "无法连接服务器";
    }else{      
       //---------------------------------

        echo "<table class='table table-striped table-bordered table-hover scrolltable' style='clear:both'>";
        echo '<thead style="display:block;border-bottom:1px solid #eee;"> ';
        echo "<tr id='tb_title' class='ir info'>";
        echo "<td class='id'>选择</td>";
//          echo "<td class='id'>序号</td>";
            echo "<td class='id5'>分系统</td>";
            echo "<td class='id6'>设备名称</td>";
            echo "<td class='id5'>设备型号</td>";
            echo "<td class='id5'>简单参数描述</td>";
            echo "<td class='id5'>详细参数描述</td>";
            echo "<td class='id'>数量</td>";
            echo "<td class='id'>单位</td>";
            echo "<td class='id'>产地</td>";
            echo "<td class='id2'>品牌</td>";
            echo "<td class='id2'>体积</td>";
            echo "<td class='id3'>重量</td>";
            echo "<td class='id3'>功耗</td>";
            echo "<td class='id2'>成本单价</td>";
            echo "<td class='id2'>出厂单价</td>";
        echo "</tr>";
		echo "</thead>";
        echo '<tbody style="display:block; max-height:350px;overflow-y: auto;">';
        if(isset($_POST['EDIT_SHOW'])){
             //-------------------EDIT_SHOW是从RESULT页面来的-------------------
            //为了跳转而做的特殊待遇
            $_SESSION['edit']=$_POST['EDIT_SHOW'];
            echo '<form action="WORK_RESULT.php" method="POST">';
            $system = $_POST['EDIT_SHOW'];
            $query_all = 'SELECT * FROM workcontent';
            $result=$db->query($query_all);
			
			$cnt = $result->num_rows;
            $per = 40;
            $page = new Page($cnt,$per);
            $pagelist = $page ->fpage(array(0));
			
            if ($result->num_rows){
                for($i=1;$row=$result->fetch_assoc();$i++){
                    if ($i==50){
                        break;
                    }
                    if (!empty($row['name'])){
                        echo "<tr>";
                        echo "<div class='checkbox'>";
                        echo "<td class='id'><label><input type='checkbox' name='chk[]' value='".$row['id']."'>点</label></td>";
//                      echo "<td class='id'>".$row['id']."</td>";
                        echo "<td class='id5'><b>".$row['system']."</b></td>";  //系统显示还是按数据库的来，但是提交是按本系统提交
                        echo "<input type='hidden' name='system' value='".$system."'>";
                        echo "<td class='id6'>".$row['name']."</td>";
                        echo "<td class='id5'>".@$row['stand']."</td>";
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
				echo "<tr style='height:40px'><td colspan='19'>数据库".$pagelist."<b>数据过多，本页最多显示50条，请使用搜索功能</b></td></tr>";
                echo "</tbody>";
                echo "</table>";
                echo '<div class="btn-group pull-right">';
				echo '<div class="btn-group"><button class="btn btn-info btn" type="submit" name="tool" style="margin-bottom: 100px;
    			margin-right: 100px;"/>批量提交</button></div>'; 
				
                echo "</form>";
                 
            }else{
                echo "没有设备 ";
            }
             //----------------EDIT_SHOW---------------
        }else{
            
            echo '<form action="WORK_RESULT.php" method="POST">';
            $query ='SELECT * FROM workcontent order by system,name';
            $result=$db->query($query);
            if ($result->num_rows){
                for($i=1;$row=$result->fetch_assoc();$i++){
                    echo "<tr>";
                    echo "<td class='id'><input type='checkbox' name='chk[]' value='".$row['id']."'></td>";
//                     echo "<td class='id'>".$row['id']."</td>";
                    echo "<td>".$row['system']."</td>";
                    echo "<td>".$row['name']."</td>";
                    echo "<td>".@$row['stand']."</td>";
                    echo "<td>".$row['des_small']."</td>";
                    echo "<td>".$row['des_all']."</td>";
                    echo "<td>".$row['number']."</td>";
                    echo "<td>".$row['unit']."</td>";
                    echo "<td>".$row['area']."</td>";
                    echo "<td>".$row['brand']."</td>";
                    echo "<td>".$row['volume']."</td>";
                    echo "<td>".$row['weight']."</td>";
                    echo "<td>".$row['power']."</td>";
                    echo "<td>".round($row['cost'],0)."</td>";
                    echo "<td>".round($row['sale'],-1)."</td>";
                    echo "</tr>";
                }
                echo "</table>";
                echo '<div class="btn-group"><button class="btn btn-info btn-lg" type="submit" name="tool" style="margin-bottom: 100px;
    margin-right: 100px;"/>批量提交</button></div>';
                echo "</form>";
            }else{
                echo "没有结果";
            }
       //--------------------------------- 
       }
    }
}
?>
<!--模态框3 【【比例】】  内容 -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content" style="width: 80%;background-color: rgba(0,0,0,0.3);">
	      <div class="modal-header" style="
			    text-align: center;
			    font-family: '方正舒体';
			    color:white;">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h2 class="modal-title" id="myModalLabel"><b>搜索设备</b></h2>
	      </div>
	      <div class="modal-body" style="text-align: center;">
	<!--1。比例-->
		<form action='WORK_SHOW_SEARCH.php' method="post" class="form-inline" style="margin: 1em 0 2em 0;">
		  <div class="form-group form-group-lg">
		    <label class="sr-only" for="exampleInputAmount"></label>
            <div class="input-group">
                <select name = 'system' style="width:90%;height:120%;font-size:1.5em;font-family: '微软雅黑';border-radius: 5px">
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
                <br>
                </div>
<!--                <input type="text" name="system" class="form-control" id="exampleInputAmount" placeholder="分系统">-->
		    <div class="input-group">
		      <div class="input-group-addon">§</div>
		      <input type="text" name="name" class="form-control" id="exampleInputAmount" placeholder="设备名称">
		    </div>
		    <div class="input-group">
		      <div class="input-group-addon">§</div>
		      <input type="text" name="brand" class="form-control" id="exampleInputAmount" placeholder="品牌">
		    </div>
		    <div class="input-group">
		      <div class="input-group-addon">§</div>
		      <input type="text" name="stand" class="form-control" id="exampleInputAmount" placeholder="设备型号">
		    </div>
		  </div>
		  <button type="submit" class="btn btn-danger btn-lg" onclick='showResult(this)'>提交</button>
		</form>
	      </div> <!-- modal-footer --> 
	      </div> <!-- modal-body -->
	    </div> <!-- 三 -->
	  </div> <!-- 二 -->
	</div> <!-- 大 -->
<!--模态框3内容 -->
    <body>
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
              <a href="WORK_RESULT.php" role="button" class="btn btn-lg btn-info btn-block">返回业务表单</a>
           </div></li>
            <li><div class="btn-group">
              <a href="" role="button" data-toggle="modal" data-target="#myModal" class="btn btn-lg btn-success btn-block">设备搜索</a>
            </div></li>
            <li><div class="btn-group">
              <a href="door.php"><button class="btn btn-lg btn-primary btn-block">返回首页</button></a>
            </div></li>
        </ul>
    </div>
  </div> <!-- container --> 
</nav>
    </body>

</html>
