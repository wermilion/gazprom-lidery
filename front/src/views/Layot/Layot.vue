<template>
    <section>
        <nav>
            <HeaderBlock></HeaderBlock>
        </nav>
        
        <router-view></router-view>
    </section>
    
</template>

<script>
import HeaderBlock from '@/components/Header/HeaderBlock.vue';
export default{
    name:"LoyotBlocK",
    components: {
        HeaderBlock,
    }

}
</script>