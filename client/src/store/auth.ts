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
    user: null,
    authRole: null
  },
  getters: {
    isLoggedIn: ({ user }: State): boolean => !!user,
    getAuthRole: ({ user }: State): string => user?.role,
    getCompanyId: () => localStorage.getItem('companyId')
  },
  mutations: {
    setUser (state: State, data: User) {
      state.user = data
    },
    setCompanyId (state: any, id: number) {
      localStorage.setItem('companyId', String(id))
    }
  },
  actions: {
    /* getUserData ({ commit }:any) {
      return 'louis'
      await myAxios.get('/api/user')
        .then(response => {
          commit('setUser', response)
        })
        .catch(() => {
          localStorage.removeItem('authToken')
        })
    }, */
    async sendRegisterRequest ({ commit }:any, data: any) {
      return await myAxios.post('/client/register', data)
        .then(response => {
          commit('setUser', response.data)
        })
    },
    async tryAutoLogIn ({ commit }:any, route: any) {
      if (document.cookie.indexOf('XSRF-TOKEN') !== -1) {
        try {
          const userInfo = await myAxios.get('api/user')
          commit('setUser', userInfo)
          // console.log(route)
          // await router.push(route.href.fullPath)
        } catch (e) {
          console.log('Error: ' + e)
        }
      }
    },
    async logIn ({ commit }:any, formData: any) {
      await myAxios.get('sanctum/csrf-cookie')
      const { data } = await myAxios.post('client/login', formData)
      commit('setUser', data[0])
      console.log(data[0].company.id)
      if (data[0].role === 'company') {
        commit('setCompanyId', data[0].company.id)
      }
      return data[0]
    },
    async logOut ({ commit }:any) {
      document.cookie = 'XSRF-TOKEN=;path=/;expires=Thu, 01 Jan 1970 00:00:00 UTC; Secure;'
      await myAxios.post('client/logout')
      commit('setUser', { id: null, email: null, role: null })
      await router.push({ name: 'Login' })
    }
  }
}
