<template>
  <q-page class="flex flex-center">
    <div class="row full-width flex flex-center" v-for="item in formulario" :key="item.id">
      <q-input
        v-model="item.model"
        :label="item.label"
        :disable="item.disabled"
      />
    </div>
    <button @click="post"> hehe xd</button>
  </q-page>
</template>

<style>
</style>

<script>
import axios from 'axios'
export default {
  name: 'PageIndex',
  data () {
    return {
      formulario: [
        {
          model: '',
          label: 'Id',
          name: 'id',
          disabled: true
        },
        {
          model: '',
          label: 'Nome',
          name: 'txtnome'
        },
        {
          model: '',
          label: 'Telefone',
          name: 'tell'
        },
        {
          model: '',
          label: 'Celular',
          name: 'cell'
        },
        {
          model: '',
          label: 'E-Mail',
          name: 'email'
        },
        {
          model: '',
          label: 'Bairro',
          name: 'bairro'
        }
      ]
    }
  },
  methods: {
    post () {
      let url = 'http://localhost/dashboard/BeckdoLaz/novo.php'
      let data = {}
      this.formulario.map(o => {
        data[o.name] = o.model
      })
      console.log(data)
      axios.post(url, data)
    },
    get () {
      let url = ''
      axios.get(url)
    }
  }
}
</script>
