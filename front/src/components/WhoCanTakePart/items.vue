
<template>
    <section>
       
            <p>{{ item.title }}</p>
        
    </section>
</template>

<script>
export default{
    name:'itemsWho',
    props: {
        item: Object
    }
}
</script>

<style lang="scss" scoped>
section{
    width: 20%;
    height: 500px;
    border:1px solid black;
    margin: 0 16px;
    display: flex;
    align-items: center;
    justify-content: center;
}
</style>