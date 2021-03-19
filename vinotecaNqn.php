<?php

/**
 * Programa principal
 * invoca la funcion main
 */
main();

/** 
 *Crea un arreglo con tres tipos de vino (malbec, cabernet Sauvignon, Merlot) 
 *y se almacena la información: variedad, cantidad de botellas, año de producción, precio por unidad
 */
function main()
{
    /**
     * @var array $coleccionVino
     * @var array $datosVino
     */
    $coleccionVino = [
        "Malvec" => [
            ["variedad" => "Dulce", "cantidad" => 200, "añoProduccion" => 2000, "precio" => 1200],
            ["variedad" => "Seco", "cantidad" => 130, "añoProduccion" => 1990, "precio" => 3000],
            ["variedad" => "Amargo", "cantidad" => 70, "añoProduccion" => 1998, "precio" => 1900],
            ["variedad" => "Dulce", "cantidad" => 50, "añoProduccion" => 1930, "precio" => 4000]
        ],
        "Sauvignon" => [
            ["variedad" => "Dulce", "cantidad" => 300, "añoProduccion" => 2017, "precio" => 700],
            ["variedad" => "Semiseco", "cantidad" => 150, "añoProduccion" => 1999, "precio" => 1150],
            ["variedad" => "Seco", "cantidad" => 320, "añoProduccion" => 1960, "precio" => 3500],
            ["variedad" => "Seco", "cantidad" => 100, "añoProduccion" => 1900, "precio" => 5000]
        ],
        "Merlot" => [
            ["variedad" => "Dulce", "cantidad" => 300, "añoProduccion" => 2001, "precio" => 1000],
            ["variedad" => "Semidulce", "cantidad" => 100, "añoProduccion" => 1991, "precio" => 2200],
            ["variedad" => "Seco", "cantidad" => 90, "añoProduccion" => 1960, "precio" => 3700],
            ["variedad" => "Semiseco", "cantidad" => 50, "añoProduccion" => 1987, "precio" => 4300]
        ]
    ];

    $datosVino = calcularDatos($coleccionVino);
    mostrarDatos($datosVino);
}


/**
 *Funcion que recibe un arreglo con informacion de los vinos,
 *calcula la cantidad total de botellas y el precio promedio por variedad de vino
 *y retorna un arreglo con esta iformacion
 * @param array $coleccionVino
 * @return array $datosVino
 */
function calcularDatos($coleccionVino)
{
    /**
     * @var array $datosVino
     * @var float $precioTotal , $precioPromedio
     * @var int $cantTotalVino
     * @var string $tipoVino
     */
    $datosVino = [
        "Malvec" => ["cantidad" => 0, "precioPromedio" => 0],
        "Sauvignon" => ["cantidad" => 0, "precioPromedio" => 0],
        "Merlot" => ["cantidad" => 0, "precioPromedio" => 0]
    ];

    $precioTotal = 0;
    $cantTotalVino =0;

    foreach ($coleccionVino as $vino) {
        for ($i = 0; $i < count($vino); $i++) {
            $cantTotalVino=$cantTotalVino+$vino[$i]["cantidad"];
            $precioTotal = $precioTotal + (($vino[$i]["precio"])*$vino[$i]["cantidad"]);
        }
        $tipoVino = key($coleccionVino);
        $precioPromedio = ($precioTotal / $cantTotalVino);
        $datosVino[$tipoVino]["cantidad"] = $cantTotalVino;
        $datosVino[$tipoVino]["precioPromedio"] = $precioPromedio;

        $cantTotalVino = 0;
        $precioTotal = 0;
        next($coleccionVino);
    }
    return $datosVino;
}


/**
 * Muestra por pantalla la informacion de cada clase de vino, cant. botellas total y precio promedio
 * @param array $colVino
 */
function mostrarDatos($colVino)
{
    /**
     * @var int $i 
     * @var string $tipo
     */
    $i = 0;
    echo"Datos: "."\n";
    while ($i < count($colVino)) {
        $tipo = key($colVino);
        echo strtoupper($tipo) . "\n";
        echo "Botellas totales: " . $colVino[$tipo]["cantidad"] . "\n";
        echo "Precio promedio: $" . round($colVino[$tipo]["precioPromedio"],2) . "\n" . "\n";
        next($colVino);
        $i++;
    }
}
