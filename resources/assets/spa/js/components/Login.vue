<template>
    <header>
        <div class="navbar-fixed">
            <nav >
                <div class="nav-wrapper">
                    <a href="#!" class="left hide-on-small-only brand-logo orange lighten-3 black-text">SISDS Financeiro&nbsp;</a>
                </div>
            </nav>
        </div>
    </header>
    <div class="container">
        <div class="row" style="margin-top: 5%;">
            <div class="col s8 offset-s2 z-depth-2">
                <h5 class="center">SISDS-Financeiro</h5>
                <div class="row" v-if="error.error">
                    <div class="col s12">
                        <div class="card-panel red lighten-1">
                            <span class="white-text"><i class="material-icons left">report_problem</i>{{error.message}}</span>
                        </div>
                    </div>
                </div>
                <form method="POST" @submit.prevent="login()">
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="email" type="email" class="validate" name="email" v-model="user.email" required autofocus>
                            <label for="email" class="active">E-Mail</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <input id="password" type="password" class="validate" name="password"
                                   v-model="user.password" required>
                            <label for="password" class="active">Senha</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <button type="submit" class="btn">Entrar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script type="text/javascript">

    import Auth from '../services/auth';

    export default{
        data(){
            return{
                user: {
                    email:'',
                    password: ''
                },
                error:{
                    error: false,
                    message: ''
                }
            }
        },
        methods: {
            login(){
                Auth.login(this.user.email,this.user.password)
                        .then(() => this.$router.go({name: 'menu'}))
                        .catch((responseError) => {
                            switch (responseError.status){
                                case 401:
                                    this.error.message = responseError.data.message;
                                    break;
                                default:
                                    this.error.message = 'Falha no Login';
                            }
                            this.error.error = true;
                        });
            }
        }
    }
</script>