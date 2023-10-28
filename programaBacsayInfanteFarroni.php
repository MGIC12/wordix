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


/** Muestra el menú para el usuario
 * @param string $player
 */
function mostrarMenu()
{
    //$opcionMenu
    echo "\n";
    echo "******************************************************************\n";
    echo "1) Jugar Wordix con una palabra predeterminada                    \n";
    echo "2) Jugar Wordix con una palabra aleatoria                         \n";
    echo "3) Mostrar una partida                                            \n";
    echo "4) Mostrar la primera partida ganadora                            \n";
    echo "5) Mostrar resumen de un jugador                                  \n";
    echo "6) Mostrar listado de partidas ordenadas por jugador y por palabra\n";
    echo "7) Agregar una palabra de 5 letras                                \n";
    echo "8) Salir                                                          \n";
    echo "******************************************************************\n";
}


/**
     * Devuelve una palabra del listado a partir de un numero
     * @param array $coleccion
     * @return string 
     */
    function palabraElegida ($coleccion){
        $max=count($coleccion);
        echo "Ingrse el numero de la palabra: ";
        $numPalabra=solicitarNumeroEntre(1, $max)-1;
           $palabraEleg=$coleccion[$numPalabra];
        
    return $palabraEleg;

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
 * Obtiene una colección/historial de partidas pasadas
 * @return array $coleccionPart
 */
function cargarColeccionPartidas() {
    $coleccionPart = [];
$part1 = ["palabraWordix" => "1", "jugador" => "n1", "intentos" => 0, "puntaje" => 0];
$part2 = ["palabraWordix" => "2", "jugador" => "n2", "intentos" => 0, "puntaje" => 0];
$part3 = ["palabraWordix" => "3", "jugador" => "n3", "intentos" => 3, "puntaje" => 9];
$part4 = ["palabraWordix" => "4", "jugador" => "n4", "intentos" => 4, "puntaje" => 8];
$part5 = ["palabraWordix" => "5", "jugador" => "n5", "intentos" => 0, "puntaje" => 0];
$part6 = ["palabraWordix" => "6", "jugador" => "n6", "intentos" => 5, "puntaje" => 7];
$part7 = ["palabraWordix" => "7", "jugador" => "n7", "intentos" => 5, "puntaje" => 7];
$part8 = ["palabraWordix" => "8", "jugador" => "n8", "intentos" => 0, "puntaje" => 0];
$part9 = ["palabraWordix" => "9", "jugador" => "n9", "intentos" => 4, "puntaje" => 8];
$part10 = ["palabraWordix" => "10", "jugador" => "n10", "intentos" => 0, "puntaje" => 0];
$part11 = ["palabraWordix" => "11", "jugador" => "n11", "intentos" => 2, "puntaje" => 10];
$part12 = ["palabraWordix" => "12", "jugador" => "n12", "intentos" => 0, "puntaje" => 0];

array_push($coleccionPart, $part1, $part2, $part3, $part4, $part5, $part6, $part7, $part8, $part9, $part10, $part11, $part12);
return ($coleccionPart);
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


/* ****COMPLETAR***** */



/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:


//Inicialización de variables:
$opcionMenu = 0;
$minMenu = 1;
$maxMenu = 8;
$coleccionPartidas = cargarColeccionPalabras();


//Proceso:

do {
    mostrarMenu();
    echo "Seleccione opción: \n";
    $opcionMenu = solicitarNumeroEntre($minMenu, $maxMenu);
    switch ($opcionMenu){
        case 1:
            echo "Ingrese su nombre: ";
            $nombre=trim(fgets(STDIN));
            $coleccionPalabras=cargarColeccionPalabras();
            $palabraSelecc=palabraElegida($coleccionPalabras);
            $partida=jugarWordix($palabraSelecc, strtolower($nombre));
            break;
        case 2:
            // string $nombre $palabraSelecc, $partida array $coleccionPalabras
            echo "Ingrese su nombre: ";
            $nombre=trim(fgets(STDIN));
            $coleccionPalabras=cargarColeccionPalabras();
            $palabraSelecc=opcAleatoria($coleccionPalabras);
            $partida=jugarWordix($palabraSelecc, strtolower($nombre));
            break;
        case 3:
            echo "Seleccione una partida entre la partida N° "."y la N° "."\n";
            $numPartida = trim(fgets(STDIN));
            $numPartida = $numPartida - 1;
            if (($numPartida >=0) && ($numPartida < count($coleccionPartidas))){
                mostrarHistorial($coleccionPartidas, $numPartida);
            }else{
                echo "No hay ninguna partida correspondiente con el número ingresado...";
            }
            break;
        case 4:
            echo "4";
            break;
        case 5:
            echo "5";
            break;
        case 6;
            echo "6";
            break;
        case 7:
            echo "7";
            break;
        case 8:
            echo "Gracias por jugar...";
            break;
    }
} while ($opcionMenu != 8);

/**$partida = jugarWordix("MELON", strtolower("MaJo"));*/
//print_r($partida);
//imprimirResultado($partida);