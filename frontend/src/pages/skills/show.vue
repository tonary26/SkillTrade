<script setup>
import {onMounted} from "vue"
import {useRoute, useRouter} from "vue-router"
import {useSkillsStore} from "@/stores/skills.js"

defineOptions({
  name: 'show'
})

const store = useSkillsStore()
const route = useRoute()
const router = useRouter()

const routerBack = function () {
  router.back()
}

const deleteSkill = async function () {
  await store.deleteSkill(route.params.id)
}

onMounted(() => {
  store.getSkill(route.params.id)
})

</script>

<template>
  <div class="back">
    <span
        @click="routerBack()"
        class="back-link"><-BACK</span>
  </div>
  <div class="main" v-if="store.isLoaded === true">
    <div class="left">
      <div class="header-section">
        <span class="type-badge">{{ store.skill.type }}</span>
        <h1 class="skill-title">{{ store.skill.title }}</h1>
        <div class="category-info">
          Category: <span>{{ store.skill.category }}</span>
        </div>
      </div>

      <div class="content-section">
        <h3>Description</h3>
        <p class="description-text">
          {{ store.skill.description }}
        </p>
      </div>
    </div>

    <div class="right">
      <div class="sticky-card">
        <div class="author-card">
          <div class="avatar-placeholder">
            <img
                v-if="store.skill.user_avatar"
                class="avatar"
                :src="store.skill?.user_avatar"
                alt="avatar">

            <span class="avatar-char">
              {{ store.skill.user.charAt(0).toUpperCase() }}
            </span>
          </div>
          <div class="author-info">
            <span class="label">Posted by</span>
            <span class="name">{{ store.skill.user }}</span>
          </div>
        </div>

        <button class="action-btn primary">
          Send Exchange Request
        </button>

        <div class="meta-info">
          <p>Created: {{ store.skill.created_at }}</p>
        </div>
        <div class="btn-container">
          <button @click="deleteSkill()"
              class="delete-btn"
              type="button">
            Delete
          </button>
        </div>
      </div>
    </div>
  </div>

  <div v-else class="loading">
    Loading skill details<span class="dots"></span>
  </div>
</template>

<style scoped>

  .back {
    display: inline-block;
    margin-left: 130px;
    margin-top: 50px;
    color: white;
    font-size: 19px;
    text-decoration: underline;
    cursor: pointer;
    transition: all 0.3s ease-in-out;
  }

  .back:hover {
    color: #a0a0a0;
  }

  .main {
    display: flex;
    gap: 40px;
    max-width: 1100px;
    margin: 60px auto;
    padding: 0 20px;
    color: white;
  }

  .left {
    flex: 7;
  }

  .header-section {
    margin-bottom: 40px;
    border-bottom: 1px solid #333;
    padding-bottom: 30px;
  }

  .type-badge {
    background: #ffffff;
    color: #000;
    padding: 4px 12px;
    border-radius: 4px;
    font-weight: bold;
    font-size: 12px;
    text-transform: uppercase;
  }

  .skill-title {
    font-size: 48px;
    margin: 20px 0;
    line-height: 1.1;
  }

  .category-info {
    color: #888;
  }

  .category-info span {
    color: white;
    text-decoration: underline;
  }

  .content-section h3 {
    font-size: 24px;
    margin-bottom: 20px;
  }

  .description-text {
    font-size: 18px;
    line-height: 1.6;
    color: #ccc;
    white-space: pre-wrap;
  }

  .right {
    flex: 3;
  }

  .sticky-card {
    position: sticky;
    top: 100px;
    background: #1a1a1a;
    padding: 30px;
    border-radius: 20px;
    border: 1px solid #333;
  }

  .author-card {
    display: flex;
    align-items: center;
    gap: 15px;
    margin-bottom: 30px;
  }

  .avatar-placeholder {
    width: 50px;
    height: 50px;
    background: #444;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    font-size: 20px;
  }

  .avatar {
    width: 50px;
    border-radius: 50px;
  }
  .avatar-char {
    font-size: 36px;
    color: #ebebeb;
  }
  
  .author-info .label {
    display: block;
    font-size: 12px;
    color: #888;
  }

  .author-info .name {
    font-size: 18px;
    font-weight: bold;
  }

  .action-btn {
    width: 100%;
    padding: 16px;
    border-radius: 12px;
    margin-bottom: 15px;
    font-size: 16px;
    font-weight: bold;
    cursor: pointer;
    transition: all 0.2s;
  }

  .primary {
    background: white;
    color: black;
    border: none;
  }

  .primary:hover {
    background: #ccc;
  }

  .meta-info {
    margin-top: 20px;
    font-size: 12px;
    color: #555;
    text-align: center;
  }

  .btn-container {;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .delete-btn {
    background: transparent;
    border: 1px solid #333;
    color: #666;
    padding: 8px 16px;
    border-radius: 12px;
    transition: all 0.3s ease;
  }

  .delete-btn:hover {
    border-color: #ff4444;
    color: #ff4444;
    background: rgba(255, 68, 68, 0.05);
  }

  .loading {
    text-align: center;
    color: white;
    margin-top: 100px;
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