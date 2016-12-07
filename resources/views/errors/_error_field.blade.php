@if($errors->any())
    <div class="row">
        <div class="col s6 red lighten-1 white-text z-depth-1">
            <br>
            <i class="material-icons left">error</i> <strong>Erros:</strong>
            <ul >
                @foreach($errors->all() as $error)
                    <li><strong>* {{$error}}</strong></li>
                @endforeach
            </ul>
        </div>
    </div>
@endif