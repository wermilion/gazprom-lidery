<template>
    <section >
        <div v-for="(item, index) in items" :key="index">
            <h3>{{ item.title }}</h3>
            <textarea v-model="item.value"  :class="{ 'invalid': !isTextareaValid(index) }"  cols="30" rows="10" :placeholder="item.text"></textarea>
        </div>
        <div class="under">
                <div class="checkbox1"  >
                    <div class="checkbox1" v-on:click="Checbox">
                        <div class="checkbox2" >
                            <img v-show="chect" src="/image/checkbox.png" alt="">
                        </div>
                    </div>
                    <label  >Я загрузил (-а) файлы.</label>
                </div>
                <button @click="POST" :class="{'disabled' : !isActivBtn}">
                    <router-link class="router"  to="/stages_competition">Завершить</router-link>
                </button>
            </div>
    </section>
</template>


<script>
import axios from "axios"
export default {
    name: 'ManagementBlock',
    data() {
        return {
            items: [
                {
                    title: 'Проблема',
                    text: 'Описание проблемы. Допустимое количество символов от 50 до 1000.',
                    value:''
                    
                },
                {
                    title: 'Управленческая задача',
                    text: 'Описание задачи. Допустимое количество символов от 50 до 1000.',
                    value: ''
                   
                },
                {
                    title: 'Решение',
                    text: 'Описание решения. Допустимое количество символов от 50 до 1000.',
                    value: ''
                    
                },
                {
                    title: 'Результаты',
                    text: 'Результат. Допустимое количество символов от 50 до 1000.',
                    value: ''
                    
                },
                {
                    title: 'Вывод',
                    text: 'Вывод. Допустимое количество символов от 50 до 1000.',
                    value: ''
                 
                },
            ],
            chect:false,
        }
    },
    methods:{
        Checbox(){
            this.chect=!this.chect
        },
         isTextareaValid(index) {
            const value = this.items[index].value;
            return value && value.length > 50 && value.length < 1000;
        },
         POST() {
            axios.post('https://gazprom-lidery-dev.tomsk-it.ru/api/stages/management-decision', {
                chectproblem:this.items.value[0],
                management_task: this.items.value[1],
				solution: this.items.value[2],
				result: this.items.value[3],
				conclusion: this.items.value[4],
				check_file:this.chect
            })
                .then(response => {
                    console.log(response)
                })
                .catch(error => { console.log(error) })
        },
        
    },
    computed:{
        isActivBtn(){
            return this.items.every(
                (item) => item.value.length > 50 && item.value.length < 1000
            );
        }
    }
}
</script>


<style lang="scss" scoped>

section{
    width: 1540px;
    max-width: 100%;
    margin: 56px auto;
    
    div{
        h3{
            margin-bottom: 24px;
            font-size: 48px;
            font-weight: 700px;
        }
        textarea{
            margin-bottom: 56px;
            resize: vertical;
            width: 100%;
            height: 299px;
            font-size: 36px;
            padding: 32px;
             box-shadow: 10px 10px 40px 0px rgba(51, 148, 206, 0.70);
             color: #064677;
             min-height: 299px;
             border: none;
             outline: none;


        }
        .invalid{
            box-shadow: 10px 10px 40px 0px rgba(246, 159, 50, 0.70);
        }
      
        textarea::placeholder {
            color: #064677;
        }
        
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