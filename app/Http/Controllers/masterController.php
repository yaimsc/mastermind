<?php 

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request; 

class masterController extends BaseController {

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function jugar(Request $request){

    	//pillar el valor del input en una variable

    	$nombre = $request->input("nombre");
    	$longitud = $request->input("longitud");
    	$numcolors = $request->input("numcolors"); 
    	$repetir = $request->input("repetir");
    	$intentos = $request->input("intentos"); 

    	//mandar a la sesion

    	session(['nombre' => $nombre]);
    	session(['longitud' => $longitud]);
    	session(['numcolors' => $numcolors]);
    	session(['repetir' => $repetir]);
    	session(['intentos' => $intentos]);
    	session(['historial' => null]);

    	//llamar a la sesion

    	$nombre = session('nombre');
    	$longitud = session('longitud');
    	$numcolors = session('numcolors');
    	$repetir = session('repetir');
    	$intentos = session('intentos');
    	$intentosP = 0; 
    	$array_numcolors=array();

    	session(['clave1' => $array_numcolors]); 
    	
    	for($i = 0; $i < $longitud; $i++){
    		if($repetir == 'Si'){
    			$array_numcolors[$i] = rand(0,$numcolors -1);
    			$request -> session() -> push('clave1', $i); 
	    	}else{  
	    		$valor = rand(0, $numcolors -1); 
	    		while(in_array($valor, $array_numcolors)){
	    			$valor = rand(0, $numcolors);
	    		}
	    		$request -> session() -> push('clave1', $valor); 
	    	}
    	}
    	

    	return view("juego", ['numcolors' => $array_numcolors, 'intentosP' => $intentosP, 'intentos' => $intentos]);
    }

    public function comprobar(Request $request){
    	$clave = array(); 
    	$intentosP = 0; 

    	$nombre = session('nombre');
    	$longitud = session('longitud');
    	$numcolors = session('numcolors');
    	$repetir = session('repetir');
    	$intentos = session('intentos');
    	$array_numcolors = session('clave1');

    	for($i = 0; $i < $longitud; $i++){
    		$clave[$i] = $request -> input($i);
    	}

    	$acierto = 0;
    	$candidato = 0; 

    	foreach($clave as $indice => $valor){
    		if(in_array($valor, $array_numcolors)){
    			$candidato++; 
    			if($valor == $array_numcolors[$indice]){
    				$acierto++; 
    			}
    		}
    			
    	}

    	array_push($clave, $candidato);
    	array_push($clave, $acierto); 
		$request -> session() -> push('historial', $clave); 
    	
    	$intentosP++; 
    	 

    	return view("juego", ['clave' => $clave, 'intentosP' => $intentosP, 'candidato' => $candidato, 'acierto' => $acierto, 'longitud' => $longitud]); 
    }

}