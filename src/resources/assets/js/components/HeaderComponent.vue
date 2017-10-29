<template>
  <header>
    <div class="h_container clearfix">
      <div class="h_searchbox_wrapper">
        <i class="h_searchbox_icon fa fa-search" aria-hidden="true"></i>
        <input type="text" name="" value="">
      </div>
      <div class="h_profile_wrapper">
        <a href="/user">
          <img class="profile_icon" src="" alt="">
          <p class="profile_name" >Natsuya Yada</p>
        </a>
      </div>
      <div class="h_addnew_button">
        <i class="fa fa-plus" aria-hidden="true"></i>
      </div>
    </div>
  </header>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

<style>

header {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    background: rgba(153, 153, 153, 1);
    box-shadow: 0px 3px 1px -2px rgba(0, 0, 0, 0.2), 0px 2px 2px 0px rgba(0, 0, 0, 0.14), 0px 1px 5px 0px rgba(0, 0, 0, 0.12);
    z-index: 999;
}

.h_container {
    display: block;
    position: relative;
    width: 1000px;
    margin: 0 auto;
    height: 6rem;
    box-sizing: border-box;
}

.h_searchbox_wrapper {
    position: absolute;
    display: block;
    left: 0;
    top: 0;
    bottom: 0;
    margin: auto;
    height: 3rem;
    width: 650px;
}

.h_searchbox_icon {
    position: absolute;
    right: 0;
    top: 0;
    border: 0;
    line-height: 3rem;
    width: 4rem;
    font-size: 1.4rem;
    text-align: center;
    color: rgba(179, 179, 179, 1);
}

input[type="text"] {
    height: 100%;
    box-sizing: border-box;
    width: 100%;
}

.h_addnew_button {
    float: right;
}

.h_profile_wrapper {
    position: absolute;
    left: 750px;
    top: 0;
    bottom: 0;
    margin: auto;
    height: 3rem;
}

.h_profile_wrapper .profile_icon {
    width: 3rem;
    height: 3rem;
}

.profile_icon {
    display: block;
    float: left;
    width: 2rem;
    height: 2rem;
    border-radius: 2rem;
    background: white;
    margin: 0 1rem;
}

.h_profile_wrapper .profile_name {
    float: right;
    line-height: 3rem;
    color: white;
}

.h_addnew_button {
    position: absolute;
    line-height: 2rem;
    top: 0;
    bottom: 0;
    margin: auto;
    height: 2rem;
    left: 700px;
    font-size: 2rem;
    color: white;
}

</style>
