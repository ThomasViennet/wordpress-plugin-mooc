<h2><?= $title; ?></h2>

<h3>Connaissances évaluées</h3>

<ul>
    <?php
    foreach ($knowledgeEvaluated as $key => $value) {
        echo '<li>' . $value . '</li>';
    }
    ?>
</ul>

<form method="post" action="?quiz_name=<?= $_GET['quiz_name'] ?>&action=submit">

    <?php
    foreach ($questions as $key => $question) {
        echo '<h3>' . $question[1] . '</h3>';

        foreach ($options as $option) {
            if ($option[1] == $question[0]) {

                echo '
                <label for="' . $option[0] . '" class="';

                if ($lib_quiz->isCorrectAnswer($option, $answers[$key], $note) == 'good') {
                    echo 'correctAnswer';
                    $note++; //bad idea to do this here?
                } elseif ($lib_quiz->isCorrectAnswer($option, $answers[$key], $note) == 'wrong') {
                    echo 'wrongAnswer';
                    $note--; //bad idea to do this here?
                }

                echo '">
                <input type="checkbox" name="question_' . $question[0] . '[]" value="' . $option[0] . '" id="' . $option[0] . '"';

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
    }
    ?>

    <?php
    if ($userAllowedToRespond) {
    ?>
        <input type="submit" value="Valider mes réponses" />
</form>
<?php
    } else {
        //do not display the results, just indicate whether the quiz is successful or not
        $percentageCorrectAnswers = $note / $totalPoints;
        echo '<strong>Note : ' . $note . '/' . $totalPoints . '</strong>'; //totalPoints x2 supérieur
        if ($percentageCorrectAnswers >= 0.8) {
            echo 'super';
        }
    }
