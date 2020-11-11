@extends('layoutu.plantilla')
@section('contenido')
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h3>Crear Usuario</h3>
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
{!!Form::open(array('url'=>'usuarios','method'=>'POST','autocomplete'=>'off'))!!}
{{Form::token()}}
<div class="form-group">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingrese el nombre">
</div>
<div class="form-group">
    <label for="email">Correo</label>
    <input type="email" name="email" id="email" class="form-control" placeholder="Correo electronicos">
</div>

<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <div class="form-group"> <br>
        <button class="btn btn-primary" type="submit" "><span class="glyphicon glyphicon-ok"></span>
            Registrar</button>
        <button class="btn btn-danger" type="reset"><span class="glyphicon glyphicon-remove"></span> Vaciar
            Campos</button>
        <a class="btn btn-info" type="reset" href="{{url('usuarios')}}"><span class="glyphicon glyphicon-
       home"></span> Regresar </a>
    </div>
</div>
</div>
{!!Form::close()!!}
@endsection