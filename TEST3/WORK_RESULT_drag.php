<?php
	

	$order = $_POST['order'];
//	$order = str_replace(',', '-', $order);


	$db = new mysqli('localhost','root','chenzeshu8','workbase');
    $db->set_charset('utf8');
	$query="UPDATE workorder SET `order`='".$order."' WHERE id=1";
	        
//	print_r($order);
	$result = $db->query($query);
	if($result){
		echo "成功";
	}else{
		echo "失败";
	}
	
	
	