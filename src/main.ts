import './assets/main.css'

import { createApp } from 'vue'
import { createPinia } from 'pinia'

// @ts-expect-error: missing .vue module declaration in this project
import App from './App.vue'

const app = createApp(App)

app.use(createPinia())

app.mount('#app')
