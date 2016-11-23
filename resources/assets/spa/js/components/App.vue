<template>
    <div id="app">
        <header>
            <ul v-bind:id='o.id' class='dropdown-content' v-for="o in menusDropdown">
                <li v-for="item in o.items">
                    <a v-link="{name: item.routeName}">
                        {{item.name}}
                    </a>
                </li>
            </ul>
            <div class="navbar-fixed">
                <nav>
                    <div class="nav-wrapper" v-if="testeMenu===true">
                        <a href="#!" class="left hide-on-small-only brand-logo">SISDS Financeiro</a>
                        <a href="#" data-activates="mobile-demo" class="button-collapse">
                            <i class="material-icons">menu</i>
                        </a>
                        <ul class="right hide-on-med-and-down">
                            <li v-for="o in menus">
                                <a v-if="o.dropdownId" class="dropdown-submenu" href="!#" v-bind:data-activates="o.dropdownId">
                                    {{o.name}} <i class="material-icons right">arrow_drop_down</i>
                                </a>
                                <a v-else v-link="{name: o.routeName}">{{o.name}}</a>
                            </li>
                        </ul>
                        <ul class="side-nav" id="mobile-demo">
                            <li v-for="o in menus">
                                <a v-link="{name: o.routeName}">{{o.name}}</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>
        <main>
            <router-view></router-view>
        </main>
        <footer class="page-footer">
            <div class="footer-copyright">
                <div class="container">
                    © {{ year }} Todos os direitos reservados
                    <a class="white-text" target="_blank" href="http://sisds.com.br"> SISDS-WEB</a>
                </div>
            </div>
        </footer>
    </div>
</template>

<script type="text/javascript">
    import Auth from '../services/auth';
    export default {
        ready(){
            this.testeMenu = Auth.checkAuth();
            //if(!Auth.checkAuth()){
           //     this.menus = null;
            //    this.menusDropdown = null;
           // }
            $(".button-collapse").sideNav();
            $(".dropdown-submenu").dropdown();
        },
        data(){
            return{
                year: new Date().getFullYear(),
                testeMenu: false,
                menus:
                        [
                            {name: "DashBoard", routeName: 'dashboard'},
                            {name: "Menu numero 1", routeName: 'dashboard', dropdownId:'menu-1'},
                            {name: "Menu numero 2", routeName: 'dashboard', dropdownId:'menu-2'},
                            {name: "Sair", routeName: 'auth.logout'}
                        ],
                menusDropdown:[
                    {
                        id:'menu-1',items:[
                        {name: "Iten menu 1", routeName: 'dashboard'},
                        {name: "Item menu 1", routeName: 'dashboard'}
                    ]
                    },
                    {
                        id:'menu-2',items:[
                        {name: "Iten menu 2", routeName: 'dashboard'},
                        {name: "Iten menu 2", routeName: 'dashboard'}
                    ]
                    }
                ]
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



