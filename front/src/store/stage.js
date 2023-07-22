import axios from "axios"

const Stage = {
    state: {
        stage: {}
    },
    getters: {
        StageStore(state) {
            return state.stage
        }
    },
    mutations: {
        StageGETBlock(state,value) {
            state.stage=value 
        }
    },
    actions: {
        AxsiosStoreStage({commit}) {
                axios('/api/data.json',{
                    method:'GET'
                })
                
                .then((res)=>{
                    commit('SladerGETBlock',res.data.stage)
                    return res.data.social
                })
        }
    },
}

export default Stage