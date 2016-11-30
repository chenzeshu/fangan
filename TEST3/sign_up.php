<html>
<head>
<meta charset='utf-8'>
<title>添加平台用户</title>
</head>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<style>

.sign{
	width:600px;
	margin:0 auto;
}
h1{
	font-size:3em;
	font-family:"微软雅黑";
	width:400px;
	margin:5% auto
}
</style>
<body>
<?php
 session_start();
 $username = $_SESSION['username'];
         if($username === "admin"){
             if(isset($_POST['name'])&&isset($_POST['password'])&&isset($_POST['password-confirm'])&&isset($_POST['xingming'])){
                 if($_POST['password']==$_POST['password-confirm']){
                     $db = new mysqli('localhost', 'root', 'chenzeshu8', 'workbase');
                     $db ->set_charset('UTF8');
                     if($db->connect_errno){
                         echo "无法连接服务器";
                         exit();
                     }else{
                         var_dump($_POST);
                         $name=$_POST['name'];
                         $password=$_POST['password'];
                         $xingming=$_POST['xingming'];
                         $query ="INSERT INTO worklist VALUES(NULL,'".$name."','".$password."','".$xingming."',null)";
                         $result = $db->query($query);
                         if($result){   
                             header("location:index.php");
                         }else {
                             echo "注册失败";
                         }
                         $db->close();
                     }
                 }else{
                     echo "密码不一致";
                 }
             }else{
                 echo "请填写数据";
             }
         }else{

     header('location:index.php');
 }
?>
<div class="sign container">
    		<h1  style="margin-left: 27%;">添加平台用户</h1>
<form  method="post" action="sign_up.php">

<div class="form-group">
<label>用户名：</label><input class="form-control" type="text" name="name">
</div>
<div class="form-group">
<label>输入密码</label><input class="form-control" type="password" name="password">
</div>
<div class="form-group">   
<label>再一次输入密码</label><input class="form-control" type="password" name="password-confirm">
</div>
<div class="form-group">   
<label>真实姓名</label><input class="form-control" type="text" name="xingming">
</div>
<div class="btn-group btn-group-justified">
<div class="btn-group">
<button type="submit" class="btn btn-primary">确认添加</button>
</div>
<div class="btn-group">
<a href="door.php"><button type="button" class="btn btn-default">返回</button></a>
</div>
</form>		   	
    </div>
    
	</div>


</div>
</body>
</html>