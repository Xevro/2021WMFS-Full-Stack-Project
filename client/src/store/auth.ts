import { myAxios } from '@/main'

export default {
  namespaced: true,
  state: {
    user: null
  },
  getters: {
    isLoggedIn: function (state: any) {
      return !!state.user
    }
  },
  mutations: {
    setUser (state: any, data: any) {
      state.user = data
    }
  },
  actions: {
    // async tryLogIn ({ commit }) {
    // todo: check validity of cookies first
    //  const { data } = await myAxios.get('api/auth/user')
    //  commit('setUser', data)
    // },
    async logIn ({ commit }:any, formData: any) {
      await myAxios.get('sanctum/csrf-cookie')
      const { data } = await myAxios.post('client/login', formData)
      commit('setUser', data)
    },
    async logOut (commit: any) {
      // todo: remove/expire cookies
      await myAxios.post('sanctum/logout')
      commit('setUser', null)
    }
  }

}
