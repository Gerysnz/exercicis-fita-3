<!--Consta d’1 sola pàgina PHP i 1 arxiu TXT.

comentaris.txt : el crearà la pàgina PHP
ex32.php (ull, només 1 pàgina):
Mostra un formulari enviat amb POST amb:
El text INTRODUEIX DADES
Un textarea amb name = “comentari”
Un camp de text amb el label “separador:” i amb name = “separador”
Botó d’enviar.
Si es reben dades:
Si no existís el fitxer comentaris.txt , el creem.
Afegim al fitxer comentaris.txt el contingut del camp “comentari” però substituint els espais pel text introduït a “separador”.-->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1>EX32</h1>

    <form action="" method="POST">
        <label for="comentari">INTRODUEIX DADES</label><br>
        <textarea name="comentari" id="comentari" cols="30" rows="10"></textarea><br>
        <label for="separador">separador:</label>
        <input type="text" name="separador" id="separador"><br>
        <input type="submit" value="Enviar">
    </form>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $comentari = $_POST['comentari'] ?? '';
        $separador = $_POST['separador'] ?? '';

        $comentariModificat = str_replace(' ', $separador, $comentari);
        $nomFitxer = 'comentaris.txt';

        file_put_contents($nomFitxer, $comentariModificat . "\n", FILE_APPEND);

        echo "<p>Comentari afegit al fitxer.</p>";
    }
    ?>
    
</body>
</html>