<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Integrante;
use \App\Equipo;
use \App\Bo5;
use \App\Http\Requests\AgregarIntegranteRequest;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class IntegranteController extends Controller
{

    public function create($view) {

        $routes = array('/agregar/integrantes', '/modificar/integrantes');
        $name = "Integrantes";

            $integrantes = Integrante::all();
            $equipos = Equipo::all();
            return view($view, compact('integrantes','equipos','routes','name'));
        
    }

    public function store(AgregarIntegranteRequest $request) {
        $radioVal = $_POST['sexo'];
        if ($radioVal == 'option1') 
            $sexo = 'F';
        else 
            if ($radioVal == 'option2')
            $sexo = 'M';

        Integrante::create([
            'nombre' => request('nombre'),
            'apellido' => request('apellido'),
            'nickname' => request('nickname'),
            'DNI' => request('DNI'),
            'edad' => request('edad'),
            'sexo' => $sexo,
            'foto' => request('foto'),
            'cartaFavorita' => request('cartaFavorita'),
            'claseFavorita' => request('claseFavorita'),
            'nombreEquipo' => null
            
        ]);
        return back();
    }

    public function delete(){

            $nickname = request('nickname');
            $integrante = Integrante::find($nickname);
            $nombreEquipo = $integrante->nombreEquipo;
            if ($nombreEquipo != null) {
                $equipo = Equipo::find($nombreEquipo);
                $integrantesViejos = $equipo->integrantes;
                $integrantesNuevos = array();
                foreach ($integrantesViejos as $integranteViejo)
                    if ($integranteViejo != $nickname)
                        array_push($integrantesNuevos, $integranteViejo);
                $equipo->integrantes = $integrantesNuevos;
                $equipo -> save();
            }

            foreach (Bo5::get() as $bo5){
                if ($bo5->nickIntegrante1 == $nickname || $bo5->nickIntegrante2 == $nickname) {
                    $diaExploded = explode("/", $bo5->dia);
                    $arrDiaExploded = array();
                    array_push($arrDiaExploded,$diaExploded[0], $diaExploded[1], $diaExploded[2]);
                    $nuevoDia = implode('-', $arrDiaExploded);
                    if (Carbon::now()->lt(Carbon::parse($nuevoDia)))
                        $bo5->delete();
                }
            }
          
            $integrante->delete();
            return redirect("/modificar/integrantes");

    }

    public function update() {

        $integrante = Integrante::where('nickname', request('nicknameViejo'))->first(); 
        $check = Integrante::where('nickname', request('nickname'))->first();
        $equipo = Equipo::find (request('nombreEquipo'));

        if($check != null && $check != $integrante) {
            return redirect("/modificar/integrantes")->withErrors([
                'message' => 'No se permite repetir el mismo nickname para dos jugadores'
            ]);; 
        }
        if(count($equipo->integrantes) >= 3) {
            return redirect("/modificar/integrantes")->withErrors([
                'message' => 'El equipo seleccionado ya posee 3 integrantes'
            ]);; 
        }  

        $nuevosIntegrantes = $equipo->integrantes;
        array_push($nuevosIntegrantes, $integrante->nickname);
        $equipo-> integrantes = $nuevosIntegrantes;
        $equipo->save();

        $integrante -> nickname = request('nickname');
        $integrante -> nombre = request('nombre');
        $integrante -> apellido = request('apellido');
        $integrante -> edad = request('edad');
        $integrante -> cartaFavorita = request('cartaFavorita');
        $integrante -> claseFavorita = request('claseFavorita');
        $integrante -> nombreEquipo = request('nombreEquipo');
        $integrante -> save();
        return back();
    }

    
}
