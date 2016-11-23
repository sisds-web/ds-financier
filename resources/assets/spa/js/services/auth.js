/**
 * Serviço responsável pela parte de autenticação da aplicação Cliente
 */
import {Jwt} from './resources';
import LocalStorage from './localStorage';
import {User} from '../services/resources';

const TOKEN = 'token';
const USER = 'user';

/**
 * Gravando o Usuário no LocalStorage
 * @param response
 */
const afterLogin = (response) => {
    User.get()
        .then((response) => LocalStorage.setObject(USER,response.data));
};

export default {
    login(email,password){
        return Jwt.accessToken(email,password).then((response) =>{
            LocalStorage.set(TOKEN,response.data.token);
            afterLogin(response);
            return response;
        });
    },
    logout(){

        let afterLogout = () =>{
            this.clearAuth();
        };

        return Jwt.logout().then(afterLogout()).catch(afterLogout());
    },
    refreshToken(){
        return Jwt.refreshToken().then((response) => {
            LocalStorage.set(TOKEN,response.data.token);
            return response;
        });
    },
    getAutorizationHeader(){
        return `Bearer ${LocalStorage.get(TOKEN)}`;
    },
    user(){//Retornando o usuario em formato de objeto JS
        return LocalStorage.getObject(USER);
    },
    checkAuth(){
        return LocalStorage.get(TOKEN) ? true : false;
    },
    clearAuth(){
        LocalStorage.remove(TOKEN);
        LocalStorage.remove(USER);
    }
}