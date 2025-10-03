<!--Ejercicios ficheros-->





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table, td, th {
            border-collapse: collapse;
            padding: 8px;
            border: 1px solid black;
            
        }
        
        
    </style>
</head>
<body>

<h1>PROCESSA CONTACTES</h1>


<table>
    <tr>
        <th>Nom</th>
        <th>Cognom1</th>
        <th>Cognom2</th>
        <th>Telèfon</th>
    </tr>
    
<?php
    $archivo = 'contactes31.txt';
    $contenido = file_get_contents($archivo);
    $lineas = explode("\n", $contenido);
    $contactos = [];
    foreach ($lineas as $linea) {
        
        $partes = explode(",", $linea);
        
        if (count($partes) === 4) {
            $contactos[] = [
                'nombre' => ($partes[0]),
                'apellido1' => ($partes[1]),
                'apellido2' => ($partes[2]),
                'telefono' => ($partes[3])
            ];
        }}
    //echo $lineas[0] . "<br>";
    foreach ($contactos as $contacto) {
        echo "<tr>";
        echo "<td>" . $contacto['nombre'] . "</td>";
        echo "<td>" . $contacto['apellido1'] . "</td>";
        echo "<td>" . $contacto['apellido2'] . "</td>";
        echo "<td>" . $contacto['telefono'] . "</td>";
        echo "</tr>";
    }
    //Mandar los contactos al fichero nuevo con otro fomrato, separados por #
    $nuevoArchivo = 'contactes31b.txt';
    $lineasNuevoArchivo = [];
    foreach ($contactos as $contacto) {
        $linea = $contacto['nombre'] . '#' . $contacto['apellido1'] . '#' . $contacto['apellido2'] . '#' . $contacto['telefono'];
        $lineasNuevoArchivo[] = $linea;
    }
    $contenidoNuevoArchivo = implode("\n", $lineasNuevoArchivo);
    file_put_contents($nuevoArchivo, $contenidoNuevoArchivo);
        


   


    
    ?>
</table>
    
    
</body>
</html>

