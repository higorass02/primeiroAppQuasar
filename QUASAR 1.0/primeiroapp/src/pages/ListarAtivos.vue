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
      <tr v-for="item in formulario2" :key="item.id">
        <td v-for="item2 in formulario" :key="item2.id">
          {{item2.value}}
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
          value: ''
        },
        {
          model: '',
          label: 'Nome',
          name: 'nome',
          required: true,
          type: 'text',
          value: ''
        },
        {
          model: '',
          label: 'Telefone',
          name: 'tell',
          type: 'text',
          value: ''
        },
        {
          model: '',
          label: 'Celular',
          name: 'cell',
          type: 'text',
          value: ''
        },
        {
          model: '',
          label: 'E-Mail',
          name: 'email',
          type: 'text',
          value: ''
        }
      ],
      formulario2: []
    }
  },
  methods: {
    get () {
      let url = 'http://localhost/dashboard/1quasar/BeckdoLaz/listar_ativos.php'
      axios.get(url)
        // .then(response => {
        //   var ret = {}
        //   console.log(response.data)
        //   response.data.map((x) => {
        //     this.formulario.map(o => {
        //       ret[o.value] = x[o.name]
        //     })
        //   })
        //   console.log(this.formulario)
        // })
        // .catch(error => {
        //   console.log(error)
        // })
        .then(response => {
          response.data.map((o) => {
            var ret = {}
            this.formulario.map((e) => {
              // console.log(e.name)
              // console.log(o[e.name])
              if (o[e.name] === '') {
                e.value = 'Não Possui'
              } else {
                e.value = o[e.name]
              }
              ret[e.name] = o[e.name]
            })
            // console.log(ret)
            this.formulario2.push(ret)
          })
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
