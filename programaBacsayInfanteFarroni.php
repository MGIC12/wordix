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
}


/**
 * Le pregunta al usuario su nombre
 * @return string
 */
function preguntaNombre (){
    echo "Ingrese su nombre: ";
    $usuario=trim(fgets(STDIN));
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
 * @return array $coleccionPart
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


//Proceso:



logo();
do {
    seleccionarOpcion();
    echo "Seleccione opción: \n";
    $opcionMenu = solicitarNumeroEntre($minMenu, $maxMenu);
    switch ($opcionMenu){
        case 1:
            $nombre=preguntaNombre();
            $palabraSelecc=palabraElegida($coleccionPalabras);
            $partida=jugarWordix($palabraSelecc, strtolower($nombre));
            $coleccionPartidas[]=["palabraWordix" => $partida["palabraWordix"], "jugador" => $partida["jugador"], "intentos" => $partida["intentos"], "puntaje" => $partida["puntaje"]];
            break;
        case 2:
            // string $nombre $palabraSelecc, $partida array $coleccionPalabras
            $nombre=preguntaNombre();
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
            echo "5";
            break;
        case 6;
            echo "6";
            break;
        case 7:
            echo "7";
            /**$palabra5L = leerPalabra5Letras();
            $cantPalabras = count($coleccionPalabras);
            while($contador<=$cantPalabras && $palabras5L == 
            $coleccionPalabras[$cantPalabras] = $palabra5L;*/
            break;
        case 8:
            textoSalir();
            break;
    }
} while ($opcionMenu != 8);

/**$partida = jugarWordix("MELON", strtolower("MaJo"));*/
//print_r($partida);
//imprimirResultado($partida);
