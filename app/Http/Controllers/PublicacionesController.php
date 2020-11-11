<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Publicaciones;
use Illuminate\Support\Facades\Redirect;
use App\Usuarios;
use App\Http\Requests\PublicacionesCreateRequest;
use App\Http\Requests\PublicacionesEditRequest;

class PublicacionesController extends Controller
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
            $publicaciones = Publicaciones::where('titulo', 'LIKE', '%' . $query . '%')
                ->orwhere('titulo', 'LIKE', '%' . $query . '%')
                ->orwhere('cuerpo', 'LIKE', '%' . $query . '%')
                ->orderBy('id', 'ASC')->paginate(3);
            /** return view('publicacion.index', compact('publicaciones'));
             */
            return view("publicaciones.index", ["publicaciones" => $publicaciones, "searchText" => $query]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuario= Usuarios::orderBy('email','DESC')
            ->select('usuarios.email', 'usuarios.id')
            ->get();
        return view('publicaciones.create')->with('usuario', $usuario);  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PublicacionesCreateRequest $request)
    {
        $publicaciones = new Publicaciones;
        $publicaciones->titulo = $request->get('titulo');
        $publicaciones->cuerpo = $request->get('cuerpo');
        $publicaciones->usuarios_id = $request->get('usuarios_id');
       
        $publicaciones->save();
        return Redirect::to('publicaciones');
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
        $publicaciones=Publicaciones::findOrFail($id);
        $usuario=Usuarios::all() ;
        return view("publicaciones.edit",["publicaciones"=>$publicaciones,"usuario" =>$usuario]);

    }  

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PublicacionesEditRequest $request, $id)
    {
        $publicaciones=Publicaciones::findOrFail($id); 
        $publicaciones->titulo=$request->get('titulo'); 
        $publicaciones->cuerpo=$request->get('cuerpo'); 
        $publicaciones->usuarios_id=$request->get('usuarios_id');
        $publicaciones->update();
        return Redirect::to('publicaciones');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $publicaciones = Publicaciones::findOrFail($id);
        $publicaciones->delete();
        return Redirect::to('publicaciones');
    }
}
