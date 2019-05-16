<template>
  <q-dialog id="idModal" v-model="controleModal">
    <q-layout view="Lhh lpR fff" container class="row fundo" style="height: 75%">
      <div class="row full-width flex flex-center">
        <h4 class="text-white">Agendar Serviço</h4>
      <div v-for="item in formulario" :key="item.id">
        <q-input
          style="width: 80%;"
          color="white"
          dark
          v-model="item.model"
          :label="item.label"
          :disable="item.disabled"
          v-show="!item.hidden"
          :mask="item.mask"
          :required="item.required"
        />
      </div>
    </div>
      <div class="row col-12" style="margin-top: 15%">
        <div class="col-2"></div>
        <q-btn class="col shadow bg-white" rounded label="Agendar" @click="post"/>
        <div class="col-2"></div>
      </div>
      <div class="row col-12" style="margin-top: 10%">
        <div class="col-2"></div>
        <q-btn class="col shadow bg-white" rounded label="Cancelar" @click="controleModal = false"/>
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
    },
    date: {
      type: String,
      default: ''
    }
  },
  data () {
    return {
      auxModal: false,
      formulario: [
        {
          model: '',
          label: 'Data Agendamento',
          name: 'data',
          mask: 'date'
        },
        {
          model: '',
          label: 'Hora',
          name: 'hora',
          mask: 'time'
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
  watch: {
    showModal (val) {
      this.controleModal = val
    },
    date (val) {
      this.formulario.map(o => {
        if (o.mask === 'date') {
          o.model = val
        }
      })
    }
  },
  computed: {
    controleModal: {
      get () {
        return this.auxModal ? this.auxModal : false
      },
      set (val) {
        this.$emit('fecharModal', val)
        this.auxModal = val
      }
    }
  },
  beforeMount () {
    this.formulario.map(o => {
      if (o.mask === 'date') {
        o.model = this.date
      }
    })
  }
}
</script>
