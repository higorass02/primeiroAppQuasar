<template>
  <q-page class="flex flex-center">
    <div class="row full-width flex flex-center" style="margin-top: -40%" >
      <q-input
        style="width: 80%;"
        v-for="item in formulario" :key="item.id"
        color="white"
        dark
        v-model="item.model"
        :label="item.label"
        :disable="item.disabled"
        :hidden="item.hidden"
        :required="item.required"
        :mask="item.mask"
      />
    </div>
    <div class="row full-width absolute-bottom" style="margin-bottom: 10%">
      <div class="row col-12">
        <div class="col-2"></div>
        <q-btn class="col shadow bg-white" rounded label="Cadastrar" @click="post"/>
        <div class="col-2"></div>
      </div>
    </div>
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
          mask: ''
        },
        {
          model: '',
          label: 'Nome',
          name: 'nome',
          required: true,
          mask: ''
        },
        {
          model: '',
          label: 'CPF',
          name: 'cpf',
          required: true,
          mask: '###.###.###-##'
        },
        {
          model: '',
          label: 'Data de Nascimento',
          name: 'dtnasc',
          mask: '##/##/####'
        },
        {
          model: '',
          label: 'Telefone',
          name: 'tell',
          mask: '(##) ####-####'
        },
        {
          model: '',
          label: 'Celular',
          name: 'cell',
          mask: '(##) #####-####'
        },
        {
          model: '',
          label: 'E-Mail',
          name: 'email',
          mask: ''
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
