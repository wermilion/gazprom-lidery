<template>
    <section class="stagesContener">
        <h2>Задача</h2>
        <div class="task">
            <p>{{ data}}</p>
        </div>
        <h2>Решение</h2>
        <textarea v-model="text"  :class="{ 'invalue ': disableButton }"  placeholder="Описание решения. Допустимое количество символов от 50 до 5000." name="" id="" cols="30" rows="10"></textarea>
        <div class="under">
            <div class="checkbox1">
                <div class="checkbox2" v-on:click="Checbox">
                    <img v-show="chect" src="/image/checkbox.svg" alt="">
                </div>
                <label >Я загрузил (-а) файлы.</label>
            </div>
            <button @click="POST" :class="{ 'disabled ': disableButton }">
                <router-link class="router"  to="/stages_competition">Завершить</router-link>
            </button>
        </div>
    </section>
</template>


<script>
import axios from "axios"
export default{
    name:'TaskBlock',
    data(){
        return{
             chect: false,
             text:'',
             erortext:false,
             data: ''
        }
    },
    methods: {
        Checbox() {
            this.chect = !this.chect
        },
         POST() {
            axios.post('https://gazprom-lidery-dev.tomsk-it.ru/api/stages/challenge', {
                solution:this.text , check_file:this.chect
            })
                .then(response => {
                    console.log(response)
                })
                .catch(error => { console.log(error) })
        },
        fetchData() {
            axios.get('https://gazprom-lidery-dev.tomsk-it.ru/api/task')
                .then(response => {
                    this.data =response.data.data[0].task
                })
                .catch(error => {
                    console.error(error);
                });
        }
    },
    computed:{
        disableButton(){
          return this.text.length<50||this.text.length>5000
        },
     
    },
    mounted(){
        this.fetchData()
    },
     watch: {
        erortext() {
            if(this.text.length < 50 && this.text.length > 5000){
                return this.erortext=true
            }
        },
    }
}
</script>

<style lang="scss" scoped>

section{
    .task,textarea{
        width: 100%;
        margin-bottom: 56px;
        padding: 32px;
        height: 299px;
        font-size: 32px;
        resize: vertical;
         
    }
    .task{
        border: 1px solid #0079C2;
    }
    textarea{
        border: none;
        outline: none;
        min-height:299px;
        box-shadow: 10px 10px 40px 0px rgba(51, 148, 206, 0.70);
        
    }
    .invalue{
        box-shadow: 10px 10px 40px 0px rgba(246, 159, 50, 0.70);
    }
    
    p,textarea::placeholder {
            color: #064677;
        }
  
    h2{
        margin-bottom: 32px;
        color: #064677;
    }
    .under{
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin: 56px auto;
        width: 1530px;
        max-width: 100%;
        .checkbox1{
            margin: 40px 0;
            display: flex;
            align-items: center;
            label{
                color: #000;
                font-size: 32px;
            }
            .checkbox2{
                 width: 50px;
                height: 50px;
                border: 2px solid #064677;
                margin-right: 32px;
            }
        }
        button.disabled{
            background-color: #E7E8E5;
            color: white;
            pointer-events: none;
        }
        button{
            height: 74px;
            font-size: 36px;
             .router{
               background-color: none;
               color: white;
                
            }
        }
    }
}

</style>