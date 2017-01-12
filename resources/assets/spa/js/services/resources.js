/**
 * Objetos
 */
export class Jwt{
    static accessToken(email,password){
        return Vue.http.post('access-token',{
            email: email,
            password: password
        });
    }

    static logout(){
        return Vue.http.post('logout');
    }

    static refreshToken(){
        return Vue.http.post('refresh-token');
    }
}

let User = Vue.resource('user');
let BankAccount = Vue.resource('bank_accounts{/id}');
let Bank = Vue.resource('banks')

export {User,BankAccount,Bank};