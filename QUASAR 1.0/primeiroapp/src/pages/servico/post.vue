<template>
  <div>
    <cadastro-form :formulario="formulario" :url="url" :voltar="voltar"/>
  </div>
</template>

<style>
</style>

<script>
import axios from 'axios'
import cadastroForm from 'src/components/Cadastro.vue'
export default {
  name: 'PageIndex',
  components: {
    cadastroForm
  },
  data () {
    return {
      url: 'http://localhost/dashboard/1quasar/BeckdoLaz/novo.php',
      voltar: '/listarContatos',
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
          mask: 'date'
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
