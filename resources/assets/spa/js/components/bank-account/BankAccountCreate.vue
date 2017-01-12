<template>
    <div class="container">
        <div class="card-panel orange lighten-3">
            <span>
                <strong>
                    <i class="material-icons left">account_balance</i>Cadastrar nova conta
                </strong>
            </span>
        </div>
    </div>
    <div class="container z-depth-1">
        <div class="card-panel">
            <form method="POST" @submit.prevent="salvar()" action="">
                <div class="row">
                    <label class="active">Banco</label>
                    <select id="bank_id"  class="browser-default" v-model="bankAccount.bank_id">
                        <option value="" disabled selected>Informe um banco</option>
                        <option v-for="o in banks" :value="o.id">{{ o.name }}</option>
                    </select>
                </div>
                <div class="row">
                    <label class="active">Nome</label>
                    <input type="text" v-model="bankAccount.name">
                </div>
                <div class="row">
                    <label class="active">Agência</label>
                    <input type="text" v-model="bankAccount.agency" >
                </div>
                <div class="row">
                    <label class="active">Conta</label>
                    <input placeholder="0.00" type="text" v-model="bankAccount.account">
                </div>
                <div class="row">
                    <button class="btn waves-effect waves-light">
                        <i class="material-icons right">send</i>Salvar
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>

<script type="application/javascript">

    import {BankAccount,Bank} from '../../services/resources';


    export default {
        data() {
            return {
                banks:[],
                bankAccount:{
                    id:0,
                    name:'',
                    agency:'',
                    account:'',
                    bank_id:''
                }
            };
        },
        created(){

           // BankAccount.query().then((response)=>{
            //    this.bankAccount = response.data;
            //});

            Bank.query().then((response)=>{
                this.banks = response.data;
            });
        },
        methods:{
            salvar(){
                BankAccount.save({},this.bankAccount).then((response)=>{
                    Materialize.toast('<strong><i class="material-icons left">done</i>Conta cadastrada com sucesso</strong>'
                        ,4000,'green lighten-3');
                    this.$router.go({name: 'bank-account-list'});
                });
            }
        }
    }

</script>