@include('errors._error_field')
<div class="row">
    <div class="input-field col s3">
        {!! Form::label('cod','Código') !!}
        {!! Form::text('cod', null) !!}
    </div>
</div>
<div class="row">
    <div class="input-field col s6">
        {!! Form::label('name','Banco') !!}
        {!! Form::text('name', null) !!}
    </div>
</div>
<div class="row">
    <div class="input-field file-field col s6">
        <div class="btn">
            <span>Logo</span>
            {!! Form::file('logo') !!}
        </div>
        <div class="file-path-wrapper">
            <input type="text" class="file-path" />
        </div>
    </div>
</div>