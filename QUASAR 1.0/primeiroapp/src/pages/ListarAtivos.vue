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
          {{item[item2.position]}}
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
          position: 0,
          model: '',
          label: 'Id',
          name: 'id',
          disabled: true,
          hidden: true,
          type: 'text',
          value: ''
        },
        {
          position: 1,
          model: '',
          label: 'Nome',
          name: 'nome',
          required: true,
          type: 'text',
          value: ''
        },
        {
          position: 2,
          model: '',
          label: 'Telefone',
          name: 'tell',
          type: 'text',
          value: ''
        },
        {
          position: 3,
          model: '',
          label: 'Celular',
          name: 'cell',
          type: 'text',
          value: ''
        },
        {
          position: 4,
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
        .then(response => {
          response.data.map((x) => {
            this.formulario2.push(
              this.formulario.map(o => {
                return x[o.name]
              })
            )
          })
        })
        .catch(error => {
          console.log(error)
        })
        // .then(response => {
        //   response.data.map((e) => {
        //     this.formulario2.push(
        //       this.formulario.map((o) => {
        //         o.value = e[o.name]
        //         console.log(o.value)
        //         return o
        //       })
        //     )
        //     console.log('------------')
        //   })
        // })
        // .catch(error => {
        //   console.log(error)
        // })
    }
  },
  beforeMount () {
    this.get()
  }
}
</script>
