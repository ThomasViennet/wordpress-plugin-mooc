<?php
/*
* While waiting to manage quizzes with a CRUD and a database,
* use of variables similar to the answer of a database.
*/

$title = "L'univers du SEO";

$formation = array(
    'free'
);

$chapites = array(
    ['univers-seo', 'free']
);

$questions = array(
    ['question1', 'Pourquoi être visible sur Google ?', 'univers-seo', 'free'],
    ['question2', 'Les caractéristiques de la longue traîne sont ...', 'univers-seo', 'free'],
    ['question3', 'Le SMO permet ...', 'univers-seo', 'free'],
    ['question4', 'Le rôle des Quality Raters est de ...', 'univers-seo', 'free'],
    ['question5', 'Un contenu YMYL c\'est ...', 'univers-seo', 'free'],
    ['question6', 'Le pogo-sticking c\'est ...', 'univers-seo', 'free'],
    ['question7', 'Les principaux aspects jugés avec le concept EEAT sont ...', 'univers-seo', 'free'],
    ['question8', 'Les principaux signaux UX que Google prend en considération sont ...', 'univers-seo', 'free'],
    ['question9', 'Pourquoi utiliser le SEA ?', 'univers-seo', 'free'],
    ['question10', 'Pour un site éphémère qui doit se positionner rapidement, quelle(s) optimisation(s) pourriez-vous recommander ?', 'univers-seo', 'free']
);

$options = array(
    ['La part de marché mondial de Google en 2022 était supérieur à 90%', 'question1', 'univers-seo', 'free', TRUE],
    ['La part de marché mondial de Google en 2022 était approximativement de 80%', 'question1', 'univers-seo', 'free', FALSE],
    ['93% des expériences en ligne commencent avec un moteur de recherche', 'question1', 'univers-seo', 'free', TRUE],
    ['83% des expériences en ligne commencent avec un moteur de recherche', 'question1', 'univers-seo', 'free', FALSE],

    ['Niveau de maturité de l\'internaute élevé + Volume de recherche faible + Niveau de concurrence faible', 'question2', 'univers-seo', 'free', TRUE],
    ['Niveau de maturité de l\'internaute faible + Volume de recherche élevé + Niveau de concurrence élevé', 'question2', 'univers-seo', 'free', FALSE],
    ['Niveau de maturité de l\'internaute faible + Volume de recherche faible + Niveau de concurrence faible', 'question2', 'univers-seo', 'free', FALSE],

    ['D\'augmenter directement le pagerank', 'question3', 'univers-seo', 'free', FALSE],
    ['D\'augmenter indirectement le pagerank', 'question3', 'univers-seo', 'free', TRUE],
    ['De réduire directement le pagerank', 'question3', 'univers-seo', 'free', FALSE],

    ['Modifier le classement des résultats de recherche s\'ils ne sont pas satisfaisants', 'question4', 'univers-seo', 'free', FALSE],
    ['Donner une note aux sites pour aider Google à filtrer les mauvais résultats en temps réel', 'question4', 'univers-seo', 'free', FALSE],
    ['Catégoriser des informations pour aider Google à améliorer ses algorithmes', 'question4', 'univers-seo', 'free', TRUE],

    ['Un contenu qui a pour objectif de tromper les algorithmes de Google', 'question5', 'univers-seo', 'free', FALSE],
    ['Un contenu qui respect à la lettre les conseils de Google', 'question5', 'univers-seo', 'free', FALSE],
    ['Un contenu qui peut influencer la vie de celui qui le lit', 'question5', 'univers-seo', 'free', TRUE],

    ['L\'ajout de liens entrants internes avec des ancres optimisées vers une URL stratégique.', 'question6', 'univers-seo', 'free', FALSE],
    ['L\'ajout de mots clés à des endroits stratégiques du contenu : Title, structure Hn...', 'question6', 'univers-seo', 'free', FALSE],
    ['L\'interaction d\'un internaute qui cliquerait sur un résultat de recherche et qui reviendrait ensuite sur les résultats de recherche.', 'question6', 'univers-seo', 'free', TRUE],

    ['Auteur + Contenu principal + Site web', 'question7', 'univers-seo', 'free', TRUE],
    ['Technique + Contenu + Netlinking', 'question7', 'univers-seo', 'free', FALSE],
    ['Ergonomie mobile + Protocole HTTPS + Interstitiel intrusif', 'question7', 'univers-seo', 'free', FALSE],

    ['LCP + FID + CLS', 'question8', 'univers-seo', 'free', TRUE],
    ['TF-IDF + HITS + PR', 'question8', 'univers-seo', 'free', FALSE],
    ['TF + CF + DA', 'question8', 'univers-seo', 'free', FALSE],

    ['Le SEA permet d\'accélérer les résultats en SEO grâce à un apport de trafic qui est directement pris en compte par Google', 'question9', 'univers-seo', 'free', FALSE],
    ['Le SEA permet d\'obtenir des données stratégiques rapidement', 'question9', 'univers-seo', 'free', TRUE],
    ['Lancer régulièrement des campagnes SEA permet d\'envoyer un signal positif à Google et ainsi d\'améliorer les positions SEO', 'question9', 'univers-seo', 'free', FALSE],
    ['Le SEA est une solution en attendant d\'obtenir des résultats en SEO', 'question9', 'univers-seo', 'free', TRUE],

    ['Des techniques backdoor', 'question10', 'univers-seo', 'free', FALSE],
    ['Des techniques black hat', 'question10', 'univers-seo', 'free', TRUE],
    ['Des techniques growth hacking', 'question10', 'univers-seo', 'free', FALSE],
);

$explanations = array(
    ['93% des expériences en ligne commencent avec un moteur de recherche - <a href="https://www.imforza.com/blog/8-seo-stats-that-are-hard-to-ignore/">Source imforza.com</a><br>
    <br>La part de marché mondial de Google en 2022 était supérieur à 90% - <a href="https://gs.statcounter.com/search-engine-market-share#monthly-202201-202212-bar">Source statcounter.com</a>', 'question1', 'univers-seo', 'free'],
    ['<img src="https://referencime.fr/wp-content/uploads/2022/01/Sche%CC%81ma-des-caracte%CC%81ristiques-des-mots-cle%CC%81s-de-courte-moyenne-et-longue-trai%CC%82ne-1024x624.jpg">', 'question2', 'univers-seo', 'free'],
    ['Du fait que la grande majorité des réseaux sociaux utilisent la valeur nofollow pour l’attribut rel de leurs liens et que la plus par des contenus ne sont pas accessible au crawl : les liens qui y sont présents n’améliorent pas directement le PageRank.<br>
    <br>Toutefois, la visibilité offerte pas ces médias, favorise la génération des liens entrants (backlinks) en dofollow sur d’autres sites.', 'question3', 'univers-seo', 'free'],
    ['Les évaluations des Quality Raters n’impactent pas le classement des pages.<br>
    <br>Leur travail sert à juger de qualité des mises à jour des algorithmes de Google.<br>
    <cite>Source : <a href="https://support.google.com/websearch/answer/9281931?hl=fr">support.google.com</a></cite>', 'question4', 'univers-seo', 'free'],
    ['Un contenu fait partie de la catégorie <i>Your Money Your Life</i> (YMYL) s\'il a pour effet d\'impacter le bonheur futur, la santé, la stabilité financière ou la sécurité de leurs lecteurs.<br>
    <br>
    Il peut s\'agir par exemple de sujets liés à la banque, la santé, l\'assurance, le juridique etc.', 'question5', 'univers-seo', 'free'],

    ['En se rendant sur une page web après avoir été séduit par le titre et la description d’un résultat de recherche, si le contenu ne répond pas à son intention de recherche, il peut revenir sur la page de résultats, on parle alors de « pogo-sticking ».<br>
    <br>
    Cela a pour effet d’indiquer à Google que le contenu de cette page web n’est pas pertinent pour répondre à son intention de recherche.<br>
    <br>
    Par conséquent, Google adapte la pondération de ses critères de classement pour proposer de meilleurs résultats la prochaine fois.<br>
    <cite><a href="https://referencime.fr/formation-seo-gratuite/comment-fonctionne-un-moteur-de-recherche/comment-fonctionne-un-algorithme-de-learning-to-rank/">Plus d\'informations</a></cite>', 'question6', 'univers-seo', 'free'],

    ['Les aspects permettant de juger le niveau EEAT sont :
    <ul>
    <li>L’expertise de l’auteur du contenu principal.</li>
    <li>L’autorité de l’auteur du contenu principal.</li>
    <li>L’autorité du contenu principal.</li>
    <li>L’autorité du site web.</li>
    <li>La fiabilité de l’auteur du contenu principal.</li>
    <li>La fiabilité du contenu principal.</li>
    <li>La fiabilité du site web.</li>
    </ul>
    <cite>Source : <a href="https://static.googleusercontent.com/media/guidelines.raterhub.com/fr//searchqualityevaluatorguidelines.pdf">General Guidelines of Search Quality Rating Program</a></cite>',
    'question7', 'univers-seo', 'free'
    ],

    ['Les signaux web essentiels (Core Web Vitals) sont : 
    <ul><li>Les performances de chargement (Largest Content full Paint / LCP) pour afficher les éléments essentiels tels que le titre, illustration et le contenu principal.</li>
    <li>L’interactivité de la page (First Input Delay / FID) évalue la réactivité du chargement de la page grâce au délai entre la première interaction faite par l’utilisateur et le temps où son navigateur pourra lui répondre.</li>
    <li>La stabilité visuelle (Cumulative Layout Shift / CLS) évalue les différents changements de mis en page subis par l’internaute (décalage des différents blocs).</li></ul>
    <img decoding="async" width="1024" height="270" src="https://referencime.fr/wp-content/uploads/2022/02/SXO-crite%CC%80res-de-performances-1024x270.png" alt="Les signaux web essentiels (Core Web Vitals)" class="wp-image-5392 entered lazyloaded" data-lazy-srcset="https://referencime.fr/wp-content/uploads/2022/02/SXO-critères-de-performances-1024x270.png 1024w, https://referencime.fr/wp-content/uploads/2022/02/SXO-critères-de-performances-300x79.png 300w, https://referencime.fr/wp-content/uploads/2022/02/SXO-critères-de-performances-768x203.png 768w, https://referencime.fr/wp-content/uploads/2022/02/SXO-critères-de-performances-1200x317.png 1200w, https://referencime.fr/wp-content/uploads/2022/02/SXO-critères-de-performances.png 1418w" data-lazy-sizes="(max-width: 1024px) 100vw, 1024px" data-lazy-src="https://referencime.fr/wp-content/uploads/2022/02/SXO-crite%CC%80res-de-performances-1024x270.png" data-ll-status="loaded" sizes="(max-width: 1024px) 100vw, 1024px" srcset="https://referencime.fr/wp-content/uploads/2022/02/SXO-critères-de-performances-1024x270.png 1024w, https://referencime.fr/wp-content/uploads/2022/02/SXO-critères-de-performances-300x79.png 300w, https://referencime.fr/wp-content/uploads/2022/02/SXO-critères-de-performances-768x203.png 768w, https://referencime.fr/wp-content/uploads/2022/02/SXO-critères-de-performances-1200x317.png 1200w, https://referencime.fr/wp-content/uploads/2022/02/SXO-critères-de-performances.png 1418w"><br>
        <cite><a href="https://web.dev/vitals/">Plus d\'informations</a></cite>
    ', 'question8', 'univers-seo', 'free'],
    
    ['Comme pour le SMO, le SEA n\'impact pas directement le SEO.<br>
    <br>
    Mais ce levier doit faire partie d\'une stratégie de référencement pour gagner en visibilité et obtenir des données stratégiques qui permettront d\'orienter la stratégie SEO (taux de conversion d\'une requête, etc.).  ', 'question9', 'univers-seo', 'free'],
    
    ['Les techniques black hat permettent d\'améliorer rapidement la visibilité d\'un contenu mais à court terme, car tôt ou tard un filtre finira par être déployé pour pénaliser une technique qui fonctionnerait à un temps T.<br>
    <br>
    Vous devez toujours avertir clairement vos clients des risques qu’ils encourent en utilisant des techniques black hat.', 'question10', 'univers-seo', 'free'],
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
