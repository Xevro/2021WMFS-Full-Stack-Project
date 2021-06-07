import { createRouter, createWebHistory } from 'vue-router'
import store from '@/store/index'

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
    component: () => import('@/views/auth/Login.vue'),
    meta: {
      title: 'Login - Stagetool',
      requiresAuth: false,
      allowedRole: 'both'
    }
  },
  {
    path: '/students',
    name: 'StudentHome',
    component: () => import('@/views/students/StudentHome.vue'),
    meta: {
      title: 'Student home - Stagetool',
      requiresAuth: true,
      allowedRole: 'student'
    }
  },
  {
    path: '/students/:id',
    name: 'StudentDetails',
    component: () => import('@/views/students/StudentDetails.vue'),
    props: true,
    meta: {
      title: 'Student details - Stagetool',
      requiresAuth: true,
      allowedRole: 'student'
    }
  },
  {
    path: '/students/:id/tasks',
    name: 'StudentTasks',
    component: () => import('@/views/students/StudentTasks.vue'),
    props: true,
    meta: {
      title: 'Student taken overzicht - Stagetool',
      requiresAuth: true,
      allowedRole: 'student'
    }
  },
  {
    path: '/students/:studentId/tasks/:taskId',
    name: 'StudentTaskDetail',
    component: () => import('@/views/students/StudentTaskDetail.vue'),
    props: true,
    meta: {
      title: 'Taken detail - Stagetool',
      requiresAuth: true,
      allowedRole: 'both'
    }
  },
  {
    path: '/students/:id/details',
    name: 'StudentInfoDetails',
    component: () => import('@/views/company/StudentInfoDetails.vue'),
    props: true,
    meta: {
      title: 'Student informatie - Stagetool',
      requiresAuth: true,
      allowedRole: 'company'
    }
  },
  {
    path: '/students/:id/tasks/add',
    name: 'StudentAddTask',
    component: () => import('@/views/students/AddTask.vue'),
    props: true,
    meta: {
      title: 'Voeg een taak toe - Stagetool',
      requiresAuth: true,
      allowedRole: 'student'
    }
  },
  {
    path: '/companies',
    name: 'CompanyHome',
    component: () => import('@/views/company/CompanyHome.vue'),
    meta: {
      title: 'Company home - Stagetool',
      requiresAuth: true,
      allowedRole: 'company'
    }
  },
  {
    path: '/companies/register',
    name: 'CompanyRegister',
    component: () => import('@/views/auth/RegisterCompany.vue'),
    meta: {
      title: 'Registreer bedrijf - Stagetool'
    }
  },
  {
    path: '/companies/:id/proposals',
    name: 'CompanyProposals',
    component: () => import('@/views/company/CompanyProposals.vue'),
    props: true,
    meta: {
      title: 'Company voorstellen - Stagetool',
      requiresAuth: true,
      allowedRole: 'company'
    }
  },
  {
    path: '/companies/:compId/proposals/add',
    name: 'CompanyProposalsAdd',
    component: () => import('@/views/company/AddProposal.vue'),
    props: true,
    meta: {
      title: 'Voeg een voorstel toe - Stagetool',
      requiresAuth: true,
      allowedRole: 'company'
    }
  },
  {
    path: '/companies/:compId/proposals/:id',
    name: 'ProposalDetails',
    component: () => import('@/views/company/ProposalDetails.vue'),
    props: true,
    meta: {
      title: 'Voorstel detail - Stagetool',
      requiresAuth: true,
      allowedRole: 'both'
    }
  },
  {
    path: '/error404',
    name: 'Error404',
    component: () => import('@/views/Error404.vue'),
    meta: {
      title: 'Error 404 - Stagetool'
    }
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
  if (to.matched.slice().reverse().find(r => r.meta && r.meta.title)) {
    document.title = String(to.meta.title)
  }

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
