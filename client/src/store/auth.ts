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
    authRole: null,
    companyId: null
  },
  getters: {
    isLoggedIn: ({ user }: State): boolean => !!user,
    getAuthRole: ({ user }: State): string => user?.role,
    getCompanyId: ({ companyId }: any): number => companyId
  },
  mutations: {
    setUser (state: State, data: User) {
      state.user = data
    },
    setCompanyId (state: any, id: number) {
      state.companyId = id
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
          // router.push(route.href.fullPath)
        } catch (e) {
          console.log('Error: ' + e)
        }
      }
    },
    async logIn ({ commit }:any, formData: any) {
      await myAxios.get('sanctum/csrf-cookie')
      const { data } = await myAxios.post('client/login', formData)
      commit('setUser', data)
      return data
    },
    async logOut (commit: any) {
      await myAxios.post('client/logout')
      commit('setUser', null)
      // document.cookie = 'XSRF-TOKEN=;path=/;expires=Thu, 01 Jan 1970 00:00:00 UTC; Secure;'
      // router.push({ name: 'Login' })
    }
  }
}
