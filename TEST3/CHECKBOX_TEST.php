<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>�ޱ����ĵ�</title>
</head>
<body>
<form action="CHECKBOX_TEST.php" method="post">
    <input type="checkbox" name="chk[]" value="1" />1
    <input type="checkbox" name="chk[]" value="2" />2
    <input type="checkbox" name="chk[]" value="3" />3
    <input type="checkbox" name="chk[]" value="4" />4
    <input type="checkbox" name="chk[]" value="5" />5
    <input type="submit" name="tj" value="�ύ" />
    </form>
    <!--�߼������������-->
    <?php
    if(isset($_POST['tj'])) {
        $chkArr = $_POST['chk'];
        echo "��һ��ѡ����[<b>".count($chkArr)."</b>]��Ԫ�أ�valueֵ�ֱ����£�<br />";
        foreach($chkArr as $k => $v) {
            echo '��['.$k.']��Ԫ�ص�ֵ�ǣ�'.$v.'<br />';
            //���Ҫִ��sql���������ݿ�Ҳ�ܼ�
            $sql = "update tableName set value = 'xxxx' where id = $v";
            //mysql_query($sql);
            echo $sql.'<hr />';
        }
    }
    ?>
</body>
</html>