<!--ex33.txt : crea un arxiu de text i dona-li els permisos adequats per tal que Apache hi pugui escriure.
Posa algun text d'exemple tipus lorem ipsum.

ex33pagina1.php : la pàgina ha de mostrar

El contingut de l’arxiu “text.txt”
Un formulari amb un camp de text (textarea) i un botó de submit. Quan s’envia el text, s’afegeix a l’arxiu 
ex33.txt i es torna a mostrar tot.
Després de cada missatge enregistrat afegirem una línia horitzontal per separar cadascun dels comentaris transmesos. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>EX33</h1>

    <?php
    $nomFitxer = 'ex33.txt';

    // Mostrar el contingut de l'arxiu
    if (file_exists($nomFitxer)) {
        $contingut = file_get_contents($nomFitxer);
        echo nl2br($contingut);
    } else {
        echo "<p>No hi ha comentaris encara.</p>";
    }
    ?>

    <hr>

    <form action="" method="POST">
        <label for="comentari">Introdueix el teu comentari:</label><br>
        <textarea name="comentari" id="comentari" cols="30" rows="10"></textarea><br>
        <input type="submit" value="Enviar">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $comentari = $_POST['comentari'] ?? '';

        // Afegir el comentari a l'arxiu amb una línia horitzontal
        file_put_contents($nomFitxer, $comentari . "\n<hr>\n", FILE_APPEND);

        // Redirigir per evitar reenvio del formulari
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
    ?>
    
</body>
</html>