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
            <div class="input-wrapper ">
                <label  for="">Табельный номер</label>
                <input :class="{'disable':true}" type="text" autocomplete="on"  :value="this.tabel_number" >
            </div>
            <div class="input-wrapper">
                <label for="">Должность</label>
                <input type="text" v-model.lazy="post" :class="{ 'errorPost': errorPost }"  placeholder="Ваша должность">
            </div>
            <div class="input-wrapper">
                <label for="" class='tabel_number'>Наименование филиала</label>
                <div class="selector_wraper"   >
                    <select list="selector" foe="selector"  v-model="branch" class="select" >
                        <option class="ferst" disabled selected hidden value="" >Ваш филиал</option>
                        <option v-for="(item, index) in items" :value="item.id" :key="index" >{{ item.name }}</option>
                    </select>
                </div>
            </div>
            <div class="input-wrapper">
                <label for="">Стаж</label>
                <input required type="text" v-model.lazy="experience" :class="{ 'errorExperience': errorExperience }"  placeholder="Ваш стаж">
            </div>
            <div class="form-action">
                <button @click="POST" :class="{ 'disable ': !disableBtn }">
                       Завершить
                </button>
            </div>
        </div>
    </section>
</template>


<script>
import axios from "axios"
import router from "@/router"

export default{
    name: "QuestionnaireBlock",
    data(){
        return{
            name:'',
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
            tabel_number:'',
            check_video: true

        }
    },
    computed: {
        disableBtn() {
            return this.name  && this.surname && this.branch && this.post && this.experience && this.experience<99 && this.errorName == false && this.errorSurname == false && this.errorExperience == false && this.errorPost == false;
        }
    },
    watch: {
        name(v) {
            const re =  /^[А-Яа-яЁё\s-]+$/ui
            this.errorName = !re.test(v)
        },
        surname(e){
            const re = /^[А-Яа-яЁё\s-]+$/ui
            this.errorSurname = !re.test(e)
        },
        post(s){
            const re = /[^а-яА-Я ]/ui
            this.errorPost = re.test(s)
        },
        experience(b) {
            const re = /^[1-9]\d*(\d+)?$/ui;
            this.errorExperience = !re.test(b);
            if (this.experience>99){
                return this.errorExperience=true
            }
        }
    },
    methods:{
        POST() {
            if(this.errorName==false&&this.errorSurname==false&&this.errorExperience==false &&this.branch&& this.errorPost==false){
                axios.post('/api/stages/form', {
                name:this.name,
				surname: this.surname,
				position: this.post,
				work_experience: this.experience,
				branch_id: this.branch,
                check_video:this.check_video
														
                })
                .then(response => {
                   router.push({ name: 'StagesCompetitionBlock' });
                   response
                    axios.defaults.headers.common['X-XSRF-TOKEN'] = document.cookie.split('=')[1];
                })
                .catch(error => { this.status = error.status })
            }
           
        },
        fetchData() {
            axios.get('/api/branches')
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
        axios.get('/api/profile')
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
    .disable{
        color: #064677;
        pointer-events: none;
    }
    .select option:first-child{
        color: rgba(6, 70, 119, 0.40);
    }
    .select{
        color: #064677;
        font-family: HeliosCond;
        width: 100%;
        border: none;
        font-size: 32px;
        font-weight: 400;
        padding-bottom: -10px;
        border-bottom:5px  solid #3394CE;
        option{
            color: #064677;
        }
        
    }
    .tabel_number{
        margin-bottom: 18px;
    }
    input::placeholder {
            color: rgba(6, 70, 119, 0.40);
        }
    input{
        font-family: HeliosCond;
        color: #064677;
        border: none;
        height: 38px;
        border-bottom:5px  solid #3394CE;
        font-size: 32px;
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



button.disable{
    background: #E7E8E5;
    color: white;
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