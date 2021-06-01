import { createRouter, createWebHistory } from 'vue-router'
import StudentHome from '../views/students/StudentHome.vue'
import Login from '../views/auth/Login.vue'
import AddTask from '../views/students/AddTask.vue'
import ProposalDetails from '../views/company/ProposalDetails.vue'
import RegisterCompany from '../views/auth/RegisterCompany.vue'
import CompanyHome from '../views/company/CompanyHome.vue'
import CompanyProposals from '@/views/company/CompanyProposals.vue'
import StudentDetails from '@/views/students/StudentDetails.vue'
import AddProposal from '@/views/company/AddProposal.vue'
import StudentTasks from '@/views/students/StudentTasks.vue'
import Error404 from '@/views/Error404.vue'
import store from '@/store/index'

// routes lazyloaden!

const routes = [
  {
    path: '/',
    redirect: {
      name: 'StudentHome'
    }
  },
  {
    path: '/login',
    name: 'Login',
    component: Login
  },
  {
    path: '/students',
    name: 'StudentHome',
    component: StudentHome,
    meta: {
      requiresAuth: true,
      allowedRole: 'student'
    }
  },
  {
    path: '/students/:id',
    name: 'StudentDetails',
    component: StudentDetails,
    props: true,
    meta: {
      requiresAuth: true,
      allowedRole: 'student'
    }
  },
  {
    path: '/students/:id/tasks',
    name: 'StudentTasks',
    component: StudentTasks,
    props: true,
    meta: {
      requiresAuth: true,
      allowedRole: 'student'
    }
  },
  {
    path: '/students/:id/tasks/add',
    name: 'StudentAddTask',
    component: AddTask,
    props: true,
    meta: {
      requiresAuth: true,
      allowedRole: 'student'
    }
  },
  {
    path: '/companies',
    name: 'CompanyHome',
    component: CompanyHome,
    meta: {
      requiresAuth: true,
      allowedRole: 'company'
    }
  },
  {
    path: '/companies/register',
    name: 'CompanyRegister',
    component: RegisterCompany
  },
  {
    path: '/companies/:id/proposals',
    name: 'CompanyProposals',
    component: CompanyProposals,
    props: true,
    meta: {
      requiresAuth: true,
      allowedRole: 'company'
    }
  },
  {
    path: '/companies/:compId/proposals/add',
    name: 'CompanyProposalsAdd',
    component: AddProposal,
    props: true,
    meta: {
      requiresAuth: true,
      allowedRole: 'company'
    }
  },
  {
    path: '/companies/:compId/proposals/:id',
    name: 'PropoosalDetails',
    component: ProposalDetails,
    props: true,
    meta: {
      requiresAuth: true,
      allowedRole: 'company'
    }
  },
  {
    path: '/error404',
    name: 'Error404',
    component: Error404
  },
  {
    path: '/:notFound(.*)',
    redirect: {
      name: 'Error404'
    }
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

/* router.beforeEach((to, from, next) => {
  if (to.meta.requiresAuth && !store.getters.isLoggedIn) {
    next({ name: 'Login' })
    return
  }
  if (!to.meta.allowedRole) {
    next()
    return
  }
  if (to.meta.allowedRole === 'student' && store.getters.getAuthRole === 'student') {
    next()
    return
  }
  if (to.meta.allowedRole === 'company' && store.getters.getAuthRole === 'company') {
    next()
  }
}) */

export default router
