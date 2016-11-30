<!DOCTYPE html PUBLIC"-//W3C//DTDXHTML1.0Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html>
	<head>
		<meta charset="utf-8" />
		<title>登录页面</title>
	</head>
	<script src="js/jquery-1.11.3.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>
    <meta name="renderer" content="webkit">
	<script type="text/javascript">
		$(function(){
			 $('[data-toggle="popover"]').popover()
		})
	</script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
	<style>
    *{
     font-family:'微软雅黑';
    }
    div#first{
    	border:1px solid black;
    	border-radius:5px;
    	width:600px;
    	height:400px;
    	margin:5% 0 0 36%;
    }
	h1{
		color:black;
		font-family:'微软雅黑';
	}
	a{
		text-decoration:none !important;
	}
	a:hover h1{
		color:white;
	}
	p{
		font-size:1.2em;
		width:350px;
		margin:5% auto;
	}
	.second{
		width:120px;
		margin:0 auto;
	}
	input[type="submit"]{
		margin-top:5%;
		width:80px;
		height:30px;
	}
	input[type="text"],input[type="password"]{
		font-size:1.1em;
	}
	</style>
	<?php 
	session_start();
	if(empty($_SESSION['username'])){
	    header("location:index.php");
	}
	?>
	<body>
       <div class="container">
       <h1 class="text-center">选 择 板 块</h1><hr>
          <a href="WORK_RESULT.PHP"><div class="col-lg-5" style="background-color:lightblue;padding:10% 0;border-radius:15px;">
                                          <h1 class="text-center">表单制作</h1>
          </div></a>
          <a href="DATABASE_SHOW.PHP"><div class="col-lg-5 col-lg-push-2" style="background-color:lightblue;padding:10% 0;border-radius:15px;">
                                          <h1 class="text-center">产品数据库</h1>
          </div></a>
       </div>
       <div class="container">
       <hr>

       	<?php
       	if($_SESSION['username']=="admin"){
       		echo "<a href='sign_up.php'><div class='col-lg-5' style='background-color:lightblue;padding:10% 0;border-radius:15px;'>
                                          <h1 class='text-center'>管理员添加用户</h1></a>";
            echo "</div>";
            echo '<a href="logout.php"><div class="col-lg-5 col-lg-push-2" style="background-color:lightblue;padding:10% 0;border-radius:15px;">
                                          <h1 class="text-center">退出</h1>';
       	}else{
       		echo "<a href='#' datacontainer='body' data-toggle='popover' data-placement='top' data-content='你没有权限'>
       		<div class='col-lg-5' style='background-color:lightblue;padding:10% 0;border-radius:15px;'>
            <h1 class='text-center'>管理员添加用户</h1></a>";
			echo "</div>";
            echo '<a href="logout.php"><div class="col-lg-5 col-lg-push-2" style="background-color:lightblue;padding:10% 0;border-radius:15px;">
                                          <h1 class="text-center">退出</h1>';
       	}
       	?>
          
          </div></a>
       </div>
	</body>
</html>
