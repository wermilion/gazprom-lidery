<template>
    <section>
        <h2>КТО МОЖЕТ ПРИНЯТЬ УЧАСТИЕ</h2>
        <div>
            <itemsWho v-for="(item, index) in items" :key="index" :item="item"></itemsWho>
        </div>
        
    </section>
</template>

<script>
import itemsWho from './items.vue'
export default{
    name:'WhoCanTacePart',
    components:{
        itemsWho,
    },
    data: () => {
        return {
            items: [
                {
                    title: 1
                },
                {
                   title: 1
                },
                {
                    title: 1
                },
               
            ],
        }
    },
}
</script>


<style lang="scss" scoped>
section{
    
    display: flex;
    flex-direction: column;
    align-items: center;
    div{
        display: flex;
        align-items: center;
        
        
    }
}

</style>