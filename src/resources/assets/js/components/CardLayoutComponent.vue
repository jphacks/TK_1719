<template>
  <main class="clearfix">
    <subheader-component></subheader-component>
    <div class="grid">
      <card-component></card-component>
      <card-component></card-component>
      <card-component></card-component>
      <card-component></card-component>
    </div>
  </main>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

<style>
</style>
