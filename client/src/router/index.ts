import { createRouter, createWebHistory } from 'vue-router'
import store from '@/store/index'
const Error404 = () => import('@/views/Error404.vue')
const Login = () => import('@/views/auth/Login.vue')
const RegisterCompany = () => import('@/views/auth/RegisterCompany.vue')
const StudentHome = () => import('@/views/students/StudentHome.vue')
const StudentDetails = () => import('@/views/students/StudentDetails.vue')
const StudentTasks = () => import('@/views/students/StudentTasks.vue')
const AddTask = () => import('@/views/students/AddTask.vue')
const StudentTaskDetail = () => import('@/views/students/StudentTaskDetail.vue')
const CompanyHome = () => import('@/views/company/CompanyHome.vue')
const CompanyProposals = () => import('@/views/company/CompanyProposals.vue')
const AddProposal = () => import('@/views/company/AddProposal.vue')
const ProposalDetails = () => import('@/views/company/ProposalDetails.vue')
const StudentInfoDetails = () => import('@/views/company/StudentInfoDetails.vue')

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
    component: Login,
    meta: {
      requiresAuth: false,
      allowedRole: 'both'
    }
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
    path: '/students/:studentId/tasks/:taskId',
    name: 'StudentTaskDetail',
    component: StudentTaskDetail,
    props: true,
    meta: {
      requiresAuth: true,
      allowedRole: 'both'
    }
  },
  {
    path: '/students/:id/details',
    name: 'StudentInfoDetails',
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
      allowedRole: 'both'
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

router.beforeEach((to, from, next) => {
  if (to.matched.some((record) => record.meta.requiresAuth)) {
    if (localStorage.getItem('token') === null) {
      next({ name: 'Login', params: { nextUrl: to.fullPath } })
    } else {
      if (to.meta.allowedRole === 'both') {
        next()
      } else if (to.meta.allowedRole === 'student' && store.getters.getAuthRole === 'student') {
        next()
      } else if (to.meta.allowedRole === 'company' && store.getters.getAuthRole === 'company') {
        next()
      } else {
        if (store.getters.getAuthRole === 'company' && to.meta.allowedRole === 'student') {
          next({ name: 'CompanyHome' })
        }
        if (store.getters.getAuthRole === 'student' && to.meta.allowedRole === 'company') {
          next({ name: 'StudentHome' })
        }
        next({ name: 'Login' })
      }
    }
  } else {
    next()
  }
})

export default router
