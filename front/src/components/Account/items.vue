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
                    <template v-if="item.status">
                        <p class="term">{{ item.status}}</p> 
                    </template>
                    <template v-if="item.info">
                        <p class="term1">{{ item.info }}</p>
                    </template>
                </div>
                <template v-if="item.button">
                    <router-link class="router"  :to="{name:item.router} " >{{ item.button }}</router-link>
                </template>
            </div>
        </div>
    </section>
</template>

<script>
export default{
    name:'GreadBlock',
     props: {
        item: Object
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
                border: 1px solid #000;
                font-size: 10px;
                height: 176px;
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