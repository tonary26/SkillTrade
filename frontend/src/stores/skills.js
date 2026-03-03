import { defineStore } from 'pinia'
import api from '@/api'

export const useSkillsStore = defineStore('skills', {
  state: () => ({
    skills: [],
    skill: {
        user: '',
        title: '',
        description: '',
        category: '',
        type: '',
        created_at: ''
    },
    isLoaded: false
  }),

  getters: {
  },

  actions: {
    async getSkills () {
        try {
            const data = await api.get('/skills')

            const serverData = data.data

            this.skills = serverData.data
            this.isLoaded = true
        }
        catch(error) {
            alert(error.message)
            this.isLoaded = false
        }
    },

    async getSkill (id) {
        try {
            const data = await api.get(`/skills/${id}`);

            const serverData = data.data

            this.skill = serverData.data
            this.isLoaded = true
        }
        catch(error) {
            alert(error.message)
            this.isLoaded = false
        }
    }
  },
})