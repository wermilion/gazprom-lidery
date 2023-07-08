<template>
    <section class="mainContener">
        <div class="shell ">
            <div class="top">
                <p>Шаг 1 - Инструкция</p>
                <button v-on:click="Manual"><img v-bind:style="{ transform: this.manual ? 'rotate(0deg)' : 'rotate(180deg)' }" src="/image/Vector 1.png" alt="" ></button>
            </div>
            <div class="under">
                <p>Шаг 2 - Анкета</p>
                <button v-on:click="Questionnair"><img v-bind:style="{ transform: this.questionnair ? 'rotate(0deg)' : 'rotate(180deg)' }" src="/image/Vector 1.png" alt=""></button>
            </div>
        </div>
        <div class="tab">
            <ManualBlock @Checkbox1="Checkbox1" :checkbox="checkbox"  @Questionnair="Questionnair" v-show="manual"></ManualBlock>
            <QuestionnaireBlock v-show="questionnair"></QuestionnaireBlock>
        </div>
        
    </section>
</template>

<script>
import QuestionnaireBlock from '@/components/Questionnaire/QuestionnaireBlock.vue';
import ManualBlock from '@/components/Manual/ManualBlock.vue';
export default{
    name: "QuestionnairePage",
    components:{
        ManualBlock,
        QuestionnaireBlock,
    },
    data(){
        return{
            manual:true,
            questionnair:false,
            checkbox:false
        }
    }, 
  
    methods:{
        Manual(){
            this.manual=!this.manual
            if (this.checkbox) {
                this.questionnair = !this.questionnair
            }
        },
        Questionnair(){
            if(this.checkbox){
                this.questionnair=!this.questionnair
                this.manual = !this.manual
            }
        },
        Checkbox1(){
            this.checkbox=!this.checkbox
        }
           
    }
}
</script>

<style lang="scss" scoped>
section{
    .tab{
        height: 973px;
    }
    .shell{
        
        margin: 32px 0;
        display: flex;
        p{
            font-size: 64px;
            font-weight:bold ;
            margin: 16px 24px 16px 34px ;
            
            color: #064677;
        }   
        img{
             
            padding-bottom: -20px;
            margin-right: 34px;
            
        }
    
        .top,.under{
            display: flex;
            border: 3px solid #064677;
            justify-content: space-between;
            align-items: center;

        }
        .top{
           margin-right: 115px;
           display: flex;
           align-items: center;
            justify-content: center;
            button{
                background-color:white;
            }
        }
        .under{
            display: flex;
            align-items: center;
            justify-content: center;
            button{
                background-color:white;
                
            }
        }
    }
}
</style>