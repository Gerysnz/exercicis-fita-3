<!-- L'exercici consta de 3 arxius:

productes.txt : contindrà una llista de productes, un per línia.
botiga.php : llegirà el contingut de productes.txt i crearà un formulari amb:
Un checkbox per cada producte amb el nom del producte.
Un input text per al nom de l'usuari.
Un submit button.
comandes.txt : quan s'envii el formulari es guardarà la comanda en aquest arxiu de text, de la forma:
nom_d'usuari,prod1,prod2,etc. -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    // Leer productos
    $fitxerProductes = 'productes.txt';
    $fitxerComandes = 'comandes.txt';
    $productes = [];
    if (file_exists($fitxerProductes)) {
        $productes = file($fitxerProductes, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    }

    // Si se envió el formulario
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $usuari = trim($_POST['usuari'] ?? '');
        $seleccionats = $_POST['producte'] ?? [];
        if ($usuari !== '' && !empty($seleccionats)) {
            $linea = $usuari . ',' . implode(',', $seleccionats) . "\n";
            file_put_contents($fitxerComandes, $linea, FILE_APPEND);
            echo '<p>Comanda guardada!</p>';
        } else {
            echo '<p>Introdueix el nom i selecciona almenys un producte.</p>';
        }
    }

    // Mostrar formulario
    echo '<form method="post">';
    echo '<label>Nom d\'usuari: <input type="text" name="usuari" required></label><br><br>';
    foreach ($productes as $prod) {
        echo '<label><input type="checkbox" name="producte[]" value="' . htmlspecialchars($prod) . '"> ' . htmlspecialchars($prod) . '</label><br>';
    }
    echo '<br><button type="submit">Enviar comanda</button>';
    echo '</form>';
    ?>
</body>
</html>