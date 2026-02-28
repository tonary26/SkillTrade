<script setup>
import { useSkillsStore } from '@/stores/skills'
import { onMounted } from 'vue'

defineOptions({
  name: 'index'
})

const store = useSkillsStore()

onMounted(() => {
  store.getSkills()
})

</script>


<template>
  <div class="skills-container">
    <h2 class="section-title">Available Skills</h2>

    <div v-if="store.isLoaded === false"
        class="loading">
      Loading skills<span class="dots"></span>
    </div>

    <div v-else class="skills-grid">
      <div v-for="skill in store.skills" :key="skill.id" class="skill-card">
        <div class="skill-info">
          <router-link
              class="skill-name"
              :to="{ name: 'skill.show', params: { id: skill.id } }">
            {{ skill.title }}
          </router-link>
          <p class="skill-description">{{ skill.description }}</p>
        </div>

        <div class="skill-footer">
          <span class="skill-category">{{ skill.category }}</span>
        </div>
      </div>
    </div>

  </div>
</template>


<style scoped>
.skills-container {
  max-width: 1200px;
  margin: 40px auto;
  padding: 0 20px;
}

.section-title {
  color: white;
  font-size: 32px;
  margin-bottom: 30px;
  text-align: center;
}

.skills-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
  gap: 25px;
}

.skill-card {
  background-color: #1a1a1a;
  border: 1px solid #333;
  border-radius: 16px;
  padding: 24px;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  transition: transform 0.3s ease, border-color 0.3s ease;
}

.skill-card:hover {
  transform: translateY(-5px);
  border-color: #ffffff;
}

.skill-name {
  color: white;
  font-size: 22px;
  margin: 0 0 12px 0;
}

.skill-description {
  color: #aaaaaa;
  font-size: 16px;
  line-height: 1.5;
  margin-bottom: 20px;
}

.skill-footer {
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-top: auto;
}

.skill-category {
  background-color: #333;
  color: #eee;
  padding: 4px 12px;
  border-radius: 20px;
  font-size: 12px;
  text-transform: uppercase;
}

.loading {
  text-align: center;
  margin-top: 40px;
  color: #cdcdcd;
  font-size: 20px;
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
