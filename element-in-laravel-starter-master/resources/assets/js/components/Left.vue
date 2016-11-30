<template>
    <div>
        <el-input
                placeholder="请输入内容"
                v-model="whatsup">
        </el-input>{{ whatsup }}
        <!--<button @click="isOrNotWork">有没有用</button>-->
        <!--<button @click="isOrNotWorking">有没有用</button>{{ whatsup }}-->
        <el-menu default-active="2" class="el-menu-vertical-demo" @open="handleopen" @close="handleclose">
            <el-submenu index="1">
                <template slot="title"><i class="el-icon-message"></i>人事部</template>
                <el-menu-item-group title="分组一">
                    <el-menu-item index="1-1">人事部</el-menu-item>
                    <el-menu-item index="1-2">项目管理部</el-menu-item>
                </el-menu-item-group>
                <el-menu-item-group title="分组2">
                    <el-menu-item index="1-3">质检部</el-menu-item>
                </el-menu-item-group>
            </el-submenu>
            <el-menu-item index="2"><i class="el-icon-menu"></i>项目管理部</el-menu-item>
            <el-menu-item index="3"><i class="el-icon-setting"></i>质检部</el-menu-item>
            <el-menu-item index="3"><i class="el-icon-setting"></i>集成规划所</el-menu-item>
            <el-menu-item index="3"><i class="el-icon-setting"></i>知识产权部</el-menu-item>
        </el-menu>
    </div>
</template>
<style>
*{

}
</style>
<script>
    export default{
        data(){
            return{
                msg:'hello vue',
                whatsup:"填写内容"
            }
        },
        methods:{
            isOrNotWork:function(){
                this.$set(this,'whatsup',100)
            },
            isOrNotWorking:function(){
                this.$set(this,'whatsup',550)
            }
        },
        components:{
        }
    }

</script>
