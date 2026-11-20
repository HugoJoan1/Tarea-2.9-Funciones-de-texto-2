<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    html{
        background-color: #05c5ff;
        text-align: center;
    }
    </style>
</head>
<body>

    <h1>Ejercicio 1. Generador de claves de identificación</h1>
    <h2>Escribe tu nombre completo y fecha de nacimiento:</h2>
    <form method="POST" action="">
        <label for="Nombre">Nombre completo:</label>
        <textarea type="text" step="any" name="Nombre" required></textarea>
        <br>
        <label for="Fecha">Fecha de Nacimiento:</label>
        <textarea type="text" step="any" name="Fecha" required></textarea>
        <br></br>
        <button type="submit" name="clave">Sacar clave</button>
    </form>

    <?php
    
    if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['clave'])){
    
    
     function obtenerIniciales($nombre){
        $iniciales = substr($nombre, 0, 3);
        $iniciales = strtoupper($iniciales);
        return $iniciales;
    }

    function ObtenerAño($fecha){
        $año = substr($fecha, 2, 2);
        return $año;
    }

    function MesDia($fecha){
        $mesdia = substr($fecha, 5, 2);
        $mesdia .= substr($fecha, 8, 2);
        return $mesdia;
    }

    function GenerarClave($iniciales, $año, $mesdia){
        $clave = $iniciales . $año . $mesdia;
        return $clave;
    }

    $nombre = $_POST['Nombre'];
    $nombre = trim($nombre);

    $fecha = $_POST['Fecha'];


    $iniciales = obtenerIniciales($nombre);
    $año = ObtenerAño($fecha);
    $mesdia = MesDia($fecha);
    $clave = GenerarClave($iniciales, $año, $mesdia);

    echo "<br> Su clave es: " . $clave;
    
    }
    
    
    
    
    
    ?>

</body>
</html>