import axios from "axios"


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
            const items = response.data.data.map(item => {
            switch (item.id) {
              case 2:
                this.$set(item, 'to', {
                  name: 'QuestionnairePage'
                });
                break;
              case 3:
                this.$set(item, 'to', {
                  name: 'ManagmentPage'
                });
                break;
              case 4:
                this.$set(item, 'to', {
                  name: 'TaskPage'
                });
                break;
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