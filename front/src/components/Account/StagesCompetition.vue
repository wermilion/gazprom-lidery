<template>
    <section>
        <div class="GreadBlock" >
            <GreadBlock v-for="(item, index) in getListWithoutLastItem" :key="index"   :item="item" :class="'GreadBlock'+index" ></GreadBlock>
        </div> 
        <div v-if="lastItem" :class="{ 'inactive': InactivStage }" class="GreadBlock6">
            <div class="contenerStage1">
                <div class="top ">
                    <h2>{{ lastItem.name }}</h2>
                    <template v-if="!Inactiv && !InactivStage">
                        <template v-if="lastItem.to">
                            <router-link class="router"  :to="{name:lastItem.to.name}">Приступить</router-link>
                        </template>
                        <template v-else>
                            <button v-on:click="OpenModel" >Инструкция</button>
                        </template>
                    </template>   
                    <div class="botton_under">
                        <template v-if="lastItem.result">
                            <p class="term">{{ lastItem.result[0] }}</p>
                            <template v-if="lastItem.date_end && !InactivStage">
                                <p class="term1">{{ Convet(lastItem.date_end) }}</p>
                            </template> 
                        </template>
                        <template v-else-if="lastItem.status == true">
                            <p class="term"><b>Доступно</b></p>
                        </template>
                        <template v-else>
                            <p class="term"><b>Недоступно</b></p>
                            <template v-if="lastItem.date_start">
                                <p class="term1">{{ Convet(lastItem.date_start) }} </p>
                            </template>
                        </template>
                        <template v-if="!Inactiv">
                            <p class="term1">{{ Convet(lastItem.date_end) }}</p>
                        </template>
                    </div>
                </div>
                <div class="between">
                    <p>{{ lastItem.desc }}</p>
                </div>
                <div class="botton">
                    <img :src="lastItem.image" alt="">
                </div>
            </div> 
        </div>

        <section v-if="model_instruction" class="InstructionModal">
            <section class="chell">
                <div class="inside">
                    <p>{{ lastItem.instruction }}</p>
                </div>
                <div class="botton">
                    <button v-on:click="OpenModel">Готово</button>
                </div>
            </section>
        </section>

    </section>
</template>

<script>

import GreadBlock from './items.vue';
import { ConvertDate } from '@/java/stages_data.js'
import {mapGetters,mapActions} from 'vuex';
export default{
    name:'StagesCompetitionBlock',
    data(){
        return{
            model_instruction:false,
            blockInactiv:true,
        
        }
        
    },
    components:{
        GreadBlock,
    },
    computed:{
        ...mapGetters([
            'Items'
        ]),
        getListWithoutLastItem() {
            if (!this.Items.length) return []
            return this.Items.slice(0, this.Items.length - 1);
        },
          lastItem() {
            if(!this.Items.length) return null
            return this.Items[ this.Items.length - 1];
        },
         Inactiv() {
            if (this.Items[this.Items.length - 1].status==true) {
               return false
            } else {
               return true
            }
        },
        InactivStage() {
            let value = this.Items[this.Items.length - 1]
            if (value.date_end > value.current_time && value.date_start < value.current_time) {
                return false
            } else {
                return true
            }
        },


    },
    methods:{  
         ...mapActions([
            'getStages'
        ]),
        Convet(data) {
            return ConvertDate(data);
        },
        OpenModel(){
            this.model_instruction =!this.model_instruction
            if(this.model_instruction){
                document.body.style.overflow = "hidden";
            }else{
                document.body.style.overflow = "auto";
            }
        },
       
        

        
    },
    mounted() {
        this.getStages()
        
        
    },
};

</script>

<style lang="scss" scoped>
section{
    width: 1840px;
    max-width: 100%;
    margin: 0 auto;
    .InstructionModal {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(244, 244, 244, 0.10);
        backdrop-filter: blur(7.5px);
        z-index: 9999;
        display: flex;
        justify-content: center;
        align-items: center;

        .chell {
            width: 1840px;
            max-width: 100%;
            height: 903px;
            background: #FFF;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            box-shadow: 10px 10px 40px 0px rgba(51, 148, 206, 0.70);

            .inside {
                border: 1px solid #000;
                width: 1530px;
                max-width: 100%;
                height: 679px;
                padding: 24px;
                p{
                    font-size: 32px;
                }
            }
            .botton{
                display: flex;
                justify-content: flex-end;
                margin-top: 32px;
                width: 1530px;
                max-width: 100%;
                font-size: 32px;
                font-weight: 700;
                button:hover{
                    background: #064677;
                }
                button{
                    font-size: 32px;
                }
            }


        }
    }

    .GreadBlock{
        display: grid;
        grid-template-columns: repeat(3, 32.60%);
        grid-template-rows: repeat(2, 404px);
        gap:32px 20px ; 
        
    }
    .inactive{
        pointer-events: none;
        opacity: 0.5;
        background: #F5F5F5;
        }
    .GreadBlock6{
        max-width:100% ;
        width: 1900px;
        height: 400px;
        border: 3px solid #064677;
        margin-top: 32px;
        display: flex;
        .contenerStage1{
            width: 1792px;
            max-width: 100%;
            margin: 24px 24px;
            display: flex;
            justify-content: space-between;
            .top{
                display: flex;
                flex-direction: column;
                justify-content: space-between;
                h2{
                    
                    color: #064677;  
                    
                    font-family: HeliosCondBlack;
                    font-size: 128px;
                    
                    font-weight: 400;
                    line-height: 128px;
                    
                    
                }
                .botton_under{
                    .term{
                        font-size: 32px;
                        font-weight: 700;
                    }  
                     .term1{
                        font-size: 32px;
                        font-weight: 400;
                    } 
                }
                button{
                    background-color: #0079C2;
                    color: white;
                    font-weight: 700;
                    font-size: 48px;
                    border-radius: 0px;
                    border: none;
                    margin-top: 16px;
                    
                    padding: 8px 16px;
                    
                }
                 button:hover{
                    background: #064677;
                 }
            }
            .between{
                display: flex;
                align-items: center;
                width: 49%;
                margin: 0 62px 0 92px;
                p{
                    font-size: 32px;
                    width: 767px;
                    height: 202px;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                }
            }
            .botton{
                display: flex;
                align-items: center;
                img{
                   width: 492px;
                    height: 328px;
                }

            }
        }
        
        
    }
    
   
    
}
</style>