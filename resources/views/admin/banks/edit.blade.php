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
                        <a href="#!" class="breadcrumb">Editar banco</a>
                    </div>
                </div>
            </nav>

        </div>
        <div  class="col s1"></div>
    </div>
    <div class="row">
        <div  class="col s1"></div>
        <div class="col s10">
            <a href="{{route('admin.banks.index')}}" class="btn waves-effect">
                <i class="material-icons left">arrow_back</i>
                <strong>Voltar</strong>
            </a>
            @if (session('success'))
                @include('errors._success',['msg' => session('success')])
            @endif
            @if (session('erro'))
                @include('errors._error',['msg' => session('erro')])
            @endif
            <div class="card-panel">
                {!! Form::model($bank,[
                     'route'=>['admin.banks.update','bank'=>$bank->id],
                     'method'=>'PUT','files'=>true
                     ]) !!}

                <div class="row">
                    <div class="input-field col s12">
                        <img src="{{ $bank->pathLogo().'/'.$bank->logo }}" />
                    </div>
                </div>

                @include('admin.banks._form')


                <div class="row">
                    <div class="input-field col s12">
                        {!! Form::submit('Salvar',['class'=>'btn waves-effect']) !!}
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
        <div  class="col s1"></div>
    </div>
@endsection