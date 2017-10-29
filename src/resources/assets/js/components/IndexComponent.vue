<template>

  <div>
    <header-component></header-component>

    <main class="clearfix">
        <div class="grid">
          <card-component></card-component>
          <card-component></card-component>
          <card-component></card-component>
          <card-component></card-component>
        </div>
    </main>

    <footer-component></footer-component>
  </div>

</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
