import axios from "axios";



const Stage = {
    state: {
      items: []
    },
    getters: {
        Items(state) {
            return state.items
        }
    },
    mutations: {
      setItems(state, items) {
        state.items = items
      }
    },
    actions: {
      getStages(context) {
        axios.get('https://gazprom-lidery-dev.tomsk-it.ru/api/stages')
          .then(response => {
            const items = response.data.data.map((item) => {
              let to = null
              switch (item.id) {
                case 2:
                  to = {
                    name: 'QuestionnairePage'
                  }
                  break;
                case 3:
                  to = {
                    name: 'ManagmentPage'
                  }
                  break;
                case 4:
                  to = {
                    name: 'TaskPage'
                  }
                  break;
              }
              return {
                ...item,
                to,
              }
            })
            console.log()
            context.commit('setItems', items)
          })
          .catch(error => {
            console.error(error);
          });
      }
  }
}

export default Stage