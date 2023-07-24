<template>
    <section>
        <div class="left">
            <img src="/image/stages/Registration.svg" alt="">
        </div>
        <div class="right">
            <h2><b>ВХОД В КАБИНЕТ</b></h2>
            <form>
                <input :class="{'eror_tabel_number': !status }" v-model="tabel_number" type="text" class="one" placeholder="Табельный номер " >
                <input  :class="{ 'eror_password': !status }" v-model="password" type="password" placeholder="Пароль"> 
                <div class="shell_checkbox">
                    <div v-on:click="Remember" class="checkbox" >
                        <img v-if="remember" src="/image/checkbox.png" alt="">
                    </div>
                    <b>Запомнить меня</b>
                </div>
            </form>
            <button v-on:click="POST" >Войти</button>
        </div>
    </section>
</template>


<script>
import router from "@/router"
import axios from "axios"
export  default{
    name: "EntranceBlock",
    data() {
        return {
            remember: false,
            tabel_number:'',
            password:'',
            status:true,
            id:''
            
        }
    },
    methods:{
        Remember(){
            this.remember=!this.remember
        },
       POST() {
            axios.post('https://gazprom-lidery-dev.tomsk-it.ru/api/profile/login', {
                tabel_number: this.tabel_number, password: this.password, remember: this.remember
            })
                .then(response => {
                    if (response.data.custom_password === true) {
                        router.push('/stages_competition')
                    } else {
                        router.push('/changing_the_password')
                    }
                    this.id=response.data.id
                     axios.get('https://gazprom-lidery-dev.tomsk-it.ru/api/csrf-cookie').then(response => {
                        console.log(response)
                        axios.defaults.headers.common['X-XSRF-TOKEN'] = document.cookie.split('=')[1];
                    }).catch(error => {
                        console.error(error);
                    });
                })
                .catch(error => { this.status = error.status })
        },
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