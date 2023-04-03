<?php
$title = "Comment fonctionne un moteur de recherche ?";
?>

<?php ob_start(); ?>
<h3>Compétences évaluées</h3>
<p>Connaissances générales sur le SEO</p>

<form method="post" action="?action=submit">

    <h3>Quelle(s) affirmation(s) est/sont vraie(s) ?</h3>
    <label for="1">
        <input type="radio" name="1" value="1" id="europe" <?php if ($checked->execute('1', $answers[0])) echo 'checked'; ?>>
        <?php if ($checked->execute('europe', $answers[0])) echo '✅'; ?>
        Après une action SEO, on peut perdre des positions avant d'en gagner
    </label>
    <label for="2">
        <input type="radio" name="2" value="2" id="afrique" <?php if ($checked->execute('1', $answers[0])) echo 'checked'; ?>>
        <?php if ($checked->execute('afrique', $answers[0])) echo '⛔️'; ?>
        Dès que Google a pris en considération une action SEO, on arrive à la nouvelle position qu'on mérite
    </label>
    <label for="3">
        <input type="radio" name="3" value="3" id="afrique" <?php if ($checked->execute('1', $answers[0])) echo 'checked'; ?>>
        <?php if ($checked->execute('afrique', $answers[0])) echo '⛔️'; ?>
        Après une action SEO, si on perd des positions, il est préférable d'effectuer un rollback
    </label>

    <?php 
    // if (condition) {
    //     # code...
    // }
    ?>
    <p>Explications : Blablablabla</p>


    <h3>Question 2 ?</h3>
    <label for="europe2">
        <input type="radio" name="question2" value="europe" id="europe2" <?php if ($checked->execute('europe', $answers[1])) echo 'checked'; ?>>
        <?php if ($checked->execute('europe', $answers[1])) echo '✅'; ?>
        Europe
    </label>
    <label for="afrique2">
        <input type="radio" name="question2" value="afrique" id="afrique2" <?php if ($checked->execute('afrique', $answers[1])) echo 'checked'; ?>>
        <?php if ($checked->execute('afrique', $answers[1])) echo '⛔️'; ?>
        Afrique
    </label>
    <p>Explications : Blablablabla</p>

    <h3>Question 3 ?</h3>
    <label for="europe2">
        <input type="radio" name="question3" value="europe" id="europe2" <?php if ($checked->execute('europe', $answers[2])) echo 'checked'; ?>>
        <?php if ($checked->execute('europe', $answers[2])) echo '✅'; ?>
        Europe
    </label>
    <label for="afrique2">
        <input type="radio" name="question3" value="afrique" id="afrique2" <?php if ($checked->execute('afrique', $answers[2])) echo 'checked'; ?>>
        <?php if ($checked->execute('afrique', $answers[2])) echo '⛔️'; ?>
        Afrique
    </label>
    <p>Explications : Blablablabla</p>

    <h3>Question 4 ?</h3>
    <label for="europe2">
        <input type="radio" name="question4" value="europe" id="europe2" <?php if ($checked->execute('europe', $answers[3])) echo 'checked'; ?>>
        <?php if ($checked->execute('europe', $answers[3])) echo '✅'; ?>
        Europe
    </label>
    <label for="afrique2">
        <input type="radio" name="question4" value="afrique" id="afrique2" <?php if ($checked->execute('afrique', $answers[3])) echo 'checked'; ?>>
        <?php if ($checked->execute('afrique', $answers[3])) echo '⛔️'; ?>
        Afrique
    </label>
    <p>Explications : Blablablabla</p>

    <h3>Question 5 ?</h3>
    <label for="europe2">
        <input type="radio" name="question5" value="europe" id="europe2" <?php if ($checked->execute('europe', $answers[4])) echo 'checked'; ?>>
        <?php if ($checked->execute('europe', $answers[4])) echo '✅'; ?>
        Europe
    </label>
    <label for="afrique2">
        <input type="radio" name="question5" value="afrique" id="afrique2" <?php if ($checked->execute('afrique', $answers[4])) echo 'checked'; ?>>
        <?php if ($checked->execute('afrique', $answers[4])) echo '⛔️'; ?>
        Afrique
    </label>
    <p>Explications : Blablablabla</p>

    <h3>Question 6 ?</h3>
    <label for="europe2">
        <input type="radio" name="question6" value="europe" id="europe2" <?php if ($checked->execute('europe', $answers[5])) echo 'checked'; ?>>
        <?php if ($checked->execute('europe', $answers[5])) echo '✅'; ?>
        Europe
    </label>
    <label for="afrique2">
        <input type="radio" name="question6" value="afrique" id="afrique2" <?php if ($checked->execute('afrique', $answers[5])) echo 'checked'; ?>>
        <?php if ($checked->execute('afrique', $answers[5])) echo '⛔️'; ?>
        Afrique
    </label>
    <p>Explications : Blablablabla</p>

    <h3>Question 7 ?</h3>
    <label for="europe2">
        <input type="radio" name="question7" value="europe" id="europe2" <?php if ($checked->execute('europe', $answers[6])) echo 'checked'; ?>>
        <?php if ($checked->execute('europe', $answers[6])) echo '✅'; ?>
        Europe
    </label>
    <label for="afrique2">
        <input type="radio" name="question7" value="afrique" id="afrique2" <?php if ($checked->execute('afrique', $answers[6])) echo 'checked'; ?>>
        <?php if ($checked->execute('afrique', $answers[6])) echo '⛔️'; ?>
        Afrique
    </label>
    <p>Explications : Blablablabla</p>

    <h3>Question 8 ?</h3>
    <label for="europe2">
        <input type="radio" name="question8" value="europe" id="europe2" <?php if ($checked->execute('europe', $answers[7])) echo 'checked'; ?>>
        <?php if ($checked->execute('europe', $answers[7])) echo '✅'; ?>
        Europe
    </label>
    <label for="afrique2">
        <input type="radio" name="question8" value="afrique" id="afrique2" <?php if ($checked->execute('afrique', $answers[7])) echo 'checked'; ?>>
        <?php if ($checked->execute('afrique', $answers[7])) echo '⛔️'; ?>
        Afrique
    </label>
    <p>Explications : Blablablabla</p>

    <h3>Question 9 ?</h3>
    <label for="europe2">
        <input type="radio" name="question9" value="europe" id="europe2" <?php if ($checked->execute('europe', $answers[8])) echo 'checked'; ?>>
        <?php if ($checked->execute('europe', $answers[8])) echo '✅'; ?>
        Europe
    </label>
    <label for="afrique2">
        <input type="radio" name="question9" value="afrique" id="afrique2" <?php if ($checked->execute('afrique', $answers[8])) echo 'checked'; ?>>
        <?php if ($checked->execute('afrique', $answers[8])) echo '⛔️'; ?>
        Afrique
    </label>
    <p>Explications : Blablablabla</p>

    <h3>Question 10 ?</h3>
    <label for="europe2">
        <input type="radio" name="question10" value="europe" id="europe2" <?php if ($checked->execute('europe', $answers[9])) echo 'checked'; ?>>
        <?php if ($checked->execute('europe', $answers[9])) echo '✅'; ?>
        Europe
    </label>
    <label for="afrique2">
        <input type="radio" name="question10" value="afrique" id="afrique2" <?php if ($checked->execute('afrique', $answers[9])) echo 'checked'; ?>>
        <?php if ($checked->execute('afrique', $answers[9])) echo '⛔️'; ?>
        Afrique
    </label>
    <p>Explications : Blablablabla</p>

<?php $content = ob_get_clean(); ?>
<?php require('layout-quizzes.php') ?>