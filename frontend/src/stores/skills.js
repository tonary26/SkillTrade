import { defineStore } from 'pinia'
import api from '@/api'

export const useSkillsStore = defineStore('skills', {
  state: () => ({
    skills: [],
    skill: {
        user: '',
        title: '',
        description: '',
        category_id: '',
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
    },

    async addSkill (formData) {
        try {
            const data = await api.post('/skills', formData)
            const serverData = data.data

            this.skill = serverData.data

            return data
        }
        catch (error) {
            alert(error.message)
        }
    }
  },
})