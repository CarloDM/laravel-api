<script>
export default {
  name:'ProjectCard',

  props:{
    title: String,
    date: String,
    text: String,
  }

}
</script>
<template>
  <div class="Project-card">

    <h3>{{ title }}</h3>
    <p class="date">{{ date }}</p>
    <p class="text">{{ text }}</p>

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
}

</style>
