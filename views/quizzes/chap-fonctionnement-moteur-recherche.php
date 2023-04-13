<?php
/*
* While waiting to manage quizzes with a CRUD and a database,
* use of variables similar to the answer of a database.
*/

$title = "Fonctionnement d'un moteur de recherche";

$formation = array(
    'free'
);

$chapites = array(
    ['fonctionnement-moteur-recherche', 'free']
);

$questions = array(
    ['question1', 'Une Core Update de Google a pour objectif …', 'fonctionnement-moteur-recherche', 'free'],
    ['question2', 'Google peut …', 'fonctionnement-moteur-recherche', 'free'],
    ['question3', 'Après une action SEO …', 'fonctionnement-moteur-recherche', 'free'],
    ['question4', '', 'fonctionnement-moteur-recherche', 'free'],
    ['question5', '', 'fonctionnement-moteur-recherche', 'free'],
    ['question6', '', 'fonctionnement-moteur-recherche', 'free'],
    ['question7', '', 'fonctionnement-moteur-recherche', 'free'],
    ['question8', '', 'fonctionnement-moteur-recherche', 'free'],
    ['question9', '', 'fonctionnement-moteur-recherche', 'free'],
    ['question10', '', 'fonctionnement-moteur-recherche', 'free']
);

$options = array(
    ['De filtrer les sites faisant usage de techniques contraires aux guidelines de Google', 'question1', 'fonctionnement-moteur-recherche', 'free', FALSE],
    ['D\'améliorer la pertinence des résultats', 'question1', 'fonctionnement-moteur-recherche', 'free', TRUE],
    ['De mettre à jour l\'index de Google', 'question1', 'fonctionnement-moteur-recherche', 'free', FALSE],

    ['Pondérer ses critères de classement en fonction des interactions qu\'ont les internautes avec les SERP', 'question2', 'fonctionnement-moteur-recherche', 'free', TRUE],
    ['Utiliser des algorithmes pour tester les réactions des webmasters qui font du SEO', 'question2', 'fonctionnement-moteur-recherche', 'free', TRUE],
    ['Appliquer des filtres longtemps après une indexation d\'une URL lorsque celle-ci commence à gagner en visibilité', 'question2', 'fonctionnement-moteur-recherche', 'free', TRUE],

    ['On peut perdre des positions avant d\'en gagner', 'question3', 'fonctionnement-moteur-recherche', 'free', TRUE],
    ['On arrive à la nouvelle position qu\'on mérite dès que Google a pris en considération', 'question3', 'fonctionnement-moteur-recherche', 'free', FALSE],
    ['Si on perd des positions, il est préférable d\'effectuer un rollback', 'question3', 'fonctionnement-moteur-recherche', 'free', FALSE],

    ['', 'question4', 'fonctionnement-moteur-recherche', 'free', FALSE],
    ['', 'question4', 'fonctionnement-moteur-recherche', 'free', FALSE],
    ['', 'question4', 'fonctionnement-moteur-recherche', 'free', TRUE],

    ['', 'question5', 'fonctionnement-moteur-recherche', 'free', FALSE],
    ['', 'question5', 'fonctionnement-moteur-recherche', 'free', FALSE],
    ['', 'question5', 'fonctionnement-moteur-recherche', 'free', TRUE],

    ['', 'question6', 'fonctionnement-moteur-recherche', 'free', FALSE],
    ['', 'question6', 'fonctionnement-moteur-recherche', 'free', FALSE],
    ['', 'question6', 'fonctionnement-moteur-recherche', 'free', TRUE],

    ['', 'question7', 'fonctionnement-moteur-recherche', 'free', TRUE],
    ['', 'question7', 'fonctionnement-moteur-recherche', 'free', FALSE],
    ['', 'question7', 'fonctionnement-moteur-recherche', 'free', FALSE],

    ['', 'question8', 'fonctionnement-moteur-recherche', 'free', TRUE],
    ['', 'question8', 'fonctionnement-moteur-recherche', 'free', FALSE],
    ['', 'question8', 'fonctionnement-moteur-recherche', 'free', FALSE],

    ['', 'question9', 'fonctionnement-moteur-recherche', 'free', FALSE],
    ['', 'question9', 'fonctionnement-moteur-recherche', 'free', TRUE],
    ['', 'question9', 'fonctionnement-moteur-recherche', 'free', FALSE],
    ['', 'question9', 'fonctionnement-moteur-recherche', 'free', TRUE],

    ['', 'question10', 'fonctionnement-moteur-recherche', 'free', FALSE],
    ['', 'question10', 'fonctionnement-moteur-recherche', 'free', TRUE],
    ['', 'question10', 'fonctionnement-moteur-recherche', 'free', FALSE],
);

$explanations = array(
    [
        '<p>Certains algorithmes sont considérés comme des mises à jour (Core Update) de Google, car ils n’ont pas pour objectif premier de lutter contre des techniques agressives de SEO.</p>
        <p>Ils visent simplement à améliorer la qualité des résultats de recherche et par conséquent, ils font baisser dans le classement les mauvais résultats.</p>
        <p>Mais d’autres algorithmes sont conçus spécifiquement pour lutter contre ces techniques de manipulation, en ciblant les caractéristiques de ces techniques (fermes de contenu, cloaking, etc).</p>
        <p>Ils sont alors considérés comme des filtres qui nettoient l’index de Google.</p>',
        'question1', 'fonctionnement-moteur-recherche', 'free'
    ],

    [
        '<p>Un algorithme de "learning to rank" consiste à « apprendre à classer » les résultats en fonction du comportement des internautes.</p>
        <p>Un algorithme de "transition rank" peut servir à détecter une action de manipulation de classement en observant la réaction du webmaster.</p>
        <p>Google peut réduire ses coûts en retardant l\'application d\'un filtre sur une URL indexée tant que celle-ci est peu visible.</p>',
        'question2', 'fonctionnement-moteur-recherche', 'free'
    ],

    [
        '<p>Normalement, si vous fait un optimisation de la sémantique de votre contenu vous devriez obtenir instantanément votre nouvelle position légitime.</p>
        <p>Mais dans les faits on remarque souvent que cette évolution est temporisé sur plusieurs jours voir plusieurs mois.</p>
        <figure class="wp-block-image size-large"><img decoding="async" width="1024" height="829" src="https://referencime.fr/wp-content/uploads/2022/01/Processus-du-transition-rank-1024x829.png" alt="Processus du transition rank" class="wp-image-3840" srcset="https://referencime.fr/wp-content/uploads/2022/01/Processus-du-transition-rank-1024x829.png 1024w, https://referencime.fr/wp-content/uploads/2022/01/Processus-du-transition-rank-300x243.png 300w, https://referencime.fr/wp-content/uploads/2022/01/Processus-du-transition-rank-768x622.png 768w, https://referencime.fr/wp-content/uploads/2022/01/Processus-du-transition-rank-1200x972.png 1200w, https://referencime.fr/wp-content/uploads/2022/01/Processus-du-transition-rank.png 1284w" sizes="(max-width: 1024px) 100vw, 1024px"><figcaption class="wp-element-caption">Processus du transition rank.<br>Source : Changing a rank of a document by applying a rank transition function (12/08/2012) par Ross Koningstein.</figcaption></figure>',
        'question3', 'fonctionnement-moteur-recherche', 'free'
    ],
    ['', 'question4', 'fonctionnement-moteur-recherche', 'free'],
    ['', 'question5', 'fonctionnement-moteur-recherche', 'free'],
    ['', 'question6', 'fonctionnement-moteur-recherche', 'free'],
    ['', 'question7', 'fonctionnement-moteur-recherche', 'free'],
    ['', 'question8', 'fonctionnement-moteur-recherche', 'free'],
    ['', 'question9', 'fonctionnement-moteur-recherche', 'free'],
    ['', 'question10', 'fonctionnement-moteur-recherche', 'free'],
);


$knowledgeEvaluated = array(
    'Connaissances générales sur le fonctionnement d\'un moteur de recherche'
);

$note = 0;
$totalPoints = 0;
$alert = '';
$successIndicator = 0.7;
