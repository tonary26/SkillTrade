import { defineStore } from 'pinia'
import api from '@/api'

export const useCategoriesStore = defineStore('categories', {
    state: () => ({
        categories: []
    }),

    getters: {
    },

    actions: {
        async getCategories () {
            try {
                const res = await api.get('/categories')
                this.categories = res.data.data
            }
            catch (error) {
                alert('Что то пошло не так..' . error);
            }
        }
    },
})