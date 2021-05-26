import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'
import axios from 'axios'
import VueAxios from 'vue-axios'

export const myAxios = axios.create({
  baseURL: 'http://localhost:8083/',
  withCredentials: true
})

createApp(App).use(store).use(router).use(VueAxios, myAxios).mount('#app')
