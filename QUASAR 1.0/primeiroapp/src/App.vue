<template>
  <div id="q-app">
    <router-view />
  </div>
</template>

<script>
export default {
  name: 'App',
  watch: {
    '$route' (to, from) {
      if (to.path === '/') {
        this.$router.push('login')
      } else if (localStorage.getItem('login') === 'false') {
        this.$router.push('login')
      }
      // else if (permissao === 'adm') {
      //   this.$router.push(to.name)
      // }
      // else if (permissao === 'usuario') {
      //   if (to.name !== 'financeiro') {
      //     this.$router.push(to.name)
      //   }
      // }
    }
  }
}
</script>

<style>
</style>
