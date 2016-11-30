<?php
session_start();
if(empty($_SESSION['username'])){
    header("location:index.php");
}
//得到后缀
$name_arr = explode('.',$_FILES['userfile']['name']);   
$name_first = $name_arr[count($name_arr)-2];
$name_last =".".$name_arr[count($name_arr)-1];
//根目录
$path = "./";

//整体
$name = $path.$name_first.$name_last;
echo $name;

if(move_uploaded_file($_FILES['userfile']['tmp_name'], $name)){
	echo "success";
}else{
	echo "fail";
}