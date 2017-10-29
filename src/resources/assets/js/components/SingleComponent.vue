<template>

  <div>
    <header-component></header-component>

    <main class="clearfix">

      <div class="single">
        <div class="card_wrapper">
          <div class="card_container">
            <img class="profile_icon" src="" alt="">
            <div class="card_container_right">
              <p class="profile_name">Natsuya Yada</p>
              <p class="shelf_name">アメリカンライフスタイル</p>
            </div>
          </div>
          <!-- <div class="card_eyecatch_bg"></div> -->
          <img class="card_eyecatch" src="" alt="">
          <div class="card_container">
            <p class="card_title">かっこよすぎるバーベキューテク6選 - アウトドア初心者のパパでも簡単!</p>
          </div>
          <a class="save_button" href="#">シェルフへ</a>
        </div>

        <div class="card_wrapper card_wrapper_next">
          <div class="card_container">
            <img class="profile_icon" src="" alt="">
            <div class="card_container_right">
              <p class="card_collectors"><a href="">Toshiaki Matsumuraさん</a>と<a href="">その他</a>が保存しました</p>
            </div>
          </div>
        </div>
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
