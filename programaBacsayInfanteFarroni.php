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
     * Devuelve una palabra del listado a partir de un numero
     * @param array $coleccion
     * @return string 
     */
    function palabraElegida ($coleccion){
        $max=count($coleccion);
        echo "Ingrese el numero de la palabra: ";
        $numPalabra=solicitarNumeroEntre(1, $max)-1;
           $palabraEleg=$coleccion[$numPalabra];
        
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
 * @param array $colecPalab
 * @return string
 */
function opcAleatoria ($colecPalab){
    // int $max, $numAleatorio, string $palab
    $max=count($colecPalab);
    $numAleatorio=rand(0,$max-1);
    $palab=$colecPalab[$numAleatorio];
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
    $estadisticas=[0] = ["jugador" => "gaspar", "partidas" => 5, "puntaje" => 53, "victorias" => 4, "intento1" => 1, "intento2" => 0, "intento3" => 1, "intento4" => 1, "intento5" => 1, "intento6" => 0];
    $estadisticas=[1] = ["jugador" => "julian", "partidas" => 3, "puntaje" => 27, "victorias" => 2, "intento1" => 0, "intento2" => 1, "intento3" => 1, "intento4" => 0, "intento5" => 0, "intento6" => 0];
    $estadisticas=[2] = ["jugador" => "facu", "partidas" => 2, "puntaje" => 21, "victorias" => 2, "intento1" => 0, "intento2" => 0, "intento3" => 0, "intento4" => 1, "intento5" => 0, "intento6" => 1];
    $estadisticas=[3] = ["jugador" => "marcos", "partidas" => 2, "puntaje" => 27, "victorias" => 2, "intento1" => 0, "intento2" => 0, "intento3" => 1, "intento4" => 0, "intento5" => 1, "intento6" => 0];

return ($estadisticas);
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
 * Realiza varios calculos para devolver las estadisticas del jugador solicitado
 * @param string $jugador
 * @param array $colecPart
 */
function mostrarEstadisticas($jugador, $colecPart){
    $cantPart=0;
    $victorias=0;
    $puntajeTotal=0;
    $int1=0;
    $int2=0;
    $int3=0;
    $int4=0;
    $int5=0;
    $int6=0;
    foreach ($colecPart as $indice => $elemento){
        if ($colecPart[$indice]["jugador"]==$jugador){
            $cantPart++;
            $puntajeTotal=$puntajeTotal+$colecPart[$indice]["puntaje"];
            if ($colecPart[$indice]["intentos"]>0 && $colecPart[$indice]["intentos"]<=6){
                $victorias++;
            }
            if ($colecPart[$indice]["intentos"]==1){
                $int1++;
            }elseif ($colecPart[$indice]["intentos"]==2){
                $int2++;
            }elseif ($colecPart[$indice]["intentos"]==3){
                $int3++;
            }elseif ($colecPart[$indice]["intentos"]==4){
                $int4++;
            }elseif ($colecPart[$indice]["intentos"]==5){
                $int5++;
            }elseif ($colecPart[$indice]["intentos"]==6){
                $int6++;
            }
        }
    }
    if ($cantPart > 0){
        $porcentaje=$victorias*100/$cantPart;
        echo "\nJugador: ".$jugador;
       echo "\nPartidas: ".$cantPart;
      echo "\nPuntaje Total: ".$puntajeTotal;
       echo "\nVictorias: ".$victorias;
       echo "\nPorcentaje de victorias: ".$porcentaje."%";
       echo "\nAdivinadas: ";
       echo "\n      Intento 1: ".$int1;
       echo "\n      Intento 2: ".$int2;
       echo "\n      Intento 3: ".$int3;
       echo "\n      Intento 4: ".$int4;
       echo "\n      Intento 5: ".$int5;
       echo "\n      Intento 6: ".$int6;
    }else{
        echo "\neste jugador no se encuentra en la base de datos";
    }
    
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
            $palabraSelecc=palabraElegida($coleccionPalabras);
            $partida=jugarWordix($palabraSelecc, strtolower($nombre));
            $coleccionPartidas[]=["palabraWordix" => $partida["palabraWordix"], "jugador" => $partida["jugador"], "intentos" => $partida["intentos"], "puntaje" => $partida["puntaje"]];
            break;

        case 2:
            // string $nombre $palabraSelecc, $partida array $coleccionPalabras
            $nombre=solicitarJugador();
            $palabraSelecc=opcAleatoria($coleccionPalabras);
            $partida=jugarWordix($palabraSelecc, strtolower($nombre));
            $coleccionPartidas[]=["palabraWordix" => $partida["palabraWordix"], "jugador" => $partida["jugador"], "intentos" => $partida["intentos"], "puntaje" => $partida["puntaje"]];
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
            echo "4";
            break;

        case 5:
            $nombre=solicitarJugador();
            echo "\n******************************************************************\n";
            mostrarEstadisticas($nombre, $coleccionPartidas);
            echo "\n******************************************************************\n";
            break;

        case 6;
            echo "6";
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
