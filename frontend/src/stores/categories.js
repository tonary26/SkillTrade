import { defineStore } from 'pinia'
import api from '@/api'

export const useCategoriesStore = defineStore('categories', {
    state: () => ({
        categories: [],
        category: '',
        isLoaded: false
    }),

    getters: {
    },

    actions: {
        async getCategories () {
            try {
                const data = await api.get('/categories')
                const serverData = data.data

                this.categories = serverData.data
                this.isLoaded = true
            }
            catch (error) {
                alert(error.message)
            }
        }
    },
})