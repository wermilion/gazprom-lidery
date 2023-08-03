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
    meta:{
      title: 'Лидеры Газпрома'
    }
    
  },
  {
    path:'/form',
    name:'QuestionnairePage',
    component:QuestionnairePage,
    meta: { 
      title:'Анкета | Лидеры Газпрома',
      shouldRenderBlock: true 
    }

  },
  {
    path:'/task',
    name:'TaskPage',
    component:QuestionnairePage,
    meta: { 
      title:'Задача | Лидеры Газпрома',
      shouldRenderBlock: true 
    }
  },
  {
    path:'/management',
    name:'ManagmentPage',
    component:QuestionnairePage,
    meta: { 
      title:'Управленческие решения | Лидеры Газпрома',
      shouldRenderBlock: true 
    }
  },
  {
    path:'/login',
    name:'EntranceBlock',
    component: Entrance,
    meta:{
      title: 'Авторизация | Лидеры Газпрома'
    }
  },
  {
    path:'/changing_password',
    name:'ChangingThePassword',
    component: ChangingThePassword,
    meta:{
      title: 'Смена пароля | Лидеры Газпрома'
    }
  },
  {
    path:'/stages',
    name:'StagesCompetitionBlock',
    component: StagesCompetition,
    meta: { 
      title: 'Этапы конкурса | Лидеры Газпрома',
      shouldRenderBlock: true 
    }
  },
  {
    path:'*',
    name:'Page404',
    component: Page404,
     meta:{
      title: 'Ошибка 404 | Лидеры Газпрома'
    }
  },
]







const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes,
  scrollBehavior(to, from, savedPosition) {
  if (savedPosition) {
    return savedPosition
  } else {
    return { x: 0, y: 0 }
  }
}
});

router.beforeEach((to, from, next) => {

  if (to.meta.title) {
    document.title = to.meta.title;
  }

  next();
});
export default router
