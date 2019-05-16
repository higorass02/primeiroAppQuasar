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
        v-show="!item.hidden"
        :required="item.required"
        :mask="item.mask"
        :type="item.type"
      />
    </div>
    <div class="row full-width absolute-bottom">
      <div class="row col-12" style="margin-bottom: 10%">
        <div class="col-2"></div>
        <q-btn class="col shadow bg-white" rounded label="Cadastrar" @click="post"/>
        <div class="col-2"></div>
      </div>
      <div class="row col-12" style="margin-bottom: 10%">
        <div class="col-2"></div>
        <q-btn class="col shadow bg-white" rounded label="Voltar" :to="voltar"/>
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
  props: {
    formulario: {
      type: Array,
      default: () => {
        return [
          {
            model: '',
            label: '',
            name: '',
            disabled: false,
            hidden: false,
            mask: ''
          }
        ]
      }
    },
    url: {
      type: String,
      default: ''
    },
    voltar: {
      type: String,
      default: ''
    }
  },
  data () {
    return {
    }
  },
  methods: {
    post () {
      let data = {}
      this.formulario.map(o => {
        data[o.name] = o.model
      })
      axios.post(this.url, data).then(function (response) {
        console.log(response.data)
      })
        .catch(function (error) {
          console.log(error)
        })
    }
  },
  beforeMount () {
    let today = new Date()
    let dd = String(today.getDate()).padStart(2, '0')
    let mm = String(today.getMonth() + 1).padStart(2, '0')
    let yyyy = today.getFullYear()
    today = yyyy + '/' + mm + '/' + dd
    this.formulario.map(o => {
      if (o.mask === 'date') {
        o.model = today
      }
    })
  }
}
</script>
