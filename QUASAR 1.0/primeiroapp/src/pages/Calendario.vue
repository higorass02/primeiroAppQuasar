<template>
  <q-page class="full-height">
    <div class="q-pa-md ">
      <div class="q-gutter-md row items-start">
        <q-date
          v-model="date"
          minimal
        />
      </div>
    </div>
    <modal-agendar :showModal="showModal"/>
    <div class="q-pa-md">
      <button
        style="margin-right: 10px;"
        class="bg-primary"
        @click="controleModal"
      >
        <q-icon
          class="text-white"
          name="add"
        />
      </button>
      <p style="color: #FFF;font-size: 20px;text-align: center;">Agendados</p>
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
import modalAgendar from 'src/pages/modalAgendar'
import axios from 'axios'
export default {
  name: 'PageIndex',
  components: {
    modalAgendar
  },
  data () {
    return {
      date: '2019/05/06',
      formulario: [
        {
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
          model: '',
          label: 'Data Agenda',
          name: 'data_agenda',
          field: 'data_agenda',
          disabled: true,
          hidden: true,
          type: 'text',
          value: ''
        },
        {
          model: '',
          label: 'Hora',
          name: 'hora',
          field: 'hora',
          type: 'text',
          value: ''
        },
        {
          model: '',
          label: 'Id Contato',
          name: 'id_contato',
          field: 'id_contato',
          type: 'text',
          value: ''
        },
        {
          model: '',
          label: 'Id Servico',
          name: 'id_servico',
          field: 'id_servico',
          type: 'text',
          value: ''
        },
        {
          model: '',
          label: 'Status',
          name: 'status',
          field: 'status',
          type: 'text',
          value: ''
        }
      ],
      formulario2: [],
      showModal: false
    }
  },
  methods: {
    controleModal () {
      this.showModal = false
      this.showModal = true
    },
    get () {
      this.formulario2 = []
      let url = 'http://localhost/dashboard/1quasar/BeckdoLaz/listarCalendario.php?data=' + this.date
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
  watch: {
    'date' () {
      this.get()
    }
  },
  beforeMount () {
    this.get()
  }
}
</script>
