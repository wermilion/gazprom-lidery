  <template>
    <section :class="{ 'inactive': InactivStage }">
        <div class="contenerStage" >
            <div class="top " >
                <h2>{{ item.name }}</h2>
            </div>
            <div class="between">
                <div class="text">
                    <template v-if="item.desc">
                        <p>{{ item.desc }}</p>
                    </template>  
                </div>
                <img :src="item.image" alt="">
            </div>
            <div class="botton">
                <div class="botton_under">
                    <template v-if="item.result ">
                        <p class="term">{{ item.result[0]}}</p>
                        <template v-if="item.date_end && !InactivStage ">
                            <p class="term1">{{ Convet(item.date_end) }}</p>
                        </template> 
                    </template>
                    <template v-else-if="item.status==true">
                        <p class="term"><b>Доступно</b></p>
                    </template>
                    <template v-else>
                        <p class="term"><b>Недоступно</b></p>
                        <template v-if="item.date_start ">
                            <p class="term1">{{ Convet(item.date_start) }} </p>
                        </template>
                    </template>
                    <template v-if="!Inactiv">
                        <p class="term1" v-if="item.date_end">{{  Convet(item.date_end) }}</p>
                    </template>
                </div>
                <template v-if="!Inactiv && !InactivStage ">
                    <template v-if="item.to">
                        <router-link class="router" :to="{name: item.to.name}">Приступить</router-link>
                    </template>
                    <template v-else>
                        <button v-on:click="OpenModel" >Инструкция</button>
                    </template>
                </template>
            </div>
        </div>
        

        <section v-if="model_instruction" class="InstructionModal">
                      <section class="chell">
                          <div class="inside" v-if="item.instruction">
                              <p>{{ item.instruction }}</p>
                          </div>
                          <div class="botton">
                              <button v-on:click="OpenModel">Готово</button>
                          </div>
                  </section>
            </section>

    </section>
    
</template>

<script>
import { ConvertDate } from '@/java/stages_data.js'


export default{
    name:'GreadBlock',
     props: {
        item: Object
    },
    data() {
        return {
            model_instruction: false,
           
        }
    },
    methods:{
        Convet(data){
           return ConvertDate(data)
        },
         OpenModel() {
            this.model_instruction = !this.model_instruction
            if (this.model_instruction) {
                document.body.style.overflow = "hidden";
            } else {
                document.body.style.overflow = "auto";
            }
        },
          
    },
    computed:{
        Inactiv() {
            if (this.item.status==true) {
                return false
            } else {
                return true
            }
        },
        InactivStage(){
            if( this.item.date_end > this.item.current_time && this.item.date_start < this.item.current_time) {
                return false
            }else{
                return true
            }
        }
    }
   
    
}
</script>

<style lang="scss" scoped>
.inactive{
    pointer-events: none;
    opacity: 0.5;
    background: #F5F5F5;
}
section {
    border: 3px solid #064677;
    display: flex;
    flex-direction: column;
 
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
            border: none;
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
    .contenerStage{
        
        .top{

            display: flex;
            align-items: flex-start;
            h2{
                
                color: #064677;  
                font-weight: bold;
                
            }
        
        }
        .between{
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 15px;
            .text{
                width: 55%;
            }
            p{
                font-size: 32px;
                height: 176px;
                display: flex;
                align-items: center;
                justify-content: center;
            }


            img{
            
                width: 238px;
                height: 186px;
            
            }
        }
        .botton{
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 7px;
            .router{
                
                
                    background-color: #0079C2;
                color: white;
                font-weight: 700;
                font-size: 48px;
                
                
                border: none;
                margin-top: 16px;
                
                
                padding: 10px 25px 10px 25px;
                
            }
            .router:hover{
                background: #064677;
            }
            button{
                font-family: 'HeliosCond';
                background-color: #0079C2;
                color: white;
                font-weight: 700;
                font-size: 48px;
                
            
                border: none;
                margin-top: 16px;
                
                
                padding: 8px 16px;
            }
            button:hover{
                background: #064677;
            }
            .botton_under{
                height: 72px;
                display: flex;
                flex-direction: column;
                justify-content: flex-end;
                .term1{
                    font-size: 32px;
                    font-weight: 400;
                }
                .term{
                    font-size: 32px;
                    font-weight: 700;
                }   
            }

        }
    }
}
</style>