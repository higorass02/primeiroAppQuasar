<template>
  <q-layout view="lHh Lpr lFf">
    <q-header elevated class="glossy bg-blue-grey-7">
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
            <q-btn
              flat
              dense
              round
              @click="leftDrawerOpen = !leftDrawerOpen"
              aria-label="Menu"
            >
              <q-icon name="menu" />
            </q-btn>
          </q-item-label>
          <q-item
            clickable
            tag="a"
            href="/#/"
          >
            <q-item-section avatar>
              <q-icon name="home" />
            </q-item-section>
            <q-item-section>
              <q-item-label >Home</q-item-label>
            </q-item-section>
          </q-item>
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
            <q-item clickable tag="a" href="/#/listarAtivosContatos">
              <q-item-section>
                <q-item-label>Listar Contatos</q-item-label>
              </q-item-section>
            </q-item>
          </q-expansion-item>
          <q-item clickable tag="a" href="/#/calendario">
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
    <q-bar dense class="bg-blue text-white">
    </q-bar>

    <q-page-container class="bg-grey-3">
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
</style>
