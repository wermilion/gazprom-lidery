<template>
    <section>
        <div>
            <h2>Личная информация</h2> 
            <div class="betwen">
                <div class="left">
                    <label for="">Имя</label>
                    <input v-on:change="NameInput" required aria-required="true" type="text" v-model="name" :class="{ 'errorName': errorName }" placeholder="Ваше имя">
                    <label  for="">Табельный номер</label>
                    <input  type="text" autocomplete="on" v-model="service_number" placeholder="863421" value="863421">
                    <label for="">Наименование филиала</label>
                    <div class="selector_wraper" v-on:change="BranchInput" :class="{ 'errorbranch': errorbranch }">
                        <select list="selector" foe="selector"  v-model="branch" class="select">
                            <option disabled value="">Ваш филиал</option>
                            <option>A</option>
                            <option>B</option>
                            <option>C</option>
                            <option>A</option>
                            <option>B</option>
                            <option>C</option>
                            <option>A</option>
                            <option>B</option>
                            <option>C</option>
                            <option>A</option>
                            <option>B</option>
                            <option>C</option>
                            <option>A</option>
                            <option>B</option>
                            <option>C</option>
                        </select>
                    </div>
                    
                </div>
                <div class="right">
                    <label for="">Фамилия</label>
                    <input required type="text" v-model="surname"  placeholder="Ваша фамилия">
                    <label for="">Должность</label>
                    <input type="text" v-model="post" placeholder="Ваша должность">
                    <label for="">Стаж</label>
                    <input required type="text" v-model="experience"  placeholder="Ваш стаж">
                </div>
            </div>
            <div class="under">
                <button  v-on:click="FullPrase"   >
                     <router-link :disabled="!name && !service_number && !branch && !surname && !post && !experience" class="router"  :to="isDisabled?'' : '/stages_competition'">Завершить</router-link>
                </button>
               
            </div>
        </div>
    </section>
</template>


<script>
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
            isDisabled:true,
            errorName:false,
            error_service_number:false,
            errorbranch:false
        }
    },
    methods:{
        FullPrase(){
            if(this.name.length>0 && this.service_number.length > 0 &&  this.branch.length > 0 &&   this.surname.length > 0   &&  this.post.length > 0  &&   this.experience.length > 0){
                this.isDisabled=false

            }
        },
         NameInput() {
            const re = /[^a-zA-Zа-яА-Я ]/ui
            this.errorName = re.test(this.name)
        },
        BranchInput(){
            if(this.branch=='Ваш филиал'){
                this.errorbranch=true
            }
        }
    },
   
  
}
</script>


<style lang="scss" scoped>
section{
    width: 1210px;
    height: 854px;
    box-shadow: 10px 10px 40px 0px rgba(51, 148, 206, 0.70);
    margin: 0px auto;
    div{
        margin: 40px 0;
        width: 1060px;
        max-width: 100%;
        margin: 0 auto;
        display: flex;
        flex-direction: column;
        align-items: center;
        h2{
            margin: 40px 0;
            color: #064677;
            font-size: 48px;
            font-weight: 700;
        }
        .under{
            margin-top: 172px;
            display: flex;
            justify-content: end;
            align-items: flex-end;
            .router{
              font-size: 36px;
                font-weight: 700;
                padding: 16px 24px;  
                background: #0079C2;
                color: white;
            }
            
        }
         .betwen{
                display: flex;
                flex-direction: row;
                
            .left,.right{
                
                display: flex;
                flex-direction: column;
                align-items: flex-start;
                
                label{
                    margin-bottom: 24px;
                    color: #064677;
                    font-weight: 700;
                    font-size: 32px;
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
   
                
            } 
            .left{
                width: 422px;
                max-width:100% ;
                .errorbranch{
                    border-bottom:5px  solid #F69F32;
                }
                .errorName{
                    border-bottom:5px  solid #F69F32;
                    
                }
                div{
                    border-bottom:5px  solid #3394CE;
                    margin-bottom: 48px;
                    
                   .select{
                        width: 100%;
                        border: none;
                        font-size: 29px;
                        font-weight: 400;
                        
                    
                    } 
                }
                
            }
            .right{
                width: 508px;
                max-width: 100%;
            }
        }
    }
   
    
}
</style>