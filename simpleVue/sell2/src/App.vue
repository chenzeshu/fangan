<template>
  <div>
    <v-header :seller="seller"></v-header>
    <div class="tab">
      <div class="tab-item">
        <router-link to="/goods">商品</router-link>
      </div>
      <div class="tab-item">
        <router-link to="/ratings">评价</router-link>
      </div>
      <div class="tab-item">
        <router-link to="/seller">商家</router-link>
      </div>
    </div>
    <router-view></router-view>
  </div>
</template>

<style lang="stylus" rel="stylesheet/stylus">
 @import "common/stylus/mixins.styl"
  .tab
    display flex
    width 100%
    height 40px
    line-height 40px
    border-1px(rgba(7,17,27,0.1))
    .tab-item
      flex 1
      text-align center
      &>a
        display block
        font-size: 14px;
        color: rgb(77, 85, 93);
        &.active
          color rgb(240,20,20)
</style>

<script>
import header from 'components/header/header'

const ERR_OK = 0
export default {
  name: 'app',
  data() {
      return{
        seller:{}
      }
  },
  created() {
    this.$http.get('/api/seller?id=' + this.seller.id).then((response) => {
      response = response.body;
      if (response.errno === ERR_OK) {
        this.seller = Object.assign({}, this.seller, response.data);
      }
    });
  },
  components: {
    'v-header':header
  }
}
</script>


