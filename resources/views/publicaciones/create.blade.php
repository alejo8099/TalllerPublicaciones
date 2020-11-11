@extends('layout.plantilla')
@section('contenido')
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h3>Crear Publicacion</h3>
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
{!!Form::open(array('url'=>'publicaciones','method'=>'POST','autocomplete'=>'off'))!!}
{{Form::token()}}
<div class="form-group">
    <label for="titulo">Titulo</label>
    <input type="text" name="titulo" id="titulo" class="form-control" placeholder="Titulo de Publicacion">
</div>
<div class="form-group">
    <label for="cuerpo">Cuerpo</label>
    <textarea name="cuerpo" id="cuerpo" class="form-control" placeholder="Cuerpo de Publicacion"></textarea></p>
</div>
<div class="form-group">

    <label for="Role">Usuario-Email</label>
    <select name="usuarios_id" id="usuarios_id" class="form-control selectpicker" data-livesearch="true">
        <option value="" disabled selected> Email: </option>

        @foreach($usuario as $usuario)
        <option value="{{$usuario->id}}">{{ $usuario->email }} </option>
        @endforeach
    </select>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <div class="form-group"> <br>
        <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-ok"></span>
            Guardar</button>
        <button class="btn btn-danger" type="reset"><span class="glyphicon glyphicon-remove"></span> Vaciar
            Campos</button>
        <a class="btn btn-info" type="reset" href="{{url('publicaciones')}}"><span class="glyphicon glyphicon-
       home"></span> Regresar </a>
    </div>
</div>
</div>
{!!Form::close()!!}
@endsection