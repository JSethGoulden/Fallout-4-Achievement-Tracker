import './bootstrap';
import { createApp } from 'vue/dist/vue.esm-bundler'
import AchievementTracker from './components/AchievementTracker.vue'

const app = createApp({})

app.component('AchievementTracker', AchievementTracker)

app.mount('#app')
