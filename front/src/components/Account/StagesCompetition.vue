<template>
    <section>
        <div class="GreadBlock" >
            <GreadBlock v-for="(item, index) in getListWithoutLastItem" :key="index"  :item="item" v-bind:class="'GreadBlock'+index"  ></GreadBlock>
        </div> 
        <div v-if="lastItem" :class="lastItem.activity_status" class="GreadBlock6">
            <div class="contenerStage1">
                <div class="top ">
                    <h2>{{ lastItem.name }}</h2>
                    <template v-if="lastItem.button">
                        <button>{{ lastItem.button }}</button>
                    </template>
                    <div class="botton_under">
                        <template v-if="lastItem.status">
                            <p class="term">{{ lastItem.status }}</p> 
                        </template>
                        <template v-if="lastItem.date_end">
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
    </section>
</template>

<script>

import GreadBlock from './items.vue';
import { ConvertDate } from '@/java/stages_data.js'
import {mapState, mapActions} from 'vuex';

export default{
    name:'StagesCompetitionBlock',
    components:{
        GreadBlock,
    },
    computed:{
        ...mapState(['items']),
        
        
        getListWithoutLastItem() {
            return this.items.slice(0, this.items.length - 1);
        },
          lastItem() {
            if(!this.items.length) return null
            return this.items[this.items.length - 1];
        }

    },
    methods:{  
         ...mapActions([
            'getStages'
        ]),
        Convet(data) {
            ConvertDate(data)
        }
        
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
                    border: 2px solid #064677;
                    color: #064677;  
                    
                    font-family: HeliosCondBlack;
                    font-size: 128px;
                    padding: 0 16px;
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
                    font-size: 42px;
                    padding: 4px auto;
                    width: 214px;
                    
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
                    border: 1px solid #000;
                    text-align: center;
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