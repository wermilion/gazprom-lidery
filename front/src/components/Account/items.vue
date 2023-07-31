  <template>
    <section :class="item.activity_status">
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
                    <template v-if="item.result[0]">
                        <p class="term">{{ item.reault[0]}}</p> 
                    </template>
                    <template v-else-if="item.status==true">
                        <p class="term1"><b>Доступно</b></p>
                    </template>
                    <template v-else>
                        <p class="term1"><b>Недоступно</b></p>
                    </template>
                    <template>
                        <p v-if="item.date_end">{{  Convet(item.date_end) }}</p>
                    </template>
                </div>
                <template v-if="item.to">
                    <router-link class="router" :to="{name: item.to.name}">Приступить</router-link>
                </template>
                <template v-else>
                    <button >Инструкция</button>
                </template>
            </div>
        </div>
    </section>
</template>

<script>
import { ConvertDate } from '@/java/stages_data.js'
export default{
    name:'GreadBlock',
     props: {
        item: Object
    },
    methods:{
        Convet(data){
            ConvertDate(data)
        },
          Inactiv() {
            if  (this.item.result === false || this.item.status === false) {
                this.blockInactiv = true
            } else {
                this.blockInactiv = false
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
 
    
    .contenerStage{
        
        .top{

            display: flex;
            align-items: flex-start;
            h2{
                border: 2px solid #064677;
                color: #064677;  
                font-weight: bold;
                padding: 8px 16px;
            }
        
        }
        .between{
            display: flex;
            align-items: center;
            margin-top: 15px;
            .text{
                width: 55%;
            }
            p{
                font-size: 20px;
                border: 1px solid #000;
                height: 176px;
                text-align: center;
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
                line-height: 48px;
                border-radius: 0px;
                border: none;
                margin-top: 16px;
                width: 50%;
                height: 64px;
                padding: 10px 25px 10px 25px;
            }
            .botton_under{
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