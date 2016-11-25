/**
 * Importando os componentes
 */
import AppComponent from './components/App.vue';
import routerMap from './router.map';
import VueRouter from 'vue-router';
import Auth from './services/auth';

/**
 * Criando o Vue-Router
 */
const router = new VueRouter();

/**
 * Criando as Rotas
 */
router.map(routerMap);

/**
 * Criando help de autenticação
 */
router.beforeEach(({to,next}) => {
    if(to.auth && !Auth.checkAuth()){
        return router.go({name: 'auth.login'});
    }
    next();
});
/**
 * iniciando os componentes da aplicação
 */
router.start({
    components:{
        'app': AppComponent
    }
},'body');

router.redirect({
    '*': '/'
});