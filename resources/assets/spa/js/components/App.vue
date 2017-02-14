<template>
    <div id="app">
        <div class="spinner-fixed" v-if="loading">
            <div class="spinner">
                <div class="indeterminate"></div>
            </div>
        </div>
        <main>
            <router-view></router-view>
        </main>
        <footer class="page-footer">
            <div class="footer-copyright">
                <div class="container black-text">
                    <strong>© {{ year }} Todos os direitos reservados
                        <a class="black-text" target="_blank" href="http://sisds.com.br"> SISDS-WEB</a></strong>
                </div>
            </div>
        </footer>
    </div>
</template>

<script type="text/javascript">

    export default {
        created(){
            window.Vue.http.interceptors.unshift((request , next) => {
                this.loading = true;
                next(() => this.loading = false);
            });
        },
        data(){
            return{
                year: new Date().getFullYear(),
                loading: false
            }
        }
    };
</script>

<style type="text/css">
    #app{
        display: flex;
        min-height: 100vh;
        flex-direction: column;
    }

    main{
        flex: 1 0 auto;
    }
</style>



