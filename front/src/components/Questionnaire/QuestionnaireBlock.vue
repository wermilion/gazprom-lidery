<template>
    <section>
        <h2>Личная информация</h2> 
        <div class="form">
            <div class="input-wrapper">
                <label for="">Имя</label>
                <input required aria-required="true" type="text" v-model.lazy="name" :class="{ 'errorName': errorName }" placeholder="Ваше имя">
            </div>
            <div class="input-wrapper">
                <label for="">Фамилия</label>
                <input required type="text" v-model.lazy="surname" :class="{ 'errorSurname': errorSurname }"  placeholder="Ваша фамилия">
            </div>
            <div class="input-wrapper">
                <label  for="">Табельный номер</label>
                <input :disabled="true" type="text" autocomplete="on"  :placeholder="this.tabel_number" >
            </div>
            <div class="input-wrapper">
                <label for="">Должность</label>
                <input type="text" v-model.lazy="post" :class="{ 'errorPost': errorPost }"  placeholder="Ваша должность">
            </div>
            <div class="input-wrapper">
                <label for="">Наименование филиала</label>
                <div class="selector_wraper"   >
                    <select list="selector" foe="selector"  v-model="branch" class="select">
                        <option disabled  value="">Ваш филиал</option>
                        <option v-for="(item, index) in items" :key="index" >{{ item.name }}</option>
                    </select>
                </div>
            </div>
            <div class="input-wrapper">
                <label for="">Стаж</label>
                <input required type="text" v-model.lazy="experience" :class="{ 'errorExperience': errorExperience }"  placeholder="Ваш стаж">
            </div>
            <div class="form-action">
                <button @click="POST" :class="{ 'disabled ': disableBtn }">
                       Завершить
                </button>
            </div>
        </div>
    </section>
</template>


<script>
import axios from "axios"
export default{
    name: "QuestionnaireBlock",
    data(){
        return{
            name:'',
            service_number:'',
            branch:'',
            surname:'',
            post:'',
            experience:'',
            errorName:false,
            errorSurname: false,
            errorExperience: false,
            errorbranch:false,
            errorPost:false,
            items:[],
            tabel_number:''

        }
    },
    computed: {
        disableBtn() {
            return this.errorName || this.errorSurname || this.errorExperience || this.error_service_number || this.errorPost || this.errorbranch;
        }
    },
    watch: {
        name(v) {
            const re = /[^а-яА-Я ]/ui
            this.errorName = re.test(v)
        },
        surname(e){
            const re = /[^а-яА-Я ]/ui
            this.errorSurname = re.test(e)
        },
        post(s){
            const re = /[^а-яА-Я ]/ui
            this.errorPost = re.test(s)
        },
        experience(b) {
            const re = /^[1-9]\d*(\d+)?$/ui;
            this.errorExperience = !re.test(b);
        }
    },
    methods:{
        POST() {
            if(this.errorName==false&&this.errorSurname==false&&this.errorExperience==false &&this.branch&& this.errorPost==false){
                 axios.post('https://gazprom-lidery-dev.tomsk-it.ru/api/stages/form', {
                name:this.name,
				surname: this.surname,
				position: this.post,
				work_experience: this.experience,
				branch_id: this.branch,
														
                })
                .then(response => {
                   console.log(response.data)
                    axios.defaults.headers.common['X-XSRF-TOKEN'] = document.cookie.split('=')[1];
                })
                .catch(error => { this.status = error.status })
            }
           
        },
        fetchData() {
            axios.get('https://gazprom-lidery-dev.tomsk-it.ru/api/branches')
                .then(response => {
                    this.items = response.data.data
                  
                })
                .catch(error => {
                    console.error(error);
                });
        }
    },
    mounted() {
        this.fetchData()
        axios.get('https://gazprom-lidery-dev.tomsk-it.ru/api/profile')
            .then(response => {
                console.log(response.data.data)
                this.tabel_number=response.data.data.tabel_number

            })
            .catch(error => {
                console.error(error);
                
            });
    },
 
  
}
</script>


<style lang="scss" scoped>

 
.input-wrapper {
    width: 50%;
    display: flex;
    flex-direction: column;
    label{
        margin-bottom: 24px;
        color: #064677;
        font-weight: 700;
        font-size: 32px;
    }
    .select{
        width: 100%;
        border: none;
        font-size: 28px;
        font-weight: 400;
        border-bottom:5px  solid #3394CE;
    } 
    input{
        border: none;
        height: 34px;
        border-bottom:5px  solid #3394CE;
        font-size: 36px;
        font-weight: 400;
        margin-bottom: 48px;
        
    }
    input:active, :hover, :focus {
        outline: 0;
        outline-offset: 0;
    }
    &:nth-child(2n) {
        padding-left: 65px;
    }
    &:nth-child(2n+1) {
        padding-right: 65px;
    }
    .errorName{
        border-bottom:5px  solid #F69F32;
    }  
    .errorSurname{
        border-bottom:5px  solid #F69F32;
    }
    .errorPost{
        border-bottom:5px  solid #F69F32;
    }
    .errorExperience{
        border-bottom:5px  solid #F69F32;
    }
    
}
button.disableBtn {
    pointer-events: none;
}
.form-action {
    width: 100%;
    display: flex;
    justify-content: flex-end;
    margin-top: 172px;
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
section{
    width: 1210px;
    height: 854px;
    box-shadow: 10px 10px 40px 0px rgba(51, 148, 206, 0.70);
    margin: 0px auto;
    h2{
        padding: 40px 0;
        text-align: center;
        color: #064677;
        font-size: 48px;
        font-weight: 700;
    }
    .form{
        margin: 40px 0;
        width: 1060px;
        max-width: 100%;
        margin: 0 auto;
        display: flex;
        flex-wrap: wrap;
    }
}
</style>