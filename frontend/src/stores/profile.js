import { defineStore } from 'pinia'
import api from '@/api'

export const useProfileStore = defineStore('profile', {
    state: () => ({
        user: null,
        isLoaded: false
    }),

    getters: {
    },

    actions: {
        async show() {
            try {
                const data = await api.get('/profile')
                const serverData = data.data

                this.user = serverData.user
                this.isLoaded = true
            }
            catch(error) {
                alert(error.message)
                this.isLoaded = false
            }
        },

        async update(id, form) {
            try {
                const data = await api.patch(`/profile/${id}`, form)
                const serverData = data.data
                this.user = serverData.user

                alert('Profile updated')
            }
            catch(error) {
                alert(error.message)
            }
        }
    },
})