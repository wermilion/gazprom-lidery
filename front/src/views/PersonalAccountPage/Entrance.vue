<template>
    <section>
        <div class="left">
            <img src="/image/ImgMain1.png" alt="">
        </div>
        <div class="right">
            <h2>ВХОД В КАБИНЕТ</h2>
            <form>
                <input type="text" class="one" placeholder="Табельный номер " title = "Это тигр">
                <input type="text" placeholder="Пароль"> 
                <template v-if="$route.path == '/ChangingThePassword'">
                    <div class="checkpasword">
                        <input id="checkbox" type="checkbox"> 
                        <label for="checkbox">Запомнить меня</label>
                    </div>    
                </template>
            </form>
            <button ><router-link class="button" to="/StagesCompetition">Войти</router-link></button>
            
        </div>
    </section>
</template>


<script>
export  default{
    name: "EntranceBlock",
    data(){
        return{
            pasword:'1234'

        }
    }

}
</script>


<style lang="scss" scoped>
section{
    width: 1456px;
    max-width: 100%;
    margin-top: 109px;
    margin-bottom: 243px;
    display: flex;
    align-items: center;
    justify-content: space-around;
    color: #064677;
    margin: 104px auto;
    h2{
        font-size: 48px;
        font-weight: 400;
        line-height: 52px;
    }
    div{
        height: 594px;
        width: 40%;
    }
     .left{
        background-color: #3394CE;
        background: rgba(51, 148, 206, 0.40);
        display: flex;
        align-items: center;
        justify-content: center;
        img{
            width: 100%;
            height: hidden;
        }


    }
    .right{
        box-shadow: 10px 10px 40px 0px rgba(51, 148, 206, 0.70);
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: space-around;
        .one{
            margin-bottom: 80px;
        }
        h2{
            font-size: 48px;
            font-family: "HeliosCondBlack";
            font-weight: 400;
            line-height: normal;
            margin: 42px 0 82px;
        }
        form{
            display: flex;
            flex-direction: column;
            width: 100%;
            input{
                margin: 0 auto ;
                border: none;
                width: 90%;
                height: 34px;
                border-bottom:5px  solid #3394CE;
                
                font-size: 32px;
                font-weight: 400;
                
                
            }
            input:focus{
                border: none;
                
            }
            input::placeholder{
                color: #064677;
            }
            .checkpasword{
                display: flex;
            }
        }
    }
    .button{
        color: #064677;
        font-size: 48px; 
    }
    button{
        border:4px solid #3394CE;
        color: #064677;
        background-color: white;
        padding: 22px auto;
        color: #064677;
        font-size: 48px;
        font-weight: 700;
        height: 100px;
        width: 35%;
        margin: 80px auto;
        text-align: center;
    }
}



</style>