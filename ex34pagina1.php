<!--Ens demanen un conversor per a una wiki similar a Markdown. A partir d’un arxiu de text, 
caldrà mostrar una pàgina web HTML amb seccions. Les seccions es marcaran amb el símbol ## a l’inici de la línia,
 que s’ha de mostrar amb el tag <H1>.

Arxiu de text:	Codi generat	Visualitzem:
## La 1a Guerra Mundial	<h1>La 1a Guerra Mundial</h1>	
La 1a Guerra Mundial
Caldrà crear 2 arxius:

ex34.txt:

Contindrà el text de l’article de la wiki que volem mostrar, amb al menys 2 títols.
Els salts de línia del .txt no es mostraran al renderitzar HTML, així que si en volem crear-los a l'arxiu de text caldrà indicar-los amb un <BR>.
ex34pagina1.php :

Carregarà el text del l’arxiu “article.txt”.
Substituirà les marques de títol ## per <H1> i les mostrarà. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>EX34</h1>

    <?php
    $nomFitxer = 'ex34.txt';

    // Comprovar si l'arxiu existeix
    if (file_exists($nomFitxer)) {
        // Llegir el contingut de l'arxiu
        $contingut = file_get_contents($nomFitxer);

        // Procesar línea por línea para convertir títulos y saltos de línea
        $linies = explode("\n", $contingut);
        foreach ($linies as $linia) {
            $linia = str_replace('<BR>', '<br>', $linia);
            if (strpos($linia, '##') === 0) {
                echo '<h1>' . htmlspecialchars(substr($linia, 2)) . '</h1>';
            } else {
                echo $linia . "<br>";
            }
        }
    } else {
        echo "<p>L'arxiu no existeix.</p>";
    }
    ?>    
</body>
</html>