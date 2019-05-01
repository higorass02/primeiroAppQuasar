<template>
  <q-page class="flex flex-center">
    <q-markup-table border="2px">
      <thead>
        <tr>
          <th v-for="item in formulario" :key="item.id">
            <label v-if="!item.hidden">{{item.label}}</label>
          </th>
        </tr>
      </thead>
      <tbody>
      <tr>
        <td v-for="item in formulario" :key="item.id">
          <label v-if="!item.hidden">{{item.value}}</label>
        </td>
      </tr>
      </tbody>
    </q-markup-table>
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
    get () {
      let url = 'http://localhost/dashboard/1quasar/BeckdoLaz/listar_ativos.php'
      axios.get(url)
        .then(response => {
          let ret = {}
          console.log(response.data)
          response.data.map(x => {
            this.formulario.map(o => {
              ret[o.value] = x[o.name]
            })
          })
          console.log(ret)
        })
        .catch(error => {
          console.log(error)
        })
    }
  },
  beforeMount () {
    this.get()
  }
}
</script>
