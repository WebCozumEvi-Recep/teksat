import { createApp } from 'vue'
import { createPinia } from 'pinia'
import router from './router'
import AppShell from './components/layout/AppShell.vue'

createApp(AppShell).use(createPinia()).use(router).mount('#app')
