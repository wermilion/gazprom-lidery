import Vue from 'vue'
import VueRouter from 'vue-router'
import Page404 from '@/views/404/404Page.vue'
import MainPage from '@/views/MainPage/MainPage.vue'
import Entrance from "@/views/PersonalAccountPage/Entrance.vue"
import ChangingThePassword from '@/views/PersonalAccountPage/ChangingThePassword.vue'
import StagesCompetition from "@/components/Account/StagesCompetition.vue"
import QuestionnairePage from "@/views/QuestionnairePage/QuestionnairePage.vue"


Vue.use(VueRouter)

const routes = [
  {
    path:'/',
    name:'MainPage',
    component: MainPage,
    
  },
  
  {
    path:'/questionnaire_page',
    name:'QuestionnairePage',
    component:QuestionnairePage,
    meta: { shouldRenderBlock: true }

  },
  {
    path:'/task_page',
    name:'TaskPage',
    component:QuestionnairePage,
    meta: { shouldRenderBlock: true }
  },
  {
    path:'/managment_page',
    name:'ManagmentPage',
    component:QuestionnairePage,
    meta: { shouldRenderBlock: true }
  },
  {
    path:'/entrance',
    name:'EntranceBlock',
    component: Entrance
  },
  {
    path:'/changing_the_password',
    name:'ChangingThePassword',
    component: ChangingThePassword
  },
  {
    path:'/stages_competition',
    name:'StagesCompetitionBlock',
    component: StagesCompetition,
    meta: { shouldRenderBlock: true }
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
