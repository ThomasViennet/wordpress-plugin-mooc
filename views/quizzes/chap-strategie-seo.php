<?php
/*
* While waiting to manage quizzes with a CRUD and a database,
* use of variables similar to the answer of a database.
*/

$title = "Conception d'une stratégie SEO";

$formation = array(
    'free'
);

$chapites = array(
    ['strategie-seo', 'free']
);

$questions = array(
    ['question1', 'Un PBN est ...', 'strategie-seo', 'free'],
    ['question2', 'Lors de l’optimisation d’un maillage interne …', 'strategie-seo', 'free'],
    ['question3', 'À qualité équivalente, 2 liens provenant d’un nom de domaine valent autant que 2 liens provenant de 2 noms de domaine différents', 'strategie-seo', 'free'],
    ['question4', 'Un bon réflexe pour le netlinking est …', 'strategie-seo', 'free'],
    ['question5', 'Si un site "A" fait un lien vers un site "B" et qu\'un site "C" fait un lien vers un site "D" et que ce site "D" fait un lien vers le site "A". Alors si le site "B" fait un lien vers le site "C" cela augmentera le PR du site "A".', 'strategie-seo', 'free'],
    ['question6', 'Vous avez 10 000€ de budget d’achat de liens vous …', 'strategie-seo', 'free'],
    ['question7', 'Quelle(s) technique(s) de netlinking est/sont légale(s) ', 'strategie-seo', 'free'],
    ['question8', 'Pour se positionner sur une requête informationnelle …', 'strategie-seo', 'free'],
    ['question9', 'L’attribut de lien …', 'strategie-seo', 'free'],
    ['question10', 'Un site qui ne crée pas de nouvelles URL et qui ne reçoit pas de lien restera stable dans les résultats de recherche.', 'strategie-seo', 'free']
);

$options = array(
    ['Une technique ayant pour objectif de limiter les risques d\'attaque de liens "toxiques"', 'question1', 'strategie-seo', 'free', FALSE],
    ['Détectable en fonction d\'une multitude de signaux concordants', 'question1', 'strategie-seo', 'free', TRUE],
    ['Une technique permettant différencier le contenu servi aux robots d’indexation de celui servi aux humains', 'question1', 'strategie-seo', 'free', FALSE],

    ['Plus un site a d\'URL indexées plus le maillage structurel est impactant', 'question2', 'strategie-seo', 'free', TRUE],
    ['Répertorier les backlinks obtenus permet de prioriser l’intégration du maillage contextuel', 'question2', 'strategie-seo', 'free', TRUE],
    ['L’utilisation de l’attribut nofollow permet d’éviter la fuite de PageRank', 'question2', 'strategie-seo', 'free', FALSE],

    ['Vrai', 'question3', 'strategie-seo', 'free', FALSE],
    ['Faux', 'question3', 'strategie-seo', 'free', TRUE],

    ['De créer un "spam report" si vous constatez qu’un concurrent achète des liens pour que Google puisse rapidement intervenir', 'question4', 'strategie-seo', 'free', FALSE],
    ['De vérifier régulièrement si votre site reçoit des liens "toxiques" pour les désavouer rapidement auprès de Google', 'question4', 'strategie-seo', 'free', FALSE],
    ['D’analyser le netlinking du top 20 de la SERP pour la requête que vous visez afin d’adapter votre stratégie', 'question4', 'strategie-seo', 'free', TRUE],

    ['Vrai', 'question5', 'strategie-seo', 'free', TRUE],
    ['Faux', 'question5', 'strategie-seo', 'free', FALSE],

    ['Essayez d’obtenir dès que possible tous vos liens', 'question6', 'strategie-seo', 'free', FALSE],
    ['Adaptez le rythme d’acquisition de liens au précédent', 'question6', 'strategie-seo', 'free', TRUE],
    ['Ciblez essentiellement vos URL stratégiques', 'question6', 'strategie-seo', 'free', FALSE],
    ['Répartissez naturellement les cibles des backlinks', 'question6', 'strategie-seo', 'free', TRUE],

    ['Faire héberger un fichier PDF qui contient un lien vers votre site', 'question7', 'strategie-seo', 'free', TRUE],
    ['Hacker un site pour modifier le contenu d’une URL', 'question7', 'strategie-seo', 'free', FALSE],
    ['Acheter un lien sur un site web', 'question7', 'strategie-seo', 'free', TRUE],

    ['Toutes les zones chaudes doivent contenir la requête ciblée', 'question8', 'strategie-seo', 'free', FALSE],
    ['Le contenu de l\'URL doit utiliser les mots attendus par Google', 'question8', 'strategie-seo', 'free', TRUE],

    ['rel="Sponsored" permet d’indiquer à Google que ce lien à été sponsorisé / acheté', 'question9', 'strategie-seo', 'free', TRUE],
    ['rel="Nofollow" permet d’interdire à Google de transmettre du PageRank', 'question9', 'strategie-seo', 'free', FALSE],
    ['rel="UGC" permet d’indiquer à Google qui est l\'auteur du contenu', 'question9', 'strategie-seo', 'free', FALSE],

    ['Vrai', 'question10', 'strategie-seo', 'free', FALSE],
    ['Faux', 'question10', 'strategie-seo', 'free', TRUE],
);

$explanations = array(
    [
        '<p>La détection d’un PBN peut être difficile, car les propriétaires de PBN utilisent souvent des techniques pour masquer leur réseau de blogs et le rendre difficile à détecter.</p>
        <p>Voici quelques indicateurs qui pourraient vous aider à identifier PBN:</p>
        <ul>
        <li>Modèles de conception similaires</li>
        <li>Noms de domaine similaires</li>
        <li>Contenu de faible qualité</li>
        <li>Liens sortants excessifs</li>
        <li>Profils de lien similaires</li>
        <li>Métriques de domaine douteuses</li>
        </ul>
        <p>Il est important de noter que ces indicateurs peuvent également être présents sur des sites web légitimes.</p>
        <p>Aucun indicateur isolé ne constitue une preuve définitive de l’existence d’un PBN. Il faut prendre en compte plusieurs facteurs pour évaluer si un site web ou un réseau de blogs est un PBN.</p>',
        'question1', 'strategie-seo', 'free'
    ],
    [
        '<p><strong>Maillage structurel</strong> : un lien qui serait ajouté sur une grande quantité d’URL et qui plus est à bon emplacement tel que la navigation principale du site, permet de donner rapidement beaucoup de puissance à une URL.</p>
        <p><strong>Maillage contextuel</strong> : il est préférable de prioriser les URL à travailler en faisant au préalable :</p>
        <ul>
        <li>Une étude du netlinking pour connaître les URL les plus  "populaire" d\'un point de vue externe.</li>
        <li>Une étude du maillage interne pour connaître les URL qui sont le plus populaire d\'un point vue interne.</li>
        </ul>
        <p><strong>L\'attribut nofollow</strong> ne permet pas d\'éviter la fuite de PageRank. Il permet simplement de ne pas transmettre de PageRank à l\'URL ciblée.</p>
        ',
        'question2', 'strategie-seo', 'free'
    ],
    ['<p>La popularité induite par l\'acquisition de lien est plus importante si les liens proviennent de sites différents.</p>', 'question3', 'strategie-seo', 'free'],
    [
        '<p><strong>Faire un spam report</strong> n’a pas d’effet immédiat, ce formulaire sert à Google pour prendre en considération la pratique dénoncer pour améliorer par la suite les filtres algorithmiques.</p>
        <p><strong>Désavouer les liens</strong> n’est utile que dans le cas d’une action manuelle d’un moteur de recherche. Cela dit cela permettra d’envoyer une signal d’alerte à Google sur ces sites spammy.</p>
        <p><strong>Analyser le netlinking</strong> de vos concurrents vous permet d\'estimer le gap à faire pour se positionner tout en gardant un profil de netlinking naturel.</p>',
        'question4', 'strategie-seo', 'free'
    ],
    [
        '<p>Plutôt que de faire entrer l’un de vos sites dans un partenariat d’échange de lien, vous pouvez augmenter votre PageRank en le faisant circuler dans un circuit de site dont vous faites partie.</p>
        <figure class="wp-block-image size-large"><img decoding="async" width="1024" height="110" src="https://referencime.fr/wp-content/uploads/2021/08/Netlinking-en-utilisant-des-pages-externes-1024x110.jpg" alt="Netlinking en utilisant des pages externes." class="wp-image-1582" srcset="https://referencime.fr/wp-content/uploads/2021/08/Netlinking-en-utilisant-des-pages-externes-1024x110.jpg 1024w, https://referencime.fr/wp-content/uploads/2021/08/Netlinking-en-utilisant-des-pages-externes-300x32.jpg 300w, https://referencime.fr/wp-content/uploads/2021/08/Netlinking-en-utilisant-des-pages-externes-768x82.jpg 768w, https://referencime.fr/wp-content/uploads/2021/08/Netlinking-en-utilisant-des-pages-externes-1536x164.jpg 1536w, https://referencime.fr/wp-content/uploads/2021/08/Netlinking-en-utilisant-des-pages-externes-2048x219.jpg 2048w, https://referencime.fr/wp-content/uploads/2021/08/Netlinking-en-utilisant-des-pages-externes-1200x128.jpg 1200w, https://referencime.fr/wp-content/uploads/2021/08/Netlinking-en-utilisant-des-pages-externes-1980x212.jpg 1980w" sizes="(max-width: 1024px) 100vw, 1024px"><figcaption class="wp-element-caption">Netlinking en utilisant des pages externes.</figcaption></figure>
        <p>Comme vous pouvez le voir sur ce schéma, le PageRank circule de gauche à droite entre les pages web et une fois arrivé au dernier site il revient à son point de départ pour repasser à nouveau par notre site.</p>',
        'question5', 'strategie-seo', 'free'
    ],
    [
        '<p>Google détecte l\'aquisition de liens artificielle grâce à une multitude de signaux.</p>
        <p>Pour passer sous les radars de Google, il faut garder un profil de netlinking qui soit le plus naturel possible. En ce sens, étudier la concurrence vous permet d\'estimer ce qui est la norme en terme de netlinking pour votre thématique.
        </p>',
        'question6', 'strategie-seo', 'free'
    ],
    [
        '<p>Il est important de faire une distinction entre les techniques black hat légales et illégales.</p>
        <p>Tout ce qui va à l’encontre des règles de Google (manipulation du PageRank, etc.) n’est pas forcement illégal au yeux de la loi. Mais certaines techniques de « hacking » elles le sont (intrusion sur un serveur, etc.).</p>
        <p>Pour ce qui est des techniques de hacking purement illégales, il va sans dire que vous ne devez en aucun cas en faire usage.</p>
        <p>Concernant les techniques légales, celles-ci peuvent quant à elles coûter cher si elles sont détectées par les moteurs de recherche. Mais elles peuvent être intéressantes / nécessaires pour répondre à des objectifs.</p>',
        'question7', 'strategie-seo', 'free'
    ],
    [
        '<p>Google crée un cluster de mots qui sont liés à une requête, qui lui permet (en partie) de juger la pertinence des contenus.</p>
        <p>Par conséquent, plus un contenu utilise de façon exhaustive et avec une bonne pondération le cluster d’une requête, plus il sera jugé comme étant pertinent.</p>
        <blockquote class="wp-block-quote">
        <p>Cela implique certes le contenu textuel d’une page, mais également tout ce qui compose sa sémantique telle que la structure HTML de la page.</p>
        <p>Par exemple, un listing de produits contribue à sémantiser / façonner le contenu vers une intention d’achat.</p>
        </blockquote>
        <p>L’objectif est donc de sculpter la sémantique des contenus, pour qu’ils répondent parfaitement à l’intention de la requête visée :</p>
        <figure class="wp-block-image size-large is-style-default"><img decoding="async" width="1024" height="920" src="https://referencime.fr/wp-content/uploads/2022/02/Contenus-pour-se%CC%81mantique-SEO-et-cocon-se%CC%81mantique-1024x920.jpg" alt="Représentation de contenus qui correspondent à la sémantique attendue des requêtes &quot;Sémantique SEO&quot; et &quot;Cocon Sémantique&quot;." class="wp-image-5771" srcset="https://referencime.fr/wp-content/uploads/2022/02/Contenus-pour-sémantique-SEO-et-cocon-sémantique-1024x920.jpg 1024w, https://referencime.fr/wp-content/uploads/2022/02/Contenus-pour-sémantique-SEO-et-cocon-sémantique-300x269.jpg 300w, https://referencime.fr/wp-content/uploads/2022/02/Contenus-pour-sémantique-SEO-et-cocon-sémantique-768x690.jpg 768w, https://referencime.fr/wp-content/uploads/2022/02/Contenus-pour-sémantique-SEO-et-cocon-sémantique-1536x1379.jpg 1536w, https://referencime.fr/wp-content/uploads/2022/02/Contenus-pour-sémantique-SEO-et-cocon-sémantique-2048x1839.jpg 2048w, https://referencime.fr/wp-content/uploads/2022/02/Contenus-pour-sémantique-SEO-et-cocon-sémantique-1200x1078.jpg 1200w, https://referencime.fr/wp-content/uploads/2022/02/Contenus-pour-sémantique-SEO-et-cocon-sémantique-1980x1778.jpg 1980w" sizes="(max-width: 1024px) 100vw, 1024px"><figcaption class="wp-element-caption">Représentation de contenus qui correspondent à la sémantique attendue des requêtes «&nbsp;Sémantique SEO&nbsp;» et «&nbsp;Cocon Sémantique&nbsp;».</figcaption></figure>',
        'question8', 'strategie-seo', 'free'
    ],
    [
        '<p><strong>rel="sponsored"</strong> : permet d\'identifier les liens qui ont été créés pour de la publicité, du sponsoring ou d\'autres accords impliquant une rémunération.</p>
        <p><strong>rel="ugc"</strong> : UGC est l\'acronyme de "User Generated Content", qui signifie "Contenu généré par l\'utilisateur". La valeur de l\'attribut ugc est recommandée pour les liens qui se trouvent dans des contenus générés par les utilisateurs.</p>
        <p><strong>rel="nofollow"</strong> : permet de faire un lien en indiquant qu\'on ne recommande la cible. Cela dit, En 2019, Google a annoncé que les attributs des liens (sponsored, ugc et nofollow) sont désormais considérés comme des indications parmi d’autres signaux. Par conséquent, l\'attribut nofollow est une simple indication qui n\'empêche pas Google de choisir de transmettre le PageRank.</p>
        ', 'question9', 'strategie-seo', 'free'
    ],
    [
        '<p>Imaginons que l’index de Google ne contiendrait que 4 pages web : A, B, C et D.</p>

        <p>Ces pages se diviseraient donc la quantité initiale du PageRank, ce qui nous donnerait donc :</p>
        
        <ul>
        <li>La page A aurait 0,25 de PageRank</li>
        <li>La page B aurait 0,25 de PageRank</li>
        <li>La page C aurait 0,25 de PageRank</li>
        <li>La page D aurait 0,25 de PageRank</li>
        </ul>

        <blockquote class="wp-block-quote">
        <p>Nous pouvons remarquer ici que plus vous avez de pages à votre disposition, plus vous disposez de PageRank initialement.</p>
        </blockquote>

        <p>Si la page A contient 2 liens ciblant les pages B et C et qu’on garde la valeur du facteur d’amortissement présenté par Larry Page pour le surfeur aléatoire, alors la page A distribuerait 85% de sont PageRank au page B et C et les 15% restants seraient rétribués à toutes les pages.</p>
        <figure class="wp-block-image size-full"><img decoding="async" width="428" height="282" src="https://referencime.fr/wp-content/uploads/2021/12/Capture-de%CC%81cran-2021-12-21-a%CC%80-15.49.03.png" alt="Distribution du PageRank avec 4 pages web" class="wp-image-3675" srcset="https://referencime.fr/wp-content/uploads/2021/12/Capture-décran-2021-12-21-à-15.49.03.png 428w, https://referencime.fr/wp-content/uploads/2021/12/Capture-décran-2021-12-21-à-15.49.03-300x198.png 300w" sizes="(max-width: 428px) 100vw, 428px"><figcaption class="wp-element-caption">Distribution du PageRank avec 4 pages web</figcaption></figure>
        <p>En itérant la formule du PageRank jusqu’à ce que le PageRank des pages web se stabilise, nous obtiendrions ces valeurs tronquées au centième :</p>
        <ul>
        <li>La page A aurait 0,20 de PageRank</li>
        <li>La page B aurait 0,29 de PageRank</li>
        <li>La page C aurait 0,29 de PageRank</li>
        <li>La page D aurait 0,20 de PageRank</li>
        </ul>
        <p>Comme nous pouvons le voir, la page D qui n’a ni fait de lien ni reçu de lien a vu son PageRank baisser de 0,25 à 0,20.</p>
        <p>Un site qui ne créerait pas de nouvelles pages et qui n’obtiendrait pas de nouveaux liens, alors que le web continue d’évoluer, finirait par voir son PageRank diminué.',
        'question10', 'strategie-seo', 'free'
    ],
);


$knowledgeEvaluated = array(
    'Connaissances générales sur la conception d\'une stratégie SEO.'
);

$note = 0;
$totalPoints = 0;
$alert = '';
$successIndicator = 0.7;
