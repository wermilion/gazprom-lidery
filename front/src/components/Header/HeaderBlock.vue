<template>
    <section>
        <router-link to="/"><img src="/image/GazpromLog.svg" alt="logo"></router-link>
        
        <template v-if="$route.path == '/'">
            <p>РЕГИСТРАЦИЯ НА ПЕРВЫЙ СЕЗОН НАЧНЕТСЯ <span>15 ОКТЯБРЯ</span> 2023 ГОДА</p>
            <router-link class="router" to="/Entrance">ЛИЧНЫЙ КАБИНЕТ</router-link>
        </template>
        
    </section>
</template>

<script>

export default{
    name: "HeaderBlock",
    
}

</script>


<style lang="scss" scoped>

section{
    
    margin-top: 48px;
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items:flex-end ;
    
    img{
        
        width: 193px;
        height: 101px;
    }
   
    p{
        font-family: "HeliosCondBlack";
        padding-bottom: 15px;
        margin: 0 20px;
        font-weight: 700;
        font-size: 37px;
        line-height: 37px;
        color: #1D4573;
        
        span{
            background-color: #0079C2;
            color: white;
            padding: 12px 0;
            
        }
    }
    
    .router{
        background-color: #0079C2;
        color: white;
        font-weight: 700;
        font-size: 32px;
        line-height: 37px;
        border-radius: 0px;
        border: none;
        padding: 10px 25px 10px 25px;
        
        
    }
   
        
}
 @media screen and (max-width :1024px) {
        section{
            display: flex;
            flex-direction: column;
            
            align-items: center;
            p{
                width: 100%;
                margin: 20px 0 20px;
                text-align: center;
                line-height: 60px;
                

            }
        }
         
    }
</style>