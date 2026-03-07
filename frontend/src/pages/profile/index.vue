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
            <img class="img"
                 :src="store.user?.avatar_url || 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAJ4AAACUCAMAAABVwGAvAAAAY1BMVEXh5uw3S2Dl6vAyR10sQ1kqQVjr7/Vyfozo7fIjPFTd4ukaNk9fbn0PMEvJz9fAx89DVWi4v8iiq7XQ1t2Zoq2rs71/ipdZaHlNXnCSnKdqd4Z5hZKMlqI/UWbW3OOFj5wAJ0RZ1xs9AAAEnElEQVR4nO2ci5aiMAyGIb1AAQuIKCDCvP9TLjo7M+qq0wsJ7jl8T/CflKR/2pQgWFlZWVlZWVlZWVlBB75ZWsk9EMtgqLTOJ7Qekli+j0SQUm+P3aEpQjZxKposanN4C4UAQx0pJfhZWfgJY1yo9FBXSy8zSD02KQ8fwdNwzJcMIYDuQsEeivtUyDu9WATjoX8SuB9EOg7xIuqkLsQv4i4Cm1IuoA7a1EDcBPvY0YuLR2WmbkIdydc3Mlc36csC0gSRRxt10wcYUaqLd3bqzutLlx9xaZKyd/p2ZMsL4YtS/ATGciJ98dE+eGd9NPIgt4/dmbSl+fyy33ayZ1AsL+QbR3XiSCBPdq7BC9MKXR9oV3Hn4oz+9cU75+CF4WlAD5/72k72dIvtDYaTu7opOZDVQW7o8h7CigFXXry1NQM3KI378cm9y4b2TVojy4s8MuPsW3Bz493lObmVH3nIlUVadEAPSGtceZ6ZmyKbFih96l4okE0B6Lcuy0Hls6mxLEGWlxzcrPwFjt/uHj0Kn2ixHUvcexQ+jlxXptyofbYNZEfgZ+ZZgd8LQeEsj3f4na6HKcDecS/y3Lc17C1tAgZXcdO31+DL23kVFmx9Seaxa+B3atrHUKFbAqi9DBV6p9Z7umVkeW/ea7x5p/bm8jwXF7tTa9+7U/MsLNidWuWxaYTsgN2pJc7XBhNij+6WfSwBK9HlVR7q8A2VzyFQWhLciieFY3aIiOLSD0q35GAF/qXQGelU+3hYEQ08SIebIdZosnEMOVrrEzXdMAHk1sVPkYmbkLbJyzPKSSXr4oft4m+xvlrjFaE660NSHmGf2t4CdqeQAtnE/yOvtFrbE/q54z02x3ysoZ6Qk6PF6oqeegAStMU4y4bGDNxg7qtYQS4uAPOWUrX0wYPSOHocvcV4gHFlZt0Sk9WxqSvdkBe9C9JsCFKQmpUfoDRKDrZM8AyPwTnF1N5DjDw9/ljXM2BvIo/YrFxhclTKx6XkmX17pPPoV4A+GcjDP9N7Js+sLiuqce87ZGRk+cR+kbIMyYeJujD8oH2s8Rdp2g3Re+XgnBjG3QZ9IzQZls642RAZuTyrkQJF9NjgG7B78CJIj1iC2Kgi/8AY5Vu6OFeWJ2iM5FT+E1nbPxZibEfz2hSC3jZ2F9Q+IRihisvG8d5FNSVyAEHqjjnf+fFwP8R4AgHy48brsl5seo0lUFb70Ouq/owq+gShxgBUx1/fMptFMO2HuV9ky2H0j9wX6tTOGUGAZDzNErm/MFG0wVwRlFUbOlW6V6Sn3TBHBAF2zavH/a4w0Wy9kzgeauU1ufKKlNWJz04cy20z+7Jeow61dBUIQX3CWNZrmCpqp60YZJ2lyOIuAtOstv4GAcoDn7OWvIDzQ2lVZSZx3YYgcl+wTWcucLIlmbstcYOzTBu5LQCdUUbuC7Y55L9GcIrckTpyX3AWvY7gFLlILCTuIlC8+L3MFLmez2ZL3BDqyQ96IE76+TyTO5ztH9jBeGg52uZqh1B9dVeoZevaf2EgivHmTFB2XhOrs8NUcz26IaMFKt0rbt8DrvLsWOX58J/I+wOob0ayll9qpQAAAABJRU5ErkJggg==' "
                 alt="Avatar">
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
                class="skill">
            {{ skill.title }}
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

  .img {
    border-radius: 100px;
    border: 3px solid white;
    width: 97px;
    margin-top: 50px;
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

  .skill {
    background-color: #1c1c1c;
    padding-right: 20px;
    padding-left: 20px;
    padding-top: 10px;
    padding-bottom: 10px;
    font-weight: 300;
    border-radius: 50px;
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