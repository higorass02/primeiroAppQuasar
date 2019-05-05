<template>
  <q-layout view="lHh Lpr lFf">
    <q-header elevated class="glossy bg-brown-8">
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
            <i class="fas fa-bars"></i> Menu
          </q-item-label>
          <q-item clickable tag="a" href="/#/">
            <q-item-section>
              <q-item-label>Home</q-item-label>
            </q-item-section>
          </q-item>
          <q-select class="q-mx-md" borderless v-model="model" :options="optionsContatos" label="Contatos" />
          <q-item clickable tag="a" href="/#/listarAtivos">
            <q-item-section>
              <q-item-label>Agenda</q-item-label>
            </q-item-section>
          </q-item>
        </q-list>
      </div>
    </q-drawer>
    <q-bar dense class="bg-blue text-white">
    </q-bar>

    <q-page-container>
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
    openURL
  }
}
</script>

<style>
</style>
