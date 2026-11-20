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

    <h1>Ejercicio 2. Generador de nombres de usuario para una plataforma educativa</h1>
    <h2>Escribe tu nombre completo, la institucion y fecha de ingreso: </h2>
    <form method="POST" action="">
        <label for="Nombre">Nombre completo:</label>
        <textarea type="text" step="any" name="Nombre" required></textarea>
        <br>
        <label for="institucion">Institucion:</label>
        <textarea type="text" step="any" name="institucion" required></textarea>
        <br>
        <label for="ingreso">Fecha de ingreso:</label>
        <textarea type="text" step="any" name="ingreso" required></textarea>
        <br></br>
        <button type="submit" name="usuario">Sacar nombre de usuario</button>

        <?php
    
    if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['usuario'])){
    
    
     function limpiarNombre($nombre){
        $usuario = trim($nombre);
        $usuario = str_replace(" ", "", $usuario);
        return $usuario;
    }

    function ConvertirMinusculas($usuario){
        $usuario = strtolower($usuario);
        return $usuario;
    }

    function ObtenerInstitucion($institucion){
       $iniciales = substr($institucion, 0, 1);
       $iniciales = strtolower($iniciales);
       return $iniciales;
    }

    function ObtenerAño($ingreso){
        $año = substr($ingreso, 2, 2);
        return $año;
    }

    function generarUsuario($usuario, $iniciales, $año){
        $usuario = $usuario . $iniciales . $año;
        return $usuario;
    }


    $nombre = $_POST['Nombre'];
    $institucion = $_POST['institucion'];
    $ingreso = $_POST['ingreso'];


    $usuario = limpiarNombre($nombre);
    $usuario = ConvertirMinusculas($usuario);
    $iniciales = ObtenerInstitucion($institucion);
    $año = ObtenerAño($ingreso);
    $usuario = generarUsuario($usuario, $iniciales, $año);

    echo "<br><br><strong> Su clave es: " . $usuario;
    
    }
    
    
    
    
    
    ?>

    </form>