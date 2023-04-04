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
    ['question1', 'Quelle(s) affirmation(s) est/sont vraie(s) ?', 'univers-seo', 'free'],
    ['question2', 'Quelles sont les caractéristiques de la longue traîne ?', 'univers-seo', 'free'],
    ['question3', 'Quelle(s) affirmation(s) est/sont vraie(s) ?', 'univers-seo', 'free'],
    ['question4', 'À quoi servent les quality rates ?', 'univers-seo', 'free']
);

$options = array(
    ['La part de marché mondial de Google en 2021 était supérieur à 90%', 'question1', 'univers-seo', 'free', TRUE],
    ['La part de marché mondial de Google en 2021 était approximativement de 80%', 'question1', 'univers-seo', 'free', FALSE],
    ['93% des expériences en ligne commencent avec un moteur de recherche', 'question1', 'univers-seo', 'free', TRUE],
    ['83% des expériences en ligne commencent avec un moteur de recherche', 'question1', 'univers-seo', 'free', FALSE],

    ["Niveau de maturité de internaute élevé + Volume de recherche faible + Niveau de concurrence faible", 'question2', 'univers-seo', 'free', TRUE],
    ["Niveau de maturité de internaute faible + Volume de recherche élevé + Niveau de concurrence élevé", 'question2', 'univers-seo', 'free', FALSE],
    ["Niveau de maturité de internaute faible + Volume de recherche faible + Niveau de concurrence faible", 'question2', 'univers-seo', 'free', FALSE],

    ["Le SMO permet augmenter directement le pagerank", 'question3', 'univers-seo', 'free', FALSE],
    ["Le SMO permet augmenter indirectement le pagerank", 'question3', 'univers-seo', 'free', TRUE],
    ["Le SMO permet de réduire directement le pagerank", 'question3', 'univers-seo', 'free', FALSE],

    ["Ils modifient le classement des résultats de recherche ils ne sont pas satisfaisants", 'question4', 'univers-seo', 'free', FALSE],
    ["Ils donnent une note aux sites pour aider Google à filtrer les mauvais résultats en temps réel", 'question4', 'univers-seo', 'free', FALSE],
    ["Ils catégorisent des informations pour aider Google à améliorer ses algorithmes", 'question4', 'univers-seo', 'free', TRUE]
);

$explanations = array(
    ['clarification 1', 'question1', 'univers-seo', 'free'],
    ['clarification 2', 'question2', 'univers-seo', 'free'],
    ['clarification 3', 'question3', 'univers-seo', 'free'],
    ['clarification 4', 'question4', 'univers-seo', 'free'],
);


$knowledgeEvaluated = array(
    'Connaissances générales sur le SEO',
    'Connaissances générales sur le SEA',
    'Connaissances générales sur le SMO',
    'Connaissances générales sur le SXO'
);

$note = 0;
$totalPoints = 0;
$alert = '';
$successIndicator = 0.7;



