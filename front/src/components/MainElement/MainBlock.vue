<template>
    <section>
        <div class="top_inf">
            <h1>ЛИДЕРЫ </h1>
        </div>
        
        <div class="botton_inf">
            <h1>ГАЗПРОМА</h1>
            <p>
                “Лидеры Газпрома” - это закрытый конкурс для руководителей ООО 
                “Газпром трансгаз Томск” нового поколения, который дает возможность 
                проявить свои лидерские качества и войти в состав привилегированного
                сообщества лучших управленцев компании.
            </p>
        </div>
        <img src="/image/ImgMain1.png" alt="" class="IMg1">
        <img src="/image/ImgMain2.png" alt="" class="IMg2">
    </section>
</template>

<script>
export default{
    name:'MainBlock'
}
</script>


<style lang="scss" scoped>
section{
    margin-top: 0px;
    background-color: #0079C2;
    color: #F5F5F5;
    position: relative;
    
    .IMg1{
        position: absolute;
        top: 0px;
        right: 0px;
        height: 400px;
        width: 400px;
    }
    .IMg2{
        position: absolute;
        top: 322px;
        left: 0;
        height: 400px;
        width: 400px;
    }
    .top_inf{
        width: 951px;
        max-width: 100%;
        h1{
            margin-top: 7px;
            padding-left: 32px;
            margin-bottom: 5px;
        }
    }
    .botton_inf{
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        width: 951px;
        max-width: 100%;
        margin: 0 auto;
        
        h1{
            width: 100%;
            background-color: #F5F5F5;
            color: #1D4573;
            padding: 0 19px 0 19px;
            

        }  
        p{
            width: 100%;
            font-size: 30px;
            margin-bottom: 68px;
            
            margin-top: 32px;
            
        }
       
    } 
    @media screen and (max-width :1680px) {
        .IMg1{
            height: 250px;
            width: 250px;
            top: 230px;
        }
        .IMg2{
            height: 300px;
            width: 300px;
            top:600px;
        }
    }
    @media screen and (max-width :1280px) {
        .IMg1{
            height: 240px;
            width: 230px;
        }
        .IMg2{
            height: 300px;
            width: 300px;
            top:420px;
        }
        .top_inf{
            
            h1{
                font-size: 150px;
                line-height: 160px;
            }
        }
    .botton_inf{
       
        width: 100%;
        max-width:700px ;
       
        h1{
            
            font-size: 150px;
            line-height: 160px;
            
        }  
        p{
            font-size: 25px;
            padding-left: 10px;
            
        }
       
    } 
        }
    @media screen and (max-width :1024px) {
        .IMg1{
            display: none;
        }
        .IMg2{
            display: none;
        }
        .top_inf{
            h1{
                font-size: 100px;
                line-height: 120px;

            }
        }
        .botton_inf{
            width: 456px;
            h1{
                margin: 0px;
                padding: 0 10px;
                font-size: 100px;
                line-height: 120px;
            }
            p{
                overflow: hidden;
                font-size: 25px;
            }
        }
    }
}
</style>