<?php
session_start();
if (empty($_SESSION['username'])) {
    header("location:index.php");
}
?>
<html>
<head>
    <meta charset='utf-8'>
    <meta name="viewport"
          content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no"/>
    <title>系统结果页面</title>
</head>
<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script src="js/layer/layer.js" type="text/javascript" charset="utf-8"></script>
<script src="js/jquery.tablednd.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
    //word的弹出框
    $(function () {
        $('[data-toggle="popover"]').popover()
    });
    //修改number
    function checknumber(obj) {
        var $flag = $(obj).attr("readonly");
        $(obj).attr({"readonly": false});

        obj.onkeydown = function () {
            var e = event || window.event || arguments.callee.caller.arguments[0];
            var value = $(obj).val();
            var value2 = $(obj).siblings().val();
//    	 alert(value+"+"+value2);
            if (e && e.keyCode == 13) {
                $.post("WORK_RESULT_EDIT_NUMBER.php", {"id": value2, "number": value}, function (result) {
                    $(obj).attr({"readonly": true});
                })
            }
        }

        obj.onblur = function () {
            var value = $(obj).val();
            var value2 = $(obj).siblings().val();
//    	 alert(value+"+"+value2);
            $.post("WORK_RESULT_EDIT_NUMBER.php", {"id": value2, "number": value}, function (result) {
                $(obj).attr({"readonly": true});
            })
        }

    }
    //重置表单询问框
    $(function () {
        $('#excel_del').on('click', function () {
            layer.confirm('确定重置表单？', {
                btn: ['确定', '不，谢谢'] //按钮
            }, function () {
                window.location.href = 'WORK_RESULT_DEL.php';
            });
        })
    })
    //EXCEL导出询问框
    $(function () {
        $('#excel').on('click', function () {
            layer.confirm('即将进入EXCEL导出页？', {
                btn: ['进入', '不，谢谢'] //按钮
            }, function () {
                window.location.href = 'WORK_RESULT_EXCEL.php';
            });
        })
    })
    //删除询问框
    function del_alert(obj) {
        var id = $(obj).val();
        layer.confirm('确定删除？', {
            btn: ['确定', '取消'] //按钮
        }, function () {
            $.post('work_result_del_sql.php', {'id': id}, function (data) {
                if (data == '成功') {
                    window.location.href = 'WORK_RESULT.php';
                } else {
                    alert(data);
                }
            })
        });
    }

</script>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
<style>
    #layui-layer9 {
        top: 10%;
    }

    .popover-content {
        text-align: center;
        padding: 9px 16px;
        font-size: 20px;
        width: 240px;
    }

    .container {
        width: 25%;
        margin: 0 auto;
        padding: 1% 0
    }

    .clearfix {
        content: "";
        display: block;
        clear: both;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    td {
        border: 1px solid black;
        width: 100px;
        text-align: center;
    }

    .layui-layer-dialog {
        min-width: 300px;
        height: 160px;
    }

    .layui-layer-dialog .layui-layer-content {
        position: relative;
        padding: 20px;
        line-height: 24px;
        word-break: break-all;
        overflow: hidden;
        font-size: 18px;
        font-family: "微软雅黑";
        /*    font-weight: bold;*/
        overflow-x: hidden;
        overflow-y: auto;
    }

    .layui-layer-btn a {
        height: 32px;
        line-height: 32px;
        margin: 10px 6px;
        padding: 0 15px;
        border: 1px solid #dedede;
        background-color: #f1f1f1;
        color: #333;
        border-radius: 2px;
        font-weight: 400;
        cursor: pointer;
        text-decoration: none;
        font-size: 16px;
    }

    .id {
        width: 5%;
    }

    .id3 {
        width: 3%;
    }

    .id4 {
        width: 10%;
    }

    .id5 {
        font-size: 13px;
        font-family: '微软雅黑';
    }

    .id6 {
        font-weight: bold;
        font-family: '微软雅黑';
    }

    .id7 {
        width: 60%;
    }

    .luru {
        display: block;
        margin: 5% 0 0 10%;
        float: left;
    }

    .ir {
        background-color: lightblue !important;
        font-weight: bold;
        font-size: 1.2em;
        font-family: '微软雅黑';
    }

    h1 {
        font-size: 3.5rem;
        font-family: '微软雅黑';
    }

    b {
        padding: -10px 0 0 0;
    }

    hr {
        margin: 0 0 0 0;
    }
</style>

<body style="padding:0 0 180px 0;height: 100%">
<nav class="navbar navbar-default navbar-fixed-bottom">
    <a href="#" class="navbar-brand" style="font-size:25px;font-weight:bold;color:#46b8da;"></a>
    <div class="container-fluid" style="width:40%">
        <div class="navbar-header">
            <!--按钮-->
            <button class="nav navbar-nav navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!--按钮-->
            <!--LOGO-->

        </div>
        <div class="navbar-collapse collapse" style="float:left">
            <ul class="nav navbar-nav">
                <li>
                    <div class="btn-group">
                        <a href="door.php" role="button" class="btn btn-default ">返回首页</a>
                    </div>
                </li>
                <li>
                    <div class="btn-group">
                        <a href="WORK_SYS.php" role="button" class="btn btn-default ">添加系统</a>
                    </div>
                </li>
                <li>
                    <div class="btn-group">
                        <a href="DATABASE_SHOW.php" role="button" class="btn btn-default ">数据库</a>
                    </div>
                </li>
                <li>
                    <div class="btn-group">
                        <!--<a href="" role="button" data-toggle="modal" data-target="#myModal" class="btn  btn-warning btn-block">重置业务表单</a>-->
                        <a href="#" role="button" id='excel_del' class="btn  btn-warning btn-block">重置业务表单</a>
                    </div>
                </li>
                <li>
                    <div class="btn-group">
                        <a href="#" id="excel" role="button" class="btn btn-default ">导出EXCEL</a>
                    </div>
                </li>
                <li>
                    <div class="btn-group">
                        <a href="#" role="button" class="btn btn-default " data-container="body" data-toggle="popover"
                           data-placement="top"
                           data-content="本功能请等待二期开发">导出WORD</a>
                    </div>
                </li>
            </ul>
        </div>
    </div> <!-- container -->
</nav>

</body>
<?php
$xingming = $_SESSION['xingming'];
echo "<h1 class='container'>";
echo "<b>" . $xingming . "的表单</b>";
echo "</h1>";
$table = $_SESSION['username'] . "_yewu";
//-----------进来页面就建表以防万一 -----------
$db = new mysqli("localhost", "root", "chenzeshu8", "workbase");
$query_table2 = "create table if not exists " . $table . "(
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
                    u varchar(5),
                    remark TEXT,
                    pid int,
                    ppid int,
                    PRIMARY KEY (id)
                    )DEFAULT CHARSET=utf8";
$result = $db->query($query_table2);
if ($result) {
    $personal_echo = "<b>你的私人业务表名称为" . $table . "</b>";
} else {
    $personal_echo = "建立失败";
}
//---------------以上建表----------------------//

if (isset($_POST['chk'])) {

    $db = new mysqli('localhost', 'root', 'chenzeshu8', 'workbase');
    $db->set_charset('utf8');

    $chkArr = $_POST['chk'];

    echo $personal_echo;
    echo "<hr>";
//    echo "你本次选择了<b>[".count($chkArr)."]</b>个分系统";
    if ($db->connect_errno) {
        echo "无法连接服务器";
    } else {
        //连接服务器的else
        //第一，得到业务表单现有的系统的名称，存在$array_already[]
        $query_already = "select system from " . $table . " where name is null";
        $result_already = $db->query($query_already);
        $array_already = array();
        for ($m = 0; $row_already = $result_already->fetch_assoc(); $m++) {
            $array_already[] = $row_already['system'];
        }
        //第二，遍历出新传来的系统名称，遍历出来，每次都用in_array()确认，一旦存在就刷新报错alert()
        foreach ($chkArr as $k => $v) {
            $query_new = "select * from worksys where id='" . $v . "'";
            $result_new = $db->query($query_new);
            //得到system的名字
            for ($n = 0; $row_new = $result_new->fetch_assoc(); $n++) {
                $system_new = $row_new['system'];
                if (in_array($system_new, $array_already)) {
                    echo "<script>
                   alert('请不要直接刷新本页面');
                   </script>";
                    break 2;  //break1 仅仅禁止了for, break2才真正禁止了foreach
                } else {
                    //当检查没有刷新后，先遍历出传来的系统编号
                    $query1 = "select * from worksys where id=" . $v;
                    $result = $db->query($query1);
                    //得到system的名字
                    for ($i = 0; $row = $result->fetch_assoc(); $i++) {
                        $system = $row['system'];
                        //根据系统名赋予$pid
                        if ($system == '车载卫星通信分系统') {
                            $pid = '1';
                        } elseif ($system == '行业分系统') {
                            $pid = '2';
                        } elseif ($system == '音视频分系统') {
                            $pid = '3';
                        } elseif ($system == '计算机网络办公分系统') {
                            $pid = '4';
                        } elseif ($system == '话音指挥调度分系统') {
                            $pid = '5';
                        } elseif ($system == '供配电分系统') {
                            $pid = '6';
                        } elseif ($system == '车辆改装分系统') {
                            $pid = '7';
                        } elseif ($system == '地面卫星站分系统') {
                            $pid = '8';
                        }
                        $query2 = "insert into " . $table . " values(null,'" . $system . "',null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,'" . $pid . "',null)";
                        $db->query($query2);
                    }
                }
            }
        }
    }//连接服务器的else
};

if (isset($_POST['tool'])) {
    $chkArr = $_POST['chk'];
    $system = $_POST['system'];
    echo "正在读取数据……<hr>";
    echo "你本次选择了[<b>" . count($chkArr) . "</b>]个设备，与原有表单合并后：";

    $db = new mysqli('localhost', 'root', 'chenzeshu8', 'workbase');
    $db->set_charset('UTF8');
    if ($db->connect_errno) {
        echo "无法连接服务器";
    } else {
        foreach ($chkArr as $k => $v) {
            $query1 = "select * from workcontent where id='" . $v . "'";
            $result = $db->query($query1);
            $table = $_SESSION['username'] . "_yewu";
            for ($i = 1; $row = $result->fetch_assoc(); $i++) {
                $id = $row['id'];
                $name = $row['name'];
                $stand = @$row['stand'];
                $des_small = $row['des_small'];
                $des_all = $row['des_all'];
                $number = $row['number'];
                $unit = $row['unit'];
                $area = $row['area'];
                $brand = $row['brand'];
                $volume = $row['volume'];
                $weight = $row['weight'];
                $power = $row['power'];
                $cost = $row['cost'];
                $sale = $row['sale'];
                $u = $row['u'];
                $remark = $row['remark'];
                //根据系统赋予$pid
                if ($system == '车载卫星通信分系统') {
                    $ppid = '1';
                } elseif ($system == '行业分系统') {
                    $ppid = '2';
                } elseif ($system == '音视频分系统') {
                    $ppid = '3';
                } elseif ($system == '计算机网络办公分系统') {
                    $ppid = '4';
                } elseif ($system == '话音指挥调度分系统') {
                    $ppid = '5';
                } elseif ($system == '供配电分系统') {
                    $ppid = '6';
                } elseif ($system == '车辆改装分系统') {
                    $ppid = '7';
                } elseif ($system == '地面卫星站分系统') {
                    $ppid = '8';
                }


                $query2 = "INSERT INTO " . $table . " VALUES(NULL,'" . $system . "','" . $name . "','" . $stand . "','" . $des_small . "','" . $des_all . "',null,null,'" . $number . "','" . $unit . "','" . $area . "','" . $brand . "','" . $volume . "','" . $weight . "','" . $power . "','" . $cost . "','" . $sale . "','" . $u . "','" . $remark . "',null,'" . $ppid . "')";

                $db->query($query2);
                $_POST['tool'] = null;
            }
        }
    }
}

$db = new mysqli('localhost', 'root', 'chenzeshu8', 'workbase');
$db->set_charset('UTF8');
if ($db->connect_errno) {
    echo "无法连接服务器";
} else {
    if (isset($_POST['delete_show'])) {
        $delete_show = $_POST['delete_show'];
        $table = $_SESSION['username'] . "_yewu";
        $delete_query = "DELETE FROM " . $table . " WHERE id=$delete_show";
        $delete = $db->query($delete_query);
        if (!$delete) {
            echo "删除失败";
        } else {
            echo "删除成功<hr>";
        }
    }

    echo "<table  id='table' class='table table-bordered table-striped table-hover' style='clear:both;margin-bottom: 100px;'>";
    echo "<tr class='ir has-success'>";
    echo "<td>序号</td>";
//             echo "<td>分系统</td>";
    echo "<td>设备名称</td>";
    echo "<td>品牌</td>";
    echo "<td>设备型号</td>";
    echo "<td>简单参数描述</td>";
    echo "<td>详细参数描述</td>";
    echo "<td>数量</td>";
    echo "<td>单位</td>";
    echo "<td>产地</td>";
    echo "<td>体积</td>";
    echo "<td>机柜尺寸</td>";
    echo "<td>重量</td>";
    echo "<td>功耗</td>";
    echo "<td>成本单价</td>";
    echo "<td>出厂单价</td>";
    echo "<td>备注</td>";
    echo "<td colspan='2' class='id2'>操作</td>";
    echo "</tr>";
    $table = $_SESSION['username'] . "_yewu";
    $query_order = "select `order` from workorder limit 1";
    $result_order = $db->query($query_order);
    $re_order = $result_order->fetch_assoc()['order'];
    $query3 = "select * from " . $table . " 
            order by 
            field(id,$re_order)
            ";
    $query4 = "select * from " . $table . " 
            order by 
            field(id,$re_order)
            ";
    $result2 = $db->query($query3);
    $result3 = $db->query($query4);

    if ($result2->num_rows) {
        $m = 1;
        foreach ($result2 as $row) {
            if ($row['ppid'] == null) {

                echo "<tr id='" . $row['id'] . "'>";
                echo "<td colspan = '16' class='id5' style='font-size:1.2em;font-weight:bold;line-height: 45px;'>" . $row['system'] . "</td>";

                echo "<td class='id3' >";
                echo "<form action='WORK_SHOW.php' method='post'>";
                echo "<input type='hidden' name='EDIT_SHOW' value='" . $row['system'] . "'>";
                echo "<input type='submit' value='添加设备' class='btn btn-default'>";
                echo "</form>";
                echo "</td>";

                echo "<td class='id3' >";
                echo "<button  value='" . $row['id'] . "' onclick='del_alert(this)' class='btn btn-default'>删除</button>";
                echo "</td>";

                echo "</tr>";
                foreach ($result3 as $row2) {
                    if ($row2['ppid'] == $row['pid']) {

                        echo "<tr id='" . $row2['id'] . "'>";
                        echo "<td class='id' style='vertical-align:middle'>" . $m . "</td>";
                        echo "<td class='id6' style='vertical-align:middle'>" . $row2['name'] . "</td>";
                        echo "<td class='id' style='vertical-align:middle'>" . $row2['brand'] . "</td>";
                        echo "<td class='id5' style='vertical-align:middle'>" . @$row2['stand'] . "</td>";
                        echo "<td class='id5' style='vertical-align:middle'>" . $row2['des_small'] . "</td>";
                        echo "<td class='id5' style='vertical-align:middle'>" . $row2['des_all'] . "</td>";

                        echo "<td class='id'>";

                        echo "<input type='hidden' value='" . $row2['id'] . "'>";
                        echo "<input type='text' class='form-control' onclick='checknumber(this)' value=" . $row2['number'] . " readonly style='text-align:center'/>";

                        echo "</td>";

                        echo "<td class='id' style='vertical-align:middle'>" . $row2['unit'] . "</td>";
                        echo "<td class='id' style='vertical-align:middle'>" . $row2['area'] . "</td>";
                        echo "<td class='id3' style='vertical-align:middle'>" . $row2['volume'] . "</td>";
                        echo "<td class='id3' style='vertical-align:middle'>" . $row2['u'] . "</td>";
                        echo "<td class='id3' style='vertical-align:middle'>" . $row2['weight'] . "</td>";
                        echo "<td class='id3' style='vertical-align:middle'>" . $row2['power'] . "</td>";
                        echo "<td style='vertical-align:middle'>" . $row2['cost'] . "</td>";
                        echo "<td style='vertical-align:middle'>" . $row2['sale'] . "</td>";
                        echo "<td style='vertical-align:middle'>" . $row2['remark'] . "</td>";

                        echo '<td>';
                        echo '</td>';
                        //删除
                        echo "<td class='id3' style='vertical-align:bottom'>";
                        echo "<button style='margin:2% 0 -5% 0' value='" . $row2['id'] . "' onclick='del_alert(this)' class='btn btn-default'>删除</button>";
                        echo "</td>";
                        echo "</tr>";
                        $m++;
                    };
                };
            }
        }
        echo "</table>";

    } else {
        echo "没有设备<br>";
    }
}
?>
<script>
    $(document).ready(function () {
        $("#table").tableDnD({
            //当拖动排序完成后
            onDrop: function () {
                //获取id为table的元素
                var order = '';
                $('tr[id]').each(function () {
                    order += $(this).attr('id') + ',';
                });
                order = order.substring(0, order.length - 1);  //去掉右边第一个字符

                $.post('work_result_drag.php', {'order': order}, function (data) {
                    if (data == '成功') {
                        window.location.href = window.location.href;
                    }
                })
            }
        });
    });

</script>
</html>

