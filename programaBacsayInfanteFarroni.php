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


/*******************************EXPLICACION 3 PUNTO 1*******************************/

/**
 * Obtiene una colección de palabras
 * @return array
 */
function cargarColeccionPalabras(){
    //array $coleccionPalabras
    $coleccionPalabras = [
        "MUJER", "QUESO", "FUEGO", "CASAS", "RASGO",
        "GATOS", "GOTAS", "HUEVO", "TINTO", "NAVES",
        "VERDE", "MELON", "YUYOS", "PIANO", "PISOS",
        "ARBOL", "HOJAS", "ACERO", "ACIDO", "ARROZ"
    ];

    return ($coleccionPalabras);
}

/*******************************EXPLICACION 3 PUNTO 2*******************************/

/**
 * obtiene una coleccion de partidas pasadas
 * @return array
 */
function cargarPartidas(){
    //array $coleccion
    /*$coleccion = [];
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
    */
    $coleccion = [];
$pa1 = ["palabraWordix" => "SUECO", "jugador" => "kleiton", "intentos" => 0, "puntaje" => 0];
$pa2 = ["palabraWordix" => "YUYOS", "jugador" => "briba", "intentos" => 0, "puntaje" => 0];
$pa3 = ["palabraWordix" => "HUEVO", "jugador" => "zrack", "intentos" => 3, "puntaje" => 9];
$pa4 = ["palabraWordix" => "TINTO", "jugador" => "cabrito", "intentos" => 4, "puntaje" => 8];
$pa5 = ["palabraWordix" => "RASGO", "jugador" => "briba", "intentos" => 0, "puntaje" => 0];
$pa6 = ["palabraWordix" => "VERDE", "jugador" => "cabrito", "intentos" => 5, "puntaje" => 7];
$pa7 = ["palabraWordix" => "CASAS", "jugador" => "kleiton", "intentos" => 5, "puntaje" => 7];
$pa8 = ["palabraWordix" => "GOTAS", "jugador" => "kleiton", "intentos" => 0, "puntaje" => 0];
$pa9 = ["palabraWordix" => "ZORRO", "jugador" => "zrack", "intentos" => 4, "puntaje" => 8];
$pa10 = ["palabraWordix" => "GOTAS", "jugador" => "cabrito", "intentos" => 0, "puntaje" => 0];
$pa11 = ["palabraWordix" => "FUEGO", "jugador" => "cabrito", "intentos" => 2, "puntaje" => 10];
$pa12 = ["palabraWordix" => "TINTO", "jugador" => "briba", "intentos" => 0, "puntaje" => 0];

array_push($coleccion, $pa1, $pa2, $pa3, $pa4, $pa5, $pa6, $pa7, $pa8, $pa9, $pa10, $pa11, $pa12);
return $coleccion;
/*
return ($coleccion);*/
}

/*******************************EXPLICACION 3 PUNTO 3*******************************/

/** Muestra el menú para el usuario
 * @return int
 */
function seleccionarOpcion(){
    //int $minMenu, $maxMenu, $opcion
    $minMenu = 1;
    $maxMenu = 8;
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

/*******************************EXPLICACION 3 PUNTO 4*******************************/

/*En archivo wordix.php lineas (161-178)*/

/*******************************EXPLICACION 3 PUNTO 5*******************************/

/*En archivo wordix.php lineas (29-53)*/

/*******************************EXPLICACION 3 PUNTO 6*******************************/

/**
 * Muestra el historial de la partida
 * @param array $coleccionHistorial
 * @param int $numPart
 */
function mostrarHistorial($coleccionHistorial, $numPart){
    //array $partida
    $partida = $coleccionHistorial[$numPart];
    if ($partida["intentos"]>0){
        echo "Partida WORDIX ".($numPart+1).": palabra ". $partida["palabraWordix"] . "\n" . "Jugador: " . $partida["jugador"] . "\n" . "Puntaje: " . $partida["puntaje"] . " puntos\n" . "Intento: Adivinó la palabra en " . $partida["intentos"] . " intentos";
    } else {

        echo "Partida WORDIX " . $numPart . ": palabra " . $partida["palabraWordix"] . "\n" . "Jugador: " . $partida["jugador"] . "\n" . "Puntaje: " . $partida["puntaje"] . " puntos" . "\n" . "Intento: No adivinó la palabra.";
    }

}

/*******************************EXPLICACION 3 PUNTO 7*******************************/

/**
 * verifica que la palabra a ingresar no este en el arreglo de palabra, tenga 5 letras
 * @param array $coleccionPalabras
 * @param string $palabra5L
 * @return array
 */ 
function agregarPalabra($coleccionPalabras, $palabra5L){
    // int $i, $cantPalabras 
    // array $coleccionPalabras
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

/*******************************EXPLICACION 3 PUNTO 8*******************************/

/**
 * devuelve el indice de la primera partida ganada por el jugador ingresado
 * @param array $historial
 * @param string $usuario
 * @return int
 */
function primPartGan ($historial, $usuario){
    //int $aux, $indice, 

    $i=0;
    $n=count($historial);
    $jugo=false;
    while ($i<$n && $historial[$i]["jugador"]!=$usuario){
        $i++;
    }
    if ($i<$n){
        $jugo=true;
    }
    $i=0;
    while($i<$n && ($historial[$i]["jugador"]!= $usuario || $historial[$i]["puntaje"]<1)){
        $i++;
    }
    if ($i<$n){
        $indice=$i;
    }else{
        if ($jugo==true){
            $indice=-1;
        }else{
            $indice=-2;
        }
    }
    return ($indice);

    /*
    $aux=0;
    foreach ($historial as $ind => $elemento){
        if ($historial[$ind]["jugador"]==$usuario){
            if ($historial[$ind]["puntaje"]>0 && $aux==0){
                $indice = $ind;
                $aux=1;
            }
        }
    }
    if ($aux == 0){
        $indice = -1;
    }
    return ($indice);
    */
}

/*******************************EXPLICACION 3 PUNTO 9*******************************/

/**
 * evalua el historial de estadisticas y devuelve una estructura
 * @param array $partidas
 * @param string $usuario
 * @return array 
 */
function resumenStats ($partidas, $usuario){
    //int $cantPart, $puntajeTotal, $int1, $int2, $int3, $int4, $int5, $int6, $victorias
    //array $resumen

    $cantPart=0;
    $puntajeTotal=0;
    $int1=0;
    $int2=0;
    $int3=0;
    $int4=0;
    $int5=0;
    $int6=0;
    $victorias=0;
    foreach ($partidas as $indice => $elemento){
        if ($partidas[$indice]["jugador"]==$usuario){
            $cantPart++;
            $puntajeTotal=$puntajeTotal+$partidas[$indice]["puntaje"];
            if ($partidas[$indice]["puntaje"]>0){
                $victorias++;
            }
            $int=$partidas[$indice]["intentos"];
            switch($int){           // switch: hace referencia a las estructuras de control if...elseif
                case 1:
                    $int1++;
                    break;
                case 2:
                    $int2++;
                    break;
                case 3:
                    $int3++;
                    break;
                case 4:
                    $int4++;
                    break;
                case 5:
                    $int5++;
                    break;
                case 6:
                    $int6++;
                    break;
            }
        }
    }

    $resumen=[
        "jugador" => $usuario,
        "partidas" => $cantPart,
        "puntaje" => $puntajeTotal,
        "victoria" => $victorias,
        "intento1" => $int1,
        "intento2" => $int2,
        "intento3" => $int3,
        "intento4" => $int4,
        "intento5" => $int5,
        "intento6" => $int6,
    ];
    return ($resumen);
}

/**
 * Imprime el resumen del jugador
 * @param array $resumen
 */
function impResu ($resumen){
    if ($resumen["partidas"]>0){
        echo "\nJugador: ".$resumen["jugador"];
        echo "\nPartidas: ".$resumen["partidas"];
        echo "\nPuntaje Total: ".$resumen["puntaje"];
        echo "\nVictorias: ".$resumen["victoria"];
        echo "\nPorcentaje Victorias: ".($resumen["victoria"]*100/$resumen["partidas"])."%";
        echo "\nAdivinadas: ";
        echo "\n    Intento 1: ".$resumen["intento1"];
        echo "\n    Intento 2: ".$resumen["intento2"];
        echo "\n    Intento 3: ".$resumen["intento3"];
        echo "\n    Intento 4: ".$resumen["intento4"];
        echo "\n    Intento 5: ".$resumen["intento5"];
        echo "\n    Intento 6: ".$resumen["intento6"];
    }else{
        echo "este jugador no se encuentra en la base de datos";
    }
}

/*******************************EXPLICACION 3 PUNTO 10*******************************/

/**
 * Le pregunta al usuario su nombre y verifica si la primera letra pertenece al abecedario, al ser true, el string ingresado se transforma en minúsculas
 * @return string
 */
function solicitarJugador (){
    //boolean $scan
    //string $usuario, $startLengthStrg

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

/*******************************EXPLICACION 3 PUNTO 11*******************************/

/**
 * Compara los strings y determina cuál es mayor y cuál es menor
 * @param string $str1
 * @param string $str2
 * @return int
 */
function comparadorString($str1, $str2){
    //int $resultado

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
    print_r($coleccionHistorial); //Imprime el array obtenido
}

/*******************************EXPLICACION 3 PUNTO 12*******************************/

/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

/* PROGRAMA PRINCIPAL wordix*/
/* le permite al usuario jugar wordix, consultar el historial y agrgar palabras nuevas al juego */

//Declaración de variables:
// int $opcionMenu, $minMenu, $maxMenu, $maxArray, $minArray, $numPartida, $indice
// string $nombre, $palabraSelecc, $palabra5L
// array $coleccionPartidas, $coleccionPalabras, $partidas, $resumen


//Inicialización de variables:
$opcionMenu = 0;
$minMenu = 1;
$maxMenu = 8;
$coleccionPartidas = cargarPartidas();
$coleccionPalabras=cargarColeccionPalabras();

//Proceso:



logo();
do {
    
    $opcionMenu = seleccionarOpcion();
    switch ($opcionMenu){ // switch: hace referencia a las estructuras de control if...elseif
        case 1:
            $nombre=solicitarJugador();
            $palabraSelecc=palabraElegida($coleccionPalabras, $nombre, $coleccionPartidas);
            $partida=jugarWordix($palabraSelecc, $nombre);
            $coleccionPartidas[]=["palabraWordix" => $partida["palabraWordix"], "jugador" => $partida["jugador"], "intentos" => $partida["intentos"], "puntaje" => $partida["puntaje"]];
            break;

        case 2:
            // string $nombre $palabraSelecc, $partida array $coleccionPalabras
            $nombre=solicitarJugador();
            $palabraSelecc=opcAleatoria($coleccionPalabras, $nombre, $coleccionPartidas);
            $partida=jugarWordix($palabraSelecc, $nombre);
            $coleccionPartidas[]=["palabraWordix" => $partida["palabraWordix"], "jugador" => $partida["jugador"], "intentos" => $partida["intentos"], "puntaje" => $partida["puntaje"]];
            break;

        case 3:
            $maxArray = count($coleccionPartidas);
            $minArray = 0;
            echo "Seleccione una partida entre la partida N° ".($minArray +1)." y la N° ".($maxArray)."\n";
            $numPartida = solicitarNumeroEntre(1, $maxArray);
            $numPartida = $numPartida - 1;
                echo "\n******************************************************************\n";
                mostrarHistorial($coleccionPartidas, $numPartida);
                echo "\n******************************************************************\n";
            break;

        case 4:
            $nombre=solicitarJugador();
	        $indice=primPartGan($coleccionPartidas, $nombre);
	            echo "\n******************************************************************\n";
	            if ($indice>-1){
                    echo "\nPartida Wordix ".($indice+1).": palabra ".$coleccionPartidas[$indice]["palabraWordix"];
                    echo "\nJugador: ".$coleccionPartidas[$indice]["jugador"];
                    echo "\nPuntaje: ".$coleccionPartidas[$indice]["puntaje"];
                    echo "\nIntento: Adivino la palabra en ".$coleccionPartidas[$indice]["intentos"]." intentos";
                }elseif($indice==-1){
                    echo "\nEl jugador ".$nombre." no ganó ninguna partida";
                }else{
                    echo "\nEste usuario no jugo ninguna partida";
                }
	            echo "\n******************************************************************\n";
            break;

        case 5:
            $nombre=solicitarJugador();
            $resumen=resumenStats($coleccionPartidas, $nombre);
            echo "\n******************************************************************\n";
            impResu($resumen);
            echo "\n******************************************************************\n";
            break;

        case 6;
            echo "\n******************************************************************\n";
            echo "Este es el listado de partidas jugadas...\n\n";
            ordenarAlfab($coleccionPartidas);
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







/***************************************************************************************/
/*******************************FUNCIONES COMPLEMENTARIAS*******************************/
/***************************************************************************************/



/**
 * verifica si la palabra elegida ya fue utilizada por el gugador en el historial
 * @param string $nombre
 * @param string $palabra
 * @param array $historial
 * @return boolean
 * */ 
function palabraRepetida($nombre, $palabra, $historial){
    //boolean $igual 
    //int $i, $cant, $seguir

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
* @param array $coleccion
* @param string $nombre
* @param array $historial
* @return string 
*/
function palabraElegida ($coleccion, $nombre, $historial){
    // int $max $numPalabra
    // string $palabraEleg
    // boolean $esIgual
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
 * devuelve una palabra aleatoria de la coleccion
 * @param array $colecPalab
 * @param string $nombre
 * @param array $historial
 * @return string
 */
function opcAleatoria ($colecPalab, $nombre, $historial){
    // int $max, $numAleatorio, 
    // string $palab
    // boolean $esIgual
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
