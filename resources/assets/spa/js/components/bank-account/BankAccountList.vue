<template>
    <div class="container">
        <div class="card-panel orange lighten-3">
            <span>
                <strong>
                    <i class="material-icons left">account_balance</i>Contas bancárias
                </strong>
            </span>
        </div>
    </div>
    <div class="container z-depth-1">
        <table class="bordered striped responsive-table">
            <thead>
            <tr>
                <th class="center">#</th>
                <th class="center">Nome</th>
                <th class="center">Agência</th>
                <th class="center">Conta</th>
                <th class="center">Ação</th>
            </tr>
            </thead>
            <tbody>
            <!-- LISTANDO O CONTEÚDO DINAMICAMENTE COM LAÇO "v-for" -->
            <tr v-for="(index,o) in bankAccounts">
                <td class="center" :class="{'green lighten-2': o.default==1}">{{o.id}}</td>
                <td class="center" :class="{'green lighten-2': o.default==1}">{{o.name }}</td>
                <td class="center" :class="{'green lighten-2': o.default==1}">{{o.agency }}</td>
                <td class="center" :class="{'green lighten-2': o.default==1}">{{o.account }}</td>
                <td class="center" :class="{'green lighten-2': o.default==1}">
                    <a v-link="{name: 'bank-account-edit', params: {id: o.id}}">
                        <i class="material-icons">mode_edit</i>
                    </a>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script type="text/javascript">
    import {BankAccount} from '../../services/resources';


    export default {
        data(){
            return{
                bankAccounts: []
            };
        },
        created(){
            //RECUPERANDO OS DADOS DA API DE SERVIÇO VIA AJAX USANDO RESOURCE
           this.getBankAccounts();
        },
        methods:{
            getBankAccounts(){
                BankAccount.query().then((response) => {
                    this.bankAccounts = response.data;

                });
            }
        }
    };
</script>
