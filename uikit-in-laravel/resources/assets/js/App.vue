<template>
  <div id="app">
    <example></example>
    <ul class="uk-pagination">
      <li class="uk-disabled"><span><i class="uk-icon-angle-double-left"></i></span></li>
      <li class="uk-active"><span>1</span></li>
      <li><a href="#">2</a></li>
      <li><a href="#">3</a></li>
      <li><a href="#">4</a></li>
      <li><span>...</span></li>
      <li><a href="#">20</a></li>
      <li><a href="#"><i class="uk-icon-angle-double-right"></i></a></li>
    </ul>

  </div>
</template>
<style>
  .uk-width-1-1{
  background:#fafafa
  }
</style>
<script>
  import Example from './components/Example.vue';

  export default {
    name: 'app',
    components: {
      Example
    }
  };
</script>
