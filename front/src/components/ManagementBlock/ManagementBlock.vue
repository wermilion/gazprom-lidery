<template>
    <section >
        <div v-for="(item, index) in items" :key="index">
            <h3>{{ item.title }}</h3>
            <textarea v-model="item.value" :maxlength="1000" :class="{ 'invalid': item.status }"  cols="30" rows="10" :placeholder="item.text"></textarea>
        </div>
        <div class="under">
                <div class="checkbox1"  >
                    <div class="checkbox1" v-on:click="Checbox">
                        <div class="checkbox2" >
                            <img v-show="chect" src="/image/checkbox.svg" alt="">
                        </div>
                    </div>
                    <label  >Я загрузил (-а) файлы.</label>
                </div>
                <button :class="{ 'disable': !buttonEnable }" @click="checkTextareas" >
                   Завершить
                </button>
            </div>
    </section>
</template>


<script>
import axios from "axios"
import router from "@/router"

export default {
    name: 'ManagementBlock',
    data() {
        return {
            items: [
                {
                    title: 'Проблема',
                    text: 'Описание проблемы. Допустимое количество символов от 50 до 1000.',
                    value:'',
                    status: false
                    
                },
                {
                    title: 'Управленческая задача',
                    text: 'Описание задачи. Допустимое количество символов от 50 до 1000.',
                    value: '',
                    status: false
                   
                },
                {
                    title: 'Решение',
                    text: 'Описание решения. Допустимое количество символов от 50 до 1000.',
                    value: '',
                    status: false
                    
                },
                {
                    title: 'Результаты',
                    text: 'Результат. Допустимое количество символов от 50 до 1000.',
                    value: '',
                    status: false
                    
                },
                {
                    title: 'Вывод',
                    text: 'Вывод. Допустимое количество символов от 50 до 1000.',
                    value: '',
                    status:false
                 
                },
            ],
            chect:false,
            buttonEnable:false
            
        }
    },
    computed: {
        allTextareasValid() {
            for (let i = 0; i < this.items.length; i++) {
                const textareaLength = this.items[i].value.length
                if (textareaLength <= 50 || textareaLength >= 1000) {
                    return false
                }
            }
            return true
        }
    },
    watch: {
        allTextareasValid() {
            this.buttonEnable = this.allTextareasValid
        }
    },
    methods:{
        Checbox(){
            this.chect=!this.chect
        },
       checkTextareas() {
            for (let textarea of this.items) {
                const value = textarea.value;
                if (value.length < 50 || value.length > 1000) {
                    textarea.status = true;
                } else {
                    textarea.status = false;
                }
            }

            if (!this.items.every(item => item.status === true)) {
                const postData = {
                    problem: this.items[0].value,
                    management_task: this.items[1].value,
                    solution: this.items[2].value,
                    result: this.items[3].value,
                    conclusion: this.items[4].value,
                    check_file: this.chect,
                };

                axios.post('https://gazprom-lidery-dev.tomsk-it.ru/api/stages/management-decision', postData)
                    .then(response => {
                        console.log(response);
                        if(response.data.status){
                           router.push({ name: 'StagesCompetitionBlock' }); 
                        }
                        
                    })
                    .catch(error => {
                        console.log(error);
                        
                    });
            }
        },
        
      
    },
  
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
            font-family: HeliosCond;
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
        .disable{
            background: #E7E8E5;
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
        button:hover{
            background: #064677;
        }
    }
}

</style>