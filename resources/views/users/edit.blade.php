@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-log-12 margin-tb">
        <div class="pull-left">
            <h3 align="center">Editar Usuario</h3>
        </div>
    </div>
</div>

<form action="{{ route('users.update',$user->id)}}" method="POST">
@csrf
@method('PUT')
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nombre de usuario:</strong>
            <input type="text" name="name" value="{{$user->name}}" class="form-control" placeholder="Nombre">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Tipo de documento:</strong>
            <input type="text" name="tipo_doc" value="{{$user->tipo_doc}}" class="form-control" placeholder="TipoDoc">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Numero Documento:</strong>
            <input type="number" name="nro_documento" value="{{$user->nro_documento}}" class="form-control" placeholder="Numero Documento">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Contraseña:</strong>
            <input type="text" name="password" class="form-control" placeholder="Digite su nueva contraseña en caso de cambio">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Correo:</strong>
            <input type="email" name="email" value="{{$user->email}}" class="form-control" placeholder="Correo Electrónico">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <a class="btn btn-dark" href="{{route('users.index')}}">Atrás</a>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</div>

</form>

@endsection