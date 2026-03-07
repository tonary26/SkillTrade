<script setup>
import {useProfileStore} from "@/stores/profile.js"
import {reactive, onMounted, watch} from "vue"
import {useRoute, useRouter} from "vue-router"

defineProps({
  name: 'update'
})

const store = useProfileStore()
const route = useRoute()
const router = useRouter()

const form = reactive({
  name: '',
  bio: '',
  avatar_url: ''
})

const submitForm = async () => {
  await store.update(route.params.id, form)

  router.push({ name: 'profile.index' })
}

onMounted(() => {
  store.show(route.params.id)
})

watch(() => store.user, (newUser) => {
  if (newUser) {
    form.name = newUser.name || ''
    form.bio = newUser.bio || ''
    form.avatar_url = newUser.avatar_url || ''
  }
}, { immediate: true })

</script>

<template>
  <div class="auth-wrapper">
    <div class="main">
      <div class="form">
        <h1>UPDATE PROFILE</h1>

        <div class="input-group">
          <label>Username</label>
          <input
              v-model="form.name"
              class="input"
              type="text"
              placeholder="Enter your username">
        </div>

        <div class="input-group">
          <label>Bio</label>
          <input
              v-model="form.bio"
              class="input"
              type="text"
              placeholder="Enter your bio">
        </div>

        <div class="input-group">
          <label>Avatar url</label>
          <input
              v-model="form.avatar_url"
              class="input"
              type="text"
              placeholder="https://png.klev.club/.png">
        </div>

        <button @click="submitForm()"
            type="button"
            class="submit-btn">
          Update
        </button>
      </div>
    </div>
  </div>
</template>

<style scoped>

.auth-wrapper {
  min-height: 100vh;
  background-color: #f5f5f5;
  display: flex;
  justify-content: center;
  align-items: center;
}

.main {
  width: 100%;
  display: flex;
  justify-content: center;
}

h1 {
  color: white;
  letter-spacing: 4px;
  margin-bottom: 20px;
  font-size: 2rem;
}

.form {
  display: flex;
  flex-direction: column;
  align-items: center;
  background: #000000;
  width: 100%;
  max-width: 450px;
  padding: 60px 40px;
  border-radius: 40px;
  box-shadow: 0 20px 40px rgba(0,0,0,0.2);
}

.input-group {
  width: 100%;
  display: flex;
  flex-direction: column;
  margin-bottom: 25px;
}

.input-group label {
  color: #888;
  margin-bottom: 8px;
  font-size: 14px;
  margin-left: 10px;
}

.input {
  width: 100%;
  box-sizing: border-box;
  padding: 15px 20px;
  background: transparent;
  border: 1px solid #333;
  border-radius: 15px;
  color: white;
  font-size: 16px;
  transition: all 0.3s ease;
}

.input:focus {
  outline: none;
  border-color: #ffffff;
  background: rgba(255, 255, 255, 0.05);
}

.submit-btn {
  width: 100%;
  padding: 16px;
  margin-top: 20px;
  border-radius: 15px;
  border: none;
  background: white;
  color: black;
  font-weight: bold;
  font-size: 16px;
  cursor: pointer;
  transition: transform 0.2s, background 0.3s;
}

.submit-btn:hover {
  background: #e0e0e0;
  transform: translateY(-2px);
}

.submit-btn:active {
  transform: translateY(0);
}

.footer-text {
  color: #666;
  margin-top: 25px;
  font-size: 14px;
}

.footer-text a {
  color: white;
  text-decoration: none;
  font-weight: bold;
}
</style>