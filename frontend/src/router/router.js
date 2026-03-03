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
        },
        {
            path: '/auth/register',
            component: () => import('@/pages/auth/register/index.vue'),
            name: 'auth.register.index'
        },
        {
            path: '/auth/login',
            component: () => import('@/pages/auth/login/index.vue'),
            name: 'auth.login.index'
        },
        {
            path: '/profile',
            component: () => import('@/pages/profile/index.vue'),
            name: 'profile.index'
        }
    ]
})

export default router