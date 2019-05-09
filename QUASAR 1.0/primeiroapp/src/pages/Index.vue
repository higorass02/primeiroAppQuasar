<template>
  <q-page>
    <div class="flex flex-center">
      <img src="assets/logo.jpg" style="margin-top: 30%; width: 80%; height: 80%"/>
    </div>
    <div class="row full-width absolute-bottom" style="margin-bottom: 20%">
      <div class="row col-12">
        <div class="col-2"></div>
        <q-btn class="col shadow bg-white" rounded label="Contatos"/>
        <div class="col-2"></div>
      </div>
      <div class="row col-12">
        <div class="col-2"></div>
        <q-btn class="q-mt-md col bg-white" rounded label="Agenda"/>
        <div class="col-2"></div>
      </div>
    </div>
  </q-page>
</template>

<style>
  .btnIndex{
    background-color: rgb(0, 201, 183);
    color: #FFFFFF;
  }
</style>

<script>
export default {
  name: 'PageIndex',
  components: {}
}
</script>
