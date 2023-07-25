<template>
    <section>
        <div class="left">
            <img src="/image/stages/Registration.svg" alt="">
        </div>
        <div class="right">
            <h2><b>СМЕНА ПАРОЛЯ</b></h2>
                <form>
                    <input v-model="password1"   @mouseover="showPopup" @mouseout="hidePopup" type="password"  placeholder="Введите пароль ">
                    <p v-show="isPopupVisible">Используйте латинские буквы Aa - Zz, цифры и знаки: .,!#$%&"*+/-=?^_`{|}~@ от 8 символов.</p>
                    <input    v-model="password2" class="one" type="password" placeholder="Повторите новый пароль"> 
                </form>
            <button v-on:click="CreateUserPasswprd" >Сохранить</button>
        </div>
    </section>
</template>

<script>
import router from "@/router"
import axios from "axios"


export default{
    name:'ChangingThePassword',
    data(){
        return{
            isPopupVisible: false,
            SruvnPassword:false,
            password1:'',
            password2:'',
            castom_pasword:''
        }
    },
    methods:{
        showPopup() {
            this.isPopupVisible = true;
        },
        hidePopup() {
            this.isPopupVisible = false;
        },
         CreateUserPasswprd() {
            axios.post('https://gazprom-lidery-dev.tomsk-it.ru/api/profile/changePassword', {
                new_password: this.password1,
				confirm_password:this.password2
            })
                .then(response => {
                    if(response.status){
                       router.push('/stages_competition') 
                    }
                    
                })
                .catch(error => {error})
        },

    },
    computed:{
       
    }

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
        width: 40%;
        height: 540px;
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
        
    
        
        form{
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            position: relative;
            height: 158px;
            width: 100%;
            p{
                position: absolute;
                top:42px;
                left: 40px;
                padding: 8px 8px;
                font-size: 12px;
                border: 1px solid #3394CE;
                

            }
            input{
                margin: 0 auto ;
                border: none;
                width: 86%;
                height: 34px;
                border-bottom:5px  solid #3394CE;
                
                font-size: 32px;
                font-weight: 400;
                
                
            }
            input:focus{
                border: none;
                outline: none;
                border-bottom:5px  solid #3394CE;
                
            }
            input::placeholder{
                color: #064677;
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
   
}



</style>