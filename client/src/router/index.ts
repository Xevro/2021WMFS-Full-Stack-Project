import { createRouter, createWebHistory, RouteRecordRaw } from 'vue-router'
import Home from '../views/Home.vue'
import LoginUser from '../views/Login_user.vue'
import AddTask from '../views/AddTask.vue'

const routes: Array<RouteRecordRaw> = [
  {
    path: '/',
    name: 'Home',
    component: Home
  },
  {
    path: '/tasks',
    name: 'Tasks',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "about" */ '../views/Tasks.vue')
  },
  {
    path: '/login',
    name: 'Login',
    component: LoginUser
  },
  {
    path: '/students/tasks/add',
    name: 'Add Tasks',
    component: AddTask
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
