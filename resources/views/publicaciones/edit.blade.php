@extends('layout.plantilla')
@section ('contenido')
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h3>Editar Publicacion</h3>
        @if (count($errors)>0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
</div>
{{Form::open(array('action'=>array('PublicacionesController@update', $publicaciones->id),'method'=>'patch'))}}
<div class="form-group">
    <label for="titulo">Titulo</label>
    <input type="text" name="titulo" id="titulo" class="form-control" value="{{$publicaciones->titulo}}">
</div>
<div class="form-group">
    <label for="cuerpo">Cuerpo</label>
    <input type="text" name="cuerpo" id="cuerpo" class="form-control" value="{{$publicaciones->cuerpo}}">
</div>

<div class="form-group">
    <label for="Role">Usuario-Email</label>
    <select name="usuarios_id" id="usuarios_id" class="form-control selectpicker" data-livesearch="true">
        <option value="" disabled selected>Email:</option>
        @foreach($usuario as $usuario)
        <option value="{{$usuario->id}}">{{$usuario->email }}</option>
        @endforeach

    </select>
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-15">
        <div class="form-group"> <br>
            <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-refresh"></span> Actualizar
            </button>
            <a class="btn btn-info" type="reset" href="{{url('publicaciones')}}"><span class="glyphicon 
            glyphicon-home"></span> Regresar </a>
        </div>
    </div>
</div>
{!!Form::close()!!}
@endsection