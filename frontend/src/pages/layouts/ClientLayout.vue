<script setup>
import {useRouter, useRoute} from "vue-router"
import {useAuthStore} from "@/stores/auth.js"
import {onMounted, watch, ref, computed} from "vue"
import {useProfileStore} from "@/stores/profile.js"

defineOptions({
  name: 'ClientLayout'
})

const authStore = useAuthStore()
const profileStore = useProfileStore();

const route = useRoute()
const router = useRouter()

let timeout = null
let controller = null

const search = ref('')

const logout = async function () {
  await authStore.logout()

  router.push({ name: 'dashboard.index' })
}

watch(search, (value) => {
  clearTimeout(timeout)

  timeout = setTimeout(() => {

    if (controller) {
      controller.abort()
    }

    controller = new AbortController()
    profileStore.search(value, controller.signal)
  }, 400)
})

watch(() => route.path, () => {
  profileStore.users = []
  search.value = ''
})

onMounted(async () => {
  if (authStore.isAuthenticated && !profileStore.user) {
    await profileStore.show()
  }
})

</script>


<template>
    <div class="nav-menu">
      <div class="left">
        <router-link
            :to="{ name: 'dashboard.index' }"
            class="nav-logo">
          SkillTrade
        </router-link>
      </div>

      <div class="center">
        <router-link
            :to="{ name: 'dashboard.index' }"
            class="nav-btn">
          Home
        </router-link>

        <router-link
            :to="{ name: 'skill.index' }"
            class="nav-btn">
          Skills
        </router-link>

        <input
            v-model="search"
            name="search"
            class="nav-search"
            type="search"
            placeholder="Search users"
        >

        <router-link
            :to="{ name: 'skill.add' }"
            class="nav-btn">
          Create Skill
        </router-link>
      </div>

      <div class="right">
        <template v-if="!authStore.isAuthenticated">
          <router-link
              :to="{ name: 'auth.login.index' }"
              class="nav-btn">
            Login
          </router-link>

          <router-link
              :to="{ name: 'auth.register.index' }"
              class="nav-btn">
            Register
          </router-link>
        </template>

        <template v-else>
          <a @click.prevent="logout()"
             class="nav-btn">
            Logout
          </a>

          <router-link
              :to="{ name: 'profile.index' }"
              class="nav-btn">
            Profile
          </router-link>
        </template>
      </div>
    </div>

    <div class="main">
        <div v-if="profileStore.users.length >= 1"
            class="user-list-container">
          <h2 class="list-title">Users</h2>

          <div class="user-grid">
            <div v-for="user in profileStore.users"
                 :key="user.id"
                 class="user-card">
              <div class="user-info">
                <div class="user-avatar">
                  <img
                      v-if="user.avatar_url"
                      class="avatar" :src="user?.avatar_url" alt="avatar">
                  <span
                      v-else
                      class="avatar-char">
                    {{ user?.name.charAt(0).toUpperCase() }}
                  </span>
                </div>
                <div class="user-details">
                  <h3 class="user-name">{{ user.name }}</h3>
                </div>
              </div>

              <div class="user-tags">
                <span v-for="userSkill in user.skills"
                      :key="userSkill.id"
                      class="tag">
                  {{ userSkill.title }}
                </span>
              </div>

              <router-link
                  :to="authStore.user?.id === user.id ? { name: 'profile.index' } : { name: 'profile.get', params: { id: user.id } }"
                  class="view-profile-btn">
                View Profile
              </router-link>

            </div>
          </div>
        </div>
      <slot v-if="profileStore.users.length === 0" />
    </div>
</template>


<style scoped>
  .nav-menu {
    display: flex;
    align-items: center;
    justify-content: space-between;
    position: relative;
    padding-left: 40px;
    padding-right: 40px;
    background-color: #000000;
    height: 90px;
  }

  .left {
    display: flex;
    align-items: center;
  }

  .right {
    display: flex;
    align-items: center;
    gap: 15px;
  }

  .center {
    display: flex;
    position: absolute;
    left: 50%;
    transform: translateX(-50%);
    gap: 30px;
  }

  .nav-btn {
    color: #b2b2b2;
    font-size: 18px;
    text-decoration: none;
    cursor: pointer;
  }

  .nav-btn.router-link-active {
    color: #ffffff;
    text-decoration: underline;
  }

  .nav-search {
    width: 250px;
    background-color: #1a1a1a;
    color: white;
    border-radius: 30px;
    border: 2px solid #333;
    transition: all 0.3s ease;
  }

  .nav-search:focus {
    border-color: #ffffff;
    background-color: #2a2a2a;
    outline: none;
  }

  .nav-logo {
    font-weight: bold;
    color: white;
    font-size: 30px;
    text-decoration: none;
  }

  .user-list-container {
    padding: 20px;
    max-width: 1200px;
    margin: 0 auto;
  }

  .list-title {
    color: white;
    font-size: 24px;
    margin-bottom: 20px;
    font-weight: 600;
  }

  .user-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    gap: 20px;
  }

  .user-card {
    background-color: #111111;
    border: 1px solid #333333;
    border-radius: 12px;
    padding: 20px;
    transition: transform 0.2s ease, border-color 0.2s ease;
    display: flex;
    flex-direction: column;
    gap: 15px;
  }

  .user-card:hover {
    border-color: #686868;
    transform: translateY(-5px);
  }

  .user-info {
    display: flex;
    align-items: center;
    gap: 12px;
  }

  .user-avatar {
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: black;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    border: 3px solid white;
  }

  .avatar-char {
    font-size: 36px;
    color: #ebebeb;
  }

  .user-name {
    color: #ffffff;
    font-size: 18px;
    margin: 0;
  }

  .user-specialty {
    color: #b2b2b2;
    font-size: 14px;
    margin: 0;
  }

  .user-tags {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
  }

  .tag {
    background-color: #1a1a1a;
    color: #b2b2b2;
    padding: 4px 10px;
    border-radius: 6px;
    font-size: 12px;
    border: 1px solid #333;
  }

  .view-profile-btn {
    margin-top: auto;
    background-color: #ffffff;
    color: #000000;
    text-align: center;
    padding: 10px;
    border-radius: 8px;
    text-decoration: none;
    font-weight: bold;
    font-size: 14px;
    transition: opacity 0.2s;
  }

  .view-profile-btn:hover {
    opacity: 0.8;
  }
</style>