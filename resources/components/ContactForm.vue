<script>

import axios from ' axios';

export default {
  name:'ContactForm',
  data(){
    return{
      name: '',
      email: '',
      message: '',
      errors: {},
      sending: false,
      success:false,
    }
  },

  methods: {
    sendForm(){
      this.sending = true;
      const data = {
        name: this.name,
        email: this.email,
        message: this.message,
      }
      // importare l url
      axios.post(`${apiUrl}contacts`, data)
        .then(result => {
          this.sending = false;
          console.log(result.data.errors);

          if(!result.data.success){
            this.errors = result.data.errors;
          }else{
            this.errors = {};
          }
        })
    }
  }
}
</script>
<template>
<!-- da mettere nel progetto fron  -->

<!--  non serve l action in se per se dobbiamo inibire l evento submit del form -->
<!-- volendo si potrewbbe non usare proprio form -->
  <form @submit.prevent="sendForm()" >

    <input :class="{'error-form' : errors.name}" v-model.trim="name" type="text" name="name" id="" placeholder="nome">
    <input :class="{'error-form' : errors.email}" v-model.trim="email" type="text" name="email" id="" placeholder="email">
    <textarea :class="{'error-form' : errors.message}" v-model.trim="message" name="message" id="" cols="30" rows="10" placeholder="messaggio"></textarea>
    <button type="submit" :disable="sending" > invio </button>



  </form>

</template>

<style>

</style>
