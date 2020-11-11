@extends('layoutu.plantilla')
@section('contenido')
<div class="row">
    <div class="col-md-8 col-xs-12">
        @include('Usuarios.search')
    </div>
    <div class="col-md-2">
        <a href="usuarios/create" class="pull-right">
            <button class="btn btn-info">Registrar Usuario</button>
        </a>
    </div>
    <div class="col-md-2">
        <a href="publicaciones" class="pull-right">
            <button class="btn btn-success">Ir a Publicaciones</button>
        </a>
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-xs-12">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <th>Id </th>
                    <th>Nombre</th>
                    <th>Email</th>

                </thead>
                <tbody>
                    @foreach($usuarios as $us)
                    <tr>
                        <td>{{ $us->id }}</td>
                        <td>{{ $us->nombre}}</td>
                        <td>{{ $us->email}}</td>

                        <td>

                            <a href="{{URL::action('UsuariosController@edit',$us->id)}}"> <button class="btn btn-primary">Actualizar</button></a>
                            <a href="" data-target="#modal-delete-{{$us->id}}" data-toggle="modal"> <button class="btn btn-danger">Eliminar</button></a>
                            </a>
                        </td>
                    </tr>
                    @include('usuarios.modal')
                    @endforeach

                </tbody>
            </table>
        </div>
        {{$usuarios->links()}}
    </div>
</div>
@endsection