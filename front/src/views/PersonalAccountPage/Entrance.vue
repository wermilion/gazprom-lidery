<template>
    <section>
        <div class="left">
            <img src="/image/ImgMain1.png" alt="">
        </div>
        <div class="right">
            <h2>ВХОД В КАБИНЕТ</h2>
            <form>
                <input type="text" placeholder="Табельный номер ">
                <input type="text" placeholder="Пароль"> 
            </form>
            <button>Войти</button>
            
        </div>
    </section>
</template>


<script>
export  default{
    name: "EntranceBlock",

}
</script>


<style lang="scss" scoped>
section{
    margin-top: 109px;
    display: flex;
    align-items: center;
    justify-content: space-around;
    color: #064677;
    h2{
        font-size: 48px;
        font-weight: 400;
        line-height: 52px;
    }
    div{
        height: 594px;
        width: 594px;
    }
     .left{
        background-color: #3394CE;
        background: rgba(51, 148, 206, 0.40);
        display: flex;
        align-items: center;
        justify-content: center;
        img{
            width: 542px;
            height: 542px;
        }


    }
    .right{
        box-shadow: 10px 10px 40px 0px rgba(51, 148, 206, 0.70);
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: space-around;
        
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

            input{
                margin: 0 auto ;
                border: none;
                width: 508px;
                height: 34px;
                border-bottom:5px  solid #3394CE;
                margin-bottom: 82px;
                font-size: 32px;
                font-weight: 400;
                
                
            }
            input:focus{
                border: none;
                
            }
            input::placeholder{
                color: #064677;
            }
        }
    }
    button{
        border:4px solid #3394CE;
        color: #064677;
        background-color: white;
        padding: 22px 32px;
        color: #064677;
        font-size: 48px;
        font-weight: 700;
        margin-bottom:80px ;
    }
}



</style>