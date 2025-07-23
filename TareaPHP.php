<?php
// Ejercicio 1: Fibonacci
function fibonacci($n) {
    if ($n <= 0) return [];

    $serie = [0];
    if ($n > 1) $serie[] = 1;

    while (count($serie) < $n) {
        $serie[] = end($serie) + prev($serie);
        next($serie); // volver al final
    }

    return $serie;
}

$terminos = 5;
echo "Los primeros $terminos términos de Fibonacci:\n";
echo implode(", ", fibonacci($terminos));


// Ejercicio 2: Verificar número primo
function esNumeroPrimo($n) {
    if ($n < 2 || ($n % 2 == 0 && $n != 2)) return false;

    for ($i = 3; $i <= sqrt($n); $i += 2) {
        if ($n % $i == 0) return false;
    }

    return true;
}

$numero = 1;
echo "<br>El número $numero " . (esNumeroPrimo($numero) ? "es primo" : "no es primo") . "<br>";


// Ejercicio 3: Palíndromo
function esPalindromoMod($cadena) {
    $filtrado = strtolower(preg_replace('/\W/', '', $cadena));
    return $filtrado === strrev($filtrado);
}

$palabra = "tralalero tralala";
echo "'$palabra' es un palíndromo? " . (esPalindromoMod($palabra) ? "SÍ" : "NO");


// Ejercicio 4: Suma de pares
function sumaPares(array $lista) {
    return array_reduce($lista, fn($acum, $n) => $acum + ($n % 2 === 0 ? $n : 0), 0);
}

$numeros = [1,2,3,4,5,6,7,8,9,10];
echo "<br>Suma de pares: " . sumaPares($numeros);


// Ejercicio 5: Costo de llamada
function obtenerZona($clave) {
    return [
        12 => "América del Norte", 15 => "América Central",
        18 => "América del Sur",   19 => "Europa",
        23 => "Asia",              25 => "África",
        29 => "Oceanía"
    ][$clave] ?? "Zona desconocida";
}

function calcularLlamada($clave, $min) {
    $tarifas = [
        12 => 2.00, 15 => 2.20, 18 => 4.50,
        19 => 3.50, 23 => 6.00, 25 => 6.00, 29 => 5.00
    ];

    if (!isset($tarifas[$clave])) return false;

    $costo = $tarifas[$clave] * $min;
    return $min < 30 ? $costo * 0.9 : $costo;
}

$clave = 25;
$minutos = 45;
$costo = calcularLlamada($clave, $minutos);

echo "<br>Llamada a " . obtenerZona($clave) . " (clave $clave)<br>";
echo "Duración: $minutos minutos<br>";
if ($costo !== false) {
    echo "Costo: $" . number_format($costo, 2) . "<br>";
    if ($minutos < 30) echo "(Con 10% de descuento)<br>";
} else {
    echo "Clave inválida<br>";
}


// Ejercicio 6: FizzBuzz
function fizzBuzzSimplificado($n) {
    return array_map(function($i) {
        $res = '';
        if ($i % 3 === 0) $res .= 'Fizz';
        if ($i % 5 === 0) $res .= 'Buzz';
        return $res ?: $i;
    }, range(1, $n));
}

function imprimirFizzBuzz($n) {
    $resultado = fizzBuzzSimplificado($n);
    echo "<br>FizzBuzz hasta $n:<br>";
    echo implode(", ", $resultado);
}

imprimirFizzBuzz(5);
?>
