/**
 * Importando os componentes
 */
import LoginComponent from './components/Login.vue';
import MenuComponent from './components/Menu.vue';
import LogoutComponent from './components/Logout.vue';
import DashBoardComponent from './components/DashBoard.vue';
import ExampleComponent from './components/help/Help.vue';
import BankAccountListComponent from './components/bank-account/BankAccountList.vue';
import BankAccountCreateComponent from './components/bank-account/BankAccountCreate.vue';
import BankAccountUpdateComponent from './components/bank-account/BankAccountUpdate.vue';

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
            },
            '/bank_account':{
                name: 'bank-account-list',
                component: BankAccountListComponent,
                auth: true
            },
            '/bank_account/create':{
                name: 'bank-account-create',
                component: BankAccountCreateComponent,
                auth: true
            },
            '/bank_account/:id/edit':{
                name: 'bank-account-edit',
                component: BankAccountUpdateComponent,
                auth: true
            }
        }
    },
    '*':{
        component: LoginComponent
    }
}