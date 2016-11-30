<html>
<head>
<meta charset='utf-8'>
<title>数据库-修改</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<style>
    *{
        font-family:'微软雅黑';
    }
</style>
<?php 
session_start();
if(!$_SESSION['username']){          
    header("location:index.php");
}
    $db=new mysqli('localhost','root','chenzeshu8','workbase');
    $db->set_charset('utf8');
$nameShow = $brandShow =$desShow ='';
if($db->connect_errno){
    echo '无法连接服务器';
}else {
//SHOW页面传值
    if (isset($_POST['EDIT_SHOW'])){

        $number=$_POST['EDIT_SHOW'];  
        $query1 = "select * from workcontent where id=$number";
        $result1 = $db->query($query1);
        
        for($k=1;$row1=$result1->fetch_assoc();$k++){
            $system1 = $row1['system'];
            $name1 = $row1['name'];
            $stand1 = @$row1['stand'];
            $des_small1 = $row1['des_small'];
            $des_all1 =$row1['des_all'];
            $number1 = $row1['number'];
            $unit1 = $row1['unit'];
            $area1 = $row1['area'];
            $brand1 = $row1['brand'];
            $volume1 = $row1['volume'];
            $weight1 = $row1['weight'];
            $power1 = $row1['power'];
            $cost1 = $row1['cost_origin'];   //原始报价
            $sale1 = $row1['sale_origin'];   //原始报价
			$u1 =$row1['u'];
			$flag1 = $row1['flag'];
			$flag_times1=$row1['flag_times'];
        }
    }
    
    if (isset($_POST['TRANS_ID'])){
        //本页面传值
        $TRANS=$_POST['TRANS_ID'];

        @$system = $_POST['system'];
        $name = $_POST['name'];
        @$stand=$_POST['stand'];
        $des_small = $_POST['des_small'];
        @$des_all =$_POST['des_all'];
        $number=$_POST['number'];
        $unit = $_POST['unit'];
        $area =$_POST['area'];
        $brand=$_POST['brand'];
        $volume = $_POST['volume'];
        $weight =$_POST['weight'];
        $power=$_POST['power'];
        $cost = $_POST['cost_origin'];
        $sale =$_POST['sale_origin'];
        $u=$_POST['u'];
        $flag=$_POST['flag'];
        $flag_times=$_POST['flag_times'];

            if(!empty($system)){
                $system_query="UPDATE workcontent SET system='".$system."' WHERE id=$TRANS";
                $system_result=$db->query($system_query);
                if($system_result){
                    $systemShow ="修改成功";
                }else{
                    echo "修改失败";
                }
            }
            if(!empty($name)){
                $name_query="UPDATE workcontent SET name='".$name."' WHERE id=$TRANS";
                $name_result=$db->query($name_query);
                if($name_result){
                    $nameShow ="修改成功";
                }else{
                    echo "修改失败";
                }
            }
            if(!empty($u)){
                $u_query="UPDATE workcontent SET u='".$u."' WHERE id=$TRANS";
                $u_result=$db->query($u_query);
                if($u_result){
                    $uShow ="修改成功";
                }else{
                    echo "修改失败";
                }
            }
            if(!empty($stand)){
                $name_query="UPDATE workcontent SET stand='".$stand."' WHERE id=$TRANS";
                $name_result=$db->query($name_query);
                if($name_result){
                    $stdShow ="修改成功";
                }else{
                    echo "修改失败";
                }
            }
            if(!empty($des_small)){
                $name_query="UPDATE workcontent SET des_small='".$des_small."' WHERE id=$TRANS";
                $name_result=$db->query($name_query);
                if($name_result){
                    $des_smallShow ="修改成功";
                }else{
                    echo "修改失败";
                }
            }
            if(!empty($des_all)){
                $name_query="UPDATE workcontent SET des_all='".$des_all."' WHERE id=$TRANS";
                $name_result=$db->query($name_query);
                if($name_result){
                    $des_Show ="修改成功";
                }else{
                    echo "修改失败";
                }
            }
            if(!empty($number)){
                $name_query="UPDATE workcontent SET number='".$number."' WHERE id=$TRANS";
                $name_result=$db->query($name_query);
                if($name_result){
                    $numberShow ="修改成功";
                }else{
                    echo "修改失败";
                }
            }
            if(!empty($unit)){
                $name_query="UPDATE workcontent SET unit='".$unit."' WHERE id=$TRANS";
                $name_result=$db->query($name_query);
                if($name_result){
                    $unitShow ="修改成功";
                }else{
                    echo "修改失败";
                }
            }
            if(!empty($area)){
                $name_query="UPDATE workcontent SET area='".$area."' WHERE id=$TRANS";
                $name_result=$db->query($name_query);
                if($name_result){
                    $areaShow ="修改成功";
                }else{
                    echo "修改失败";
                }
            }
            if(!empty($brand)){
                $brand_query="UPDATE workcontent SET brand='".$brand."' WHERE id=$TRANS";
                $brand_result=$db->query($brand_query);
                if($brand_result){
                    $brandShow ="修改成功";
                }else{
                    echo "修改失败";
                }
            }
            if(!empty($volume)){
                $name_query="UPDATE workcontent SET volume='".$volume."' WHERE id=$TRANS";
                $name_result=$db->query($name_query);
                if($name_result){
                    $volumeShow ="修改成功";
                }else{
                    echo "修改失败";
                }
            }
            if(!empty($weight)){
                $name_query="UPDATE workcontent SET weight='".$weight."' WHERE id=$TRANS";
                $name_result=$db->query($name_query);
                if($name_result){
                    $weightShow ="修改成功";
                }else{
                    echo "修改失败";
                }
            }
            if(!empty($power)){
                $name_query="UPDATE workcontent SET power='".$power."' WHERE id=$TRANS";
                $name_result=$db->query($name_query);
                if($name_result){
                    $powerShow ="修改成功";
                }else{
                    echo "修改失败";
                }
            }
            if(!empty($cost)){
                $name_query="UPDATE workcontent SET cost_origin='".$cost."' WHERE id=$TRANS";
                $name_result=$db->query($name_query);
                if($name_result){
                    $costShow ="修改成功";
                }else{
                    echo "修改失败";
                }
            }
            if(!empty($sale)){
                $name_query="UPDATE workcontent SET sale_origin='".$sale."' WHERE id=$TRANS";
                $name_result=$db->query($name_query);
                if($name_result){
                    $saleShow ="修改成功";
                }else{
                    echo "修改失败";
                }
            }
            if(!empty($flag)){
                $flag_query="UPDATE workcontent SET flag='".$flag."' WHERE id=$TRANS";
                $flag_result=$db->query($flag_query);
                if($flag_result){
                    $flagShow ="修改成功";
                }else{
                    echo "修改失败";
                }
            }
            if(!empty($flag_times)){
                $flagt_query="UPDATE workcontent SET flag_times='".$flag_times."' WHERE id=$TRANS";
                $flagt_result=$db->query($flagt_query);
                if($flagt_result){
                    $timesShow ="修改成功";
                }else{
                    echo "修改失败";
                }
            }
		
   echo "<script>
     setTimeout(function(){
         window.location.href='http://web.chenzeshu.com/TEST3/DATABASE_SHOW.php?&page='+".$_SESSION['pageid'].";
     },1000)
</script>";

   }ELSE{
       echo "没有数据传过来<hr>";
   }
}
?>
<body>
<div class="panel panel-primary">
    <div class="panel-heading">
        <div class="panel-title">数据修改</div>
    </div>
    <div class="panel-body">
        <div class="row">
            <form action="DATABASE_EDIT.php" method="post" class="form-horizontal">
                <div class="form-group">
                    <label class="col-lg-3 control-label">系统名称</label>
                    <div class="col-lg-6">
                            <select name = 'system' class="form-control">
                                <option value='卫星通信天线' <?php if(@$system1=="卫星通信天线"){echo "selected";} ?>>一、卫星通信天线</option>
                                <option value='卫星功放' <?php if(@$system1=="卫星功放"){echo "selected";} ?>>二、卫星功放</option>
                                <option value='卫星LNB' <?php if(@$system1=="卫星LNB"){echo "selected";} ?>>三、卫星LNB</option>
                                <option value='卫星通信机设备' <?php if(@$system1=="卫星通信机设备"){echo "selected";} ?>>四、卫星通信机设备</option>
                                <option value='卫星通信的辅助设备和器材' <?php if(@$system1=="卫星通信的辅助设备和器材"){echo "selected";} ?>>五、卫星通信的辅助设备和器材</option>
                                <option value='软件' <?php if(@$system1=="软件"){echo "selected";} ?>>六、软件</option>
                                <option value='北斗设备' <?php if(@$system1=="北斗设备"){echo "selected";} ?>>七、北斗设备</option>
                                <option value='TD-LTE专网设备' <?php if(@$system1=="TD-LTE专网设备"){echo "selected";} ?>>八、TD-LTE专网设备</option>
                                <option value='卫星电话' <?php if(@$system1=="卫星电话"){echo "selected";} ?>>九、卫星电话</option>
                                <option value='对讲设备' <?php if(@$system1=="对讲设备"){echo "selected";} ?>>十、对讲设备</option>
                                <option value='短波设备' <?php if(@$system1=="短波设备"){echo "selected";} ?>>十一、短波设备</option>
                                <option value='VOIP语音网关' <?php if(@$system1=="VOIP语音网关"){echo "selected";} ?>>十二、VOIP语音网关</option>
                                <option value='语音调度及周边设备' <?php if(@$system1=="语音调度及周边设备"){echo "selected";} ?>>十三、语音调度及周边设备</option>
                                <option value='计算机及网络设备' <?php if(@$system1=="计算机及网络设备"){echo "selected";} ?>>十四、计算机及网络设备</option>
                                <option value='视讯会议和编解码器' <?php if(@$system1=="视讯会议和编解码器"){echo "selected";} ?>>十五、视讯会议和编解码器</option>
                                <option value='图传设备' <?php if(@$system1=="图传设备"){echo "selected";} ?>>十六、图传设备</option>
                                <option value='视音频输入输出设备' <?php if(@$system1=="视音频输入输出设备"){echo "selected";} ?>>十七、视音频输入输出设备</option>
                                <option value='电源设备' <?php if(@$system1=="电源设备"){echo "selected";} ?>>十八、电源设备</option>
                                <option value='辅助设备' <?php if(@$system1=="辅助设备"){echo "selected";} ?>>十九、辅助设备</option>
                                <option value='载车' <?php if(@$system1=="载车"){echo "selected";} ?>>二十、载车</option>
                                <option value='信道、服务费用' <?php if(@$system1=="信道、服务费用"){echo "selected";} ?>>二十一、信道、服务费用</option>
                            </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">设备名称</label>
                    <div class="col-lg-6">
                        <input type="text" name="name" class="form-control" value="<?php echo @$name1;?>"><?php echo @$nameShow;?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">设备规格</label>
                    <div class="col-lg-6">
                        <input type="text" name="stand" class="form-control" value="<?php echo @$stand1;?>"><?php echo @$stdShow;?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">简单参数</label>
                    <div class="col-lg-6">
                        <textarea name="des_small" class="form-control" rows="2"><?php echo @$des_small1;?></textarea><?php echo @$des_smallShow;?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">详细参数</label>
                    <div class="col-lg-6">
                        <textarea name="des_all" class="form-control" rows="4"><?php echo @$des_all1;?></textarea><?php echo @$des_Show;?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">数量</label>
                    <div class="col-lg-6">
                        <input type="text" name="number" class="form-control"  value="<?php echo @$number1;?>"><?php echo @$numberShow;?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">单位</label>
                    <div class="col-lg-6">
                        <input type="text" name="unit" class="form-control" value="<?php echo @$unit1;?>"><?php echo @$unitShow;?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">产地</label>
                    <div class="col-lg-6">
                        <input type="text" name="area" class="form-control"  value="<?php echo @$area1;?>"><?php echo @$areaShow;?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">品牌商</label>
                    <div class="col-lg-6">
                        <input type="text" name="brand" class="form-control"  value="<?php echo @$brand1;?>"><?php echo @$brandShow;?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">体积(LxMxH)</label>
                    <div class="col-lg-6">
                        <input type="text" name="volume" class="form-control"  value="<?php echo @$volume1;?>"><?php echo @$volumeShow;?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">设备尺寸(U)</label>
                    <div class="col-lg-6">
                         <input type="text" name="u" class="form-control"  value="<?php echo @$u1;?>"><?php echo @$uShow;?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">重量(kg)</label>
                    <div class="col-lg-6">
                        <input type="text" name="weight" class="form-control"  value="<?php echo @$weight1;?>"><?php echo @$weightShow;?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">功耗</label>
                    <div class="col-lg-6">
                       <input type="text" name="power" class="form-control"  value="<?php echo @$power1;?>"><?php echo @$powerShow;?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">原始成本</label>
                    <div class="col-lg-6">
                        <input   type='radio' name='flag' value='3' <?php
                        if(@$flag1==3){echo "checked";} ?>>人民币
                        <input type='radio' name='flag' value='1' <?php
                        if(@$flag1==1){echo "checked";} ?>>美元
                        <input type='radio' name='flag' value='2' <?php
                        if(@$flag1==2){echo "checked";} ?>>欧元
                        <?php echo @$flagShow;?><br>
                        <input type='text' name='cost_origin' value="<?php echo @$cost1;?>"><?php echo @$costShow;?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">原始价格</label>
                    <div class="col-lg-6">
                        <input type='radio' name='flag_times' value='2' <?php
                        if(@$flag_times1==2){echo "checked";} ?>>无
                        <input type='radio' name='flag_times' value='1' <?php
                        if(@$flag_times1==1){echo "checked";} ?>>有比例
                        <?php echo @$timesShow;?>
                        <br>
                        <input type='text' name='sale_origin' value="<?php echo @$sale1;?>"><?php echo @$saleShow;?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label"></label>
                    <div class="col-lg-6">
                        <input type="submit" class="btn btn-default" value="修改">
                        <input type="hidden" name="TRANS_ID" value="<?php echo $number;?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label"></label>
                    <div class="col-lg-6">
                        <button class="btn btn-default" onclick="javascript:
                        window.location.href='DATABASE_SHOW.php';return false;">返回数据库</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

    </body>
</html>