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
    foreach ($questions as $question) {
        echo '<h3>' . $question[0] . '</h3>';

        foreach ($options as $option) {
            if ($option[1] == $question[0]) {

                echo '
                <label for="' . $option[0] . '">
                <input type="radio" name="' . $question[0] . '" value="' . $option[0] . '" id="' . $option[0] . '"';

                if ($lib_quiz->checkAnswer($option[0], $answers[0])) {
                    echo 'checked';
                }
                echo '>';
                echo $option[0];
                echo '</label>';
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
        echo '<strong>Note : $note/10</strong>';
    }
