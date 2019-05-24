<template>
  <div>
    <div class="row full-width absolute-bottom" style="margin-bottom: 20%">
      <div class="row col-12">
        <div class="col-2"></div>
        <q-input
          class="full-width"
          v-model="formulario.usuario"/>
        <div class="col-2"></div>
      </div>
      <div class="row col-12">
        <div class="col-2"></div>
        <q-input
          class="full-width"
          v-model="formulario.senha"/>
        <div class="col-2"></div>
      </div>
      <div class="row col-12">
        <div class="col-2"></div>
        <q-btn class="q-mt-md col bg-white" rounded label="Acessar" @click="post"/>
        <div class="col-2"></div>
      </div>
    </div>
  </div>
</template>

<style>
  .btnIndex{
    background-color: rgb(0, 201, 183);
    color: #FFFFFF;
  }
</style>

<script>
import axios from 'axios'
export default {
  name: 'PageIndex',
  data () {
    return {
      formulario: {
        usuario: '',
        senha: ''
      },
      url: ''
    }
  },
  methods: {
    post () {
      // ---------------------------------
      // Remover este bloco após a criação da rota de login
      localStorage.setItem('login', 'true')
      this.$router.push('home')
      // ---------------------------------
      axios.post(this.url, this.formulario)
        .then((res) => {
          if (res) {
            localStorage.setItem('login', res)
            this.$router.push({ name: 'home' })
          }
        })
        .catch(function (error) {
          localStorage.setItem('login', '')
          console.log(error)
        })
    }
  }
}
</script>
