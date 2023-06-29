<template>
  <div id="app">
    <nav>
      <LayoitBlock class="LayoitBlock"/>
    </nav>
    <template v-if="$route.path=='/'">
      <FooterBlock class="FooterBlock"/>
    </template>
    
  </div>
</template>


<script>
import LayoitBlock from './views/Layot/Layot.vue'
import FooterBlock from './components/Footer/FooterBlock.vue';

export default{
   

  components:{
    FooterBlock,
    LayoitBlock,
  }
}
</script>

<style lang="scss">
@import url("./assets/global.scss");
@import url("./assets/Main.scss");

#app {
   
}  
.LayoitBlock{
  max-width: 100%;
  padding: 0 40px;
  margin: 0 auto;
  
}
.FooterBlock{
 
  border-top: 1px solid #0079C2;
  width: 100%;
}

</style>
