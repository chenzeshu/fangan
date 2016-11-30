<html>
<head>
<meta charset='utf-8'>
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
<meta name="renderer" content="webkit">
<title>数据库页面</title>
</head>
<script type="text/javascript" src="js/jquery-1.11.3.min.js" ></script>
<script type="text/javascript" src="js/bootstrap.min.js" ></script>
<script src="js/layer/layer.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
	$(function () {
       $('[data-toggle="popover"]').popover()
    })
    
    
//删除询问框
    function del_alert(obj){
          var id = $(obj).val();
          layer.confirm('确定删除？', {
			  btn: ['确定','取消'] //按钮
			}, function(){
			    $.post('DATABASE_SHOW_DEL.php',{'id':id},function(data){
			    	   if(data=='失败'){
			    	   	alert(data);
			    	   }else{
			    	   	window.location.href='http://web.chenzeshu.com/TEST3/DATABASE_SHOW.php?&page='+data;
			    	   }
			    })
			});
    }
</script>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>

<style>
.fade {
    opacity: 0;
    -webkit-transition: opacity .30s linear;
    -o-transition: opacity .30s linear;
    transition: opacity .30s linear;
}
table{
	width:100%;
		border-collapse:collapse;
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
	width:9%;
}
.id5{
	font-size:14px;
	font-family:'微软雅黑';
	width:8%;
}
.id_des{
	font-size:14px;
	font-family:'微软雅黑';
	width:10%;
}
.id6{
	font-weight:bold;
	font-family:'微软雅黑';
}
.luru{
	display:block;
	margin:5% 0 0 10%;
	float:left;
}
.ir{
	background-color:lightgreen !important;
	font-weight:bold;
	font-size:1em;
	font-family:'微软雅黑';
}
h1{
	width:300px;
	margin:1% auto;
}
select option{
         	font-size:20px;           
         }
</style>

<?php
session_start();

if(!$_SESSION['username']){          
    header("location:index.php");
}

include("page.class.php");
echo "<h1>";
echo "<b>数据库页面</b>";
echo "<button class='btn btn-default pull-right' style='margin-top:1.5%;' onclick='javascript:layer.msg(\"天地环网\\n  方案自动化平台\\n  Version_0.1\");'>版本提示</button>";
echo "</h1>";
if(!$_SESSION['username']){            
    header("location:index.php");
}else{
    $db=new mysqli('localhost','root','chenzeshu8','workbase');
    $db->set_charset('UTF8');
    if($db->connect_errno){
        echo "无法连接服务器";
    }else{      

        echo "<div class='table-responsive' style='
    margin-bottom: 8%;'>";
        echo "<table class='table table-bordered table-striped table-hover' style='clear:both'>";
        echo "<tr class='ir info'>";
            echo "<td>序号</td>";
            echo "<td class='id4'>分系统</td>";
            echo "<td class='id4'>设备名称</td>";
		    echo "<td class='id2'>品牌</td>";
            echo "<td>设备型号</td>";
            echo "<td>简单参数描述</td>";
            echo "<td>详细参数描述</td>";
            echo "<td class='id3'>数量</td>";
            echo "<td class='id3'>单位</td>";
            echo "<td class='id3'>产地</td>";
            echo "<td class='id2'>体积</td>";
            echo "<td class='id3'>机柜尺寸(U)</td>";
            echo "<td class='id3'>重量(kg)</td>";
            echo "<td class='id3'>功耗(W)</td>";
            echo "<td class='id2'>成本单价（元）</td>";
            echo "<td class='id2'>出厂价格（元）</td>";
		    echo "<td>备注</td>";
            echo "<td class='id3' colspan='2'>操作</td>";
        echo "</tr>";

//得到当前页码
$id1 = substr('http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'], -1); 
$id2 = substr('http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'], -2); 
$id3 = substr('http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'], -3);
$pageid = "";
if(is_numeric($id3)){
       $_SESSION['pageid'] = $id3;
}elseif(is_numeric($id2)){
	   $_SESSION['pageid'] = $id2;
}elseif(is_numeric($id1)){
	   $_SESSION['pageid'] = $id1;
}else{  //即首页，没有id的情况下
	$_SESSION['pageid'] = 1;
}


        if(isset($_POST['EDIT_SHOW'])){
             //---------------------------EDIT_SHOW
            echo '<form action="WORK_RESULT.php" method="POST">';
            $system = $_POST['EDIT_SHOW'];
            $query = 'SELECT * FROM workcontent where system="'.$system.'" order by name';
            $result=$db->query($query);

            $cnt = $result->num_rows;
            $per = 10;
            $page = new Page($cnt,$per);
            $pagelist = $page ->fpage();
                
            if ($result->num_rows){
//                for($i=1;$row=$result->fetch_assoc()&&$row['system']=='全系统';$i++){
                for($i=1;$row=$result->fetch_assoc()&&$row['system']=='全系统';$i++){
                    echo "<tr>";
//                  echo "<td class='id'><input type='checkbox' name='chk[]' value='".$row['id']."'></td>";
//                  echo "<td class='id'>".$row['id']."</td>";
                    echo "<td class='id'>".$i."</td>";
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
                    echo "<td>".$row['u']."</td>";
                    echo "<td>".$row['weight']."</td>";
                    echo "<td>".$row['power']."</td>";
                    echo "<td>".$row['cost']."</td>";
                    echo "<td>".$row['sale']."</td>";
					echo "<td>".$row['remark']."</td>";
                    echo "</tr>";
                }
                echo "<tr><td colspan='17'>".$pagelist."</td></tr>";
                echo "</table>";
                echo '<input type="submit" name="tool" style="margin:25px  0 0 350px" value="�����ύ" />&nbsp;';
                echo "</form>";
            }else{
                echo "没有设备";
            }
             //---------------------------EDIT_SHOW
        }else{
//            echo '<form action="WORK_RESULT.php" method="POST">';
            $query ='SELECT * FROM workcontent order by system,name';
            $result=$db->query($query);
            
            $cnt = $result->num_rows;
            $per = 10;
            $page = new Page($cnt,$per);
            
            $query2 = "SELECT * FROM workcontent order by id ".$page->limit;
            $result2=$db->query($query2);
            $pagelist = $page ->fpage(array(2,3,4,5,6,7,8));

            //以下是有用的
            if ($result2->num_rows){
                for($i=1;$row=$result2->fetch_assoc();$i++){
						echo "<tr>";
//                     echo "<td class='id'><input type='checkbox' name='chk[]' value='".$row['id']."'></td>";
//                    echo "<td class='id'>".$row['id']."</td>";
						echo "<td class='id'>".$i."</td>";
						echo "<td class='id5'>".$row['system']."</td>";
						echo "<td class='id6'>".$row['name']."</td>";
						echo "<td>".$row['brand']."</td>";
						echo "<td class='id5'>".@$row['stand']."</td>";
						echo "<td class='id_des'>".$row['des_small']."</td>";
						echo "<td class='id_des'>".$row['des_all']."</td>";
						echo "<td>".$row['number']."</td>";
						echo "<td>".$row['unit']."</td>";
						echo "<td>".$row['area']."</td>";
						echo "<td>".$row['volume']."</td>";
						echo "<td>".$row['u']."</td>";
						echo "<td>".$row['weight']."</td>";
						echo "<td>".$row['power']."</td>";

						$cost_origin = $row['cost_origin'];  //原始售价,不换算
						$cost = $row['cost'];               //实时人民币报价
						$sale_origin = $row['sale_origin'];   //原始售价,不换算
//		            $sale =$_POST['sale'];
						$flag = $row['flag'];
						$flag_times = $row['flag_times'];
						//汇率转换
						if($flag==1){
							//美元转换
							$query_mei = "SELECT mei_rate FROM workrate where id = 1 ";
							$query_tax = "SELECT tax FROM workrate where id = 1 ";
							$re_mei = $db->query($query_mei);
							$re_tax = $db->query($query_tax);
							$rate_mei = $re_mei->fetch_assoc()['mei_rate'];
							$rate_tax = $re_tax->fetch_assoc()['tax'];
							$cost = $cost_origin*$rate_mei*$rate_tax;  //用原始数据去换算
						}elseif($flag==2){
							//欧元转换
							$query_ou = "SELECT ou_rate FROM workrate where id = 1 ";
							$query_tax = "SELECT tax FROM workrate where id = 1 ";
							$re_ou = $db->query($query_ou);
							$re_tax = $db->query($query_tax);
							$rate_ou = $re_ou->fetch_assoc()['ou_rate'];
							$rate_tax = $re_tax->fetch_assoc()['tax'];
							$cost = $cost_origin*$rate_ou*$rate_tax;
						}elseif($flag==3){
							$cost = $cost_origin;
						}
						//是否按比例报价
						if ($flag_times==1){
							$query_times = "SELECT times FROM workrate where id = 1 ";
							$re_times = $db->query($query_times);
							$times = $re_times->fetch_assoc()['times'];
							$sale = $cost * $times;
						}else{
							$sale = $row['sale_origin'];
						}
						$query1 = "UPDATE workcontent set cost ='".$cost."' where id = ".$row['id'];
						$query2 = "UPDATE workcontent set sale ='".$sale."' where id = ".$row['id'];
						$re1 = $db->query($query1);
						$re2 = $db->query($query2);

						echo "<td>".round($cost,0)."</td>";
						echo "<td>".round($sale,-1)."</td>";
						echo "<td>".$row['remark']."</td>";

						echo "<form>";
						echo "</form>";

						echo "<td>";
						echo "<form action='DATABASE_EDIT.php' method='post'>";
						echo "<input type='hidden' name='EDIT_SHOW' value='".$row['id']."'>";
						echo "<input style='margin:3% 0 -5% 0;height:30px' class='btn btn-default' type='submit' value='修改'>";
						echo "</form>";
						echo "</td>";
						
						echo "<td>";
                        echo "<button style='margin:2% 0 -5% 0' value='".$row['id']."' class='btn btn-default' onclick='del_alert(this)'>删除</button>";             
						echo "</td>";
						echo "</tr>";

						echo "</tr>";
                }
                echo "<tr style='height:40px'><td colspan='19'>".$pagelist."</td></tr>";
                echo "</table>";
                echo "</form>";
                echo "</div>";
            }else{
                echo "没有设备";
            }
       }
    }
}
?>
<style>
.col-lg-2{
	margin-top:10px;
	margin-left:30px;
  margin-right: -50px
}
</style>
    <body>
 <nav class="navbar navbar-default navbar-fixed-bottom">
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
			<ul class="nav navbar-nav row" style="margin-left:30%;width: 130%">
				<li class="col-md-3 col-lg-2"><div class="btn-group">
<a href="WORK_RESULT.php" role="button" class="btn btn-default ">业务表单</a>
</div></li>
				<li class="col-md-3 col-lg-2"><div class="btn-group">
         <a href="" role="button" data-toggle="modal" data-target="#myModal" class="btn btn-default ">设备录入</a>
</div></li>
				<li class="col-md-3 col-lg-2"><div class="btn-group">
         <a href="DATABASE_SEARCH.php" style="text-decoration: none;" class="btn btn-default ">设备查询</a>
</div></li>
				<li class="col-md-3 col-lg-2"><div class="btn-group">
<a href="" role="button" data-toggle="modal" data-target="#myModal1" class="btn btn-warning ">汇率模块</a>
</div></li>　　　
				<li class="col-md-3 col-lg-2"><div class="btn-group">
<a href="" role="button" data-toggle="modal" data-target="#myModal2" class="btn btn-warning ">比例模块</a>
</div></li>　　　　
				<li class="col-md-3 col-lg-2"><div class="btn-group">
         <a href="door.php"><button class="btn btn-default  ">返回首页</button></a>
</div></li>
			</ul>
		</div>
		
  </div> <!-- container -->
  <div class="navbar-brand navbar-collapse collapse pull-right">
	  <style>
		 #hui1,#hui2{
			  text-decoration:none;
			  float:right;font-size:16px;font-weight:bold;color:#46b8da;margin:0 5px;
		  }
	  </style>
  	<?php
  	$query_mei = "SELECT mei_rate FROM workrate where id = 1 ";
	$re_mei = $db->query($query_mei);
	$rate_mei = $re_mei->fetch_assoc()['mei_rate'];
	
	$query_ou = "SELECT ou_rate FROM workrate where id = 1 ";
	$re_ou = $db->query($query_ou);
	$rate_ou = $re_ou->fetch_assoc()['ou_rate'];
    echo '<div class="row">';
  	echo '<div class="col-lg-12"><a href="#" class="" id="hui1">当前美元汇率：<b style="color:black">'.$rate_mei.'</b></a></div>';
    echo '<div class="col-lg-12"><a href="#" class="" id="hui2">当前欧元汇率：<b style="color:black">'.$rate_ou.'</b></a></div>';
	echo '</div>';
    ?>
  </div>
</nav>
            
    
<!--模态框3 【【比例】】  内容 -->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content" style="width: 80%;background-color: rgba(0,0,0,0.3);">
	      <div class="modal-header" style="
			    text-align: center;
			    font-family: '方正舒体';
			    color:white;">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h2 class="modal-title" id="myModalLabel"><b>报价比例</b></h2>
	      </div>
	      <div class="modal-body" style="text-align: center;">
	<!--1。比例-->
		<form action='DATABASE_RATE.php' method="post" class="form-inline" style="margin: 1em 0 2em 0;">
		  <div class="form-group form-group-lg">
		    <label class="sr-only" for="exampleInputAmount">报价比例</label>
		    <div class="input-group">
		      <div class="input-group-addon">§</div>
		      <input type="text" name="times" class="form-control" id="exampleInputAmount" placeholder="报价比例">
		      <div class="input-group-addon">倍</div>
		    </div>
		  </div>
		  <button type="submit" class="btn btn-danger btn-lg">提交</button>
		</form>
	      </div> <!-- modal-footer --> 
	      </div> <!-- modal-body -->
	    </div> <!-- 三 -->
	  </div> <!-- 二 -->
	</div> <!-- 大 -->
<!--模态框3内容 -->
<!--模态框2  【【汇率】】内容 -->
	<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content" style="width: 80%;background-color: rgba(0,0,0,0.3);">
	      <div class="modal-header" style="
			    text-align: center;
			    font-family: '方正舒体';
			    color:white;">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h2 class="modal-title" id="myModalLabel"><b>汇率调整</b></h2>
	      </div>
	      <div class="modal-body" style="text-align: center;">
	<!--美元、欧元、汇率分成三个表单分别提交，否则其中一个没写就蛋疼了-->
	<!--1。美元-->
		<form action='DATABASE_RATE.php' method="post" class="form-inline" style="margin:1em 0 2em 0;">
		  <div class="form-group form-group-lg">
		    <label class="sr-only" for="exampleInputAmount">美元汇率</label>
		    <div class="input-group">
		      <div class="input-group-addon">$</div>
		      <input type="text" class="form-control" name="mei_rate" id="exampleInputAmount" placeholder="美元汇率">
		      <div class="input-group-addon">汇率</div>
		    </div>
		  </div>
		  <button type="submit" class="btn btn-danger btn-lg">提交</button>
		</form>
	<!--2.欧元-->
		<form action='DATABASE_RATE.php' method="post" class="form-inline" style="margin-bottom: 2em;">
		  <div class="form-group form-group-lg">
		    <label class="sr-only" for="exampleInputAmount">欧元汇率</label>
		    <div class="input-group">
		      <div class="input-group-addon">€</div>
		      <input type="text" class="form-control" name="ou_rate" id="exampleInputAmount" placeholder="欧元汇率">
		      <div class="input-group-addon">汇率</div>
		    </div>
		  </div>
		  <button type="submit" class="btn btn-danger btn-lg">提交</button>
		</form>
	<!--3.比例-->
		<form action='DATABASE_RATE.php' method="post" class="form-inline" style="margin-bottom: 2em;">
		  <div class="form-group form-group-lg">
		    <label class="sr-only" for="exampleInputAmount">大陆税点</label>
		    <div class="input-group">
		      <div class="input-group-addon">T</div>
		      <input type="text" class="form-control" name="tax" id="exampleInputAmount" placeholder="大陆税点">
		      <div class="input-group-addon">税率</div>
		    </div>
		  </div>
		  <button type="submit" class="btn btn-danger btn-lg">提交</button>
		</form>
	      </div> <!-- modal-footer --> 
	      </div> <!-- modal-body -->
	    </div> <!-- 三 -->
	  </div> <!-- 二 -->
	</div> <!-- 大 -->
<!--模态框2内容 -->
<!--模态框内容 -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><b>添加设备</b></h4>
      </div>
      <div class="modal-body">
        <form action="DATABASE_INSERT.php" method="post">
        	<div class="form-group">
        		 <label>系统名称：</label>
        		<select name = 'system' class="form-control">
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
        	</div>
        	<div class="form-group">
        		<label>设备名称：</label>
        		<input type="text" name="name" autofocus class="form-control">
        	</div>
        	<div class="form-group">
        		<label>设备规格：</label>
        		<input type="text" name="stand" class="form-control">
        	</div>
        	<div class="form-group">
        		<label>简单参数：</label>
        		简单参数描述<textarea name="des_small" class="form-control"></textarea>
        	</div>
        	<div class="form-group">
        		<label>详细参数：</label>
        		<textarea name="des_all" class="form-control"></textarea>
        	</div>
        	<div class="form-group">
        		<label>数量</label>
        		<input type="text" name="number" value='1' class="form-control">
        	</div>
        	<div class="form-group">
        		<label>单位</label>
        		<input type="text" name="unit" value='套' class="form-control">
        	</div>
        	<div class="form-group">
        		<label>产地：</label>
        		<input type="text" name="area" value='' class="form-control">
        	</div>
        	<div class="form-group">
        		<label>品牌：</label>
        		<input type="text" name="brand" value='' class="form-control">
        	</div>
        	<div class="form-group">
        		<label>体积(LxWxH)：</label>
        		<input type="text" name="volume" value='' class="form-control">
        	</div>
        	<div class="form-group">
        		<label>机柜尺寸(U)：</label>
        		<input type="text" name="u" value='' class="form-control">
        	</div>
        	<div class="form-group">
        		<label>重量(kg)：</label>
        		<input type="text" name="weight" value='' class="form-control">
        	</div>
        	<div class="form-group">
        		<label>功率(W)：</label>
        		<input type="text" name="power" value='' class="form-control">
        	</div>
        	<div class="form-group">
        		<label>备注：</label>
        		<textarea name="remark" class="form-control"></textarea>
        	</div>
        	<!--<div class="form-group">
        		<label>原始币种：</label>
        		<input type="radio" name="flag" value='0' checked>人民币&nbsp;&nbsp;
        		<input type="radio" name="flag" value='1' >美元&nbsp;&nbsp;
        		<input type="radio" name="flag" value='2' >欧元
        	</div>-->
        	<div class="form-group">
        		<label>成本单价：</label>
        		<input type="radio" name="flag" value='3' checked>人民币&nbsp;&nbsp;
        		<input type="radio" name="flag" value='1' >美元&nbsp;&nbsp;
        		<input type="radio" name="flag" value='2' >欧元
        		<input type="text" name="cost" value='' class="form-control">
        	</div>
        	<!--<div class="form-group">
        		<label>报价比例：</label>
        		<input type="radio" name="flag_time" value='0' checked>无&nbsp;
        		<input type="radio" name="flag_time" value='1' >&nbsp;有比例&nbsp;
        	</div>-->
        	<div class="form-group">
        		<label>出厂单价(元)：</label>
        		<input type="radio" name="flag_times" value='2' checked>无&nbsp;
        		<input type="radio" name="flag_times" value='1' >&nbsp;有比例&nbsp;
        		<input type="text" name="sale" value='' class="form-control">
        	</div>   
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
        <button type="submit" class="btn btn-primary">保存</button>
        </form>
      </div> <!-- modal-footer --> 
      </div> <!-- modal-body -->
    </div> <!-- 三 -->
  </div> <!-- 二 -->
</div> <!-- 大 -->



    </body>
</html>