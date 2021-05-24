import { createRouter, createWebHistory } from 'vue-router'
import StudentHome from '../views/students/StudentHome.vue'
import LoginStudent from '../views/auth/LoginStudent.vue'
import LoginCompany from '../views/auth/LoginCompany.vue'
import AddTask from '../views/students/AddTask.vue'
import ProposalDetails from '../views/company/ProposalDetails.vue'
import RegisterCompany from '../views/auth/RegisterCompany.vue'
import CompanyHome from '../views/company/CompanyHome.vue'
import CompanyProposals from '@/views/company/CompanyProposals.vue'
import StudentDetails from '@/views/students/StudentDetails.vue'
import AddProposal from '@/views/company/AddProposal.vue'
import StudentTasks from '@/views/students/StudentTasks.vue'
import Error404 from '@/views/Error404.vue'

const routes = [
  {
    path: '/',
    redirect: {
      name: 'studentTasks'
    }
  },
  {
    path: '/students',
    name: 'studentHome',
    component: StudentHome
  },
  {
    path: '/students/:id',
    name: 'studentDetails',
    component: StudentDetails
  },
  {
    path: '/students/tasks',
    name: 'studentTasks',
    component: StudentTasks
  },
  {
    path: '/students/tasks/add',
    name: 'studentAddTask',
    component: AddTask
  },
  {
    path: '/students/login',
    name: 'studentLogin',
    component: LoginStudent
  },
  {
    path: '/companies',
    name: 'Company Home',
    component: CompanyHome
  },
  {
    path: '/companies/login',
    name: 'companyLogin',
    component: LoginCompany
  },
  {
    path: '/companies/register',
    name: 'companyRegister',
    component: RegisterCompany
  },
  {
    path: '/companies/proposals',
    name: 'companyProposals',
    component: CompanyProposals
  },
  {
    path: '/companies/proposals/add',
    name: 'companyProposalsAdd',
    component: AddProposal
  },
  {
    path: '/companies/proposals/:id',
    name: 'propoosalDetails',
    component: ProposalDetails,
    props: true
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

export default router
