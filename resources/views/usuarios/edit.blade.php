@extends('layoutu.plantilla')
@section ('contenido')
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h3>Actualizar Usuario</h3>
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
{{Form::open(array('action'=>array('UsuariosController@update', $usuarios->id),'method'=>'patch'))}}
<div class="form-group">
    <label for="titulo">Nombre</label>
    <input type="text" name="nombre" id="nombre" class="form-control" value="{{$usuarios->nombre}}">
</div>
<div class="form-group">
    <label for="cuerpo">Email</label>
    <input type="email" name="email" id="email" class="form-control" value="{{$usuarios->email}}">
</div>
<div class="col-lg-9 col-md-9 col-sm-9 col-xs-15">
    <div class="form-group"> <br>
        <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-refresh"></span> Actualizar
        </button>
        <a class="btn btn-info" type="reset" href="{{url('usuarios')}}"><span class="glyphicon 
            glyphicon-home"></span> Regresar </a>
    </div>
</div>
</div>
{!!Form::close()!!}
@endsection