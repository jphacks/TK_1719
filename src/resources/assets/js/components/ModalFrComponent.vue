<template>
<div class="modal_content_wrapper">
      <div class="modal_content_container">

        <h3>コレクションを追加</h3>
        <div class="urlbox_wrapper">
          <input type="text" name="" value="" placeholder="http://sample.com...">
        </div>

        <h3>シェルフを選択</h3>
        <div class="shelfs clearfix">
          <div class="shelfs_left">
            <div class="shelfs_search_wrapper">
              <div class="shelfs_search_container">
                <i class="h_searchbox_icon fa fa-search" aria-hidden="true"></i>
                <input type="text" name="" value="" placeholder="シェルフを検索">
              </div>
            </div>
            <div class="shelfs_lists_wrapper">
              <ul class="shelfs_lists_container">
                <li class="shelf_list new_shelf">
                  <i class="fa fa-plus" aria-hidden="true"></i>
                  <input id="new_shelf_box"type="text" name="" value="" placeholder="新しいシェルフ">
                </li>
                <li class="shelf_list">
                  ライフスタイル
                  <a class="add_this_shelf" href="#">
                    <i class="fa fa-check" aria-hidden="true"></i>
                  </a>
                </li>
                <li class="shelf_list">
                  キッチンテクニック
                  <a class="add_this_shelf" href="#">
                    <i class="fa fa-check" aria-hidden="true"></i>
                  </a>
                </li>
                <li class="shelf_list">
                  冬のフォトジェニック
                  <a class="add_this_shelf" href="#">
                    <i class="fa fa-check" aria-hidden="true"></i>
                  </a>
                </li>
                <li class="shelf_list">
                  冬のフォトジェニック
                  <a class="add_this_shelf" href="#">
                    <i class="fa fa-check" aria-hidden="true"></i>
                  </a>
                </li>
                <li class="shelf_list">
                  冬のフォトジェニック
                  <a class="add_this_shelf" href="#">
                    <i class="fa fa-check" aria-hidden="true"></i>
                  </a>
                </li>
                <li class="shelf_list">
                  冬のフォトジェニック
                  <a class="add_this_shelf" href="#">
                    <i class="fa fa-check" aria-hidden="true"></i>
                  </a>
                </li>
              </ul>
            </div>

          </div>
          <div class="shelfs_right">
            <img src="" alt="">
          </div>

        </div>
      </div>

    </div>
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
