import axios from "axios"
import router from "@/router"


const Login = {
    state: {
        id: null,
        status:true
    },
    getters: {
        userId(state) {
            return state.id
        },
        userStatus(state) {
            return state.status
        },
        isAuthenticated(state) {
          return !!state.id
        }
    },
    mutations: {
      setId(state, id) {
        state.id = id;
      },
      setStatus(state, status) {
        state.status = status;
      },
      LogoutPost(state) {
        state.id = null;
        state.status = true;
      }
    },
    actions: {
      LogoutPost({commit}) {
        return new Promise((resolve, reject) => {
          axios.post('/api/profile/logout')
              .then(response => {
                resolve(response)
                commit('LogoutPost')
                router.push('/')
              })
              .catch(error => { 
                reject(error) 
                router.push('/')
              })
        })
        
      },
      async POST({ commit }, data) {
        try {
          const response = await axios.post('/api/profile/login', data);

          commit('setId', response.data.id);

          if (response.data.custom_password === true) {
            router.push({ name: 'ChangingThePassword' });
          } else {
            router.push({ name: 'StagesCompetitionBlock' });
          }
        } catch (error) {
          commit('setStatus', error.status);
        }
      }
    }
}

export default Login