<html>
<head>
 <meta name="renderer" content="webkit">
<meta charset='utf-8'>
<title>登录</title>
</head>
<body>
<?php
session_start();

if(isset($_POST['name'])&&isset($_POST['password'])){
    $db = new mysqli('localhost', 'root', 'chenzeshu8', 'workbase');
    $db ->set_charset('utf8');
     
    if($db->connect_errno){
        echo "无法连接服务器";
    }else{
        $username = $_POST['name'];
        $password = $_POST['password'];
		//对登录信息进行处理
		$username=htmlspecialchars($username);
		$password=htmlspecialchars($password);
		   $username= trim($username);
			 $password= trim($password);
		$username=stripcslashes($username);
		$password=stripcslashes($password);
    
        $query ="SELECT id,name,xingming FROM worklist WHERE name ='".$username."' AND password ='".$password."' ";
        $result=$db->query($query);
        if($result->num_rows){
        	echo $result->num_rows;
            $row = $result->fetch_assoc();
            $_SESSION['username']=$username;
            $_SESSION['xingming']=$row['xingming'];
            echo "登录成功";
            header('location:door.php');    
			    
        }else {
            echo "密码错误";
        }
    }
}

?>
 </br></br>
 <button><a href="index.php">返回</a></button> &nbsp; &nbsp; 
</body>
</html>

