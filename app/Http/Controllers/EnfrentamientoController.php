<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use \App\Enfrentamiento;
use \App\Integrante;
use \App\Equipo;
use \App\Instancia;
use \App\Bo5;
use \App\Http\Requests\AgregarEnfrentamientoRequest;
use Illuminate\Support\Facades\Auth;


class EnfrentamientoController extends Controller
{

    public function create($view) {

        $routes = array('/agregar/enfrentamientos', '/modificar/enfrentamientos');
        $name = "enfrentamientos";

        $enfrentamientos = Enfrentamiento::all();
        $integrantes = Integrante::all();
        $equipos = Equipo::all();
        $instancias = Instancia::all();
        $bo5s = Bo5::all();
        return view($view, compact('integrantes','equipos','enfrentamientos','instancias','bo5s','routes','name'));

    }

    public function store(AgregarEnfrentamientoRequest $request) {
        
        $bo5s = $_POST['bo5sDisponibles'];
        Enfrentamiento::create([
            'idEnfrentamiento' => request('id'),
            'equipo1' => request('equipo1'),
            'equipo2' => request('equipo2'),
            'editor' => request('editor'),  
            'bo5' => $bo5s   
        ]);
        return back();

    }

    public function delete(){

        $idEnfrentamiento = request('idEnfrentamiento');
        $enfrentamiento = Enfrentamiento::find($idEnfrentamiento);
        
        foreach (Instancia::get() as $instancia){
            $enfrentamientosNuevos = array();
            foreach ($instancia->enfrentamientos as $enf){
                if ($enf != $idEnfrentamiento)
                    array_push($enfrentamientosNuevos, $enf);
            }
            $instancia->enfrentamientos = $enfrentamientosNuevos;
            $instancia->save();
        }
        
        $enfrentamiento->delete();
        return redirect("/modificar/enfrentamientos");
    }

    public function update() {

        $enfrentamiento = Enfrentamiento::where('idEnfrentamiento', request('idEnfrentamiento'))->first(); 
        $bo5s = $_POST['bo5sDisponibles'];

        $enfrentamiento -> equipo1 = request('equipo1');
        $enfrentamiento -> equipo2 = request('equipo2');
        $enfrentamiento -> bo5 = $bo5s;
        $enfrentamiento -> save();
        return back();
    }

}