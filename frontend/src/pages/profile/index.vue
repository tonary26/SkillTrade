<script setup>
import {onMounted} from "vue"
import {useProfileStore} from "@/stores/profile.js"

const store = useProfileStore()

defineOptions({
  name: 'index'
})

onMounted(() => {
  store.show()
})

</script>

<template>
  <div class="main">
    <template v-if="store.isLoaded">
      <div class="profile">
        <div class="left">
          <div class="avatar">
            <img v-if="store.user.avatar_url"
                 class="avatar"
                 :src="store.user?.avatar_url"
                 alt="Avatar">
            <span
                v-else
                class="avatar-char">
                    {{ store.user.name.charAt(0).toUpperCase() }}
            </span>
          </div>
          <div class="name">
            <span>{{ store.user.name }}</span>
          </div>
        </div>

        <div class="right">
          <div class="bio">
            <p>
              {{ store.user.bio || "Bio.." }}
            </p>
          </div>
          <div class="skills-num">
            <span class="num">{{ store.user?.skills?.length || 0 }}</span>
            <span class="skills-num-title">SKILLS</span>
          </div>
          <div class="btn-container">
            <router-link
                :to="{ name: 'profile.update' , params: { id: store.user.id } }"
                class="btn">
              Edit Profile
            </router-link>
          </div>
        </div>

      </div>
      <div class="skills">
        <div class="my-skills">
          <h3>My Skills</h3>
        </div>

        <div class="skills-list">
          <span v-for="skill in store.user?.skills"
                :key="skill.id"
                class="skill-container">
            <router-link class="skill" :to="{ name: 'skill.show', params: { id: skill.id } }">
              {{ skill.title }}
            </router-link>
          </span>
        </div>
      </div>
    </template>

    <div v-else
        class="loading">
      <span>Loading profile data<span class="dots"></span></span>
    </div>

  </div>
</template>

<style scoped>
  .main {
    color: white;
    display: flex;
    justify-content: center;
    flex-direction: column;
    align-items: center;
  }

  .profile {
    display: flex;
    margin-top: 100px;
    width: 1000px;
    height: 270px;
    background-color: black;
    border-radius: 40px;
  }

  .left {
    margin-left: 60px;
    text-align: center;
  }

  .avatar {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 97px;
    height: 97px;
    margin-top: 50px;
    border-radius: 50%;
    border: 3px solid white;
  }

  .avatar-char {
    font-size: 36px;
    color: #ebebeb;
  }

  .name {
    margin-top: 20px;
    font-size: 17px;
    font-weight: 400;
  }

  .right {
    margin-left: 30px;
  }

  .bio {
    margin-top: 30px;
    max-width: 600px;
    width: 100%;
    line-height: 1.6;
    font-size: 14px;
    font-weight: 300;
  }

  .skills-num {
    display: flex;
    flex-direction: column;
    margin-top: 20px;
    font-size: 16px;
  }

  .num {
    font-weight: bold;
  }

  .skills-num-title {
    font-size: 13px;
    font-weight: 500;
    color: #787878;
  }

  .btn-container {
    text-align: center;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-top: 40px;
    background-color: black;
    border: 1px solid #292929;
    border-radius: 10px;
    width: 110px;
    height: 35px;
    cursor: pointer;
  }

  .btn {
    color: white;
  }

  .skills {
    display: flex;
    align-items: center;
    flex-direction: column;
    justify-content: center;
  }

  .skills-list {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 20px;
  }

  .skill-container {
    background-color: #1c1c1c;
    padding-right: 20px;
    padding-left: 20px;
    padding-top: 10px;
    padding-bottom: 10px;
    font-weight: 300;
    border-radius: 50px;
    color: white;
  }

  .skill {
    color: white;
  }

  .loading {
    margin-top: 50px;
    font-size: 30px;
  }

  .dots::after {
    content: "";
    animation: dots 1.5s infinite;
  }

  @keyframes dots {
    0%   { content: ""; }
    25%  { content: "."; }
    50%  { content: ".."; }
    75%  { content: "..."; }
    100% { content: ""; }
  }

</style>