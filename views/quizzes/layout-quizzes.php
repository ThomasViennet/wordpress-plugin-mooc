<?php
ob_start();
?>

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

        echo $explanations[$key][0];
    }
    ?>

    <?php
    if ($userAllowedToRespond) {
    ?>
        <input type="submit" value="Valider mes réponses" />
</form>
<?php

    } else {
        //need to save in data base if user succes the quiz or not to display result whithout check at the end and use ob_
        $percentageCorrectAnswers = $note / $totalPoints;
        if ($percentageCorrectAnswers >= 0.6) {
            $alert = 'super';
        } else {
            $alert = 'oups';
        }
        echo $percentageCorrectAnswers;
    }

    $quiz = ob_get_clean();
?>


<h2 class='
<?php 
if ($percentageCorrectAnswers >= 0.6) {
    echo 'quizValidated';
    } else {
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

<?= $quiz; ?>