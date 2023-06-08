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
    ['question4', 'L\'algorithme Penguin …', 'fonctionnement-moteur-recherche', 'free'],
    ['question5', 'L\'algorithme Panda …', 'fonctionnement-moteur-recherche', 'free'],
    ['question6', 'Les Googlebots …', 'fonctionnement-moteur-recherche', 'free'],
    ['question7', 'Qu’est-ce que la phase de rendering ?', 'fonctionnement-moteur-recherche', 'free'],
    ['question8', 'Qu’est-ce que la TF-IDF ?', 'fonctionnement-moteur-recherche', 'free'],
    ['question9', 'DUST : Quelle(s) affirmation(s) est/sont vraie(s) ?', 'fonctionnement-moteur-recherche', 'free'],
    ['question10', 'Qu\'est-ce que le PageRank ?', 'fonctionnement-moteur-recherche', 'free']
);

$options = array(
    ['De filtrer les sites faisant usage de techniques contraires aux guidelines de Google', 'question1', 'fonctionnement-moteur-recherche', 'free', FALSE],
    ['D\'améliorer la pertinence des résultats', 'question1', 'fonctionnement-moteur-recherche', 'free', TRUE],
    ['De mettre à jour l\'index de Google', 'question1', 'fonctionnement-moteur-recherche', 'free', FALSE],

    ['Pondérer ses critères de classement en fonction des interactions qu\'ont les internautes avec les SERP', 'question2', 'fonctionnement-moteur-recherche', 'free', TRUE],
    ['Utiliser des algorithmes pour tester les réactions des webmasters qui font du SEO', 'question2', 'fonctionnement-moteur-recherche', 'free', TRUE],
    ['Appliquer des filtres longtemps après l\'indexation d\'une URL, lorsque celle-ci commence à gagner en visibilité', 'question2', 'fonctionnement-moteur-recherche', 'free', TRUE],

    ['On peut perdre des positions avant d\'en gagner', 'question3', 'fonctionnement-moteur-recherche', 'free', TRUE],
    ['On arrive à la nouvelle position qu\'on mérite, dès que Google la prise en considération', 'question3', 'fonctionnement-moteur-recherche', 'free', FALSE],
    ['Si on perd des positions, il est préférable d\'effectuer un rollback', 'question3', 'fonctionnement-moteur-recherche', 'free', FALSE],

    ['Pénalise particulièrement l\'utilisation d’ancres exactes', 'question4', 'fonctionnement-moteur-recherche', 'free', TRUE],
    ['Pénalise généralement une URL', 'question4', 'fonctionnement-moteur-recherche', 'free', TRUE],
    ['Pénalise généralement un site dans sa globalité', 'question4', 'fonctionnement-moteur-recherche', 'free', FALSE],

    ['Pénalise les contenus de mauvaise qualité', 'question5', 'fonctionnement-moteur-recherche', 'free', TRUE],
    ['Détecte les caractéristiques du spam en fonction d’un arbre de décision', 'question5', 'fonctionnement-moteur-recherche', 'free', TRUE],
    ['Pénalise l’achat de liens', 'question5', 'fonctionnement-moteur-recherche', 'free', FALSE],

    ['Parcourent tous les sites de la même façon', 'question6', 'fonctionnement-moteur-recherche', 'free', FALSE],
    ['Peuvent filtrer les contenus dupliqués', 'question6', 'fonctionnement-moteur-recherche', 'free', TRUE],
    ['Attribuent des notes aux sites', 'question6', 'fonctionnement-moteur-recherche', 'free', FALSE],

    ['La phase de classement des résultats de recherche', 'question7', 'fonctionnement-moteur-recherche', 'free', FALSE],
    ['La phase de mise à jour de l\'index de Google', 'question7', 'fonctionnement-moteur-recherche', 'free', FALSE],
    ['La phase d\'analyse d\'un contenu d\'une URL tel que la verrait un internaute', 'question7', 'fonctionnement-moteur-recherche', 'free', TRUE],

    ['Une méthode de pondération pour évaluer l’importance d’un mot', 'question8', 'fonctionnement-moteur-recherche', 'free', TRUE],
    ['Une méthode de mesure de similarité en 2 textes', 'question8', 'fonctionnement-moteur-recherche', 'free', FALSE],
    ['Une méthode pour mesurer le temps de chargement d\'une URL', 'question8', 'fonctionnement-moteur-recherche', 'free', FALSE],

    ['On parle de DUST interne lorsqu\'un site crée des pages satellites pour se positionner sur des requêtes spécifiques', 'question9', 'fonctionnement-moteur-recherche', 'free', FALSE],
    ['Le DUST interne est fortement pénalisé par Google', 'question9', 'fonctionnement-moteur-recherche', 'free', FALSE],
    ['La déclaration d\'une URL canonical est un rustine intéressante pour le DUST', 'question9', 'fonctionnement-moteur-recherche', 'free', TRUE],
    ['Si une preprod est indexée, utiliser des canonicals permet d\'éviter tout problème', 'question9', 'fonctionnement-moteur-recherche', 'free', FALSE],
    ['Dans le cas de fiche produit, le DUST externe est moins grave que dans le cas d\'un contenu informationnel', 'question9', 'fonctionnement-moteur-recherche', 'free', TRUE],


    ['Le rang d\'une page dans les résultats de recherche', 'question10', 'fonctionnement-moteur-recherche', 'free', FALSE],
    ['Une formule qui mesure la "popularité" d\'une URL', 'question10', 'fonctionnement-moteur-recherche', 'free', TRUE],
    ['Le rang d\'une page dans les résultats de recherche', 'question10', 'fonctionnement-moteur-recherche', 'free', FALSE],
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
        '<p>Un algorithme de "learning to rank" consiste à "apprendre à classer" les résultats en fonction du comportement des internautes.</p>
        <p>Un algorithme de "transition rank" peut servir à détecter une action de manipulation de classement en observant la réaction du webmaster.</p>
        <p>Google peut réduire ses coûts en retardant l\'application d\'un filtre sur une URL indexée tant que celle-ci est pas/peu visible dans les résultats de recherche.</p>',
        'question2', 'fonctionnement-moteur-recherche', 'free'
    ],

    [
        '<p>Normalement, si vous fait un optimisation de la sémantique de votre contenu vous devriez obtenir instantanément votre nouvelle position légitime.</p>
        <p>Mais dans les faits on remarque souvent que cette évolution est temporisé sur plusieurs jours voir plusieurs mois.</p>
        <figure class="wp-block-image size-large"><img decoding="async" width="1024" height="829" src="https://referencime.fr/wp-content/uploads/2022/01/Processus-du-transition-rank-1024x829.png" alt="Processus du transition rank" class="wp-image-3840" srcset="https://referencime.fr/wp-content/uploads/2022/01/Processus-du-transition-rank-1024x829.png 1024w, https://referencime.fr/wp-content/uploads/2022/01/Processus-du-transition-rank-300x243.png 300w, https://referencime.fr/wp-content/uploads/2022/01/Processus-du-transition-rank-768x622.png 768w, https://referencime.fr/wp-content/uploads/2022/01/Processus-du-transition-rank-1200x972.png 1200w, https://referencime.fr/wp-content/uploads/2022/01/Processus-du-transition-rank.png 1284w" sizes="(max-width: 1024px) 100vw, 1024px"><figcaption class="wp-element-caption">Processus du transition rank.<br>Source : Changing a rank of a document by applying a rank transition function (12/08/2012) par Ross Koningstein.</figcaption></figure>',
        'question3', 'fonctionnement-moteur-recherche', 'free'
    ],
    [
        '<p>Ce filtre cible les liens artificielles visant à manipuler le PageRank d’une page et en particulier les ancres sur-optimisée (ancres qui ressemble fortement à une requête).</p>
        <p>Contrairement à Google Panda qui pénalise un site web dans sa globalité, Google Penguin pénalise une URL spécifique.</p>',
        'question4', 'fonctionnement-moteur-recherche', 'free'
    ],
    [
        '<p>L’objectif de Google Panda est donc de nettoyer l’index de Google en pénalisant les sites web ayant des contenus de mauvaise qualité.</p>
        <p>Comme pour les autres algorithmes, pour détecter les caractéristiques du spam ce fltre utilise un arbre de décision pour décider si oui ou non le contenu est du spam.</p>
        <figure class="wp-block-image size-full"><img decoding="async" width="664" height="624" src="https://referencime.fr/wp-content/uploads/2022/01/Arbre-de-de%CC%81cision-pour-de%CC%81tecter-le-spam.png" alt="Arbre de décision pour détecter le spam" class="wp-image-3901" srcset="https://referencime.fr/wp-content/uploads/2022/01/Arbre-de-décision-pour-détecter-le-spam.png 664w, https://referencime.fr/wp-content/uploads/2022/01/Arbre-de-décision-pour-détecter-le-spam-300x282.png 300w" sizes="(max-width: 664px) 100vw, 664px"><figcaption class="wp-element-caption">Arbre de décision pour détecter le spam.<br>Source : Detecting Spam Web Pages through Content Analysis</figcaption></figure>',
        'question5', 'fonctionnement-moteur-recherche', 'free'
    ],
    [
        '<p>Les Googlebots sont paramétrés avec des variables (durée de crawl accordé au site internet, nombre de pages à analyser par seconde, etc.) et n’interagissent pas de la même façon avec tous les sites internet.</p>
        <p>Un point important à noter est que les crawlers créent une empreinte du contenu (encodage du texte) avant de calculer le taux de duplication avec des contenus déjà indexés, pour identifier la page comme canonique ou non.</p>
        <figure class="wp-block-image size-large"><img decoding="async" width="731" height="1024" src="https://referencime.fr/wp-content/uploads/2022/01/Illusation-dun-syste%CC%80me-dexploration-du-web-pour-le-traitement-de-pages-web-explore%CC%81es-731x1024.png" alt="Illustration d\'un système d\'exploration du web pour le traitement de pages web explorées" class="wp-image-5137" srcset="https://referencime.fr/wp-content/uploads/2022/01/Illusation-dun-système-dexploration-du-web-pour-le-traitement-de-pages-web-explorées-731x1024.png 731w, https://referencime.fr/wp-content/uploads/2022/01/Illusation-dun-système-dexploration-du-web-pour-le-traitement-de-pages-web-explorées-214x300.png 214w, https://referencime.fr/wp-content/uploads/2022/01/Illusation-dun-système-dexploration-du-web-pour-le-traitement-de-pages-web-explorées-768x1075.png 768w, https://referencime.fr/wp-content/uploads/2022/01/Illusation-dun-système-dexploration-du-web-pour-le-traitement-de-pages-web-explorées-1097x1536.png 1097w, https://referencime.fr/wp-content/uploads/2022/01/Illusation-dun-système-dexploration-du-web-pour-le-traitement-de-pages-web-explorées.png 1164w" sizes="(max-width: 731px) 100vw, 731px"><figcaption class="wp-element-caption">Illustration d’un système d’exploration du web et du traitement des pages web explorées. <br><br>Source : Representative document selection for sets of duplicate documents in a web crawler system (19/07/2011) par Daniel Dulitz, Alexandre A. Verstak, Sanjay Ghemawat et Jeffrey A. Dean.</figcaption></figure>',
        'question6', 'fonctionnement-moteur-recherche', 'free'
    ],
    [
        '<p>Une fois que Google a crawlé et collecté toutes les informations sur la page web ainsi que les ressources liées (fichiers CSS, JS, etc.),
        il peut effectuer la phase de rendering, qui consiste à générer la page web telle qu’un internaute la verrait.</p>
        <p>Cette phase permet à Google d\'apprécier la mise en page du contenu de la page et d\'éventuels comportements contraire à ses bonnes pratiques.</p>
        ',
        'question7', 'fonctionnement-moteur-recherche', 'free'
    ],
    [
        '<p>TF signifie Term Frequency : il s’agit de la fréquence d’apparition du terme recherché dans le texte. Pour ne pas avantager les contenus de petite taille, cette fréquence est calculée en divisant le nombre d’apparitions du terme, par le nombre d’apparitions du terme le plus fréquent dans le contenu en question.</p>
        <p>IDF signifie Inverse Document Frequency : les termes présents dans la requête pouvant être très fréquents, l’importance de ceux-ci est pondérée en fonction de leur rareté au sein de l’index. Ainsi plus un mot est rare, plus son importance est grande.</p>
        <p>La valeur TF-IDF d’un terme est ensuite calculée en multipliant la TF par l’IDF.</p>',
        'question8', 'fonctionnement-moteur-recherche', 'free'
    ],
    [
        '<p>Nous pouvons distinguer la duplication totale et la duplication partielle de contenu.<P>
        <p>Duplication totale : Elle se produit lorsqu’un même contenu est accessible depuis 2 urls différentes (DUST, pour Duplicate Url Same Texte).</p>
        <p>Duplication partielle : Elle se produit avec 2 urls qui contiennent en partie un pourcentage de contenu identique (Near duplicate).</p>
        <p>Ces 2 cas de figure peuvent se produire que la duplication de contenu soit interne à un même site ou externe (entre 2 sites différents).</p>
        
        Afin de limiter les coûts, c’est lors du crawl qu’un contenu peut être détecté comme étant un contenu dupliqué, ce qui permet au moteur de recherche d’éviter d’indexer un contenu sans valeur ajoutée.
        <figure class="wp-block-image size-large"><img decoding="async" width="733" height="1024" src="https://referencime.fr/wp-content/uploads/2022/01/Illustration-dun-proce%CC%81de%CC%81-de-de%CC%81tection-de-documents-en-double-sur-la-base-du-contenu-dun-document-733x1024.png" alt="Illustration d\'un procédé de détection de documents en double sur la base du contenu d\'un document" class="wp-image-5138" srcset="https://referencime.fr/wp-content/uploads/2022/01/Illustration-dun-procédé-de-détection-de-documents-en-double-sur-la-base-du-contenu-dun-document-733x1024.png 733w, https://referencime.fr/wp-content/uploads/2022/01/Illustration-dun-procédé-de-détection-de-documents-en-double-sur-la-base-du-contenu-dun-document-215x300.png 215w, https://referencime.fr/wp-content/uploads/2022/01/Illustration-dun-procédé-de-détection-de-documents-en-double-sur-la-base-du-contenu-dun-document-768x1073.png 768w, https://referencime.fr/wp-content/uploads/2022/01/Illustration-dun-procédé-de-détection-de-documents-en-double-sur-la-base-du-contenu-dun-document.png 1092w" sizes="(max-width: 733px) 100vw, 733px"><figcaption class="wp-element-caption">Illustration d’un système d’exploration du web pour le traitement de pages web explorées.<br><br>Source : Representative document selection for sets of duplicate documents in a web crawler system (19/07/2011) par Daniel Dulitz, Alexandre A. Verstak, Sanjay Ghemawat et Jeffrey A. Dean.</figcaption></figure>',
        'question9', 'fonctionnement-moteur-recherche', 'free'],
    [
        '<p>Voici comment Larry Page décrivait cet algorithme en 1998 dans « The PageRank Citation Ranking: Bringing Order to the Web ».<p>
        <p><i>Si un internaute, que Larry Page nomme le « Surfeur aléatoire », démarre une session sur le web en prenant une URL au hasard et qu’il navigue sur le web en cliquant sur tous les liens qu’il trouve sur les pages web qu’il visite, puis qu’à un moment il décide d’arrêter sa session et qu’il reproduit ce processus encore et encore… Alors on pourra constater au bout d’un certain nombre de sessions que la proportion de fois où il passe sur une page finit par se stabiliser. C’est cette proportion de fois où il passe par la page qui donne le score de PageRank de cette page.</i></p>',
        'question10', 'fonctionnement-moteur-recherche', 'free'
    ],
);


$knowledgeEvaluated = array(
    'Connaissances générales sur le fonctionnement d\'un moteur de recherche.'
);

$note = 0;
$totalPoints = 0;
$alert = '';
$successIndicator = 0.7;
