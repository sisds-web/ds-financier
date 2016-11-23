/**
 * Importando os componentes
 */
import LoginComponent from './components/Login.vue';
import LogoutComponent from './components/Logout.vue';
import DashBoardComponent from './components/DashBoard.vue';

export default{
    '/login':{
        name:'auth.login',
        component: LoginComponent,
        auth: false
    },
    '/logout':{
        name:'auth.logout',
        component: LogoutComponent,
        auth: true
    },
    'dashboard':{
        name:'dashboard',
        component: DashBoardComponent,
        auth: true
    }
}