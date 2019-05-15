<template>
  <q-page class="full-height">
    <div class="q-pa-md ">
      <input v-model="pesquisa" @input="tentando()"/>
    </div>
    <div class="q-pa-md ">
      <div class="full-width">
        <p style="color: #FFF;font-size: 20px;text-align: center;">Contatos</p>
        <q-btn
          style="margin-right: 10px;"
          class="bg-primary"
          to="/cadastroContatos"
          icon="add"
          round
        />
      </div>
      <q-table
        dense
        :data="formulario2"
        :columns="formulario"
        row-key="name"
        grid
        hide-header
      >
        <template v-slot:item="props">
          <div
            class="q-pa-xs col-xs-12 col-sm-6 col-md-4 col-lg-3 grid-style-transition"
            :style="props.selected ? 'transform: scale(0.95);' : ''"
          >
            <q-card>
              <q-list dense>
                <q-item v-for="col in props.cols.filter(col => col.name !== 'desc')" :key="col.name">
                  <q-item-section>
                    <q-item-label>{{ col.label }}</q-item-label>
                  </q-item-section>
                  <q-item-section side>
                    <q-item-label caption>{{ col.value }}</q-item-label>
                  </q-item-section>
                </q-item>
              </q-list>
            </q-card>
          </div>
        </template>
      </q-table>
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
    }
  },
  data () {
    return {
      formulario2: [],
      pesquisa: '',
      typingTimer: ''
    }
  },
  methods: {
    tentando () {
      clearTimeout(this.typingTimer)
      this.typingTimer = setTimeout(this.get, 1500)
    },
    get () {
      if (this.pesquisa) {
        this.url += this.pesquisa
      }
      this.formulario2 = []
      axios.get(this.url)
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
    }
  },
  beforeMount () {
    this.get()
  }
}
</script>
