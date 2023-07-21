<template>
  <div id="app" >
    <nav class="mainContener">
      <HeaderBlock></HeaderBlock>
    </nav>
    <router-view/>
    <footer>
       <template v-if="$route.name!='EntranceBlock' && $route.name != 'ChangingThePassword'">
        <FooterBlock class="FooterBlock"/>
      </template>
    
    </footer>
   
  </div>
</template>


<script>
import axios from "axios"
import FooterBlock from './components/Footer/FooterBlock.vue';
import HeaderBlock from './components/Header/HeaderBlock.vue';
export default{
  
  components:{
    FooterBlock,
    HeaderBlock,
  },
    mounted() {
      axios.get('https://gazprom-lidery-dev.tomsk-it.ru/sanctum/csrf-cookie').then(response => {
      console.log(response)
      axios.defaults.headers.common['XSRF-TOKEN'] = document.cookie.split('=')[1];
      }).catch(error => {
      console.error(error);
    });
  }

}
</script>

<style lang="scss">
@import url("./assets/scss/global.scss");
@import url("./assets/fonts/Main.scss");

#app {
  display: flex;
  flex-direction: column;
   height: 100vh;
}  

.FooterBlock{
  margin-top: 56px;
  border-top: 1px solid #0079C2;
  flex-shrink: 0;
	

}

</style>
