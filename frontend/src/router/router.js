import { createRouter, createWebHistory } from "vue-router"

const router = createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: '/',
            component: () => import('@/pages/dashboard/index.vue'),
            name: 'dashboard.index'
        },
        {
            path: '/skills',
            component: () => import('@/pages/skills/index.vue'),
            name: 'skill.index'
        },
        {
            path: '/skills/:id',
            component: () => import('@/pages/skills/show.vue'),
            name: 'skill.show'
        }
    ]
})

export default router