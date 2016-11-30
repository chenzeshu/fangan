<?php
session_start();

//提供数据表名
   $table = $_SESSION['username']."_yewu";
//以前的逻辑漏洞：当然要先有表拉。。

//第一，处理前端POST来的chkArr数组
	 $chkArr = $_POST['chk'];
	 $db = new mysqli('localhost','root','chenzeshu8','workbase');
	 $db ->set_charset("UTF8");

//第二，得到业务表单现有的系统的名称，存在$array_already[]
      $query_already="select system from ".$table." where name is null";
	  $result_already=$db->query($query_already);
	  $array_already = array();
	  for($m=0;$row_already=$result_already->fetch_assoc();$m++){
	  	  $array_already[]=$row_already['system'];
	  }

        //第三，遍历出新传来的系统名称，遍历出来，存到$system_arr[]里
        $system_arr = array();
      foreach ($chkArr as $k=>$v){
           $query_new = "select * from worksys where id='".$v."'";
           $result_new=$db->query($query_new);
           //得到system的名字
           for($n=0;$row_new=$result_new->fetch_assoc();$n++){
           	   $system_arr[]=$row_new['system'];
           }
       }
		//第四，使用交集函数array_intersect函数，得到$array_already与$system_arr的交集，然后打印出来送到前台报警
		//   如果没有交集，就发送 通过 的标志
		 $intersection = array_intersect($system_arr,$array_already);
		 if($intersection){
            $s="";
		 	for($o=0;$o<count($intersection);$o++){
		 		$s.= "已存在《".$intersection[$o]."》\n\n";
		 	}
			echo $s;
		 }else{
		 	echo "111";
		 }
         
		 




