<template>
    <section>
        <div class="left">
            <img src="/image/stages/Registration.svg" alt="">
        </div>
        <div class="right">
            <h2><b>ВХОД В КАБИНЕТ</b></h2>
            <form>
                <input  :class="{'eror_tabel_number': !userStatus }" v-model="tabel_number" type="text" class="one" placeholder="Табельный номер " >
                <input  :class="{ 'eror_password': !userStatus }" v-model="password" type="password" placeholder="Пароль"> 
                <div class="shell_checkbox">
                    <div v-on:click="Remember" class="checkbox" >
                        <img v-if="remember==1" src="/image/checkbox.svg" alt="">
                    </div>
                    <b>Запомнить меня</b>
                </div>
            </form>
            <button v-on:click="performPost" >Войти</button>
             <div v-if="!userStatus" class="model">
                <p>Введен неверный логин или пароль</p>
            </div>
        </div>
       
    </section>
</template>


<script>
import {mapGetters, mapActions } from 'vuex';


export  default{
    name: "EntranceBlock",
    data() {
        return {
            remember: 0,
            tabel_number:'',
            password:'',
            id:''
            
        }
    },

    computed: {
        ...mapGetters([
            'userStatus'
        ]),

    },
    methods:{
        Remember(){
            if(this.remember ==0){
                this.remember=1
            }else{
                this.remember = 0
            }
            
        },
         
                 ...mapActions(['POST']),
        async performPost() {
            const data = {
                tabel_number: this.tabel_number,
                password: this.password,
                remember: this.remember
            };
            await this.POST(data);
        }
    },
  
   
}
</script>


<style lang="scss" scoped>
section{
    display: flex;
    align-items: center;
    justify-content: center;
    width: 1456px;
    max-width: 100%;
    margin: 109px auto;
    position: relative;
    .model{
        top:239px;
        right: -80px;
        padding: 16px 24px 18px 24px;
        z-index: 99999;
        border: 2px solid #F69F32;
        background: #FFF;
        position: absolute;
        height: 62px;
        width: 400px;
        p{
            color: #064677;
            font-size: 24px;
            font-weight: 700;
        }
    }
    h2{
        margin: 40px 0 58px;
    }
    b{
        font-size: 64px;
        color: #064677;
        
    }
    div{
        height: 540px;
        width: 40%;
    }
     .left{
        margin-right: 106px;
        display: flex;
        align-items: center;
        img{
            width: 526px;
            height:411px;
        }
    }
    .right{
        box-shadow: 10px 10px 40px 0px rgba(51, 148, 206, 0.70);
        display: flex;
        flex-direction: column;
        align-items: center;
        
        .one{
            margin-bottom: 82px;
        }
        
        form{
            display: flex;
            flex-direction: column;
            width: 100%;
            input{
                margin: 0 auto ;
                border: none;
                width: 86%;
                height: 38px;
                border-bottom:5px  solid #3394CE;
                
                font-size: 32px;
                font-weight: 400;
                
                
            }
            .shell_checkbox{
                display: flex;
                width: 90%;
                height: 38px;
                margin: 16px 41px;
                .checkbox{
                    border: 1px solid #0079C2;
                    margin-right: 16px;
                    width: 30px;
                    height: 30px;
                    cursor: pointer;
                    img{
                        width: 33px;
                        height: 30px;
                    }
                }
                b{
                    font-size: 24px;
                    color: #064677;
                }

            }
            input:focus{
                border: none;
                outline: none;
                border-bottom:5px  solid #3394CE;
                
            }
            input::placeholder{
                color: #064677;
            }
            .checkpasword{
                display: flex;
            }
            .eror_tabel_number,.eror_password{
                border-bottom:5px  solid #F69F32;
            }
        }
    }
    button{
            background: #064677;
            padding: 16px 32px;
            color: white;    
            font-size: 48px;
            margin: 20px 0 44px;
           
        }
    button:hover{
            background: white;
            border: 4px solid #3394CE;
            color: #064677;
                
           
        }
}



</style>