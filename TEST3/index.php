<!DOCTYPE html PUBLIC"-//W3C//DTDXHTML1.0Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<meta name="renderer" content="webkit">
		<title>登录页面</title>
	</head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
	<style>
    *{
     font-family:'微软雅黑';
    }
    body{
    	background: url(img/login_bg.jpg);
        background-size: 100%;
    }
    div#first{
/*     	border:1px solid black; */
/*     	border-radius:5px; */
    	width:600px;
    	height:400px;
    	margin-top:5%;
    }
	h1{
		height:30px;
		width:240px;
		margin:5% auto 7% auto;
		color:#FFFFFF;
		letter-spacing: 4px;
		
	}
	p{
		font-size:1.2em;
		width:350px;
		margin:5% auto;
	}
	.second{
		width:120px;
		margin:0 auto;
	}
	input[type="submit"]{
		margin-top:35%;
		width:80px;
		height:30px;
	}
	input[type="text"],input[type="password"]{
		font-size:1.1em;
	}

	</style>
	<body>
<div id="first" class="container">
<form method="post" action="login.php">
	<div class="row">
		<div class="col-lg-12">

	    <h1>方案制作系统</h1>
	    <div style="width: 75%;
  height: 1px;
  margin: 20px auto;
  padding: 0px;

  overflow: hidden;"></div>
	    	
	    </div>
	    				
		</div>
	      
	       <div class="form-group has-feedback form-inline" style="width:135%;margin-left:4%;">
            <label style="color: #FFFFFF;font-size: 17px;">用户名：</label>
            <input type="text" class="form-control input-lg" name="name" value="simj2" style="width:50%">
            <span class="glyphicon glyphicon-eye-open form-control-feedback" aria-hidden="true"></span>
	       </div>
        	
        	<div class="clearfix"></div>
        	 
	        <div class="form-group has-feedback form-inline" style="width:135%;margin-left:4.3%;">
             <label style="color:#FFFFFF;font-size: 17px;">密&nbsp;&nbsp;&nbsp;码：</label>
             <input type="password" class="form-control input-lg" name="password" value="chenzeshu" style="width:50%">
             <span class="glyphicon glyphicon-align-justify form-control-feedback"></span>
	        </div> 
	      
	      <div class="clearfix"></div>
	      
	      <div class="col-lg-4" style="width:60%;margin-left:20%;margin-top:4%">
	      <button type="submit" class="btn btn-info btn-lg btn-block" style="outline: none"/>登录</button>
	      </div>
	      
	</div>  <!--row-->
</form>     
</div>  <!--container-->
	  
	</body>
</html>
