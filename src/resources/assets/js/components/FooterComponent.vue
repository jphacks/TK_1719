<template>
  <footer>
    <p>© 2015 sometimes study</p>
  </footer>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

<style>
  footer {
      position: absolute;
      bottom: 0;
      width: 100%;
      padding: 3rem 0 1rem;
      text-align: center;
      font-size: .8rem;
      background: lightgrey;
  }
</style>
