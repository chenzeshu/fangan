<!DOCTYPE html PUBLIC"-//W3C//DTDXHTML1.0Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html>
	<head>
		<meta charset="utf-8" />
		<title>登录页面</title>
	</head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
    <?php 
    session_start();
   session_unset();
   session_destroy();
    if($_SESSION==null){
        header('location:index.php');
    }
    
    ?>
	</body>
</html>
