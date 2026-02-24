import { defineStore } from 'pinia'
import api from '@/api'

export const useSkillsStore = defineStore('skills', {
  state: () => ({
    skills: [],
  }),

  getters: {
    
  },

  actions: {
    async getSkills () {
        try {
            const res = await api.get('/skills')
            this.skills = res.data.data
        }
        catch(error) {
            alert('Что то пошло не так..', error)
        }
    }
  },
})