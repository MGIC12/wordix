<?php
include_once("wordix.php");



/**************************************/
/***** DATOS DE LOS INTEGRANTES *******/
/**************************************/


/* Infante, Mariano Germán. FAI-3823. TUDW. mager.infante@gmail.com. GitHub: MGIC12 */
/* Bacsay, Matias Emiliano. FAI-4078. TUDW. matibacsay@gmail.com. GitHub: tebacs */
/* Farroni, Juan. FAI-4971. TUDW. juanfarroni1314@gmail.com. GitHub: JuanF368 */



/**************************************/
/***** DEFINICION DE FUNCIONES ********/
/**************************************/

/**
 * Obtiene una colección de palabras
 * @return array
 */
function cargarColeccionPalabras()
{
    $coleccionPalabras = [
        "MUJER", "QUESO", "FUEGO", "CASAS", "RASGO",
        "GATOS", "GOTAS", "HUEVO", "TINTO", "NAVES",
        "VERDE", "MELON", "YUYOS", "PIANO", "PISOS",
        "ARBOL", "HOJAS", "ACERO", "ACIDO", "ARROZ"
    ];

    return ($coleccionPalabras);
}



/**
 * Imprime el logo de wordix
 */
function logo(){
    echo "\n";
    echo "\n";
    echo "░██╗░░░░░░░██╗░█████╗░██████╗░██████╗░██╗██╗░░██╗\n";
    echo "░██║░░██╗░░██║██╔══██╗██╔══██╗██╔══██╗██║╚██╗██╔╝\n";
    echo "░╚██╗████╗██╔╝██║░░██║██████╔╝██║░░██║██║░╚███╔╝░\n";
    echo "░░████╔═████║░██║░░██║██╔══██╗██║░░██║██║░██╔██╗░\n";
    echo "░░╚██╔╝░╚██╔╝░╚█████╔╝██║░░██║██████╔╝██║██╔╝╚██╗\n";
    echo "░░░╚═╝░░░╚═╝░░░╚════╝░╚═╝░░╚═╝╚═════╝░╚═╝╚═╝░░╚═╝\n";
}

/** Muestra el menú para el usuario
 * @param string $player
 */
function seleccionarOpcion()
{
    $minMenu = 1;
    $maxMenu = 8;
    //$opcionMenu
    echo "\n";
    echo "******************************************************************\n";
    echo "1) Jugar Wordix con una palabra elegida                           \n";
    echo "2) Jugar Wordix con una palabra aleatoria                         \n";
    echo "3) Mostrar una partida                                            \n";
    echo "4) Mostrar la primera partida ganadora                            \n";
    echo "5) Mostrar resumen de un jugador                                  \n";
    echo "6) Mostrar listado de partidas ordenadas por jugador y por palabra\n";
    echo "7) Agregar una palabra de 5 letras                                \n";
    echo "8) Salir                                                          \n";
    echo "******************************************************************\n";

    echo "Seleccione opción: \n";
    $opcion = solicitarNumeroEntre($minMenu, $maxMenu);

    return $opcion;
}


/**
 * Le pregunta al usuario su nombre
 * @return string
 */
function solicitarJugador (){
$scan=false;
    do{
    echo "Ingrese su nombre: \n";
    $usuario = trim(fgets(STDIN));
    $startLengthStrg = substr($usuario, 0, 1); //substr se utiliza para devolver parte de una cadena de un punto de inicio a uno final.
    if (ctype_alpha($startLengthStrg)){ //ctype_alpha se utiliza para chequear caracteres alfabéticos.
        $usuario = strtolower($usuario); //strtolower se lo utiliza para convertir el string en minúsculas.
        $scan = true;
    }else{
        echo "El nombre debe comenzar con una letra...";
    }
}while ($scan == false);
    return ($usuario);
}

/**
 * verifica si la palabra elegida ya fue utilizada por el gugador en el historial
 * @param string $nombre, $palabra
 * @param array $historial
 * @return boolean
 * */ 
function palabraRepetida($nombre, $palabra, $historial){
    // boolean $igual int $i, $cant, $seguir

        $i=0;
        $cant=count($historial);
        $seguir=0;

        do{
            if($historial[$i]["palabraWordix"]==$palabra && $historial[$i]["jugador"]==$nombre){
                $seguir=1;
            }else{
                $i=$i+1;
            }

        }while($i<$cant&&$seguir==0);

        if($seguir==0){
            $igual=false;
        }else{
            $igual=true;
        }

        return $igual;
    }


/**
     * Devuelve una palabra del listado a partir de un numero
     * @param array $coleccion, $nombre, $historial
     * @return string 
     */
    function palabraElegida ($coleccion, $nombre, $historial){
        $max=count($coleccion);
        echo "Ingrese el numero de la palabra: ";
        $numPalabra=solicitarNumeroEntre(1, $max)-1;
        $palabraEleg=$coleccion[$numPalabra];
        $esIgual=palabraRepetida($nombre, $palabraEleg, $historial);
        while($esIgual){
            echo "Ingrese otro numero: ";
            $numPalabra=solicitarNumeroEntre(1, $max)-1;
            $palabraEleg=$coleccion[$numPalabra];
            $esIgual=palabraRepetida($nombre, $palabraEleg, $historial);
        }
        
    return $palabraEleg;

    }

    
/**
 * verifica que la palabra a ingresar no este en el arreglo de palabra, tenga 5 letras
 * @param array $coleccionPalabras
 * @param string $palabra5L
 * @return array
 */ 
function agregarPalabra($coleccionPalabras, $palabra5L){
    $i = 0;
    $cantPalabras = count($coleccionPalabras);
    while($i<$cantPalabras && $coleccionPalabras[$i]!= $palabra5L){
        $i=$i+1;
    }
    if($i>=$cantPalabras){
        $coleccionPalabras[$cantPalabras] = $palabra5L;
        echo "se agrego la palabra $palabra5L. ";
    }else{
        echo "la palabra $palabra5L, ya existe. ";
    }
return ($coleccionPalabras);
}
   

/**
 * devuelve una palabra aleatoria de la coleccion
 * @param array $colecPalab, $nombre, $historial
 * @return string
 */
function opcAleatoria ($colecPalab, $nombre, $historial){
    // int $max, $numAleatorio, string $palab
    $max=count($colecPalab);
    $numAleatorio=rand(0,$max-1);
    $palab=$colecPalab[$numAleatorio];
    $esIgual=palabraRepetida($nombre, $palab, $historial);
        while($esIgual){
            $numAleatorio=rand(0,$max-1);
            $palab=$colecPalab[$numAleatorio];
            $esIgual=palabraRepetida($nombre, $palab, $historial);
        }

    return ($palab);
}


/**
 * obtiene una coleccion de partidas pasadas
 * @return array
 */
function cargarPartidas(){
    $coleccion = [];
    $coleccion[0] = ["palabraWordix" => "QUESO", "jugador" => "gaspar", "intentos" => 5, "puntaje" => 11];
    $coleccion[1] = ["palabraWordix" => "PIANO", "jugador" => "gaspar", "intentos" => 3, "puntaje" => 13];
    $coleccion[2] = ["palabraWordix" => "ACERO", "jugador" => "julian", "intentos" => 0, "puntaje" => 0];
    $coleccion[3] = ["palabraWordix" => "MELON", "jugador" => "facu", "intentos" => 4, "puntaje" => 12];
    $coleccion[4] = ["palabraWordix" => "GOTAS", "jugador" => "julian", "intentos" => 3, "puntaje" => 13];
    $coleccion[5] = ["palabraWordix" => "GOTAS", "jugador" => "gaspar", "intentos" => 1, "puntaje" => 15];
    $coleccion[6] = ["palabraWordix" => "VERDE", "jugador" => "marcos", "intentos" => 5, "puntaje" => 12];
    $coleccion[7] = ["palabraWordix" => "ACERO", "jugador" => "facu", "intentos" => 6, "puntaje" => 9];
    $coleccion[8] = ["palabraWordix" => "HOJAS", "jugador" => "gaspar", "intentos" => 0, "puntaje" => 0];
    $coleccion[9] = ["palabraWordix" => "ARBOL", "jugador" => "julian", "intentos" => 2, "puntaje" => 14];
    $coleccion[10] = ["palabraWordix" => "YUYOS", "jugador" => "marcos", "intentos" => 3, "puntaje" => 15];
    $coleccion[11] = ["palabraWordix" => "TINTO", "jugador" => "gaspar", "intentos" => 4, "puntaje" => 14];

return ($coleccion);
}


/**
 * obtiene una estructura asociatica de las estadisticas de los jugadores
 * @return array
 */
function cargarEstadisticas(){
    $estadisticas = [];
    $estadisticas[0] = ["jugador" => "gaspar", "partidas" => 5, "puntaje" => 53, "victorias" => 4, "intento1" => 1, "intento2" => 0, "intento3" => 1, "intento4" => 1, "intento5" => 1, "intento6" => 0];
    $estadisticas[1] = ["jugador" => "julian", "partidas" => 3, "puntaje" => 27, "victorias" => 2, "intento1" => 0, "intento2" => 1, "intento3" => 1, "intento4" => 0, "intento5" => 0, "intento6" => 0];
    $estadisticas[2] = ["jugador" => "facu", "partidas" => 2, "puntaje" => 21, "victorias" => 2, "intento1" => 0, "intento2" => 0, "intento3" => 0, "intento4" => 1, "intento5" => 0, "intento6" => 1];
    $estadisticas[3] = ["jugador" => "marcos", "partidas" => 2, "puntaje" => 27, "victorias" => 2, "intento1" => 0, "intento2" => 0, "intento3" => 1, "intento4" => 0, "intento5" => 1, "intento6" => 0];

return ($estadisticas);
}    





/**
 * muestra los datos de la primera partida ganada del jugador
 * @param string $usuario
 * @param array $historial
 */
function primPartGan ($usuario, $historial){
    $gan=0;
    $cantPart=0;
    $aux=0;
    foreach ($historial as $indice => $elemento){
        if ($historial[$indice]["jugador"]==$usuario){
            $cantPart++;
            if ($historial[$indice]["intentos"]>0 && $aux==0){
                echo "Partida Wordix ".$cantPart.": palabra ".$historial[$indice]["palabraWordix"];
                echo "\nJugador :".$usuario;
                echo "\nPuntaje :".$historial[$indice]["puntaje"]." puntos";
                echo "\nIntento : Adivino la palabra en ".$historial[$indice]["intentos"]." intentos";
                $aux= 1;
                $gan++;
            }
        }
    }
    if ($cantPart == 0 || $gan == 0){
        echo "El jugador ".$usuario." no gano ninguna partida";
    }
}




/**
 * Muestra el historial de la partida
 * @param array $coleccionHistorial
 * @param int $numPart
 */
function mostrarHistorial($coleccionHistorial, $numPart){
    $partida = $coleccionHistorial[$numPart];
    if ($partida["intentos"]>0){
        echo "Partida WORDIX ".($numPart+1).": palabra ". $partida["palabraWordix"] . "\n" . "Jugador: " . $partida["jugador"] . "\n" . "Puntaje: " . $partida["puntaje"] . " puntos\n" . "Intento: Adivinó la palabra en " . $partida["intentos"] . " intentos";
    } else {

        echo "Partida WORDIX " . $numPart . ": palabra " . $partida["palabraWordix"] . "\n" . "Jugador: " . $partida["jugador"] . "\n" . "Puntaje: " . $partida["puntaje"] . " puntos" . "\n" . "Intento: No adivinó la palabra.";
    }

}


/**
 * Le muestra sus estadisticas al jugador
 * @param string $jugador
 * @param array $stats
 */
function mostrarEstadisticas($jugador, $stats){
    $n=count($stats);
    $i=0;
    while ($i<$n && $stats[$i]["jugador"]!=$jugador){
        $i++;
    }
    if ($i<$n){
        $porcentaje=$stats[$i]["victorias"]*100/$stats[$i]["partidas"];
        echo "\nJugador: ".$jugador;
        echo "\nPartidas: ".$stats[$i]["partidas"];
        echo "\nPuntaje Total: ".$stats[$i]["puntaje"];
        echo "\nVictorias: ".$stats[$i]["victorias"];
        echo "\nPorcentaje de victorias: ".$porcentaje."%";
        echo "\nAdivinadas: ";
        echo "\n      Intento 1: ".$stats[$i]["intento1"];
        echo "\n      Intento 2: ".$stats[$i]["intento2"];
        echo "\n      Intento 3: ".$stats[$i]["intento3"];
        echo "\n      Intento 4: ".$stats[$i]["intento4"];
        echo "\n      Intento 5: ".$stats[$i]["intento5"];
        echo "\n      Intento 6: ".$stats[$i]["intento6"];
    }else{
        echo "el jugador no tiene estadisticas";
    }
}


/**
 * Verifica si un usuario ya se encuentra en los datos de estadisticas
 * @param string $usuario
 * @param array $coleccionStats
 */
function buscarNombre ($usuario, $coleccionStats){
    $n=count($coleccionStats);
    $i=0;
    $jugExis=false;
    while ($i<$n && $coleccionStats[$i]["jugador"]!=$usuario){
        $i++;
    }
    if ($i<$n){
        $jugExis=true;
    }
    return ($jugExis);
}


/**
 * identifica en que columna se encuentra el jugador solicitado
 * @param string $usuario
 * @param array $arreg
 * @return int
 */
function buscarColumna ($usuario, $arreg){
    $i=0;
    $n=count($arreg);
    while($i<$n && $arreg[$i]["jugador"]!=$usuario){
        $i++;
    }
    return ($i);
}


/**
 * carga estadisticas y si el jugador ya existe suma las estadisticas
 * @param string $usuario
 * @param array $stats
 * @param array $part
 */
function cargaEstads ($usuario, $stats, $part){
    /* */
    if ($part["puntaje"]>0){ 
        $victoria=1;
    }else{
        $victoria= 0;
    }
    $int1= 0;
    $int2= 0;
    $int3= 0;
    $int4= 0;
    $int5= 0;
    $int6= 0;
    $intento=$part["intentos"]; 
    switch ($intento){
        case 1:
            $int1= 1;
            break;
        case 2:
            $int2= 1;
            break;
        case 3:
            $int3= 1;
            break;
        case 4:
            $int4= 1;
            break;
        case 5:
            $int5= 1;
            break;
        case 6:
            $int6= 1;
            break;
    }
    $datosStats =[
        "jugador" => $usuario,
        "puntaje" => $part["puntaje"],
        "victorias" => $victoria,
        "intento1"=> $int1,
        "intento2"=> $int2,
        "intento3"=> $int3,
        "intento4"=> $int4,
        "intento5"=> $int5,
        "intento6"=> $int6,
    ];
    return ($datosStats);
}


/**
 * Compara los strings y determina cuál es mayor y cuál es menor
 * @param string $str1, $str2
 * @return int
 */
function comparadorString($str1, $str2){
    $resultado = strcmp($str1["jugador"], $str2["jugador"]);

    if ($resultado == 0){
        $resultado = strcmp($str1["palabraWordix"], $str2["palabraWordix"]);
    }
return ($resultado);
}


/**
 * Ordena alfabéticamente los strings ingresados
 * @param array $coleccionHistorial
 */
function ordenarAlfab($coleccionHistorial){
    uasort($coleccionHistorial, 'comparadorString'); //Ejecutada la función así ('comparadorString') debido a que son strings de un array pedido en esta función
    print_r($coleccionHistorial);
}


/** Determina el indice Minimo de un array
 * @param int $max
 * @return int
 */
function indiceMin($max)
{
    //int $indMin
    $indMin = $max - $max;
    return $indMin;
}

/** Determina el indice maximo de un array
 * @param array $coleccionPalabras
 * @return int
 */
function indiceMax($coleccionPalabras)
{
    //int $indMax
    $indMax = count($coleccionPalabras) - 1;
    return $indMax;
}


/**
 * Texto final del juego
 */
function textoSalir(){
    echo " 
    __                                                       
   / _   _  _   _ .  _   _    _   _   _   .      _   _   _ | 
   \__) |  (_| (_ | (_| _)   |_) (_) |    | |_| (_) (_| |  . 
                             |            /     _/           \n";
    echo "
    ░░░░░░░░░░░░░░░░░░░░░░█████████░░░░░░░░░
    ░░███████░░░░░░░░░░███▒▒▒▒▒▒▒▒███░░░░░░░
    ░░█▒▒▒▒▒▒█░░░░░░░███▒▒▒▒▒▒▒▒▒▒▒▒▒███░░░░
    ░░░█▒▒▒▒▒▒█░░░░██▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒██░░
    ░░░░█▒▒▒▒▒█░░░██▒▒▒▒▒██▒▒▒▒▒▒██▒▒▒▒▒███░
    ░░░░░█▒▒▒█░░░█▒▒▒▒▒▒████▒▒▒▒████▒▒▒▒▒▒██
    ░░░█████████████▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒██
    ░░░█▒▒▒▒▒▒▒▒▒▒▒▒█▒▒▒▒▒▒▒▒▒█▒▒▒▒▒▒▒▒▒▒▒██
    ░██▒▒▒▒▒▒▒▒▒▒▒▒▒█▒▒▒██▒▒▒▒▒▒▒▒▒▒██▒▒▒▒██
    ██▒▒▒███████████▒▒▒▒▒██▒▒▒▒▒▒▒▒██▒▒▒▒▒██
    █▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒█▒▒▒▒▒▒████████▒▒▒▒▒▒▒██
    ██▒▒▒▒▒▒▒▒▒▒▒▒▒▒█▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒██░
    ░█▒▒▒███████████▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒██░░░
    ░██▒▒▒▒▒▒▒▒▒▒████▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒█░░░░░
    ░░████████████░░░█████████████████░░░░░░";
}
/* ****COMPLETAR***** */



/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:


//Inicialización de variables:
$opcionMenu = 0;
$minMenu = 1;
$maxMenu = 8;
$coleccionPartidas = cargarPartidas();
$coleccionPalabras=cargarColeccionPalabras();
$coleccionEstadisticas=cargarEstadisticas();

//Proceso:



logo();
do {
    
    $opcionMenu = seleccionarOpcion();
    switch ($opcionMenu){
        case 1:
            $nombre=solicitarJugador();
            $palabraSelecc=palabraElegida($coleccionPalabras, $nombre, $coleccionPartidas);
            $partida=jugarWordix($palabraSelecc, strtolower($nombre));
            $coleccionPartidas[]=["palabraWordix" => $partida["palabraWordix"], "jugador" => $partida["jugador"], "intentos" => $partida["intentos"], "puntaje" => $partida["puntaje"]];
            $existe=buscarNombre($nombre, $coleccionEstadisticas);
            $datosEstads=cargaEstads($nombre, $coleccionEstadisticas, $partida);
            if ($existe == true){
                $col=buscarColumna($nombre, $coleccionEstadisticas);
                $coleccionEstadisticas[$col]=[
                    "jugador" => $datosEstads["jugador"],
                    "partidas" => $coleccionEstadisticas[$col]["partidas"]+1,
                    "puntaje" => $coleccionEstadisticas[$col]["puntaje"]+$datosEstads["puntaje"],
                    "victorias" => $coleccionEstadisticas[$col]["victorias"]+$datosEstads["victorias"],
                    "intento1" => $coleccionEstadisticas[$col]["intento1"]+$datosEstads["intento1"],
                    "intento2" => $coleccionEstadisticas[$col]["intento2"]+$datosEstads["intento2"],
                    "intento3" => $coleccionEstadisticas[$col]["intento3"]+$datosEstads["intento3"],
                    "intento4" => $coleccionEstadisticas[$col]["intento4"]+$datosEstads["intento4"],
                    "intento5" => $coleccionEstadisticas[$col]["intento5"]+$datosEstads["intento5"],
                    "intento6" => $coleccionEstadisticas[$col]["intento6"]+$datosEstads["intento6"],
                ];
            }else{
                $coleccionEstadisticas[]=[
                    "jugador" => $datosEstads["jugador"],
                    "partidas" => 1,
                    "puntaje" => $datosEstads["puntaje"],
                    "victorias" => $datosEstads["victorias"],
                    "intento1" => $datosEstads["intento1"],
                    "intento2" => $datosEstads["intento2"],
                    "intento3" => $datosEstads["intento3"],
                    "intento4" => $datosEstads["intento4"],
                    "intento5" => $datosEstads["intento5"],
                    "intento6" => $datosEstads["intento6"],
                ];
            }
            break;

        case 2:
            // string $nombre $palabraSelecc, $partida array $coleccionPalabras
            $nombre=solicitarJugador();
            $palabraSelecc=opcAleatoria($coleccionPalabras, $nombre, $coleccionPartidas);
            $partida=jugarWordix($palabraSelecc, strtolower($nombre));
            $coleccionPartidas[]=["palabraWordix" => $partida["palabraWordix"], "jugador" => $partida["jugador"], "intentos" => $partida["intentos"], "puntaje" => $partida["puntaje"]];
            $existe=buscarNombre($nombre, $coleccionEstadisticas);
            $datosEstads=cargaEstads($nombre, $coleccionEstadisticas, $partida);
            if ($existe == true){
                $col=buscarColumna($nombre, $coleccionEstadisticas);
                $coleccionEstadisticas[$col]=[
                    "jugador" => $datosEstads["jugador"],
                    "partidas" => $coleccionEstadisticas[$col]["partidas"]+1,
                    "puntaje" => $coleccionEstadisticas[$col]["puntaje"]+$datosEstads["puntaje"],
                    "victorias" => $coleccionEstadisticas[$col]["victorias"]+$datosEstads["victorias"],
                    "intento1" => $coleccionEstadisticas[$col]["intento1"]+$datosEstads["intento1"],
                    "intento2" => $coleccionEstadisticas[$col]["intento2"]+$datosEstads["intento2"],
                    "intento3" => $coleccionEstadisticas[$col]["intento3"]+$datosEstads["intento3"],
                    "intento4" => $coleccionEstadisticas[$col]["intento4"]+$datosEstads["intento4"],
                    "intento5" => $coleccionEstadisticas[$col]["intento5"]+$datosEstads["intento5"],
                    "intento6" => $coleccionEstadisticas[$col]["intento6"]+$datosEstads["intento6"],
                ];
            }else{
                $coleccionEstadisticas[]=[
                    "jugador" => $datosEstads["jugador"],
                    "partidas" => 1,
                    "puntaje" => $datosEstads["puntaje"],
                    "victorias" => $datosEstads["victorias"],
                    "intento1" => $datosEstads["intento1"],
                    "intento2" => $datosEstads["intento2"],
                    "intento3" => $datosEstads["intento3"],
                    "intento4" => $datosEstads["intento4"],
                    "intento5" => $datosEstads["intento5"],
                    "intento6" => $datosEstads["intento6"],
                ];
            }
            break;

        case 3:
            $maxArray = indiceMax($coleccionPartidas)+1;
            $minArray = indiceMin($maxArray);
            echo "Seleccione una partida entre la partida N° ".($minArray +1)." y la N° ".($maxArray)."\n";
            $numPartida = solicitarNumeroEntre(1, $maxArray);
            $numPartida = $numPartida - 1;
                echo "\n******************************************************************\n";
                mostrarHistorial($coleccionPartidas, $numPartida);
                echo "\n******************************************************************\n";
            break;

        case 4:
            $nombre=solicitarJugador();
	            echo "\n******************************************************************\n";
	            primPartGan($nombre, $coleccionPartidas);
	            echo "\n******************************************************************\n";
            break;

        case 5:
            $nombre=solicitarJugador();
            echo "\n******************************************************************\n";
            mostrarEstadisticas($nombre, $coleccionEstadisticas);
            echo "\n******************************************************************\n";
            break;

        case 6;
            echo "\n******************************************************************\n";
            echo "Este es el listado de partidas jugadas...\n\n";
            $listadoPartidasOrdenada = ordenarAlfab($coleccionPartidas);
            echo "\n******************************************************************\n";
            break;

        case 7:
            $palabra5L = leerPalabra5Letras();
            $coleccionPalabras = agregarPalabra($coleccionPalabras, $palabra5L);
            break;

        case 8:
            textoSalir();
            break;
    }
} while ($opcionMenu != 8);

/**$partida = jugarWordix("MELON", strtolower("MaJo"));*/
//print_r($partida);
//imprimirResultado($partida);
