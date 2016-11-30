<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>
<body>
<form action="CHECKBOX_TEST.php" method="post">
    <input type="checkbox" name="chk[]" value="1" />1
    <input type="checkbox" name="chk[]" value="2" />2
    <input type="checkbox" name="chk[]" value="3" />3
    <input type="checkbox" name="chk[]" value="4" />4
    <input type="checkbox" name="chk[]" value="5" />5
    <input type="submit" name="tj" value="提交" />
    </form>
    <!--逻辑处理代码如下-->
    <?php
    if(isset($_POST['tj'])) {
        $chkArr = $_POST['chk'];
        echo "您一共选择了[<b>".count($chkArr)."</b>]个元素，value值分别如下：<br />";
        foreach($chkArr as $k => $v) {
            echo '第['.$k.']个元素的值是：'.$v.'<br />';
            //如果要执行sql语句更新数据库也很简单
            $sql = "update tableName set value = 'xxxx' where id = $v";
            //mysql_query($sql);
            echo $sql.'<hr />';
        }
    }
    ?>
</body>
</html>