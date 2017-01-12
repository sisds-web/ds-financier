<template>
    <ul v-bind:id='o.id' class='dropdown-content' v-for="o in menusDropdown">
        <li v-for="item in o.items">
            <a v-link="{name: item.routeName}">
                {{item.name}}
            </a>
        </li>
    </ul>
    <div class="navbar-fixed">
        <nav >
            <div class="nav-wrapper">
                <a href="#!" class="left hide-on-small-only brand-logo orange lighten-3 black-text">SISDS Financeiro&nbsp;</a>
                <a href="#" data-activates="mobile-demo" class="button-collapse">
                    <i class="material-icons">menu</i>
                </a>
                <ul class="right hide-on-med-and-down">
                    <li v-for="o in menus">
                        <a v-if="o.dropdownId" class="dropdown-submenu" href="!#" v-bind:data-activates="o.dropdownId">
                            {{{ o.icon }}}{{o.name}} <i class="material-icons right">arrow_drop_down</i>
                        </a>
                        <a v-else v-link="{name: o.routeName}">{{{ o.icon }}}{{o.name}}</a>
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
    <router-view></router-view>

</template>

<script type="text/javascript">
    import LocalStorage from '../services/localStorage';
    let userOBJ = LocalStorage.getObject('user');
    let user = '';
    if(userOBJ){
        user = userOBJ.name;
    }
    export default {
        ready(){
            $(".button-collapse").sideNav();
            $(".dropdown-submenu").dropdown();
        },
        data(){
            return{
                menus:
                    [
                        {name: "DashBoard", routeName: 'dashboard',icon: '<i class="material-icons left">dashboard</i>'},
                        {name: "Conta bancária", routeName: 'menu', dropdownId:'bank-account',icon: '<i class="material-icons left">account_balance</i>'},
                        {name: user, routeName: 'auth.logout',dropdownId:'menu-user',icon: '<i class="material-icons left">account_box</i>'}
                    ],
                menusDropdown:[
                    {
                        id:'bank-account',items:[
                            {name: "Listar", routeName: 'bank-account-list'},
                            {name: "Cadastrar", routeName: 'bank-account-create'}
                        ]
                    },
                    {
                        id:'menu-user',items:[
                            {name: "logout", routeName: 'auth.logout'}
                        ]
                    }
                ]
            }
        }
    };
</script>



