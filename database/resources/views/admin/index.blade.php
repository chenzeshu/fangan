@extends('layouts.admin')
@section('content')
	<?php use App\Model\Role; ?>
	<!--头部 开始-->
	<div class="top_box">
		<div class="top_left">
			<div class="logo">方案自动化平台</div>
			<ul>
				<li><a href="#" class="active">版本一</a></li>
				{{--@role('owner')--}}
				<li><a href="{{url('admin/index2')}}">版本二</a></li>
				{{--@endrole--}}
			</ul>
		</div>
		<div class="top_right">
			<ul>
				<li>你好：{{\Illuminate\Support\Facades\Session::get('username')}}</li>
				@role('owner')
				<li><a href="{{url('admin/register')}}" target="main">添加用户</a></li>
				<li><a href="{{url('admin/user')}}" target="main">用户列表</a></li>
				@endrole
				<li><a href="{{url('admin/pass')}}" target="main">修改密码</a></li>
				<li><a href="{{url('admin/logout')}}">退出</a></li>
			</ul>
		</div>
	</div>
	<!--头部 结束-->

	<!--左侧导航 开始-->
	<div class="menu_box">
		<ul>
			<li>
				<h3><i class="fa fa-fw fa-clipboard"></i>人事类</h3>
				<ul class="sub_menu">
					<li><a href="">个人证件照</a></li>
					<li><a href="">身份证</a></li>
					<li><a href="">学历学位</a></li>
					<li><a href="">职称证书</a></li>
					<li><a href="">培训证书</a></li>
				</ul>
			</li>
			<li>
				<h3><i class="fa fa-fw fa-clipboard"></i>项目类</h3>
				<ul class="sub_menu">
					<li><a href="">中标通知书</a></li>
					<li><a href="">验收报告</a></li>
					<li><a href="">感谢信</a></li>
					<li><a href="">合同</a></li>
					<li><a href="">招标文件</a></li>
					<li><a href="">投标文件</a></li>
					<li><a href="">变更资料</a></li>
					<li><a href="">资质</a></li>
				</ul>
			</li>
			<style>
				.wrap{
					white-space: nowrap;
					width:150px;
					overflow: hidden;
					text-overflow: ellipsis;
				}
			</style>
			<li>
				<h3><i class="fa fa-fw fa-clipboard"></i>质检类</h3>
				<ul class="sub_menu">
					<li class="wrap"><a href="">本公司的产品第三方检测报告
						</a></li>
					<li class="wrap"><a href="">供方产品第三方产品检测报告
						</a></li>
					<li class="wrap"><a href="">按项目保存改装厂出厂验出资料</a></li>
					<li class="wrap"><a href="">按项目保存改装厂出厂验出资料</a></li>
					<li class="wrap"><a href="">系统集成项目出厂验收文件</a></li>
					<li><a href="">产品标准</a></li>
					<li class="wrap"><a href="">对外可开展合作业务证明</a></li>
					<li><a href="">仪器计量证书</a></li>
				</ul>
			</li>
			<li>
				<h3><i class="fa fa-fw fa-clipboard"></i>方案设计类</h3>
				<ul class="sub_menu">
					<li><a href="">设备数据库</a></li>
					<li><a href="">环保行业</a></li>
					<li><a href="">水利行业</a></li>
					<li><a href="">消防行业</a></li>
					<li><a href="">安监行业</a></li>
					<li><a href="">气象行业</a></li>
					<li><a href="">政府应急行业</a></li>
					<li><a href="">国防动员行业</a></li>
					<li><a href="">人防行业</a></li>
					<li><a href="">卫生行业</a></li>
					<li><a href="">地震行业</a></li>
					<li><a href="">质监行业</a></li>
					<li><a href="">农林行业</a></li>
					<li><a href="">海洋渔业行业</a></li>
					<li><a href="">民政行业</a></li>
					<li><a href="">电力行业</a></li>
					<li><a href="">运营商行业</a></li>
					<li class="wrap"><a href="">卫星通信（自有）产品</a></li>
					<li><a href="">其他行业</a></li>
				</ul>
			<li>
				<h3><i class="fa fa-fw fa-clipboard"></i>知识产权类</h3>
				<ul class="sub_menu">
					<li><a href="">专利证书</a></li>
					<li><a href="">专利受理通知书</a></li>
					<li><a href="">商标证书</a></li>
					<li><a href="">软件著作权证书</a></li>
					<li><a href="">荣誉证书</a></li>
				</ul>
			</li>
			</li>
        </ul>
	</div>
	<!--左侧导航 结束-->

	<!--主体部分 开始-->
	<div class="main_box">
		<iframe src="{{url('admin/pros')}}" frameborder="0" width="100%" height="100%" name="main"></iframe>
	</div>
	<!--主体部分 结束-->

	<!--底部 开始-->
	<div class="bottom_box">
		CopyRight © 2016. Powered By <a href="http://www.jianshu.com/users/adc147f1ec89/latest_articles" target="_blank">http://www.chenzeshu.com</a>.
	</div>
	<!--底部 结束-->
@endsection
