<template>
    <section>
        <h2>ДАННЫЕ ЗА  2023 В ЦИФРАХ</h2>
        <div class="shell">
            <div class="shellOne">
                <div class="first">
                    <p>14 РЕГИОНОВ</p>
                </div>
                <div class="second">
                    <p> 10 000 УПРАВЛЕНЦЕВ В КОМПАНИИ </p>
                </div>
            </div>
            <div class="shellTwo">
                <div class="third">
                    <p>25 ПРИЗОВЫХ МЕСТ</p>
                </div>
                <div class="fourth">
                    <p>10 ПОБЕДИТЕЛЕЙ</p>
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
            margin-bottom: 56px;
        }
    .shell{
        display: flex;
        flex-direction: column;
        
        max-width: 100%;
        width: 1564px;
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
                margin: 1px;
                padding: 20px;
                p{
                    font-weight: 400;
                    font-size: 48px;
                    line-height: 57px;
                    color: white;
                }
            }
            .first{
                width: 45%;
            }
            .third{
                width: 55%;
            }
            .second{
                width: 55%;
            }
            .fourth{
                width: 45%;
            }

        }
    }

}

</style>