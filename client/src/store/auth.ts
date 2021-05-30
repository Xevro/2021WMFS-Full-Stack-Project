import { myAxios } from '@/main'

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
    getAuthRole: ({ user }: State): string => user?.role
  },
  mutations: {
    setUser (state: State, data: User) {
      state.user = data
    }
  },
  actions: {
    async tryAutoLogin () {
      if (document.cookie.indexOf('XSRF-TOKEN') === -1) { // reject, geen cookie aanwezig
      }
    },
    async logIn ({ commit }:any, formData: any) {
      await myAxios.get('sanctum/csrf-cookie')
      const { data } = await myAxios.post('client/login', formData)
      commit('setUser', data)
      return data
    },
    async logOut (commit: any) {
      // todo: remove/expire cookies
      await myAxios.post('sanctum/logout')
      commit('setUser', null)
      commit('setAuthentication', false)
      document.cookie = 'XSRF-TOKEN=;path=/;expires=Thu, 01 Jan 1970 00:00:00 UTC; Secure;'
    }
  }
}
