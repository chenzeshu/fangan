<html>
<head>
<meta charset='utf-8'>
<title>数据库EXCEL页面</title>
</head>
<style>
.excel{
	display:block; 
	float:left;
	padding:5px 0 0 0;
	text-align:center;
	width:210px;
	height:25px;
	color:black; 
	text-decoration:none;
	border:1px solid black;
	box-shadow:2px 2px black;
	border-radius:5px
}
.clearfix{
	content:"";
	display:block;
	clear:both;
}
table{
	width:1100px;
		border-collapse:collapse;
}
td{
	border:1px solid black;
	width:100px;
	text-align:center;
}
td.id{
	width:30px;
}
.luru{
	display:block;
	margin:5% 0 0 10%;
	float:left;
}
</style>
<?php
//checkbox
session_start();

if(!$_SESSION['username']){          
    header("location:index.php");
}
if(isset($_POST['tj'])){
    $chkArr = $_POST['chk'];

    echo "正在读取数据……<hr>";  
    echo "你本次选择了[<b>".count($chkArr)."</b>]个数据，与业务表单结合后如下<hr>";
    
     $db = new mysqli('localhost','root','chenzeshu8','workbase');
     $db ->set_charset('UTF8');
     if ($db->connect_errno){
         echo "不能连接数据库";
     }else{
       
       $num = count($chkArr);
       foreach ($chkArr as $k=>$v){
           $query1 = "select * from workcontent where id='".$v."'";
           $result=$db->query($query1);
           
           $query_table1 = "create table if not exists '".$_SESSION['name']."'(
id int NOT NULL AUTO_INCREMENT,
system varchar(20),
name varchar(20),
stand varchar(40),
des_small TEXT,
des_all TEXT,
big_img varchar(128),
small_img varchar(128),
number int,
unit varchar(6),
area varchar(20),
brand varchar(20),
volume varchar(16),
weight varchar(16),
power varchar(16),
cost decimal(10,2),
sale decimal(10,2),
PRIMARY KEY (id)
)DEFAULT CHARSET=utf8";
           
           
           for($i=1;$row=$result->fetch_assoc();$i++){
               $id=$row['id'];
               $name=$row['name'];
               $brand=$row['brand'];
               $des=$row['des'];
               
               $query2 = "insert into '".$_SESSION['name']."' values('".$id."','".$name."','".$brand."','".$des."')";
               $db->query($query2);
           }

           
       }
     } 
     
}   
        

   
     $db = new mysqli('localhost','root','chenzeshu8','workbase');
     $db ->set_charset('GBK');
     if($db->connect_errno){
         echo "无法连接数据库";
     }else{
            if(isset($_POST['delete_show'])){
             $delete_show = $_POST['delete_show'];
             $delete_query="DELETE FROM '".$_SESSION['name']."' WHERE id=$delete_show";
             $delete=$db->query($delete_query);
                 if(!$delete){
                 echo "没有删除";
                 }else{
                     echo "正在删除数据……<hr>";  
                     echo "删除成功<hr>";
                 }
             }
          
         echo "<table style='clear:both'>";
         echo "<tr>";
            echo '<form action="DATABASE_RESULT.php" method="post">';
            echo "<table>";
            echo "<tr>";
            echo "<td>序号</td>";
            echo "<td>分系统</td>";
            echo "<td>设备名称</td>";
            echo "<td>设备型号</td>";
            echo "<td>简单参数描述</td>";
            echo "<td>详细参数描述</td>";
            echo "<td>数量</td>";
            echo "<td>单位</td>";
            echo "<td>产地</td>";
            echo "<td>制造商名称</td>";
            echo "<td>体积</td>";
            echo "<td>重量</td>";
            echo "<td>功耗</td>";
            echo "<td>成本单价</td>";
            echo "<td>出厂单价</td>";
            echo "<td>操作1</td>";
         echo "</tr>";
         $query3 = "select * from '".$_SESSION['name']."'";
         $result2=$db->query($query3);
         if($result2->num_rows){
             for($i=1;$row=$result2->fetch_assoc();$i++){
                 echo "<tr>";
                echo "<td class='id'>".$row['id']."</td>";
                echo "<td>".$row['system']."</td>";
                echo "<td>".$row['name']."</td>";
                echo "<td>".$row['stand']."</td>";
                echo "<td>".$row['des_small']."</td>";
                echo "<td>".$row['des_all']."</td>";
                echo "<td>".$row['number']."</td>";
                echo "<td>".$row['unit']."</td>";
                echo "<td>".$row['area']."</td>";
                echo "<td>".$row['brand']."</td>";
                echo "<td>".$row['volume']."</td>";
                echo "<td>".$row['weight']."</td>";
                echo "<td>".$row['power']."</td>";
                echo "<td>".$row['cost']."</td>";
                echo "<td>".$row['sale']."</td>";
                
                  
                 //              echo "<td>";
                 //              echo "<form action='DATABASE_RESLUT.php' method='post'>";                  
                 //              echo "<input type='hidden' name='EDIT_SHOW' value='".$row['id']."'>"; 
                 //              echo "<input style='margin:2% 0 -5% 0' type='submit' value='修改'>";        
                 //              echo "</form>";                                                          
                 //              echo "</td>";                                                            
                  
                 echo "<td>";
                 echo "<form action='DATABASE_RESULT.php' method='post'>";                 
                 echo "<input type='hidden' name='delete_show' value='".$row['id']."'>";  
                 echo "<input style='margin:2% 0 -5% 0' type='submit' value='删除'>";        
                 echo "</form>";                                                           
                 echo "</td>";                                                             
                  
                  
                 echo "</tr>";
             }
             echo "</table>";
         }else {
             echo "query3失败";
         }
     }

?>


<?php 

include('./Classes/PHPExcel.php');
$objPHPExcel = new PHPExcel();


function str($str){
    $str  = iconv('gb2312', 'utf-8', $str);
    return $str;
}


$db=new mysqli('localhost','root','chenzeshu8','workbase');
$db->set_charset('GBK');
if($db->connect_errno){
    echo "无法连接服务器";
    }else{
    echo "连接成功";
    $str1='id';$str2='分系统';$str3='设备名称';$str4='规格型号';    
    $str5='简单参数描述';$str6='详细参数描述';$str7='数量';$str8='单位';
    $str9='产地';$str10='制造商';$str11='体积';$str12='重量';
    $str13='功耗';$str14='成本单价';$str15='出厂单价';    

    
    $objPHPExcel-> setActiveSheetIndex(0)
    -> setCellValue('A1',str($str1))
    -> setCellValue('B1',str($str2))
    -> setCellValue('C1',str($str3))
    -> setCellValue('D1',str($str4))
    -> setCellValue('E1',str($str5))
    -> setCellValue('F1',str($str6))
    -> setCellValue('G1',str($str7))
    -> setCellValue('H1',str($str8))
    -> setCellValue('I1',str($str9))
    -> setCellValue('J1',str($str10))
    -> setCellValue('K1',str($str11))
    -> setCellValue('L1',str($str12))
    -> setCellValue('M1',str($str13))
    -> setCellValue('N1',str($str14))
    -> setCellValue('O1',str($str15))
    -> setCellValue('P1',str($str16))
    -> setCellValue('Q1',str($str17));
        
    $query="select * from '".$_SESSION['name'];
    $result=$db->query($query);
    for($i=2;$row=$result->fetch_assoc();$i++){
        
           $objPHPExcel-> setActiveSheetIndex(0)
        -> setCellValue('A'.$i,str($row["id"]))
        -> setCellValue('B'.$i,str($row["system"]))
        -> setCellValue('C'.$i,str($row["name"]))
        -> setCellValue('D'.$i,str($row["stand"]))
        -> setCellValue('E'.$i,str($row["des_small"]))
        -> setCellValue('F'.$i,str($row["des_all"]))
//         -> setCellValue('G'.$i,str($row["big_img"]))
//         -> setCellValue('H'.$i,str($row["small_img"]))
        -> setCellValue('G'.$i,str($row["number"]))
        -> setCellValue('H'.$i,str($row["unit"]))
        -> setCellValue('I'.$i,str($row["area"]))
        -> setCellValue('J'.$i,str($row["brand"]))
        -> setCellValue('K'.$i,str($row["volume"]))
        -> setCellValue('L'.$i,str($row["weight"]))
        -> setCellValue('M'.$i,str($row["power"]))
        -> setCellValue('N'.$i,str($row["cost"]))
        -> setCellValue('O'.$i,str($row["sale"]));
        $objPHPExcel->getActiveSheet()->getStyle('A'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('B'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('C'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('D'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('E'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('F'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('G'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('H'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('I'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('J'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('K'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('L'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('M'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('N'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('O'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        
    }
    
    $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(8);
    $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
    $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(25);
    $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(25);
    $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
    $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(50);
    $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(8);
    $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(6);
    $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(10);
    $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(15);
    $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(12);
    $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(12);
    $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(12);
    $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(18);
    $objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(18);
    
  
    $objPHPExcel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(30);
 




    
    
    
    $objWriter =PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel5');
    $objWriter->save(str_replace('.php','.xls',__FILE__));

    
    echo date('H:I:S') . " peak memory usage: " .(
        memory_get_peak_usage(true) / 1024 / 1024) . "MB\r\n";
    
    echo date('H:I:S') . "||EXCEL已经生成";
    }


?>
<body>
<div class="clearfix"></div>
<a href="http://web.chenzeshu.com/TEST1/DATABASE_RESULT.xls" class="excel">导出EXCEL表单</a>
<a href="DATABASE_SHOW.php" class="excel" style="margin-left:100px">返回数据库首页</a>

</body>
</html>
