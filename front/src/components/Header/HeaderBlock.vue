<template>
    <section>
        <router-link to="/"><img src="/image/GazpromLog.svg" alt="logo"></router-link>
        <template v-if="$route.name == 'MainPage' || $route.name == 'Page404' ">
         
            <b>РЕГИСТРАЦИЯ НА ПЕРВЫЙ СЕЗОН НАЧНЕТСЯ <span>15 ОКТЯБРЯ</span> 2023 ГОДА</b>
            <button v-on:click="GetLogin">ЛИЧНЫЙ КАБИНЕТ</button>
           
        </template>
        <template v-if="$route.meta.shouldRenderBlock">
            <div class="account">
                <b >id: {{ userId }}</b>
                <button v-on:click="openModel" >Выход</button>
            
            </div>       
        </template>
        <div  v-show="modalOpen" class="modal-container" v-on:click.self="closeModel">
            <div v-show="modalOpen" class="modal-wrapper">
                <div class="model-content">
                    <div class="top">
                      <button  v-on:click="closeModel" class="exst"></button>  
                    </div>
                    <div class="betwen">
                        <b>Вы действительно хотите выйти?</b>
                    </div>
                    <div class="botton">
                        <button v-on:click="LogoutPost">Да</button>
                        <button v-on:click="closeModel ">Нет</button>
                    </div>
                </div>
            </div>
        </div>
        
    </section>
</template>

<script>
import axios from "axios"
import router from "@/router"
import {mapGetters } from "vuex"


export default{
    name: "HeaderBlock",
    data(){
        return{
            modalOpen:false,
            user:''
        }
    },
    computed: {
        ...mapGetters([
           'userId'
        ]),
      
    },
    mounted(){
      
    },
    methods: {
        openModel(){
            this.modalOpen=true
            document.body.style.overflow = "hidden";
        },
        
        closeModel(){
            this.modalOpen=false
            document.body.style.overflow = "auto";
        },
        GetLogin() {
            axios.get('/api/profile')
                .then(() => {
                    router.push('/stages')
                    
                })
                .catch(error => {
                    console.error(error);
                    router.push('/login')
                });
        },
        LogoutPost(){
            this.modalOpen = false
            document.body.style.overflow = "auto";
            this.$store.dispatch('LogoutPost')
        }
    }
}

</script>


<style lang="scss" scoped>

section{
    
    margin-top: 32px;
    margin-bottom:32px ;
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items:flex-end ;
    
    img{
        
        width: 190px;
        height: 103px;
    }
   
    b{
        
        padding-bottom: 15px;
        margin: 0 20px;
        font-weight: 700;
        font-size: 32px;
        line-height: 37px;
        color: #1D4573;
        
        span{
            background-color: #0079C2;
            color: white;
            padding: 12px 4px;
            
        }
    }
    .account{
        display: flex;
        align-items: center;
        b{
           padding: 16px 24px; 
           margin-right: 88px;
        }
    }
    
 
    
    button{
        padding: 16px 24px;
        font-size: 32px;
         font-weight: 700;
        font-size: 32px;
        line-height: 37px;
        border: none;
    }
    button:hover{
        background: #064677;
    }
    
    .modal-container {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(244, 244, 244, 0.10);
        backdrop-filter: blur(7.5px);
        z-index: 9999;
        display: flex;
        justify-content: center;
        align-items: center;

        .modal-wrapper{
        
            border: 3px solid #064677;
            background: #FFF;
            position: absolute;
            
            z-index: 1000;
            width: 743px;
            height: 400px;
            .model-content{
                width: 100%;
                max-width: 641px;
                margin: 31px auto;
                display: flex;
                flex-direction: column;
                height: 100%;
                .betwen{
                    display: flex;
                    justify-content: center;
                    margin-bottom: 88px;
                }
                .top{
                    display: flex;
                    justify-content: flex-end;
                    margin-bottom: 16px;
                    .exst{
                        background-image: url('/public/image/Group 36.png');
                        background-color: white;
                        background-size:cover ;
                        width: 62px;
                        height: 62px;
                    }
                    .exst:hover{
                        background-image: url('/public/image/Group 36 (1).png');
                    }
                }
                .botton{
                    display: flex;
                    justify-content: space-around;
                    button{
                        border: 4px solid #064677;
                        background-color: white;
                        color: #064677;

                        padding: 8px 29px;
                    }
                    button:hover{
                        background-color: #064677;
                        color: white;
                    }
                }
            }
    }

    }
  
    }
   
    @media screen and (max-width :1600px) {
        img{
            width: 183px;
            height: 91px;
        }
        b{ 
            font-size: 28px; 
      
        }
        .router{  
            font-size: 26px;
            padding: 11px 20px 12px 20px;
        }
    }
    @media screen and (max-width :1280px) {
        img{
            width: 153px;
            height: 91px;
        }
        b{ 
            font-size: 24px; 
      
        }
        .router{  
            font-size: 24px;
            padding: 11px 20px 12px 20px;
        }
    }
        

 @media screen and (max-width :1024px) {
        section{
            display: flex;
            flex-direction: column;
            
            align-items: center;
            b{
                width: 100%;
                margin: 20px 0 20px;
                text-align: center;
                line-height: 60px;
                

            }
          
        }
    }
</style>