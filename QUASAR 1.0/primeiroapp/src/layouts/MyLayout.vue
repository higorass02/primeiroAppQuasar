<template>
  <q-layout view="lHh Lpr lFf">
    <q-header elevated class="transparent shadow" >
      <q-toolbar>
        <q-btn
          flat
          dense
          round
          @click="leftDrawerOpen = !leftDrawerOpen"
          aria-label="Menu"
        >
          <q-icon name="menu" />
        </q-btn>

        <q-toolbar-title>
          Salão de Beleza
        </q-toolbar-title>

        <div><q-btn outline rounded color="white" href="#">{{ user }} <i style="font-size: 20px;margin-left: 10px;" class="fas fa-user"></i></q-btn></div>
      </q-toolbar>
    </q-header>

    <q-drawer
      v-model="leftDrawerOpen"
      bordered
      content-class="bg-grey-2"
    >
      <div>
        <q-list>
          <q-item-label header>
            <q-item
              clickable
              tag="a"
              href="/#/"
            >
              <img src="assets/logoSalao.png" style="width: 80%; height: 80%"/>
            </q-item>
          </q-item-label>
          <q-expansion-item
            expand-separator
            icon="perm_contact_calendar"
            label="Contatos"
            caption="Controle de Contatos"
          >
            <q-item clickable tag="a" href="/#/cadastroContatos">
              <q-item-section>
                <q-item-label>Cadastrar Contato</q-item-label>
              </q-item-section>
            </q-item>
            <q-item clickable tag="a" href="/#/listarContatos">
              <q-item-section>
                <q-item-label>Listar Contatos</q-item-label>
              </q-item-section>
            </q-item>
          </q-expansion-item>
          <q-item clickable tag="a" href="/#/listarAgendamento">
            <q-item-section avatar>
              <q-icon name="calendar_today" />
            </q-item-section>
            <q-item-section>
              <q-item-label>Agenda</q-item-label>
            </q-item-section>
          </q-item>
        </q-list>
      </div>
    </q-drawer>
    <q-page-container class="fundo" >
      <router-view />
    </q-page-container>
  </q-layout>
</template>

<script>
import { openURL } from 'quasar'

export default {
  name: 'MyLayout',
  data () {
    return {
      user: 'Higor',
      leftDrawerOpen: this.$q.platform.is.desktop,
      model: null,
      optionsContatos: [
        'Cadastro',
        'Listagem Ativos',
        'Listagem Desativados'
      ]

    }
  },
  methods: {
    openURL,
    contatosclick () {
      console.log('asd')
    }
  }
}
</script>

<style>
  .fundo{
    background-image: linear-gradient(to top, #136576, #006391, #135aa5, #6846a4, #a10f87);
  }
</style>
