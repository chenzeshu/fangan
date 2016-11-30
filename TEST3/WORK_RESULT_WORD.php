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
include('./Classes2/PHPWord.php');
ob_clean();
//function str($str){
//  $str  = iconv('gb2312', 'utf-8', $str);
//  return $str;
//}


$db = new mysqli('localhost','root','chenzeshu8','workbase');
$db->set_charset('UTF8');
$table = $_SESSION['username']."_yewu";
if ($db->connect_errno){
    echo '无法连接服务器';
}else{
    $PHPWord = new PHPWord();
    $fontStyle1 = array('color'=>'000000', 'size'=>18, 'bold'=>true);  
    $PHPWord -> addTitleStyle(2,$fontStyle1);
    
    $fontStyle2 = array('color'=>'000000', 'size'=>14, 'bold'=>true);  
    $PHPWord -> addTitleStyle(3,$fontStyle2);
    
    $fontStyle3 = array('color'=>'000000', 'size'=>12, 'bold'=>false);  
    $PHPWord -> addFontStyle('style3',$fontStyle3);
    
    $query = "select * from ".$table." order by field(system,'车载卫星通信分系统','行业分系统','音视频分系统','计算机网络办公分系统','话音指挥调度分系统','供配电分系统','车辆改装分系统','综合保障分系统','地面卫星站分系统')";
    $result = $db->query($query);
    $section = $PHPWord->createSection();  
    
    for($i=1;$row=$result->fetch_assoc();$i++){
        
        if(empty($row['name'])){
            $section -> addTitle($row['system'],2);  
        }else {
            $section -> addTitle($row['name'],3);   
            $section -> addText("设备规格:".$row['stand'],'style3');
            $section -> addText("简单参数描述:".$row['des_small'],'style3');
            $section -> addText("详细参数描述:".$row['des_all'],'style3');
            $section-> addTextBreak();
        }

    }
    

    $objWriter =PHPWord_IOFactory::createWriter($PHPWord, 'Word2007');
    $objWriter->save('helloWorld.docx');   
//     $objWriter->save(str_replace('.php','.doc',__FILE__));
    echo date('Y-m-d H:I:s') . "||WORD已经生成";
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
<a href="WORK_RESULT.php" class="excel" style="margin:50px 0 0 50px">返回业务表单</a>
<a href="http://web.chenzeshu.com/TEST3/helloWorld.docx" class="excel" style="margin:50px 0 0 50px">导出WORD</a>

 </body>
 </html>
