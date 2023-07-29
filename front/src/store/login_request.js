import axios from "axios"
import router from "@/router"


const Login = {
    state: {
        id: '',
        status:true
    },
    getters: {
        userId(state) {
            return state.id
        },
        userStatus(state) {
            return state.status
        }
    },
    mutations: {
      setId(state, id) {
        state.id = id;
      },
      setStatus(state, status) {
        state.status = status;
      }
    },
    actions: {
      async POST({ commit }, data) {
        try {
          const response = await axios.post('https://gazprom-lidery-dev.tomsk-it.ru/api/profile/login', data);

          if (response.data.custom_password === true) {
            router.push({ name: 'StagesCompetitionBlock' });
          } else {
            router.push({ name: 'ChangingThePassword' });
          }

          commit('setId', response.data.id);
        } catch (error) {
          commit('setStatus', error.status);
        }
      }
    }
}

export default Login