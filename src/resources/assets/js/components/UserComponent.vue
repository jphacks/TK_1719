<template>
<div>
  <header-component></header-component>

  <main class="clearfix">
    <div class="sub_header">
      <div class="sub_header_container">

        <div class="sh_icon_wrapper">
          <img class="profile_icon" src="" alt="">
        </div>

        <div class="sh_info_wrapper">
          <h1 class="sh_user_name">Natsuya Yada<i class="fa fa-pencil-square-o" aria-hidden="true"></i></h1>
          <p>フォロー</p>
          <p class="container_a">
            <a id="fr_usr_num" href=""><span class="num">5</span>ユーザー</a>
            <a id="fr_shl_num" href=""><span class="num">5</span>シェルフ</a>
          </p>
        </div>

      </div>
    </div>

    <div class="grid clearfix">

        <div class="container_a">
          <h2 class="my_shelf_title">マイシェルフ</h2>
          <a class="card_new_shelf" href="#">add new</a>
        </div>

        <shelfcard-component></shelfcard-component>
        <shelfcard-component></shelfcard-component>
        <shelfcard-component></shelfcard-component>
        <shelfcard-component></shelfcard-component>

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
