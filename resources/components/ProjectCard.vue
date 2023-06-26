<script>
export default {
  name:'ProjectCard',

  props:{
    title: String,
    date: String,
    text: String,
    img_pat: String,
  }

}
</script>
<template>
  <div class="Project-card">

    <h3>{{ title }}</h3>
    <p class="date">{{ date }}</p>
    <p class="text">{{ text }}</p>

    <img v-if="img_pat"
      class="thumb" :src=" 'http://127.0.0.1:8000/storage/' + img_pat " :alt="img_pat">

  </div>
</template>
<style lang="scss" scoped>
.Project-card{
  background-color: white;
  border: 1px solid black;
  padding: 5px 20px;
  margin: 5px 0px;

  & h1{}
  & .date{}
  & .text{
    margin: 10px 0px;
  }
  & .thumb{
    display: block;
    width: 150px;
    margin: 0px auto;
  }
}

</style>
