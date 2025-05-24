<?php
// Tableau des questions et réponses
$questions = [
    1 => [
        'question' => "Quel est le langage principal utilisé pour le développement web côté serveur ?",
        'options' => ["HTML", "CSS", "PHP", "JavaScript"],
        'reponse' => 2 // PHP
    ],
    2 => [
        'question' => "Quelle balise HTML permet de créer un lien ?",
        'options' => ["< link >", "< a >", "< href >", "< url >"],
        'reponse' => 1 // <a>
    ],
    3 => [
        'question' => "Quel mot-clé est utilisé pour créer une fonction en PHP ?",
        'options' => ["define", "function", "method", "create"],
        'reponse' => 1 // function
    ],
];

$score = 0;
$afficher_resultats = false;
$reponses_utilisateur = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $afficher_resultats = true;

    foreach ($questions as $num => $q) {
        if (isset($_POST["q$num"])) {
            $reponses_utilisateur[$num] = intval($_POST["q$num"]);
            if ($reponses_utilisateur[$num] === $q['reponse']) {
                $score++;
            }
        } else {
            $reponses_utilisateur[$num] = null;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mini Quiz PHP</title>
</head>
<body>
    <h2>Mini Quiz</h2>

    <form method="post">
        <?php foreach ($questions as $num => $q): ?>
            <fieldset>
                <legend><?php echo $q['question']; ?></legend>
                <?php foreach ($q['options'] as $index => $option): ?>
                    <label>
                        <input type="radio" name="q<?php echo $num; ?>" value="<?php echo $index; ?>"
                            <?php if ($afficher_resultats && isset($reponses_utilisateur[$num]) && $reponses_utilisateur[$num] === $index) echo 'checked'; ?>>
                        <?php echo $option; ?>
                    </label><br>
                <?php endforeach; ?>

                <?php if ($afficher_resultats): ?>
                    <?php
                        $bonne_reponse = $q['options'][$q['reponse']];
                        $utilisateur_a_bon = $reponses_utilisateur[$num] === $q['reponse'];
                    ?>
                    <p style="color:<?php echo $utilisateur_a_bon ? 'green' : 'red'; ?>">
                        <?php echo $utilisateur_a_bon ? "✔ Bonne réponse" : "✘ Mauvaise réponse. Réponse correcte : $bonne_reponse"; ?>
                    </p>
                <?php endif; ?>
            </fieldset><br>
        <?php endforeach; ?>

        <?php if ($afficher_resultats): ?>
            <h3>Score final : <?php echo $score . " / " . count($questions); ?></h3>
        <?php else: ?>
            <input type="submit" value="Soumettre">
        <?php endif; ?>
    </form>
</body>
</html>
