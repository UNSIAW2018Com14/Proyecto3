<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Bo5;
use \App\Integrante;
use \App\Http\Requests\AgregarBo5Request;
use Illuminate\Support\Facades\Auth;

class Bo5Controller extends Controller
{
    public function create($view) {

        $routes = array('/agregar/bo5s', '/modificar/bo5s');
        $name = "Bo5s";

            $bo5s = Bo5::all();
            $integrantes = Integrante::all();
            return view($view, compact('bo5s','integrantes','routes','name'));
    }

    public function store(AgregarBo5Request $request) {
        
        $diaExploded = explode("-", request('dia'));
        $arrDiaExploded = array();
        array_push($arrDiaExploded,$diaExploded[2], $diaExploded[1], $diaExploded[0]);
        $nuevoDia = implode('/', $arrDiaExploded);

            Bo5::create([
                'idBo5' => request('idBo5'),
                'dia' => $nuevoDia,  
                'nickIntegrante1' => request('nickIntegrante1'),
                'nickIntegrante2' => request('nickIntegrante2'),       
            ]);
            return back();
    }

    public function delete(){

            $idbo5 = request('idBo5');
            $bo5 = Bo5::find($idbo5);
            
            $bo5->delete();
            return redirect("/modificar/bo5s");
    }

    public function update() {

        $bo5 = Bo5::where('idBo5', request('idBo5'))->first(); 

        $bo5 -> nickIntegrante1 = request('nickIntegrante1');
        $bo5 -> nickIntegrante2 = request('nickIntegrante2');
        $bo5 -> save();
        return back();
    }

}
