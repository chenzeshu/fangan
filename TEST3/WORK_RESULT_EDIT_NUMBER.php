<?php
session_start();
$table = $_SESSION['username']."_yewu";   //表名
$db = new mysqli('localhost','root','chenzeshu8','workbase');  //连接服务器
$db ->set_charset('utf8');
$id = $_POST['id'];
$number = $_POST['number'];

$query = "update $table set number = $number where id = $id";
$result = $db->query($query);
if($result){
	echo "成功";
}else{
	echo "失败";
}

	