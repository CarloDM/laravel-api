<script>
import axios from 'axios';
import ProjectCard from './components/ProjectCard.vue'
export default {
  name:'App',
  data(){
    return {
      apiUrl: 'http://127.0.0.1:8000/api/',
      posts : null,
    }
  },
  components:{ProjectCard,},

  methods:{
    getPosts(){
      console.log(this.apiUrl)
      axios.get(this.apiUrl + 'post')
        .then(result =>{
          console.log(result.data);
          this.posts = result.data;
        })
    }
  },

  computed:{},

  mounted(){
    this.getPosts()
  },

}
</script>
<template>
  <div class="main-wrapper">
    <!-- <h3 class="m_1">posts API</h3> -->

    <!-- <ul>
      <li
      v-for=" post in posts"
      :key="post.id"
      >
      {{ post.title }}
          <ul>
            <li>{{ post.date }}</li>

          </ul>
      </li>
    </ul> -->

    <h2 class="m_1">posts card</h2>
    <div class="card_container">

      <ProjectCard
      v-for=" post in posts"
      :key="post.id"
      :title="post.title"
      :date="post.date"
      :text="post.text"
      :img_pat="post.image_path"
      />

    </div>

  </div>
</template>
<style lang="scss">
@import './scss/appGuest.scss';


</style>
