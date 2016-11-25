<template>
    <div id="app">
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
        data(){
            return{
                year: new Date().getFullYear()
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



