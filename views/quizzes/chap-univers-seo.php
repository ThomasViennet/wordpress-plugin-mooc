<?php
/*
* While waiting to manage quizzes with a CRUD and a database,
* use of variables similar to the answer of a database.
*/

$title = "Qu'est-ce que le SEO ?";

$formation = array(
    'free'
);

$chapites = array(
    ['univers-seo', 'free']
);

$questions = array(
    ['question 1', 'univers-seo', 'free'],
    ['question 2', 'univers-seo', 'free'],
    ['question 3', 'univers-seo', 'free']
);

$options = array(
    ['réponse 1', 'question 1', 'univers-seo', 'free'],
    ['réponse 2', 'question 1', 'univers-seo', 'free'],
    ['réponse 3', 'question 1', 'univers-seo', 'free'],

    ['réponse 1', 'question 2', 'univers-seo', 'free'],
    ['réponse 2', 'question 2', 'univers-seo', 'free'],
    ['réponse 3', 'question 2', 'univers-seo', 'free'],

    ['réponse 1', 'question 3', 'univers-seo', 'free'],
    ['réponse 2', 'question 3', 'univers-seo', 'free'],
    ['réponse 3', 'question 3', 'univers-seo', 'free']
);

$clarification = array(
    ['clarification 1', 'question 1', 'univers-seo', 'free'],
    ['clarification 2', 'question 2', 'univers-seo', 'free'],
    ['clarification 3', 'question 3', 'univers-seo', 'free']
);


$knowledgeEvaluated = array(
    'Connaissances générales sur le SEO',
    'Connaissances générales sur le SEA',
    'Connaissances générales sur le SMO',
    'Connaissances générales sur le SXO'
);
// if ($checked->execute('europe', $answers[0])) echo '✅'; 
require('layout-quizzes.php') ?>

