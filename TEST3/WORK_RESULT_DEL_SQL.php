<?php
	session_start();
	$table = $_SESSION['username']."_yewu";
	$id = $_POST['id'];
	
	$db = new mysqli('localhost','root','chenzeshu8','workbase');
	$db->set_charset('UTF8');
     
    $query="DELETE FROM ".$table." WHERE id=$id";
	$re = $db->query($query);
	
	if($re){
		echo "成功";  //删除成功
	}else{
		echo "失败";  //失败
	}