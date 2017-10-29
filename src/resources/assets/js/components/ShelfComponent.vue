<template>
<div>
  <header-component></header-component>
  <main class="clearfix">
      <div class="sub_header shelf">
        <h2 class="shelf_title">SHELF</h2>
        <p class="shelf_col_num">20 Collections</p>
      </div>
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
