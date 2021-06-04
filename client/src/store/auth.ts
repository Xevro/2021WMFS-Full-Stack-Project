import { myAxios } from '@/main'
import router from '@/router/index'

interface User {
  id: number,
  email: string,
  role: string
}

interface State {
  user: User
}

export default {
  namespaced: false,
  state: {
    user: null
  },
  getters: {
    isLoggedIn: ({ user }: State): boolean => !!user,
    getAuthRole: () => localStorage.getItem('role'),
    getCompanyId: () => localStorage.getItem('companyId'),
    getStudentId: () => localStorage.getItem('studentId')
  },
  mutations: {
    setUser (state: State, data: User) {
      state.user = data
    },
    setAuthRole (state: State, role: any) {
      state.user.role = role
    },
    setCompanyId (state: any, id: number) {
      localStorage.setItem('companyId', String(id))
    },
    setStudentId (state: any, id: number) {
      localStorage.setItem('studentId', String(id))
    }
  },
  actions: {
    async sendRegisterRequest ({ commit }:any, formData: any) {
      const res = await myAxios.get('sanctum/csrf-cookie')
      if (res.status === 204) {
        localStorage.clear()
        localStorage.setItem('token', res.config.headers['X-XSRF-TOKEN'].substring(0, res.config.headers['X-XSRF-TOKEN'].length - 1))
      }
      const { data } = await myAxios.post('api/register/companies', formData)
      commit('setUser', data[0])
      localStorage.setItem('role', data[0].role)
      commit('setCompanyId', data[0].company.id)
      await router.push({ name: 'CompanyHome', params: { id: data[0].company.id } })
    },
    async tryAutoLogIn ({ commit }:any) {
      try {
        await myAxios.get('api/user').then(response => {
          commit('setUser', response.data)
          localStorage.setItem('role', response.data.role)
        })
      } catch (e) {
        console.log('Error: ' + e)
      }
    },
    async logIn ({ commit }:any, formData: any) {
      const res = await myAxios.get('sanctum/csrf-cookie')
      if (res.status === 204) {
        localStorage.clear()
        localStorage.setItem('token', res.config.headers['X-XSRF-TOKEN'].substring(0, res.config.headers['X-XSRF-TOKEN'].length - 1))
      }
      const { data } = await myAxios.post('client/login', formData)
      commit('setUser', data[0])
      localStorage.setItem('role', data[0].role)
      if (data[0].role === 'student') {
        commit('setStudentId', data[0].student.id)
        await router.push({ name: 'StudentHome' })
      } else if (data[0].role === 'company') {
        commit('setCompanyId', data[0].company.id)
        await router.push({ name: 'CompanyHome', params: { id: data[0].company.id } })
      }
    },
    async logOut ({ commit }:any) {
      localStorage.clear()
      document.cookie = 'XSRF-TOKEN=;path=/;expires=Thu, 01 Jan 1970 00:00:00 UTC; Secure;'
      await myAxios.post('client/logout')
      commit('setUser', { id: null, email: null, role: null })
      await router.push({ name: 'Login' })
    }
  }
}
