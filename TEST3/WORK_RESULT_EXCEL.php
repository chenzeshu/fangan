<html>
<head>
 <meta charset='utf-8'>
 <title>word生成页面</title>
</head>


<?php
header("Last-Modified:".gmdate("D, d M Y H:i:s")."GMT");
header("Cache-Control: no-cache, must-revalidate" );
session_start();

if(!$_SESSION['username']){
 header("location:index.php");
}
include('./Classes/PHPExcel.php');
$objPHPExcel = new PHPExcel();

//转换函数
//function str($str){
// $str  = iconv('gb2312', 'utf-8', $str);
// return $str;
//}

$db=new mysqli('localhost','root','chenzeshu8','workbase');
$db->set_charset('UTF8');
if($db->connect_errno){
 echo "无法连接数据库";
}else{
 echo "已连接";
 $str1='序号';$str2='分系统';$str3='设备名称';$str4='品牌';$str5='规格型号';
 $str6='简单参数描述';$str7='详细参数描述';$str8='数量';$str9='单位';
 $str10='产地';$str11='体积';$str12='重量';
 $str13='功耗';$str14='成本单价';$str15='出厂单价';$str16='备注';



 $objPHPExcel-> setActiveSheetIndex(0)
     -> setCellValue('A1',$str1)
//     -> setCellValue('B1',str($str2))
     -> setCellValue('B1',$str3)
     -> setCellValue('C1',$str4)
     -> setCellValue('D1',$str5)
     -> setCellValue('E1',$str6)
     -> setCellValue('F1',$str7)
     -> setCellValue('G1',$str8)
     -> setCellValue('H1',$str9)
     -> setCellValue('I1',$str10)
     -> setCellValue('J1',$str11)
     -> setCellValue('K1',$str12)
     -> setCellValue('L1',$str13)
     -> setCellValue('M1',$str14)
     -> setCellValue('N1',$str15)
     -> setCellValue('O1',$str16);
 $objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
 $objPHPExcel->getActiveSheet()->getStyle('B1')->getFont()->setBold(true);
 $objPHPExcel->getActiveSheet()->getStyle('C1')->getFont()->setBold(true);
 $objPHPExcel->getActiveSheet()->getStyle('D1')->getFont()->setBold(true);
 $objPHPExcel->getActiveSheet()->getStyle('E1')->getFont()->setBold(true);
 $objPHPExcel->getActiveSheet()->getStyle('F1')->getFont()->setBold(true);
 $objPHPExcel->getActiveSheet()->getStyle('G1')->getFont()->setBold(true);
 $objPHPExcel->getActiveSheet()->getStyle('H1')->getFont()->setBold(true);
 $objPHPExcel->getActiveSheet()->getStyle('I1')->getFont()->setBold(true);
 $objPHPExcel->getActiveSheet()->getStyle('J1')->getFont()->setBold(true);
 $objPHPExcel->getActiveSheet()->getStyle('K1')->getFont()->setBold(true);
 $objPHPExcel->getActiveSheet()->getStyle('L1')->getFont()->setBold(true);
 $objPHPExcel->getActiveSheet()->getStyle('M1')->getFont()->setBold(true);
 $objPHPExcel->getActiveSheet()->getStyle('N1')->getFont()->setBold(true);
 $objPHPExcel->getActiveSheet()->getStyle('O1')->getFont()->setBold(true);
 $objPHPExcel->getActiveSheet()->getStyle('A1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
 $objPHPExcel->getActiveSheet()->getStyle('B1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
 $objPHPExcel->getActiveSheet()->getStyle('C1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
 $objPHPExcel->getActiveSheet()->getStyle('D1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
 $objPHPExcel->getActiveSheet()->getStyle('E1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
 $objPHPExcel->getActiveSheet()->getStyle('F1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
 $objPHPExcel->getActiveSheet()->getStyle('G1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
 $objPHPExcel->getActiveSheet()->getStyle('H1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
 $objPHPExcel->getActiveSheet()->getStyle('I1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
 $objPHPExcel->getActiveSheet()->getStyle('J1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
 $objPHPExcel->getActiveSheet()->getStyle('K1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
 $objPHPExcel->getActiveSheet()->getStyle('L1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
 $objPHPExcel->getActiveSheet()->getStyle('M1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
 $objPHPExcel->getActiveSheet()->getStyle('N1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
 $objPHPExcel->getActiveSheet()->getStyle('O1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
 $objPHPExcel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 $objPHPExcel->getActiveSheet()->getStyle('B1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 $objPHPExcel->getActiveSheet()->getStyle('C1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 $objPHPExcel->getActiveSheet()->getStyle('D1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 $objPHPExcel->getActiveSheet()->getStyle('E1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 $objPHPExcel->getActiveSheet()->getStyle('F1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 $objPHPExcel->getActiveSheet()->getStyle('G1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 $objPHPExcel->getActiveSheet()->getStyle('H1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 $objPHPExcel->getActiveSheet()->getStyle('I1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 $objPHPExcel->getActiveSheet()->getStyle('J1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 $objPHPExcel->getActiveSheet()->getStyle('K1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 $objPHPExcel->getActiveSheet()->getStyle('L1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 $objPHPExcel->getActiveSheet()->getStyle('M1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 $objPHPExcel->getActiveSheet()->getStyle('N1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 $objPHPExcel->getActiveSheet()->getStyle('O1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 $table = $_SESSION['username']."_yewu";
    //得到排序
    $table = $_SESSION['username']."_yewu";
    $query_order = "select `order` from workorder limit 1";
    $result_order = $db->query($query_order);
    $re_order=$result_order->fetch_assoc()['order'];

    $query3 = "select * from ".$table." 
            order by 
            field(id,$re_order)
            ";
    $query4 = "select * from ".$table." 
            order by 
            field(id,$re_order)
            ";
    $result2=$db->query($query3);
    $result3=$db->query($query4);

        $i=0; //设备的数量
        $m=0; //系统的数量
        foreach($result2 as $row){
            if($row['ppid']==null){
                $m++;
                $objPHPExcel->getActiveSheet()->mergeCells('A'.($m+$i+1).':F'.($m+$i+1));      //合并
                $objPHPExcel-> setActiveSheetIndex(0)
                    -> setCellValue('A'.($m+$i+1),$row["system"]);
                //水平居中
                $objPHPExcel->getActiveSheet()->getStyle('A'.($m+$i+1))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                //垂直居中
                $objPHPExcel->getActiveSheet()->getStyle('A'.($m+$i+1))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
                //对系统加粗
                $objPHPExcel->getActiveSheet()->getStyle('A'.($m+$i+1))->getFont()->setBold(true);
                //***********************画出单元格边框*****************************
                $styleArray = array(
                    'borders' => array(
                        'allborders' => array(
                            //'style' => PHPExcel_Style_Border::BORDER_THICK,//边框是粗的
                            'style' => PHPExcel_Style_Border::BORDER_THIN,//细边框
                            'color' => array('argb' => '000000')
                        ),
                    ),
                );
                $objPHPExcel->getActiveSheet()->getStyle('A1:O'.($m+$i+1))->applyFromArray($styleArray);//这里就是画出从单元格A5到N5的边框，看单元格最右边在哪哪个格就把这个N改为那个字母替代
                //***********************画出单元格边框结束*****************************
//             $_SESSION['system']=$row['system'];
                foreach($result3 as $row2){
                    if($row2['ppid']==$row['pid']){
                        $i++;

                        $objPHPExcel-> setActiveSheetIndex(0)
                            -> setCellValue('A'.($m+$i+1),$i)
                            -> setCellValue('B'.($m+$i+1),$row2["name"])
                            -> setCellValue('C'.($m+$i+1),$row2["brand"])
                            -> setCellValue('D'.($m+$i+1),@$row2["stand"])
                            -> setCellValue('E'.($m+$i+1),$row2["des_small"])
                            -> setCellValue('F'.($m+$i+1),$row2["des_all"])
                            //         -> setCellValue('G'.($m+$i+1),str($row["big_img"]))
                            //         -> setCellValue('H'.($m+$i+1),str($row["small_img"]))
                            -> setCellValue('G'.($m+$i+1),$row2["number"])
                            -> setCellValue('H'.($m+$i+1),$row2["unit"])
                            -> setCellValue('I'.($m+$i+1),$row2["area"])
                            -> setCellValue('J'.($m+$i+1),$row2["volume"])
                            -> setCellValue('K'.($m+$i+1),$row2["weight"])
                            -> setCellValue('L'.($m+$i+1),$row2["power"])
                            -> setCellValue('M'.($m+$i+1),$row2["cost"])
                            -> setCellValue('N'.($m+$i+1),$row2["sale"])
                            -> setCellValue('O'.($m+$i+1),$row2["remark"]);
                     //自动换行
                     $objPHPExcel->getActiveSheet()->getStyle('D'.($m+$i+1))->getAlignment()->setWrapText(true);
                     $objPHPExcel->getActiveSheet()->getStyle('E'.($m+$i+1))->getAlignment()->setWrapText(true);
                     $objPHPExcel->getActiveSheet()->getStyle('F'.($m+$i+1))->getAlignment()->setWrapText(true);

                        $objPHPExcel->getActiveSheet()->getStyle('A'.($m+$i+1))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                        $objPHPExcel->getActiveSheet()->getStyle('B'.($m+$i+1))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                        $objPHPExcel->getActiveSheet()->getStyle('C'.($m+$i+1))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                        $objPHPExcel->getActiveSheet()->getStyle('D'.($m+$i+1))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                        $objPHPExcel->getActiveSheet()->getStyle('E'.($m+$i+1))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                        $objPHPExcel->getActiveSheet()->getStyle('F'.($m+$i+1))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                        $objPHPExcel->getActiveSheet()->getStyle('G'.($m+$i+1))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                        $objPHPExcel->getActiveSheet()->getStyle('H'.($m+$i+1))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                        $objPHPExcel->getActiveSheet()->getStyle('I'.($m+$i+1))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                        $objPHPExcel->getActiveSheet()->getStyle('J'.($m+$i+1))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                        $objPHPExcel->getActiveSheet()->getStyle('K'.($m+$i+1))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                        $objPHPExcel->getActiveSheet()->getStyle('L'.($m+$i+1))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                        $objPHPExcel->getActiveSheet()->getStyle('M'.($m+$i+1))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                        $objPHPExcel->getActiveSheet()->getStyle('N'.($m+$i+1))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                        $objPHPExcel->getActiveSheet()->getStyle('O'.($m+$i+1))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                        $objPHPExcel->getActiveSheet()->getStyle('A'.($m+$i+1))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
                        $objPHPExcel->getActiveSheet()->getStyle('B'.($m+$i+1))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
                        $objPHPExcel->getActiveSheet()->getStyle('C'.($m+$i+1))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
                        $objPHPExcel->getActiveSheet()->getStyle('D'.($m+$i+1))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
                        $objPHPExcel->getActiveSheet()->getStyle('E'.($m+$i+1))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
                        $objPHPExcel->getActiveSheet()->getStyle('F'.($m+$i+1))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
                        $objPHPExcel->getActiveSheet()->getStyle('G'.($m+$i+1))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
                        $objPHPExcel->getActiveSheet()->getStyle('H'.($m+$i+1))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
                        $objPHPExcel->getActiveSheet()->getStyle('I'.($m+$i+1))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
                        $objPHPExcel->getActiveSheet()->getStyle('J'.($m+$i+1))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
                        $objPHPExcel->getActiveSheet()->getStyle('K'.($m+$i+1))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
                        $objPHPExcel->getActiveSheet()->getStyle('L'.($m+$i+1))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
                        $objPHPExcel->getActiveSheet()->getStyle('M'.($m+$i+1))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
                        $objPHPExcel->getActiveSheet()->getStyle('N'.($m+$i+1))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
                        $objPHPExcel->getActiveSheet()->getStyle('O'.($m+$i+1))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
                        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(8);
                        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
                        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(10);
                        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(25);
                        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(33);
                        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(50);
                        $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(8);
                        $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(6);
                        $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(10);
                        $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(15);
                        $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(12);
                        $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(10);
                        $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(10);
                        $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(15);
                        $objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(15);

                        $objPHPExcel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(30);
                        //***********************画出单元格边框*****************************
                        $styleArray = array(
                            'borders' => array(
                                'allborders' => array(
                                    //'style' => PHPExcel_Style_Border::BORDER_THICK,//边框是粗的
                                    'style' => PHPExcel_Style_Border::BORDER_THIN,//细边框
                                    'color' => array('argb' => '000000')
                                ),
                            ),
                        );
                        $objPHPExcel->getActiveSheet()->getStyle('A1:O'.($m+$i+1))->applyFromArray($styleArray);//这里就是画出从单元格A5到N5的边框，看单元格最右边在哪哪个格就把这个N改为那个字母替代
                        //***********************画出单元格边框结束*****************************
                    };
                };

            }

        }
        echo "</table>";


 $objWriter =PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel5');
 $username = $_SESSION['username'];
 //文件存储的名称
 $filename = str_replace('WORK',$username,__FILE__);
 //申请下载的路径
 $downname = str_replace("D:\wamptest\TEST3\\","",$filename);
 $downname = str_replace('.php','.xls',$downname);
 //文件存储的路径,暂时发现只能生成在当前目录，所以搬运一下
 $objWriter->save(str_replace('.php','.xls',$filename));
 //搬运到的目的地址
 $name = str_replace("TEST3","TEST3\document_biaoshu",$filename);   // \document_biaoshu插进原文件地址，得到目的地址
 $oldfile = str_replace('.php','.xls',$filename);
 $newfile =str_replace('.php','.xls',$name);
 rename($oldfile,$newfile);  //搬运

 echo date('H:I:S') . " peak memory usage: " .(
         memory_get_peak_usage(true) / 1024 / 1024) . "MB\r\n";

 echo date('H:I:S') . "||EXCEL已经生成";
}
?>

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
  width:100%;
  border-collapse:collapse;
 }
 td{
  border:1px solid black;
  width:100px;
  text-align:center;
 }
 .id{
  width:2%;
 }
 .id3{
  width:4%;
 }
 .luru{
  display:block;
  margin:5% 0 0 10%;
  float:left;
 }
 .ir{
  background-color:lightgreen;
  font-weight:bold;
  font-size:1em;
  font-family:'微软雅黑';
 }
</style>
<body>
<div class="clearfix"></div>
<a href="http://web.chenzeshu.com/TEST3/document_biaoshu/<?php echo $downname;?>" class="excel" style="margin:50px 0 0 50px">导出EXCEL</a>
<a href="WORK_RESULT.php" class="excel" style="margin:50px 0 0 50px">返回业务表单</a>


</body>
</html>
