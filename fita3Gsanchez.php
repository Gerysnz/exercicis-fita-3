<!-- Farem u comptador de paraules coincidents entre 2 textos, ha de separar les paraules per espais
 primer formulario guardamos en 1 fichero sera frase.txt y le damos a tramet la consulta,
el segundo escribimos el texto y lo usamos pa compararlo con el primero que esta en el txt
 Mostramos el numero de palabras coincidentes con <li> rollo aparecera esto: · Paraula coincident: hola y como es una li aabajo tmb -->


 <!DOCTYPE html>
<html lang="ca">
<head>
<meta charset="UTF-8">
<title>Comparar paraules</title>
<style>
    
</style>
</head>
<body>

<h2>Fita 3: arxius</h2>

<form method="POST">
    <textarea name="frase" rows="3" cols="50" placeholder="Escriu el text..."></textarea><br><br>
    <input type="submit" value="Tramet la consulta">
</form>

<?php
$fitxer = "frase.txt";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $entrada = trim($_POST['frase']);

    if (!file_exists($fitxer) || filesize($fitxer) == 0) {
        file_put_contents($fitxer, $entrada);
        echo "<p><strong>Primer text desat correctament!</strong></p>";
    } 
    
    else {
        $primer_text = file_get_contents($fitxer);

        $pal1 = preg_split('/\s+/', strtolower($primer_text));
        $pal2 = preg_split('/\s+/', strtolower($entrada));

        $coincidents = array_intersect($pal1, $pal2);
        $coincidents = array_unique($coincidents);

        if (count($coincidents) > 0) {
            echo "<ul>";
            foreach ($coincidents as $p) {
                echo "<li>· Paraula coincident: <strong>$p</strong></li>";
            }
            echo "</ul>";
        } else {
            echo "<p>No hi ha paraules coincidents.</p>";
        }
        file_put_contents($fitxer, "");
    }
}
?>

</body>
</html>
