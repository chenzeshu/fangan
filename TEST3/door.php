<!doctype html>
<html lang="zh" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>door</title>
	<link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" type="text/css" href="css/default.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css"> <!-- Resource style -->
	<script src="js/modernizr.js"></script> <!-- Modernizr -->
	<!--[if IE]>
		<script src="js/door_ie.js"></script>
	<![endif]-->
</head>
<style>
	h2{
		font-family: '微软雅黑';
	}
	p{
		font-family: '微软雅黑';
	}
</style>
<?php
session_start();
if(empty($_SESSION['username'])){
	header("location:index.php");
}
?>
<body>
	<header class="htmleaf-header">
		<h1> 集成方案自动化平台 ver 0.1<span>天地环网</span></h1>
<!-- 		<div class="htmleaf-links">
			<a class="htmleaf-icon icon-htmleaf-home-outline" href="http://www.htmleaf.com/" title="jQuery之家" target="_blank"><span> jQuery之家</span></a>
			<a class="htmleaf-icon icon-htmleaf-arrow-forward-outline" href="http://www.htmleaf.com/jQuery/Menu-Navigation/201505011762.html" title="返回下载页" target="_blank"><span> 返回下载页</span></a>
		</div> -->
	</header>
	<main class="cd-main">
		<ul class="cd-gallery">
			<li class="cd-item">
				<a href="item-1.html" style="text-decoration:none">
					<div>
						<h2>集成方案数据库</h2>
						<p style="font-size:1.3vw">用于录入、修改、删除产品设备信息</p>
						<b>View More</b>
					</div>
				</a>
			</li>
			<li class="cd-item">
				<a href="item-2.html" style="text-decoration:none">
					<div>
						<h2>集成方案表</h2>
						<p style="font-size:1.3vw">用于制作表单，导出EXCEL及WORD</p>
						<b>View More</b>
					</div>
				</a>
			</li>
			<?php
			if($_SESSION['username']=="admin"){
				echo '<li class="cd-item">
				<a class="dark-text" href="item-3.html" style="text-decoration:none">
					<div>
						<h2>添加用户</h2>
						<p style="font-size:1.3vw">管理员权限：添加用户</p>
						<b>View More</b>
					</div>
				</a>
			</li>';
			}else{
				echo '<li class="cd-item">
				<a class="dark-text" href="#" style="text-decoration:none">
					<div>
						<h2>非管理员点击无效</h2>
						<p style="font-size:1.3vw">管理员权限：添加用户</p>
						<b>View More</b>
					</div>
				</a>
			</li>';
			}
			?>
			<li class="cd-item">
				<a href="#" style="text-decoration:none" onclick="javascript:window.location.href='logout.php';">
					<div>
						<h2>退出系统</h2>
						<p style="font-size:1.3vw">注销：登出本平台</p>
						<b>Log-Out</b>
					</div>
				</a>
			</li>
		</ul> <!-- .cd-gallery -->
		
	</main> <!-- .cd-main -->

	<div class="cd-folding-panel">
		
		<div class="fold-left"></div> <!-- this is the left fold -->
		
		<div class="fold-right"></div> <!-- this is the right fold -->
		
		<div class="cd-fold-content">
			<!-- content will be loaded using javascript -->
		</div>

		<a class="cd-close" href="#0"></a>
	</div> <!-- .cd-folding-panel -->
	
	<script src="js/jquery-2.1.1.js"></script>
	<script src="js/main.js"></script> <!-- Resource jQuery -->
</body>
</html>