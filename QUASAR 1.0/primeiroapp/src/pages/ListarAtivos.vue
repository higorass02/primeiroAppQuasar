<template>
  <q-page class="flex flex-center">
    <table border="2px">
      <tr>
        <td></td>
        <td>Nome</td>
        <td>Telefone</td>
        <td>Celular</td>
        <td>Email</td>
      </tr>
      <tr>
        <td v-for="item in formulario" :key="item.id">
          <label v-if="!item.hidden">{{item.value}}</label>
        </td>
      </tr>
    </table>
    <!--<div class="row full-width flex flex-center" v-for="item in formulario" :key="item.id">-->
      <!--<q-input-->
        <!--v-model="item.model"-->
        <!--:label="item.label"-->
        <!--:disable="item.disabled"-->
        <!--:hidden="item.hidden"-->
        <!--:required="item.required"-->
        <!--:type="item.type"-->
      <!--/>-->
    <!--</div>-->
  </q-page>
</template>

<style>
</style>

<script>
import axios from 'axios'
export default {
  name: 'PageIndex',
  cabeçalho: ['Nome', 'Telefone', 'Celular', 'Email'],
  data () {
    return {
      formulario: [
        {
          model: '',
          label: 'Id',
          name: 'id',
          disabled: true,
          hidden: true,
          type: 'text',
          value: '1'
        },
        {
          model: '',
          label: 'Nome',
          name: 'nome',
          required: true,
          type: 'text',
          value: 'higor'
        },
        {
          model: '',
          label: 'Telefone',
          name: 'tell',
          type: 'text',
          value: '24999159768'
        },
        {
          model: '',
          label: 'Celular',
          name: 'cell',
          type: 'text',
          value: '2433468773'
        },
        {
          model: '',
          label: 'E-Mail',
          name: 'email',
          type: 'text',
          value: 'higoraugustoo120@gmail.com'
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
        // let retorno = response.data
        // if (retorno !== 'inserido') {
        //   alert(retorno)
        // }
      })
        .catch(function (error) {
          console.log(error)
        })
    },
    get () {
      let url = 'http://localhost/dashboard/1quasar/BeckdoLaz/listar_ativos.php'
      axios.post(url).then(function (response) {
        console.log(response.data)
      })
        .catch(function (error) {
          console.log(error)
        })
    }
  }
}
</script>
