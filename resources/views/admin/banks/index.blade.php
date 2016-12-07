@extends('layouts.admin')

@section('content')
    <div class="row">
        <div  class="col s1"></div>
        <div class="col s10">
            <br>
            <nav>
                <div class="nav-wrapper">
                    <div class="col s12">
                        <i class="medium material-icons left">business</i>
                        <a href="#!" class="breadcrumb">Lista de bancos</a>
                    </div>
                </div>
            </nav>
        </div>
        <div  class="col s1"></div>
    </div>
    <div class="row">
        <div  class="col s1"></div>
        <div class="col s10">
            <a href="{{route('admin.banks.create')}}" class="btn-floating waves-effect waves-light">
                <i class="material-icons">add</i>
            </a><br><br>
            <table class="striped responsive-table centered z-depth-1">
                <thead>
                <tr>
                    <th >#</th>
                    <th ></th>
                    <th >Cód</th>
                    <th >Banco</th>
                    <th >Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($banks as $bank)
                    <tr>
                        <td >{{ $bank->id }}</td>
                        <td >
                            <img class="bank-logo"
                                  src="{{ $bank->pathLogo().'/'.$bank->logo }}" />
                        </td>
                        <td >{{ $bank->cod }}</td>
                        <td >{{ $bank->name }}</td>
                        <td >
                            <a href="{{route('admin.banks.edit',['bank'=>$bank->id])}}">
                                <i class="material-icons">edit</i>
                            </a>
                            <delete-action action="{{route('admin.banks.destroy',['bank'=>$bank->id])}}"
                                           action-element="link-delete-{{$bank->id}}" csrf-token="{{csrf_token()}}">

                                <?php $modalId = "modal-delete-$bank->id"; ?>
                                <a id="link-modal-{{$bank->id}}" href="#{{$modalId}}">
                                    <i class="material-icons">delete</i>
                                </a>

                                <modal :modal="{{json_encode(['id'=>$modalId])}}" style="display: none;">
                                    <div slot="content" style="text-align: left !important;">
                                        <h5>Confirmação de exclusão</h5>
                                        <p class="red-text"><strong>Deseja realmente excluir o Banco?</strong></p>
                                        <div class="divider"></div>
                                        <p>Código: <strong>{{ $bank->cod }}</strong></p>
                                        <p>Banco: <strong>{{ $bank->name }}</strong></p>
                                        <div class="divider"></div>
                                    </div>
                                    <div slot="footer">
                                        <button class="btn modal-action modal-close waves-effect green lighten-4 btn-flat"
                                                id="link-delete-{{$bank->id}}">OK</button>
                                        <button class="btn modal-action modal-close waves-effect red lighten-4 btn-flat">Cancelar</button>
                                    </div>
                                </modal>

                            </delete-action>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {!! $banks->links() !!}
        </div>
        <div  class="col s1"></div>
    </div>
@endsection