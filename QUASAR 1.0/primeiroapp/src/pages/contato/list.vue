<template>
  <div>
    <listar-form :formulario="formulario" :url="url"/>
  </div>
</template>

<style>
</style>

<script>
import listarForm from 'src/components/Listar.vue'
export default {
  components: {
    listarForm
  },
  name: 'PageIndex',
  data () {
    return {
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
          label: 'Nome',
          name: 'nome',
          field: 'nome',
          required: true,
          type: 'text',
          value: ''
        },
        {
          model: '',
          label: 'Telefone',
          name: 'tell',
          field: 'tell',
          type: 'text',
          value: ''
        },
        {
          model: '',
          label: 'Celular',
          name: 'cell',
          field: 'cell',
          type: 'text',
          value: ''
        },
        {
          model: '',
          label: 'E-Mail',
          name: 'email',
          field: 'email',
          type: 'text',
          value: ''
        }
      ],
      url: 'http://localhost/dashboard/1quasar/BeckdoLaz/listar_ativos.php?termo=',
      formulario2: [],
      pesquisa: '',
      typingTimer: ''
    }
  },
  methods: {
    tentando () {
      clearTimeout(this.typingTimer)
      this.typingTimer = setTimeout(this.get, 1500)
    }
  },
  beforeMount () {}
}
</script>
