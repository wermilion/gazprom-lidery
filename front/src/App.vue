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
    <Cookeis class="Cookeis" ></Cookeis>
  </div>
</template>


<script>
import axios from "axios"
import FooterBlock from './components/Footer/FooterBlock.vue';
import HeaderBlock from './components/Header/HeaderBlock.vue';
import Cookeis from './components/Cookeis/Cookeis.vue'
export default{
  
  components:{
    FooterBlock,
    HeaderBlock,
    Cookeis
  },
    mounted() {
      axios.get('/api/csrf-cookie').then(response => {
      console.log(response)
      axios.defaults.headers.common['X-XSRF-TOKEN'] = document.cookie.split('=')[1];
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
