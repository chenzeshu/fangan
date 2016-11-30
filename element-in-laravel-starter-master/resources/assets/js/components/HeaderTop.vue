<template>
    <div>
        <el-row>
            <el-col :span="21"><div class="grid-content bg-purple">
                <el-menu default-active="1" class="el-menu-demo" mode="horizontal" @select="handleselect">
                    <el-menu-item index="4"><img src="http://upload-images.jianshu.io/upload_images/3157722-68b0bfc6b66475e8.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240" alt="南京中网LOGO"></el-menu-item>
                    <el-menu-item index="1"><el-button>收/开侧栏</el-button></el-menu-item>
                    <el-submenu index="2">
                        <template slot="title">我的工作台</template>
                        <el-menu-item index="2-1">选项1</el-menu-item>
                        <el-menu-item index="2-2">选项2</el-menu-item>
                        <el-menu-item index="2-3">选项3</el-menu-item>
                    </el-submenu>
                    <el-menu-item index="3">订单管理</el-menu-item>
                </el-menu>
            </div></el-col>
            <el-col :span="3"><div class="grid-content bg-purple">
                <el-menu default-active="1" class="el-menu-demo" mode="horizontal" @select="handleselect">
                    <el-submenu index="1">
                        <template slot="title">你好 {{ username }} </template>
                        <el-menu-item index="2-1">修改密码</el-menu-item>
                        <el-menu-item index="2-2">登出</el-menu-item>
                    </el-submenu>
                </el-menu>
            </div></el-col>
        </el-row>

        <el-row :gutter="30">
            <el-col :span="3">
                <div class="headerleft">
                 <left></left>
                </div>
            </el-col>
            <el-col :span='21'>
                <!--面包屑导航-->
                <el-row>
                    <div class="headerblank"></div>
                    <el-breadcrumb separator="/">
                        <el-breadcrumb-item>首页</el-breadcrumb-item>
                        <el-breadcrumb-item>活动管理</el-breadcrumb-item>
                        <el-breadcrumb-item>活动列表</el-breadcrumb-item>
                        <el-breadcrumb-item>活动详情</el-breadcrumb-item>
                    </el-breadcrumb>
                </el-row>
                <!--切换组件-->
                <el-row>
                    <div class="headerblank"></div>
                    <div class="headerbackgounrd">
                    </div>
                </el-row>
            </el-col>
        </el-row>
    </div>
</template>
<style>
.headerblank{
    margin-bottom:30px;
    }
.headerleft{
    background:#eff2f7;
    min-width:150px;
    height:1000px
}
.headerbackgounrd{
    margin-top:30px;
    background:#eff2f7;
    width:98%;
    height:880px
}
</style>
<script>
 import Left from './Left.vue'
    export default{
        data(){
            return{
                username:"admin",
            }
        },
        components:{
            Left
        }
    }

</script>
