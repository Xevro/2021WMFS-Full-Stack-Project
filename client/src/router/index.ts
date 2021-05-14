import { createRouter, createWebHistory, RouteRecordRaw } from 'vue-router'
import Home from '../views/Home.vue'
import LoginUser from '../views/LoginUser.vue'
import LoginCompany from '../views/LoginCompany.vue'
import AddTask from '../views/AddTask.vue'
import ProposalDetails from '../views/ProposalDetails.vue'
import RegisterCompany from '../views/RegisterCompany.vue'

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
    path: '/students/login',
    name: 'Login Student',
    component: LoginUser
  },
  {
    path: '/companies/login',
    name: 'Login Company',
    component: LoginCompany
  },
  {
    path: '/companies/register',
    name: 'Register company',
    component: RegisterCompany
  },
  {
    path: '/students/tasks/add',
    name: 'Add Tasks',
    component: AddTask
  },
  {
    path: '/proposals/id/details',
    name: 'Proposal details',
    component: ProposalDetails
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
