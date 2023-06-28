
<template>
    <section>
        <div>
            <p>{{ item.title }}</p>
        </div>
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
    div{
      display: flex;
      align-items: center;
      justify-content: center;
       border-color: black;
       width: 500px;
       height: 500px;
    }
}
</style>