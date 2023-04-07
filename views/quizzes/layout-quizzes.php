<?php
ob_start();
?>

<form method="post" action="?quiz_name=<?= $_GET['quiz_name'] ?>&action=submit">

    <?php
    foreach ($questions as $key => $question) {
        echo '<h4>' . $question[1] . '</h4>';

        foreach ($options as $option) {
            if ($option[1] == $question[0]) {

                echo '
                <label for="' . $option[0] . '" class="';

                if (!$userAllowedToRespond) {

                    if ($option[4]) {
                        echo 'correctAnswer';
                        //s'il a pas répondu answer[key] est vide 
                        if ($lib_quiz->isCorrectAnswer($option, $answers[$key])) {
                            $note++; //bad idea to do this here?
                        }
                    } elseif (!$lib_quiz->isCorrectAnswer($option, $answers[$key]) && $lib_quiz->isChecked($option, $answers[$key])) {
                        echo 'wrongAnswer';
                        $note--; //bad idea to do this here?
                    }
                }

                echo '">
                <input type="checkbox" name="' . $question[0] . '[]" value="' . $option[0] . '" id="' . $option[0] . '"';

                if ($lib_quiz->isChecked($option, $answers[$key])) {
                    echo 'checked';
                }
                echo '>';
                echo $option[0];
                echo '</label>';

                //Count the number of correct answers
                if ($option[4]) {
                    $totalPoints++;
                }
            }
        }
        if (!$userAllowedToRespond) {
            echo '<blockquote>' . $explanations[$key][0] . '</blockquote>';
        }
    }
    ?>

    <?php
    if ($userAllowedToRespond) {
    ?>
        <p style="text-align:center;padding:3em;"><input type="submit" value="Valider mes réponses" /></p>
    <?php
    }
    ?>
</form>
<?php
if (!$userAllowedToRespond) {
    //need to save in data base if user succes the quiz or not to display result whithout check at the end and use ob_
    $percentageCorrectAnswers = $note / $totalPoints;
    if ($percentageCorrectAnswers >= $successIndicator) {
        $alert = 'Vous avez réussi ce quiz 🎉';
    } else {
        $alert = 'Vous n\'avez pas atteint le seuil de validation de ' . ($successIndicator * 10) . '/10.';
    }
}

$quiz = ob_get_clean();
?>


<h2 class='
<?php
if ($percentageCorrectAnswers >= $successIndicator) { //$successIndicator is define for each quiz
    echo 'quizValidated';
} elseif (isset($percentageCorrectAnswers)) {
    echo 'quizFailed';
}
?>'><?= $title; ?></h2>
<?= '<p>' . $alert . '</p>'; ?>
<h3>Connaissances évaluées</h3>

<ul>
    <?php
    foreach ($knowledgeEvaluated as $key => $value) {
        echo '<li>' . $value . '</li>';
    }
    ?>
</ul>
<h3>Calcul des points</h3>
<!-- <p><?= $note . '/' . $totalPoints ?></p> -->
<ul>
    <li>1 point par bonne réponse</li>
    <li>-1 point par mauvaise réponse</li>
    <li>Pour réussir le quiz, il faut obtenir une note minimale de 7/10</li>
</ul>


<h3>Questions</h3>
<?= $quiz; ?>