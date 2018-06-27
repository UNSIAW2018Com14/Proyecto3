<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Instancia;
use \App\Enfrentamiento;
use \App\Http\Requests\AgregarInstanciaRequest;
use Illuminate\Support\Facades\Auth;

class InstanciaController extends Controller
{

    public function create($view) {

        $routes = array('/agregar/instancias', '/modificar/instancias');
        $name = "instancias";

            $instancias = Instancia::all();
            $enfrentamientos = Enfrentamiento::all();
            return view($view, compact('instancias','enfrentamientos','routes','name'));
    }
    
    public function store(AgregarInstanciaRequest $request) {
        
        $inicioExploded = explode("-", request('fechaInicio'));
        $arrInicioExploded = array();
        array_push($arrInicioExploded,$inicioExploded[2], $inicioExploded[1], $inicioExploded[0]);
        $nuevoInicio = implode('/', $arrInicioExploded);

        $finExploded = explode("-", request('fechaFin'));
        $arrFinExploded = array();
        array_push($arrFinExploded,$finExploded[2], $finExploded[1], $finExploded[0]);
        $nuevoFin = implode('/', $arrFinExploded);

            $enfrentamientos = $_POST['enfrentamientosDisponibles'];
            Instancia::create([
                'idInstancia' => request('idInstancia'),
                'nombre' => request('nombre'),
                'fechaInicio' => $nuevoInicio,
                'fechaFin' => $nuevoFin,
                'enfrentamientos' => $enfrentamientos       
            ]);
            return back();
        }

    public function delete(){

            $idInstancia = request('idInstancia');
            $instancia = Instancia::find($idInstancia);      
            $instancia->delete();

            return redirect("/modificar/instancias");

    }

    public function update() {

        $instancia = Instancia::where('nombre', request('nombreViejo'))->first(); 
        $check = Instancia::where('nombre', request('nombre'))->first();
        $enfrentamientos = $_POST['enfrentamientosDisponibles'];

        if($check != null && $check != $instancia) {
            return redirect("/modificar/instancias")->withErrors([
                'message' => 'No se permite repetir el mismo nombre para dos instancias'
            ]);; 
        } 
        
        $instancia -> nombre = request('nombre');
        $instancia -> enfrentamientos = $enfrentamientos;
        $instancia -> save();
        return back();
    }
}
