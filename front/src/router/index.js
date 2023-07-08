import Vue from 'vue'
import VueRouter from 'vue-router'
import Page404 from '@/views/404/404Page.vue'
import MainPage from '@/views/MainPage/MainPage.vue'
import Entrance from "@/views/PersonalAccountPage/Entrance.vue"
import StagesCompetition from "@/components/Account/StagesCompetition.vue"

Vue.use(VueRouter)

const routes = [
  {
    path:'/',
    name:'MainPage',
    component: MainPage
  },
  {
    path:'/entrance',
    name:'EntranceBlock',
    component: Entrance
  },
  {
    path:'/changing_the_password',
    name:'ChangingThePassword',
    component: Entrance
  },
  {
    path:'/stages_competition',
    name:'StagesCompetitionBlock',
    component: StagesCompetition
  },
  {
    path:'*',
    name:'Page404',
    component: Page404
  },
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router