<template>
  <q-dialog v-model="showModal">
    <q-layout view="Lhh lpR fff" container class="row fundo">
      <div class="row full-width flex flex-center" style="margin-top: 30%" >
        <h4 class="text-white">Agendar Serviço</h4>
      <q-input
        v-for="item in formulario" :key="item.id"
        style="width: 80%;"
        color="white"
        dark
        v-model="item.model"
        :label="item.label"
        :disable="item.disabled"
        :hidden="item.hidden"
        :required="item.required"
        :type="item.type"
      />
    </div>
      <div class="row col-12" style="margin-top: 20px">
        <div class="col-2"></div>
        <q-btn class="col shadow bg-white" rounded label="Agendar" @click="post"/>
        <div class="col-2"></div>
      </div>
      <div class="row col-12" style="margin-top: 20px">
        <div class="col-2"></div>
        <q-btn class="col shadow bg-white" rounded label="Cancelar" />
        <div class="col-2"></div>
      </div>
    </q-layout>
  </q-dialog>
</template>

<style>
  .fundo{
    background-image: linear-gradient(to top, #136576, #006391, #135aa5, #6846a4, #a10f87);
  }
</style>

<script>
import axios from 'axios'
export default {
  name: 'PageIndex',
  props: {
    showModal: {
      type: Boolean,
      default: false
    }
  },
  data () {
    return {
      formulario: [
        {
          model: '',
          label: 'Data Agendamento',
          name: 'data',
          mask: '##/##/####'
        },
        {
          model: '',
          label: 'Hora',
          name: 'hora',
          mask: '##:##'
        },
        {
          model: '',
          label: 'Contato',
          name: 'contato',
          mask: ''
        },
        {
          model: '',
          label: 'Serviço',
          name: 'servico',
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
  },
  beforeMount () {
    console.log(this.$refs.modalAgendar)
  }
}
</script>
