@extends('layouts/admin')
@section('content')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/self')}}">首页</a> &raquo; <a href="#">个人中心管理</a>
    </div>
    <!--面包屑导航 结束-->


    <!--搜索结果页面 列表 开始-->
        <div class="result_wrap">
            <div class="result_title">
                <h3>数据库列表</h3>
            </div>
            <!--快捷导航 开始-->
            <div class="result_content">
                <div class="short_wrap">

                </div>
            </div>
            <!--快捷导航 结束-->
        </div>
        <div class="result_wrap">
            <div class="result_content">
                <table class="list_tab">
                    <tr>
                        <th class="tc" style="max-width: 200px;">ID</th>
                        <th style="min-width: 260px;">数据库二级名称</th>
                        <th style="max-width: 300px;">管理员</th>
                    </tr>
                    <tr>
                        <td class="tc">1</td>
                        <td>
                            <a href=""><span>个人证件照</span></a>
                        </td>
                        <td>
                            <span>曹华</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="tc">2</td>
                        <td>
                            <a href=""><span>个人证件照</span></a>
                        </td>
                        <td>
                            <span>曹华</span>
                        </td>
                    </tr>
                </table>
                <div class="page_list">
                </div>
            </div>
        </div>
    <!--搜索结果页面 列表 结束-->

    <style>
        .result_content ul li span{
            padding:6px 12px;
        }
    </style>
    <script>
        //删除分类
        function deleteObj(self_id){
            layer.confirm('确定删除这位仁兄？', {
                btn: ['确定','取消'] //按钮
            }, function(){
                $.post("{{url('admin/self/')}}/"+self_id,{'_method':'delete','_token':"{{csrf_token()}}"},function(data){
                    if(data.status=='0'){
                        layer.msg(data.msg, {icon: 6});
                        setTimeout(function(){
                            location.href = location.href;
                        },900)
                    }else if(data.status=='1'){
                        layer.msg(data.msg, {icon: 5});
                        setTimeout(function(){
                            location.href = location.href;
                        },900)
                    }else{
                        layer.msg(data.msg, {icon: 5});
                        setTimeout(function(){
                            location.href = location.href;
                        },900)
                    }
                });
            });
        }
        //补0函数
        function AppendZero(obj)
        {
            if(obj<10) return "0" +""+ obj;
            else return obj;
        }
        //搜索符合条件的+Unix时间戳=>Js时间戳=>得到日期（补0)
        function searchName(){
            var name = $('#search').val();
            if(name){
                $.post('{{url('admin/self/search')}}',{"name":name,"_token":"{{csrf_token()}}"},function(data){
                    $('table tr:gt(0)').empty();
                    $.each(data,function(k,v){
                        var time_begin = v.self_date_start*1000;  //unix时间戳*1000方便让js计算
                        var date_begin = new Date(time_begin);   //实例化Date对象
                        var begin = date_begin.getFullYear()+"-"+AppendZero(date_begin.getMonth()+1)+"-"+AppendZero(date_begin.getDate()); //组装日期
                        var time_end = v.self_date_end*1000;
                        var date_end = new Date(time_end);
                        var end = date_end.getFullYear()+"-"+AppendZero(date_end.getMonth()+1)+"-"+AppendZero(date_end.getDate());
                        var url = "self/"+v.self_id+"/edit";
                        var url2 = 'javascript:onclick=deleteObj('+v.self_id+')';
                        if (v.self_self==1){
                            v.self_self="奖励";
                            v.self_float = "+"+v.self_float;
                        }else {
                            v.self_self="惩罚";
                            v.self_float = "-"+v.self_float;
                        }
                        $('table').append("<tr><td class='tc'>"+v.self_id+"</td><td>"+v.self_name+"</td><td>"+v.self_self+"</td>" +
                                "<td>"+v.self_float+"</td><td>"+begin+"</td><td>"+end+"</td>" +
                                "<td><a href='"+url+"'>修改</a><a href='"+url2+"'>删除</a></td></tr>")
                    })
                })
            }else{
                alert("请输入信息");
            }
        }
          {{--function endOrder(obj,self_id){--}}
              {{--var order = $(obj).val();--}}
              {{--$.post('{{url('admin/self/endorder')}}',{'_token':"{{csrf_token()}}",'order':order,'self_id':self_id},function (data) {--}}
                  {{--if(data.status=='0'){--}}
                      {{--layer.alert(data.msg,{icon: 6});--}}
                  {{--}else{--}}
                      {{--layer.alert(data.msg,{icon: 5});--}}
                  {{--}--}}
              {{--})--}}
          {{--}--}}

    </script>
@endsection
