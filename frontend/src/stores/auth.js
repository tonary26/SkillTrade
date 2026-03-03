import { defineStore } from 'pinia'
import api from '@/api'

export const useAuthStore = defineStore('auth', {
    state: () => ({
        user: null,
        token: localStorage.getItem('token')
    }),

    getters: {
        isAuthenticated: (state) => !!state.token,
    },

    actions: {
        async register (formData) {
            try {
                const data = await api.post('/auth/register', formData)

                this.user = data.data.user

                return data
            }
            catch(error) {
                alert(error.message)
            }
        },

        async login (formData) {
            try {
                const data = await api.post('/auth/login', formData)

                const serverData = data.data

                this.user = serverData.user
                this.token = serverData.token

                localStorage.setItem('token', serverData.token)

                api.defaults.headers.common['Authorization'] = `Bearer ${serverData.token}`

                return data
            }
            catch (error) {
                alert(error.message)
            }
        },

        async logout () {
            try {
                await api.post('/auth/logout')

                alert('You have signed out of your account.')
            }
            catch(error) {
                alert(error.message)
            }
            finally {
                this.user = null
                this.token = null

                localStorage.removeItem('token')
                delete api.defaults.headers.common['Authorization']
            }
        }
    },
})