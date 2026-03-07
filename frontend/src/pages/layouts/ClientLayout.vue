<script setup>
import {useRouter} from "vue-router"
import {useAuthStore} from "@/stores/auth.js"
import {onMounted} from "vue"
import {useProfileStore} from "@/stores/profile.js"

defineOptions({
  name: 'ClientLayout'
})

const authStore = useAuthStore()
const profileStore = useProfileStore();

const router = useRouter()

const logout = async function () {
  await authStore.logout()

  router.push({ name: 'dashboard.index' })
}

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
      <slot/>
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

  .nav-logo {
    font-weight: bold;
    color: white;
    font-size: 30px;
    text-decoration: none;
  }
</style>