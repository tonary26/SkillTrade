<script setup>
import { useSkillsStore } from '@/stores/skills'
import { onMounted } from 'vue'

defineOptions({
  name: 'index'
})

const skillsStore = useSkillsStore()

onMounted(() => {
  skillsStore.getSkills()
})

</script>


<template>
  <div>
    <div v-for="skill in skillsStore.skills" :key="skill.id">
      <h1>{{ skill.title }}</h1>
    </div>    
  </div>
</template>


<style scoped>

</style>
