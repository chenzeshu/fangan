<?php
session_start();

	if(!$_SESSION['username']){          
	    header("location:index.php");
	}

    $db=new mysqli('localhost','root','chenzeshu8','workbase');
    $db->set_charset('UTF8');
    if($db->connect_errno){
        echo "无法连接服务器";
    }else{
        if(isset($_POST['id'])){
            $id = $_POST['id'];
            $delete_query="DELETE FROM workcontent WHERE id=$id";
            $delete=$db->query($delete_query);
            $pageid = $_SESSION['pageid'];
            if(!$delete){
                echo "失败";
            }else{
            	echo $pageid;
			}
        }
	}
