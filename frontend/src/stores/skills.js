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
            const res = await api.get('/skills')
            this.skills = res.data.data
            this.isLoaded = true
        }
        catch(error) {
            alert('Что то пошло не так..' + error)
            this.isLoaded = false
        }
    },

    async getSkill (id) {
        try {
            const res = await api.get(`/skills/${id}`);
            this.skill = res.data.data
            this.isLoaded = true
        }
        catch(error) {
            alert('Что то пошло не так..' + error)
            this.isLoaded = false
        }
    }
  },
})