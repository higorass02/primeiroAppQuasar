<template>
  <q-page class="full-height">
    <div class="q-pa-md ">
      <q-table
        title="Contatos"
        dense
        :data="formulario2"
        :columns="formulario"
        row-key="name"
      />
    </div>
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
          field: 'id',
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
          field: 'nome',
          required: true,
          type: 'text',
          value: ''
        },
        {
          position: 2,
          model: '',
          label: 'Telefone',
          name: 'tell',
          field: 'tell',
          type: 'text',
          value: ''
        },
        {
          position: 3,
          model: '',
          label: 'Celular',
          name: 'cell',
          field: 'cell',
          type: 'text',
          value: ''
        },
        {
          position: 4,
          model: '',
          label: 'E-Mail',
          name: 'email',
          field: 'email',
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
            let ret = {}
            this.formulario.map(o => {
              ret[o.name] = x[o.name]
            })
            this.formulario2.push(ret)
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
