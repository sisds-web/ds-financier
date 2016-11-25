/**
 * Importando os componentes
 */
import LoginComponent from './components/Login.vue';
import MenuComponent from './components/Menu.vue';
import LogoutComponent from './components/Logout.vue';
import DashBoardComponent from './components/DashBoard.vue';
import ExampleComponent from './components/help/Help.vue';

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
    '/':{
        name: 'menu',
        component: MenuComponent,
        auth: true,
        subRoutes:{
            '/':{
                name: 'dashboard',
                component: DashBoardComponent,
                auth: true
            },
            '/help':{
                name:'help',
                component: ExampleComponent,
                auth: true
            }
        }
    },
    '*':{
        component: LoginComponent
    }
}