<template>
    <section>
        <h2>ДАННЫЕ ЗА  2023 В ЦИФРАХ</h2>
        <div class="shell">
            <div class="shellOne">
                <div class="first">
                    <b>14</b>
                    <p> РЕГИОНОВ</p>
                </div>
                <div class="second">
                    <b>10 000</b>
                    <p> УПРАВЛЕНЦЕВ</p>
                </div>
            </div>
            <div class="shellTwo">
                <div class="third">
                    <b>25</b>
                    <p> ПРИЗОВЫХ МЕСТ</p>
                </div>
                <div class="fourth">
                    <b>10</b>
                    <p> ПОБЕДИТЕЛЕЙ</p>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default{
    name:'NumberBlock',
}
</script>


<style lang="scss" scoped>
section{
    
    text-align: center;
    h2{
            margin-bottom: 112px;
        }
    .shell{
        
        display: flex;
        flex-direction: column;
        
        max-width: 100%;
        width: 1530px;
        margin: 0 auto;
        
        .shellOne,
        .shellTwo{
            display: flex;
            flex-direction: row;
            .first,.second,.third,.fourth{
                background-color: #0079C2;
                height: 280px;
                display: flex;
                align-items: center;
                justify-content: center;
                margin: 2px;
                padding: 20px;
                b{
                    font-family: HeliosCondBlack;
                    font-size: 128px;
                    color: white;
                    font-weight: 400;
                    line-height: 128px;
                    margin-right: 32px;
                }
                p{
                    font-size: 48px;
                    
                    font-weight: 400;
                    color: white;
                   
                }
            }
            .first{
                width: 46%;
            }
            .third{
                width: 54%;
            }
            .second{
                width: 54%;
            }
            .fourth{
                width: 46%;
            }

        }
    }

}

</style>