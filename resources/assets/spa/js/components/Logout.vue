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
            <div class="card-panel col s8 offset-s2 z-depth-2">
                <h5 class="center">Saindo do Sistema...</h5>
                <div class="progress">
                    <div class="indeterminate"></div>
                </div>
            </div>
        </div>
    </div>
</template>

<script type="text/javascript">

    import Auth from '../services/auth';

    export default{
        ready(){
            setTimeout(() => {
                this.logout();
            },1000);
        },
        methods: {
            logout(){
                let goToLogin = () => this.$router.go({name: 'auth.login'});
                Auth.logout()
                        .then(goToLogin)
                        .catch(goToLogin);
            }
        }
    }
</script>