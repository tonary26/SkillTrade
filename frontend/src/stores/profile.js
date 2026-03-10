import { defineStore } from 'pinia'
import api from '@/api'

export const useProfileStore = defineStore('profile', {
    state: () => ({
        user: null,
        profileUser: null,
        isLoaded: false,
        users: []
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
        },

        async search(query, signal) {

            if (query.length <= 2) {
                this.users = []
                return
            }

            try {
                const data = await api.get('/profile/search', {
                    params: { query },
                    signal
                })
                const serverData = data.data

                this.users = serverData.users
                this.isLoaded = true
            }
            catch (error) {
                alert(error.message)
            }
        },

        async get(id) {
            try {
                const data = await api.get(`/profile/search/${id}`)
                const serverData = data.data

                this.profileUser = serverData.user
            }
            catch (error) {
                alert(error.message)
            }
        }
    },
})