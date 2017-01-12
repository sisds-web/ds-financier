<template>
    <div class="container">
        <div class="card-panel orange lighten-3">
            <span>
                <strong>
                    <i class="material-icons left">account_balance</i>Atualizar conta
                </strong>
            </span>
        </div>
    </div>
    <div class="container z-depth-1">
        <div class="card-panel">
            <form method="GET" action="">
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
                    <button class="btn waves-effect waves-light" @click.prevent="submit()">
                        <i class="material-icons right">send</i>Salvar
                    </button>
                    <button class="btn waves-effect waves-light blue-grey lighten-2"
                            @click.prevent="openModalDelete(bankAccount)">
                        <i class="material-icons right">delete</i>Excluir
                    </button>
                </div>
            </form>
        </div>
    </div>

    <modal :modal="modal">
        <div slot="content"  v-if="bankAccountToDelete">
            <p class="red-text"><strong>Deseja realmente excluir esta conta?</strong></p>
            <div class="divider"></div>
            <p>Name: <strong>{{ bankAccountToDelete.name }}</strong></p>
            <p>Agência: <strong>{{ bankAccountToDelete.agency }}</strong></p>
            <p>Conta: <strong>{{ bankAccountToDelete.account }}</strong></p>
            <div class="divider"></div>
        </div>
        <div slot="footer">
            <button class="btn modal-action modal-close waves-effect
            green lighten-4 btn-flat" @click="excluirConta(bankAccount.id)">OK</button>
            <button class="btn modal-action modal-close waves-effect
            red lighten-4 btn-flat">Cancelar</button>
        </div>
    </modal>

</template>

<script type="application/javascript">

    import {BankAccount,Bank} from '../../services/resources';
    import modalComponent from '../../../../_default/components/Modal.vue';

    export default{
        components:{
            'modal': modalComponent
        },
        data(){
            return{
                banks: [],
                bankAccount: {
                    name:'',
                    agency:'',
                    account:'',
                    'default': false
                },
                bankAccountToDelete: null,
                modal:{
                    id: 'modal-delete'
                }
            };
        },
        created(){

            this.getBanks();
            this.getBankAccount(this.$route.params.id);

        },
        methods:{
            submit(){

                let id = this.$route.params.id;
                BankAccount.update({id: id},this.bankAccount).then((response) => {
                    Materialize.toast('<strong><i class="material-icons left">done</i>Conta alterada com sucesso</strong>'
                        ,4000,'green lighten-3');
                    //this.$router.go({name: 'bill-pay.list'});
                });
            },
            getBankAccount(id){
                BankAccount.get({id: id}).then((response) => {
                    this.bankAccount = response.data;
                });
            },
            getBanks(){
                Bank.query().then((response)=>{
                    this.banks = response.data;
                });
            },
            openModalDelete(bankAccount){
                this.bankAccountToDelete = bankAccount;
                $('#modal-delete').modal('open');
            },
            excluirConta(id){
                BankAccount.delete({id: id}).then((response) =>{
                    Materialize.toast('<strong><i class="material-icons left">done</i>Conta excluida com sucesso</strong>'
                        ,4000,'green lighten-3');
                    this.$router.go({name: 'bank-account-list'});
                });
            }
        }
    }

</script>