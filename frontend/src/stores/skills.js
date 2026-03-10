import { defineStore } from 'pinia'
import api from '@/api'
import {useRouter} from "vue-router"
import router from "@/router/router.js";

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
            this.isLoaded = false
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
    },

    async deleteSkill (id){
        try {
            if (!confirm('Are you sure you want to delete this skill?')) {
                return
            }

            await api.delete(`/skills/${id}`)
            this.skills = this.skills.filter(s => s.id !== id)
        }
        catch(error) {
            alert(error.message)
        }
    }
  },
})