<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Calculatrice en PHP</title>
</head>
<body>
    <h2>Calculatrice</h2>
    
    <form method="post" action="">
        <label>Nombre 1:</label>
        <input type="number" step="any" name="nombre1" required><br><br>
        
        <label>Nombre 2:</label>
        <input type="number" step="any" name="nombre2" required><br><br>
        
        <label>Opération:</label>
        <select name="operation" required>
            <option value="addition">Addition (+)</option>
            <option value="soustraction">Soustraction (-)</option>
            <option value="multiplication">Multiplication (×)</option>
            <option value="division">Division (÷)</option>
        </select><br><br>
        
        <input type="submit" name="calculer" value="Calculer">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre1 = $_POST['nombre1'];
        $nombre2 = $_POST['nombre2'];
        $operation = $_POST['operation'];
        $resultat = 0;

        switch ($operation) {
            case 'addition':
                $resultat = $nombre1 + $nombre2;
                echo "<h3>Résultat : $nombre1 + $nombre2 = $resultat</h3>";
                break;
            case 'soustraction':
                $resultat = $nombre1 - $nombre2;
                echo "<h3>Résultat : $nombre1 - $nombre2 = $resultat</h3>";
                break;
            case 'multiplication':
                $resultat = $nombre1 * $nombre2;
                echo "<h3>Résultat : $nombre1 × $nombre2 = $resultat</h3>";
                break;
            case 'division':
                if ($nombre2 != 0) {
                    $resultat = $nombre1 / $nombre2;
                    echo "<h3>Résultat : $nombre1 ÷ $nombre2 = $resultat</h3>";
                } else {
                    echo "<h3 style='color:red;'>Erreur : Division par zéro !</h3>";
                }
                break;
            default:
                echo "<h3 style='color:red;'>Opération invalide</h3>";
        }
    }
    ?>
</body>
</html>
