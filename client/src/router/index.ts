import { createRouter, createWebHistory, RouteRecordRaw } from 'vue-router'
import Home from '../views/students/StudentHome.vue'
import LoginUser from '../views/auth/LoginUser.vue'
import LoginCompany from '../views/auth/LoginCompany.vue'
import AddTask from '../views/students/AddTask.vue'
import ProposalDetails from '../views/company/ProposalDetails.vue'
import RegisterCompany from '../views/auth/RegisterCompany.vue'
import CompanyHome from '../views/company/CompanyHome.vue'
import CompanyProposals from '@/views/company/CompanyProposals.vue'
import StudentDetails from '@/views/students/StudentDetails.vue'

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
    component: () => import(/* webpackChunkName: "about" */ '../views/students/StudentTasks.vue')
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
    path: '/companies/proposals',
    name: 'Company Proposals',
    component: CompanyProposals
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
  },
  {
    path: '/students/id',
    name: 'student details',
    component: StudentDetails
  },
  {
    path: '/companies',
    name: 'Company Home',
    component: CompanyHome
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
