<?php
session_start();
if(empty($_SESSION['username'])){
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>上传页面</title>
</head>
<script type="text/javascript">
    window.onload=function(){
        var fm = document.getElementsByTagName('form')[0];
        fm.onsubmit=function(evt){
            //收集form的表单信息
            //HTML5 新技术"FormData表单数据对象"，可以快速收集表单信息
            var fd = new FormData(fm);   //就不用上面这么多了


            var xhr = new XMLHttpRequest;
            xhr.onreadystatechange=function(){
                if(xhr.readyState==4){
                    document.getElementById('success').innerHTML=xhr.responseText;
                }
            }
            xhr.upload.onprogress = function(evt){

                //附件已经上传大小
                var load = evt.loaded;
                //附件总大小
                var total = evt.total;
                //上传的百分比
                var per = Math.floor((load/total)*100)+"%";  //大坑，千万不能写math ,M要大写

                document.getElementById('son').style.width=per;
                document.getElementById('son').innerHTML = per;

            }
            xhr.open('POST','upload_houtai.php');
            xhr.send(fd);

            //阻止浏览器的FORM表单的提交
            evt.preventDefault();
        }
    }
</script>
<style>
    #jindu{
        width:380px;height:35px;border:2px solid blue;
    }
    #son{
        text-align: center;
        font-size: 2em;
        width:0%;height: 100%;background-color: lightblue
    }
</style>
<body>
<form action="./1001.php" method="post">
    <p>附  件：<input type="file" id="fujian" name="userfile"/></p></p>
    <div id='jindu'><div id='son'></div></div>
    <br>
    <input type="submit" value="提交"/>
    <p id="success">
</form>

</body>
</html>
