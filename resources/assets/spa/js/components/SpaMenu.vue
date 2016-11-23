<template>
    <ul v-bind:id='o.id' class='dropdown-content' v-for="o in menusDropdown">
        <li v-for="item in o.items">
            <a v-link="{name: item.routeName}">
                {{item.name}}
            </a>
        </li>
    </ul>
    <div class="navbar-fixed">
        <nav class="blue-grey lighten-1">
            <div class="nav-wrapper">
                <a href="#!" class="right hide-on-small-only brand-logo">Code Contas</a>
                <a href="#" data-activates="mobile-demo" class="button-collapse">
                    <i class="material-icons">menu</i>
                </a>
                <ul class="hide-on-med-and-down">
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
</template>

<script type="text/javascript">
    export default {
        ready(){
            $(".button-collapse").sideNav();
            $(".dropdown-submenu").dropdown();
        },
        data(){
            return{
                menus:
                        [
                            {name: "Contas a Pagar", routeName: 'dashboard', dropdownId:'menu-1'},
                            {name: "Contas a Receber", routeName: 'dashboard', dropdownId:'menu-2'},
                            {name: "DashBoard", routeName: 'dashboard'}
                        ],
                menusDropdown:[
                    {
                        id:'menu-1',items:[
                        {name: "Listar Contas", routeName: 'dashboard'},
                        {name: "Nova Conta", routeName: 'dashboard'}
                    ]
                    },
                    {
                        id:'menu-2',items:[
                        {name: "Listar Contas", routeName: 'dashboard'},
                        {name: "Nova Conta", routeName: 'dashboard'}
                    ]
                    }
                ]
            };
        }
    };
</script>



