<html>
<head>
<meta charset='utf-8'>
<title>数据库EXCEL生成</title>
</head>
<style>
.luru{
	display:block;
	margin:5% 0 0 10%;
	float:left;
}

.clearfix{
	content:"";
	display:block;
	clear:both;
}

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
</style>
<?php
session_start();

if(!$_SESSION['username']){          
    header("location:index.php");
}

include('./Classes/PHPExcel.php');

$objPHPExcel = new PHPExcel();


function str($str){
    $str  = iconv('utf8', 'utf-8', $str);
    return $str;
}


$db=new mysqli('localhost','root','chenzeshu8','workbase');
$db->set_charset('uft-8');
if($db->connect_errno){
    echo "无法连接数据库";
}else{
    echo "已连接";
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
    -> setCellValue('O1',str($str15));

    

    $query="select * from workcontent";
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

    echo date('H:I:S') . "||Excel已生成";
}
?>


<body>
<div class="clearfix"></div>
<a href="http://web.chenzeshu.com/TEST3/DATABASE_SHOW_EXCEL.xls" class="excel" style="background-color:lightgreen">下载EXCEL表单</a>
<a href="DATABASE_SHOW.php" class="excel" style="margin-left:30px;background-color:pink">返回数据库</a>
</body>
</html>
