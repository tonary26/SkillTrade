<script setup>
  defineOptions({
    name: 'index'
  })
</script>


<template>
  <div class="main">
    <h1 class="title">UNLOCK YOUR POTENTIAL THROUGH EXCHANGE</h1>
    <router-link
        :to="{name: 'skill.index'}"
        class="sub-title">
      HERE.
    </router-link>

    <div class="btn">
      <router-link :to="{ name: 'skill.index' }"
        class="btn-text">
          Exchange skills
      </router-link>
    </div>
  </div>
</template>


<style scoped>
  .main {
    display: flex;
    align-items: center;
    flex-direction: column;
    justify-content: center;
    margin-top: 200px;
  }

  .title {font-size: 40px; color: white}
  .sub-title {
    color: #4e4e4e;
    font-size: 40px;
    text-decoration: underline;
    cursor: pointer;
  }

  .btn {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 80px;
    width: 300px;
    height: 70px;
    background-color: white;
    border-radius: 40px;
    border: white solid 1px;
    transition: all 0.3s ease;
  }

  .btn:hover {
    background-color: #000000;
    border: #000000 solid 1px;
    color: white;
  }

  .btn-text {
    color: black;
    text-decoration: none;
    font-size: 25px;
  }

  .btn:hover .btn-text {
    color: white;
  }


</style>
