<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Equipo;
use \App\Integrante;
use \App\Enfrentamiento;
use Illuminate\Support\Facades\Auth;
use \App\Http\Requests\AgregarEquipoRequest;


class EquipoController extends Controller
{

    public function create($view) {

        $routes = array('/agregar/equipos', '/modificar/equipos', '/eliminar/equipos');
        $name = "equipos";

        $integrantes = Integrante::all();
        $equipos = Equipo::all();
        return view($view, compact('integrantes', 'equipos', 'routes','name'));
    }

    public function store(AgregarEquipoRequest $request) {
        
        $integrantes = $_POST['integrantesDisponibles'];
        $integrantesSeleccionados = Integrante::whereIn('nickname', [$integrantes[0], $integrantes[1], $integrantes[2]])->get();
        foreach ($integrantesSeleccionados as $i) {
            $i -> nombreEquipo = request('nombre');
            $i -> save();
        }

        Equipo::create([
            'nombre' => request('nombre'),
            'institucion' => request('institucion'),
            'foto' => request('foto'),
            'integrantes' => $integrantes
            
        ]);
        return back();
    }

    public function delete(){

        $nombre = request('nombre');
        $equipo = Equipo::find($nombre);
        
        foreach ($equipo->integrantes as $i) {
            $integrante = Integrante::find($i);
            if ($integrante != null) {
                $integrante-> nombreEquipo = null;
                $integrante-> save();
            }
        }

        foreach (Enfrentamiento::get() as $enfrentamiento){
            if ($enfrentamiento->equipo1 == $nombre || $enfrentamiento->equipo2 == $nombre)
            $enfrentamiento->delete();
        }
        
        $equipo->delete();
        return redirect("/eliminar/equipos");
    }

    public function update() {

        $equipo = Equipo::where('nombre', request('nombreViejo'))->first(); 
        $check = Equipo::where('nombre', request('nombre'))->first();
        $integrantes = $_POST['integrantesDisponibles'];

        if($check != null && $check != $equipo) {
            return redirect("/modificar/equipos")->withErrors([
                'message' => 'No se permite repetir el mismo nombre para dos equipos'
            ]);; 
        } 
        if(count($integrantes) != 3) {
            return redirect("/modificar/equipos")->withErrors([
                'message' => 'Debe seleccionar 3 integrantes'
            ]);; 
        } 
        
        foreach ($equipo->integrantes as $int) {
            $integrante = Integrante::find($int);
            if ($integrante != null) {
                $integrante-> nombreEquipo = null;
                $integrante-> save();
            }
        }
        
        $integrantesSeleccionados = Integrante::whereIn('nickname', [$integrantes[0], $integrantes[1], $integrantes[2]])->get();
        foreach ($integrantesSeleccionados as $i) {
            $i -> nombreEquipo = request('nombre');
            $i -> save();
        } 

        $equipo -> nombre = request('nombre');
        $equipo -> institucion = request('institucion');
        $equipo -> integrantes = $integrantes;
        $equipo -> save();
        return back();
    }
}
