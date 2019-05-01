<template>
  <q-page class="flex flex-center">
    <div class="row full-width flex flex-center" v-for="item in formulario" :key="item.id">
      <q-input
        v-model="item.model"
        :label="item.label"
        :disable="item.disabled"
        :hidden="item.hidden"
        :required="item.required"
        :type="item.type"
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
          disabled: true,
          hidden: true,
          type: 'text'
        },
        {
          model: '',
          label: 'Nome',
          name: 'nome',
          required: true,
          type: 'text'
        },
        {
          model: '',
          label: 'CPF',
          name: 'cpf',
          required: true,
          type: 'text'
        },
        {
          model: '',
          label: 'Data de Nascimento',
          name: 'dtnasc',
          type: 'date'
        },
        {
          model: '',
          label: 'Telefone',
          name: 'tell',
          type: 'text'
        },
        {
          model: '',
          label: 'Celular',
          name: 'cell',
          type: 'text'
        },
        {
          model: '',
          label: 'E-Mail',
          name: 'email',
          type: 'text'
        }
      ]
    }
  },
  methods: {
    post () {
      let url = 'http://localhost/dashboard/1quasar/BeckdoLaz/novo.php'
      let data = {}
      this.formulario.map(o => {
        data[o.name] = o.model
      })
      // console.log(data)
      axios.post(url, data).then(function (response) {
        console.log(response.data)
      })
        .catch(function (error) {
          console.log(error)
        })
    }
  }
}
</script>
