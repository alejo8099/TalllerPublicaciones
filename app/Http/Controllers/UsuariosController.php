<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuarios;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\UsuarioCreateRequest;
use App\Http\Requests\UsuariosEditRequest;

class UsuariosController extends Controller



{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request) {
            $query = trim($request->get('searchText'));
            $usuario= Usuarios::where('email', 'LIKE', '%' . $query . '%')
                ->orwhere('nombre', 'LIKE', '%' . $query . '%')
                ->orwhere('email', 'LIKE', '%' . $query . '%')
                ->orderBy('id', 'ASC')->paginate(3);
            return view("Usuarios.index", ["usuarios" => $usuario, "searchText" => $query]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuario = Usuarios::orderBy('email', 'DESC')
        ->select('usuarios.email', 'usuarios.id')
        ->get();
        return view('usuarios.create')->with('usuario', $usuario);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsuarioCreateRequest  $request)
    {
        $usuario = new Usuarios();
        $usuario->nombre = $request->get('nombre');
        $usuario->email = $request->get('email');
      

        $usuario->save();
        return Redirect::to('usuarios');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuarios = Usuarios::findOrFail($id);
        return view("usuarios.edit", ["usuarios" => $usuarios]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsuariosEditRequest $request, $id)
    {
        $usuario = Usuarios::findOrFail($id);
        $usuario->nombre = $request->get('nombre');
        $usuario->email = $request->get('email');
        $usuario->update();
        return Redirect::to('usuarios'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = Usuarios::findOrFail($id);
        $usuario->delete();
        return Redirect::to('usuarios');
    }
}
