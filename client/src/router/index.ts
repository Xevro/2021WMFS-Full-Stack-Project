import { createRouter, createWebHistory } from 'vue-router'
const Login = () => import('@/views/auth/Login.vue')
const StudentHome = () => import('@/views/students/StudentHome.vue')
const StudentDetails = () => import('@/views/students/StudentDetails.vue')
const StudentTasks = () => import('@/views/students/StudentTasks.vue')
const AddTask = () => import('@/views/students/AddTask.vue')
const CompanyHome = () => import('@/views/company/CompanyHome.vue')
const CompanyProposals = () => import('@/views/company/CompanyProposals.vue')
const RegisterCompany = () => import('@/views/auth/RegisterCompany.vue')
const AddProposal = () => import('@/views/company/AddProposal.vue')
const ProposalDetails = () => import('@/views/company/ProposalDetails.vue')
const Error404 = () => import('@/views/Error404.vue')
const StudentInfoDetails = () => import('@/views/company/StudentInfoDetails.vue')
// import store from '@/store/index'

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
    path: '/students/:id/details',
    name: 'StudentDetails',
    component: StudentInfoDetails,
    props: true,
    meta: {
      requiresAuth: true,
      allowedRole: 'company'
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
    name: 'ProposalDetails',
    component: ProposalDetails,
    props: true,
    meta: {
      requiresAuth: true,
      allowedRole: 'student'
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
  if ((to.meta.allowedRole === 'student' && store.getters.getAuthRole === 'student') || to.meta.allowedRole === 'both') {
    next()
    return
  }
  if (to.meta.allowedRole === 'company' && store.getters.getAuthRole === 'company') {
    next()
  }
}) */

export default router
